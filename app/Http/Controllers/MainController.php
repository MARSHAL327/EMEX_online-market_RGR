<?php

namespace App\Http\Controllers;

use App\Http\Controllers\NewsController;
use App\Http\Models\Main;
use App\Http\Models\Slider;
use App\Http\Requests\ContactsRequest;
use App\Mail\ContactsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function showPage(){
        $news = new NewsController();
        $stock = new StockController();
        $maintenance = new MaintenanceController();

        return view('main', [
            "news" => $news->getSomeNews(3),
            "stock" => $stock->getSomeStock(4),
            "slider" => Slider::orderBy("id", "DESC")->get()
        ] + $maintenance->getBrandsData());
    }

    public function editOrganizationData(Request $req){
        $site = Main::find(1);

        $site->name = $req->name;
        $site->address = $req->address;
        $site->work_time = $req->work_time;
        $site->phone = $req->phone;
        $site->email = $req->email;
        $site->description = $req->description;

        $saveStatus = $site->save();

        if( $saveStatus ){
            return $this->JSONResponse("success", "Успех", "Данные об организации успешно изменены");
        } else return $this->JSONResponse("error", "Ошибка", "При изменении произошла ошибка");
    }

    public function sendMail(ContactsRequest $req){
        try{
            Mail::to("sanya.shvedenko@mail.ru")->send(new ContactsMail($req));
            return $this->JSONResponse("success", "Успех", "Данные успешно отправлены");
        } catch (\Exception $ex){
            return $this->JSONResponse("success", "Успех", "При отправке произошла ошибка");
        }

    }

    public function changeLocale($locale){
        session(["locale" => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }
}
