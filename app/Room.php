<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timesstamps = false;

    protected $fillable = [
        'name', 'price','floor', 'location', 'type_id'
    ];

     //relasi ke tabel type
    public function relation_type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
