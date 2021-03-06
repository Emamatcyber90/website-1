<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Categorie;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = article::all();
        return $articles;
        // return view('articles',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categorie::all();
        return $categories;
        // return view('articles',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->photo_principal = $request->photo_principal;
        $article->another_photo = $request->another_photo;
        $article->view = $request->view;
        $article->vote = $request->vote;
        $article->keyword = $request->keyword;
        $article->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = article::findOrFail($id);
        return $article;
        // return view('article',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = article::findOrFail($id);
        $categories = categorie::all();
        return $article;
        // return view('edit_article',compact('article','categories'));
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
        $article = article::findOrFail($id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->photo_principal = $request->photo_principal;
        $article->another_photo = $request->another_photo;
        $article->view = $request->view;
        $article->vote = $request->vote;
        $article->keyword = $request->keyword;
        $article->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = article::findOrFail($id);
        $article->delete();
    }
}
