<?php

namespace App\Http\Controllers\Gateway\perfect_money;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\Deposit;
use Illuminate\Support\Facades\Auth;

class ProcessController extends Controller
{
    /*
     * Perfect Money Gateway
     */
    public static function process($deposit)
    {
        $basic =  GeneralSetting::first();

        $gateway_currency = $deposit->gateway_currency();

        $perfectAcc = json_decode($gateway_currency->gateway_parameter); //transaction_number, text, required
        $gateway_alias = $gateway_currency->gateway_alias; //perfect_money
        $val['PAYEE_ACCOUNT'] = trim($perfectAcc->transaction_number->wallet_id);
        $val['PAYEE_NAME'] = $basic->sitename; // Fx-intense
        $val['PAYMENT_ID'] = "$deposit->trx"; // Ex. 94AdDE21
        $val['PAYMENT_AMOUNT'] = round($deposit->final_amo, 2); // Ex. 9.04
        $val['PAYMENT_UNITS'] = "$deposit->method_currency"; // USD

        $val['STATUS_URL'] = route('ipn.' . $gateway_alias);
        $val['PAYMENT_URL'] = route('user.deposit');
        $val['PAYMENT_URL_METHOD'] = 'POST';
        $val['NOPAYMENT_URL'] = route('user.deposit');
        $val['NOPAYMENT_URL_METHOD'] = 'POST';
        $val['SUGGESTED_MEMO'] = Auth::user()->username;
        $val['BAGGAGE_FIELDS'] = 'IDENT';


        $send['val'] = $val;
        $send['view'] = 'user.payment.redirect';
        $send['method'] = 'post';
        $send['url'] = 'https://perfectmoney.is/api/step1.asp';


        return json_encode($send);
    }

    public function ipn()
    {
        $data = Deposit::where('trx', $_POST['PAYMENT_ID'])->orderBy('id', 'DESC')->first();
        $pmAcc = json_decode($data->gateway_currency()->gateway_parameter);
        $passphrase = strtoupper(md5($pmAcc->passphrase));

        define('ALTERNATE_PHRASE_HASH', $passphrase);
        define('PATH_TO_LOG', '/somewhere/out/of/document_root/');
        $string =
            $_POST['PAYMENT_ID'] . ':' . $_POST['PAYEE_ACCOUNT'] . ':' .
            $_POST['PAYMENT_AMOUNT'] . ':' . $_POST['PAYMENT_UNITS'] . ':' .
            $_POST['PAYMENT_BATCH_NUM'] . ':' .
            $_POST['PAYER_ACCOUNT'] . ':' . ALTERNATE_PHRASE_HASH . ':' .
            $_POST['TIMESTAMPGMT'];

        $hash = strtoupper(md5($string));
        $hash2 = $_POST['V2_HASH'];

        if ($hash == $hash2) {
            $amo = $_POST['PAYMENT_AMOUNT'];
            $unit = $_POST['PAYMENT_UNITS'];
            $track = $_POST['PAYMENT_ID'];
            if ($_POST['PAYEE_ACCOUNT'] == $pmAcc->wallet_id && $unit == $data->method_currency && $amo == $data->final_amo && $data->status == '0') {
                //Update User Data
                PaymentController::userDataUpdate($data->trx);
            }
        }
    }
}
