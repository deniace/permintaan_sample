<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class Area extends Model
{
    //
    protected $primaryKey = "id_area";
    protected $fillable = ["id_area", "nama_area"];
    public $incrementing = false;
}
