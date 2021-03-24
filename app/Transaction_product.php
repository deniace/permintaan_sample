<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class Transaction_product extends Model
{
    //
    protected $primaryKey = 'id_tp';
    protected $fillable = ["id_transaction", "id_product", "qty"];

    /**
     * Untuk Relasi ke product.
     */
    public function product()
    {
        return $this->hasOne('App\ProductModel', 'id_product', 'id_product');
    }
}
