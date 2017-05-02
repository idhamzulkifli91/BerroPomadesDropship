<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Setting;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

class ConfigurationController extends Controller
{

    private $configuration;

    const VIEW_PATH = 'config.';

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'settings';
        $settings = $this->configuration->all();
        return view()->make(static::VIEW_PATH.'index')->with(compact('title','settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->except('_token') as $key => $value ) {
            $data = $this->configuration->where('key',$key)->first();
            if(!$data) {
                $this->configuration->create(['key' => $key,'value' => $value]);
            }
            else {
                $data->update(['value' => $value]);
            }

        }

        Alert::info('Wonderful.You saved some settings')->flash();
        return redirect()->back();
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
        //
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
        //
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
