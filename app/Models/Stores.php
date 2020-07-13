<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    protected $table = "stores";
    public $fillable = ["name_store","city_id","address","slug","phone","status","ma_store"];
    public function City()
    {
        return $this->belongsTo("\App\Models\Citys","city_id");
    }
}
