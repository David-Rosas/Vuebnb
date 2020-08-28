<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingController extends Controller
{


    private function get_listings(Listing $listing){
        $model = $listing->toArray();
        for($i = 1; $i <= 4; $i++){
            $model['image_' . $i] = asset(
                'images/'. $listing->id. '/Image_'. $i. '.jpg');
        }
        return collect(['listing' => $model]);
    }

    public function getListingsApi(Listing $listing){
        $data = $this->get_listings($listing);
        return response()->json($data);
    }

    public function getListingsWeb(Listing $listing){
        $data = $this->get_listings($listing);
        return view('app', compact('data'));

    }

    private function add_meta_data($collection, $request){
        return $collection->merge([
            'path' => $request->getPathInfo()
        ]);
    }
    private function get_listing_summaries(){
        $collection = Listing::all([
            'id', 'addres', 'title', 'price_per_night'
        ]);
        $collection->transform(function($listing){
            $listing->thumb = asset(
                'images/' . $listing->id . '/Images_1_thumb.jpg'
            );
            return $listing;
        });
        return collect(['listings' => $collection->toArray()]);
    }

    public function get_home_web(){
        $collection = Listing::all([
            'id', 'address', 'title', 'price_per_night'
        ]);
        $collection->transform(function($listing){
            $listing->thumb = asset(
                'images/'. $listing->id. '/Image_1_thumb.jpg'
            );
            return $listing;
        });
        $data = collect(['listings' => $collection->toArray()]);
        return view('app', compact('data'));
    }

    public function get_home_api(){
        $data = $this->get_listing_summaries();
        return response()->json($data);
    }
}
