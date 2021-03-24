<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class JabatanModel extends Model
{
    //
    protected $primaryKey = 'id_jabatan';
    protected $fillable = ["nama_jabatan", "singkatan_jabatan"];
    protected $table = "tb_jabatan";
}
