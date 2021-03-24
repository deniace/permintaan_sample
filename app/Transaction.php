<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class Transaction extends Model
{
    //
    protected $primaryKey = 'id_transaction';
    protected $fillable = ["id_trx", "id_sales", "id_division", "date", "month", "id_area", "product_type", "product_name", "supplier", "status_product", "end_application", "customer", "qty", "tgl_pengiriman", "note", "id_manager", "status_manager"];

    /**
     * Untuk Relasi ke sales.
     */
    public function sales()
    {
        return $this->hasOne('App\User', 'id', 'id_sales');
    }
    /**
     * Untuk Relasi ke division.
     */
    public function division()
    {
        return $this->hasOne('App\Division', 'id_division', 'id_division');
    }
    /**
     * Untuk Relasi ke area.
     */
    public function area()
    {
        return $this->hasOne('App\Area', 'id_area', 'id_area');
    }
    /**
     * Untuk Relasi ke manager.
     */
    public function manager()
    {
        return $this->hasOne('App\User', 'id', 'id_manager');
    }
    /**
     * Untuk Relasi ke statusmanager.
     */
    public function status()
    {
        return $this->hasOne('App\StatusModel', 'id_status', 'status_manager');
    }
}
