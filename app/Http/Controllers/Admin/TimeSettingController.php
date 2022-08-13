<?php

namespace App\Http\Controllers\Admin;

use App\Models\TimeSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;



class TimeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Manage Time Settings";
        $team = TimeSetting::orderBy('id')->get();
        return view('admin.time_setting.index', compact('page_title', 'team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Create New Setting";
        $time = TimeSetting::all();
        return view('admin.time_setting.create', compact('page_title', 'time'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'time' => 'required|numeric|min:0'
        ]);
        TimeSetting::create($request->all());
        $notify[] = ['success', 'Create Successfully']; 
        return redirect()->route('admin.time-setting')->withNotify($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = "Update Time";
        $time = TimeSetting::whereId($id)->first();
        return view('admin.time_setting.edit', compact('page_title', 'time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation['name'] = 'required';
        $validation['time'] = 'numeric|min:0';
        TimeSetting::whereId($id)->update([
            'name' => $request->name,
            'time' => $request->time,
        ]);
        $notify[] = ['success', 'Update Successfully'];
        return redirect()->route('admin.time-setting')->withNotify($notify);;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
