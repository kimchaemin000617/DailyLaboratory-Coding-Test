<?php

namespace App\Models;

use CodeIgniter\Model;

class Map_model extends Model
{
    protected $table = 'place';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    public function getPlaceList($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
