<?php

namespace App\Http\Controllers;

use App\Http\Models\Slider;
use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function deleteSlide(Request $req){
        $slide = Slider::findOrFail($req->slide_id);

        try{
            $slide->delete();
            return $this->JSONResponse("success", "Успех", "Слайд успешно удалён");
        } catch (\Exception $ex){
            return $this->JSONResponse("error", "Ошибка", "При удалении произошла ошибка");
        }
    }

    public function addSlide(SliderRequest $req, $slide = null){
        if( $slide == null )
            $slide = new Slider();

        $slide->img = $req->img;
        $slide->title = $req->title;

        try{
            $slide->save();
            return $this->JSONResponse("success", "Успех", "Слайд успешно создан");
        } catch (\Exception $ex){
            return $this->JSONResponse("error", "Ошибка", "При создании произошла ошибка");
        }
    }

    public function editSlide(SliderRequest $req){
        $slide = Slider::findOrFail($req->id);

        $slide->img = $req->img;
        $slide->title = $req->title;

        try{
            $slide->save();
            return $this->JSONResponse("success", "Успех", "Слайд успешно обновлён");
        } catch (\Exception $ex){
            return $this->JSONResponse("error", "Ошибка", "При обновлении произошла ошибка");
        }
    }

    public function showEditSlidePage($id){
        return view('admin.edit.editSlide', [
            "slide" => Slider::findOrFail($id)
        ]);
    }
}
