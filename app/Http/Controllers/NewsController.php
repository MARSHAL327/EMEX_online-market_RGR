<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;
use App\Http\Models\NewsModel;

class NewsController extends Controller {

    public function showNews(){
        $news = NewsModel::paginate(3);

        return view('news', compact('news'));
    }

    public function showOneNews($id){
        $news = new NewsModel();
        return view('oneNews', ["oneNews" => $news->find($id)]);
    }

    public function addOneNews(NewsRequest $req){
        $news = new NewsModel();

        $news->title = $req->input('title');
        $news->desc = $req->input('desc');
        $news->img = "img/" . $req->input('img');
        $news->text = $req->input('text');
        $news->date = date("Y-m-d");

        $saveStatus = $news->save();

        if( $saveStatus ){
            return $this->JSONResponse("success", "Успех", "Новость успешно добавлена");
        } else return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
    }

}
