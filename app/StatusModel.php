<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class StatusModel extends Model
{
    //
    protected $primaryKey = 'id_status';
    protected $fillable = ["nama_status"];
    protected $table = "status";
}
