<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Area
 *
 * @property int $id_area
 * @property string $nama_area
 * @property string $singkatan_area
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereIdArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereNamaArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereSingkatanArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereUpdatedAt($value)
 */
	class Area extends \Eloquent {}
}

namespace App{
/**
 * App\BerandaModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BerandaModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BerandaModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BerandaModel query()
 */
	class BerandaModel extends \Eloquent {}
}

namespace App{
/**
 * App\Customer
 *
 * @property int $id_customer
 * @property string $nama_customer
 * @property string $alamat_customer
 * @property string $jenis_kelamin
 * @property string $telp_customer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereAlamatCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereIdCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereNamaCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereTelpCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereUpdatedAt($value)
 */
	class Customer extends \Eloquent {}
}

namespace App{
/**
 * App\Division
 *
 * @property int $id_division
 * @property string $nama_division
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Division newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Division newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Division query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Division whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Division whereIdDivision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Division whereNamaDivision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Division whereUpdatedAt($value)
 */
	class Division extends \Eloquent {}
}

namespace App{
/**
 * App\JabatanModel
 *
 * @property int $id_jabatan
 * @property string $nama_jabatan
 * @property string $singkatan_jabatan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JabatanModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JabatanModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JabatanModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JabatanModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JabatanModel whereIdJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JabatanModel whereNamaJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JabatanModel whereSingkatanJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\JabatanModel whereUpdatedAt($value)
 */
	class JabatanModel extends \Eloquent {}
}

namespace App{
/**
 * App\ProductModel
 *
 * @property int $id_product
 * @property int $id_supplier
 * @property string $nama_product
 * @property float $harga
 * @property int $stock
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Supplier|null $supplier
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductModel whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductModel whereIdProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductModel whereIdSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductModel whereNamaProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductModel whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductModel whereUpdatedAt($value)
 */
	class ProductModel extends \Eloquent {}
}

namespace App{
/**
 * App\StatusModel
 *
 * @property int $id_status
 * @property string $nama_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StatusModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StatusModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StatusModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StatusModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StatusModel whereIdStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StatusModel whereNamaStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StatusModel whereUpdatedAt($value)
 */
	class StatusModel extends \Eloquent {}
}

namespace App{
/**
 * App\Supplier
 *
 * @property int $id_supplier
 * @property string $nama_supplier
 * @property string $alamat_supplier
 * @property string $telp_supplier
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereAlamatSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereIdSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereNamaSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereTelpSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereUpdatedAt($value)
 */
	class Supplier extends \Eloquent {}
}

namespace App{
/**
 * App\Transaction
 *
 * @property int $id_transaction
 * @property int $id_sales
 * @property int $id_customer
 * @property int $id_division
 * @property int $id_area
 * @property string $tgl
 * @property string $note
 * @property int $id_manager
 * @property int $status_manager
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Area|null $area
 * @property-read \App\Customer|null $customer
 * @property-read \App\Division|null $division
 * @property-read \App\User|null $manager
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Transaction_product[] $product
 * @property-read int|null $product_count
 * @property-read \App\User|null $sales
 * @property-read \App\StatusModel|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereIdArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereIdCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereIdDivision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereIdManager($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereIdSales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereIdTransaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereStatusManager($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereTgl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereUpdatedAt($value)
 */
	class Transaction extends \Eloquent {}
}

namespace App{
/**
 * App\Transaction_product
 *
 * @property int $id_tp
 * @property int $id_transaction
 * @property int $id_product
 * @property int $qty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\ProductModel|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction_product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction_product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction_product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction_product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction_product whereIdProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction_product whereIdTp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction_product whereIdTransaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction_product whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction_product whereUpdatedAt($value)
 */
	class Transaction_product extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property int $id_role
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\JabatanModel|null $jabatan
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIdRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

