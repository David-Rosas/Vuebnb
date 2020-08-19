<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingController extends Controller
{
    private function addImageUrls($model, $id){
        for($i = 1; $i <= 4; $i++){
            $model['image_' . $i] = asset('images/'. $id. '/Image_'. $i. '.jpg');
        }
        return $model;
    }
    public function getListingsApi(Listing $listing){
        $model = $listing->toArray();

        for($i=1; $i <= 4; $i++ ){
            $model['image_'. $i] = asset('images/'.$listing->id. '/Image_' . $i . '.jpg');
        }

        return response()->json($model);
    }

    public function getListingsWeb(Listing $listing){
        $model = $listing->toArray();
        $model = $this->addImageUrls($model, $listing->id);
        return view('app', compact('model'));

    }
}
