<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Validator;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $general = GeneralSetting::first();
        $page_title = 'General Settings';
        return view('admin.setting.general_setting', compact('page_title', 'general'));
    }
    public function update(Request $request)
    {
        $request->secondary_color = 'C10B0B';
        $validation_rule = [
            /*  'base_color' => ['nullable', 'regex:/^[a-f0-9]{6}$/i'],
            'secondary_color' => ['nullable', 'regex:/^[a-f0-9]{6}$/i'], */
            'signup_bonus_amount' => ['numeric']
        ];

        $validator = Validator::make($request->all(), $validation_rule, []);
        $validator->validate();

        $general_setting = GeneralSetting::first();
        $request->merge(['ev' => isset($request->ev) ? 1 : 0]);
        $request->merge(['en' => isset($request->en) ? 1 : 0]);
        $request->merge(['sv' => isset($request->sv) ? 1 : 0]);
        $request->merge(['sn' => isset($request->sn) ? 1 : 0]);
        $request->merge(['b_transfer' => isset($request->b_transfer) ? 1 : 0]);
        $request->merge(['registration' => isset($request->registration) ? 1 : 0]);
        $request->merge(['signup_bonus_control' => isset($request->signup_bonus_control) ? 1 : 0]);

        $general_setting->update($request->only(['sitename', 'cur_text', 'cur_sym', 'ev', 'en', 'sv', 'sn', 'registration', 'base_color', 'secondary_color', 'signup_bonus_amount', 'signup_bonus_control', 'b_transfer', 'f_charge', 'p_charge']));
        $notify[] = ['success', 'General Setting has been updated.'];
        return back()->withNotify($notify);
    }

    public function logoIcon()
    {
        $page_title = 'Logo & Icon';
        $general_setting = GeneralSetting::first();
        return view('admin.setting.logo_icon', compact('page_title','general_setting'));
    }
    public function logoIconUpdate(Request $request)
    {
        $request->validate([
            'logo' => 'image|mimes:jpg,jpeg,png',
            'favicon' => 'image|mimes:png',
        ]);

        $input = $request->all();

        $general_setting = GeneralSetting::first();
        if ($image = $request->file('logo')) {
            $postImage = 'mainlogo' . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/adminLte/uploads/logo/'), $postImage);
            $input['logo'] = "$postImage";
        } else {
            unset($input['logo']);
        }
        if ($image = $request->file('favicon')) {
            $postImage = 'favicon' . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/adminLte/uploads/logo/'), $postImage);
            $input['favicon'] = "$postImage";
        } else {
            unset($input['favicon']);
        }
        $general_setting->update($input);
        $notify[] = ['success', 'Logo Icons has been updated.'];
        return back()->withNotify($notify);
/* 
        if ($request->hasFile('logo')) {
            try {
                $path = imagePath()['logoIcon']['path'];
                // dd($path);
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                Image::make($request->logo)->save($path . '/logo.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Logo could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        if ($request->hasFile('favicon')) {
            try {
                $path = imagePath()['logoIcon']['path'];
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                $size = explode('x', imagePath()['favicon']['size']);
                Image::make($request->favicon)->resize($size[0], $size[1])->save($path . '/favicon.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Favicon could not be uploaded.'];
                return back()->withNotify($notify);
            }
        } 
        $notify[] = ['success', 'Logo Icons has been updated.'];
        return back()->withNotify($notify);
        */
    }
}
