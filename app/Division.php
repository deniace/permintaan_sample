<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class Division extends Model
{
    protected $primaryKey = "id_division";
    protected $fillable = ["nama_division"];
}
