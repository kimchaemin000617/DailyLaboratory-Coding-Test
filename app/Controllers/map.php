<?php

namespace App\Controllers;

use App\Models\Map_model;

class Map extends BaseController
{

    public function view($slug = null)
    {
        $model = model(Map_model::class);

        $data['place'] = $model->getPlace($slug);
    }
    
    public function index()
    {

        $model = model(Map_model::class);

        $data = [
            'place'  => $model->getPlace(),
        ];
        echo view('Map_view', $data);
    }
}
