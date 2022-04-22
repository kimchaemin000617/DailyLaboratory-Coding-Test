<?php

namespace App\Controllers;

use App\Models\Map_model;

class Map extends BaseController
{
    public function index()
    {

        $model = model(Map_model::class);

        // Map_view에 place_list 넘기기
        $data = [
            'place_list'  => $model->getPlaceList(),
        ];
        echo view('Map_view', $data);
    }
}
