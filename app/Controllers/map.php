<?php

namespace App\Controllers;

use App\Models\Map_model;

class Map extends BaseController
{

    public function view($slug = null)
    {
        $model = model(Map_model::class);

        $data['place_list'] = $model->getPlaceList($slug);
    }
    
    public function index()
    {

        $model = model(Map_model::class);

        $data = [
            'place_list'  => $model->getPlaceList(),
        ];
        echo view('Map_view', $data);
    }
}
