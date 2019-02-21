<?php

namespace Davidcb\News\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Pagination;
use Davidcb\News\Http\Requests\NewsFormRequest;
use Davidcb\News\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('name')->paginate(20);

        $pagination = new Pagination($news, $perPage = 20, request()->except('page'));
        $news = $pagination->results();

        return view('news::index', compact('news', 'pagination'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Davidcb\News\Http\Requests\NewsFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsFormRequest $request)
    {
        $news = News::create($request->all());

        session()->flash('status', 'Usuario creado correctamente');

        return redirect(route('admin.news.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Davidcb\News\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news::edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Davidcb\News\Http\Requests\NewsFormRequest  $request
     * @param  \Davidcb\News\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsFormRequest $request, News $news)
    {
        $news->fill($request->all());

        if ($news->isDirty()) {
            $news->save();
        }

        session()->flash('status', 'Usuario actualizado correctamente');

        return redirect(route('admin.news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Davidcb\News\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        return $news->delete() ? 'ok' : 'error';
    }
}
