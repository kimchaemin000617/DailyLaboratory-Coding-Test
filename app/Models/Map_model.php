<?php

namespace App\Models;

use CodeIgniter\Model;

class Map_model extends Model
{
    protected $table = 'place';

    public function getPlaceList()
    {
        return $this->findAll();
    }
}
