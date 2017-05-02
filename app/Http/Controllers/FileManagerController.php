<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileManager;
use Prologue\Alerts\Facades\Alert;
use Ramsey\Uuid\Uuid;

class FileManagerController extends Controller
{

    const VIEW_PATH = 'filemanager.';

    private $filemanager;

    public function __construct(FileManager $filemanager)
    {
        $this->filemanager = $filemanager;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'File manager \ Material support';
        $files = $this->filemanager->paginate(static::PAGINATION_LIMIT);
        return view()->make(static::VIEW_PATH.'index')->with(compact('files','title'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function materialSupport()
    {
        $title = 'File manager \ Material support';
        $files = $this->filemanager->paginate(static::PAGINATION_LIMIT);
        return view()->make(static::VIEW_PATH.'user-file')->with(compact('files','title'));
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
        $this->validate($request,[
            'file' => 'required|mimes:pdf,jpg,png,bitmap,jpeg',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $mimeType = $file->getType();

        $nameByFormat = Uuid::uuid1()->toString().'.'.$extension;
        $path = $request->file->storeAs('documents',$nameByFormat);


        $save = $this->filemanager->updateOrCreate([
            'name' => $originalName,
            'document_path' => $path,
            'size' => $file->getSize(),
            'status' => $request->input('status')
        ]);

        if($save) {
            Alert::info('File upload success.')->flash();
            return redirect()->route('filemanager.index');
        }

        Alert::error('File upload fail.')->flash();
        return redirect()->route('filemanager.index');

    }


    public function deleteFile($file)
    {
        $this->filemanager->destroy($file);
        Alert::info('File deleted.')->flash();
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
