<?php


namespace App\Http\Controllers\AdminPanel;


use App\Http\Models\NewsModel;
use App\Http\Requests\NewsRequest;

trait NewsTrait
{
    public function addOneNews(NewsRequest $req){
        $news = new NewsModel();

        $news->title = $req->input('title');
        $news->desc = htmlspecialchars($req->input('desc'));
        $news->img = $req->input('img');
        $news->text = htmlspecialchars($req->input('text'));
        $news->date = date("Y-m-d");

        $saveStatus = $news->save();

        if( $saveStatus ){
            return $this->JSONResponse("success", "Успех", "Новость успешно добавлена");
        } else return $this->JSONResponse("error", "Ошибка", "При добавлении произошла ошибка");
    }
}
