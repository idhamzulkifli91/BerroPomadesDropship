<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

class NewsPostController extends Controller
{
    private $news;

    const VIEW_PATH = 'news.';

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'News \ all';
        $news = $this->news->paginate(static::PAGINATION_LIMIT);
        return view()->make(static::VIEW_PATH.'index')->with(compact('title','news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'News / Create';
        return view()->make(static::VIEW_PATH.'create')->with(compact('title'));
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
            'title' => 'required',
            'body' => 'required'
        ]);

        $request->merge(['slug_path' => $request->input('title')]);
        $this->news->create($request->all());
        Alert::info('Adding new announcement.')->flash();
        return redirect()->back();
    }

    public function getBySlug($slug)
    {
        $title = 'Read news';
        $news = $this->news->where('slug_path',$slug)->first();
        return view(static::VIEW_PATH.'view-by-slug')->with(compact('title','news'));
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
        $title = 'News / Edit';
        $news = $this->news->find($id);
        return view()->make(static::VIEW_PATH.'edit')->with(compact('title','news'));
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
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        $news = $this->news->find($id);
        $news->update($request->all());
        Alert::info('Saving announcement.')->flash();
        return redirect()->back();
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
