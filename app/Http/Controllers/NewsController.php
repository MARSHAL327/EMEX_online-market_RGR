<?php

namespace App\Http\Controllers;

use App\Http\Models\NewsModel;

class NewsController extends Controller
{

    public function showNews(){
        $news = NewsModel::orderBy('date', 'desc')->paginate(9);

        return view('news', compact('news'));
    }

    public function getSomeNews($countNews){
        $news = new NewsModel();

        return $news->take($countNews)->get();
    }

    public function showOneNews($id){
        $news = new NewsModel();
        return view('oneNews', ["oneNews" => $news->findOrFail($id)]);
    }

}
