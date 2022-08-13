<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gateway;
use App\Models\GatewayCurrency;
use App\Rules\FileTypeValidate;

class ManualGatewayController extends Controller
{
    public function index()
    {
        $page_title = 'Manual Deposit Methods';
        $gateways = Gateway::manual()->latest()->get();
        $empty_message = 'No deposit methods available.';
        return view('admin.gateway_manual.list', compact('page_title', 'gateways', 'empty_message'));
    }
    public function create()
    {
        $page_title = 'New Manual Deposit Method';
        return view('admin.gateway_manual.create', compact('page_title'));
    }
}
