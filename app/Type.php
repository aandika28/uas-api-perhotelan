<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
     public $timesstamps = false;

    protected $fillable = [
        'name', 'description','capacity', 'facility'
    ];

         //relasi ke tabel room
    public function relation_room()
    {
        return $this->hasMany(Room::class, 'type_id');
    }
}
