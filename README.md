# Aplikasi web permintaan barang oleh Deni ace
**dibuat menggunakan laravel 7 dan bootstrap 4**

### menggunakan algoritna naive bayes (NBC) untuk menghitung I/C Additive, I/C Tronox dan I/C Pigment

Clone repository
```
git clone https://github.com/deniace/permintaan_sample.git
```

jalankan composer install
```
composer install
```
install npm dan jalankan
```
npm install
npm run dev
```

lalu jalankan copy .env.example .env

jalankan generate key
```
php artisan key:generate
```
jangan lupa buat database di phpmyadmin dengan nama permintaan_sample
langkah selanjutnya setting database nya di .env

jalankan migrasi dan seeder
```
php artisan migrate
php artisan db:seed
```
terakhir running di local dev

```
php artisan serve
```

buka localhost:8000
lalu login dan import file exel di folder file

## akun untuk login
```
Admin 
email : admin@mail.com
password : adminadmin

Manager
email : manager@mail.com
password : managermanager

Sales
email : sales@mail.com
password : salessales

email : bagus@mail.com
password : salessales

email : christine@mail.com
password : salessales

email : elshinta@mail.com
password : salessales

email : haryono@mail.com
password : salessales

email : ivan@mail.com
password : salessales

email : permana@mail.com
password : salessales

email : randy@mail.com
password : salessales

email : rian@mail.com
password : salessales

email : zeila@mail.com
password : salessales
```

### screenshot 

![Login](https://github.com/deniace/permintaan_sample/blob/master/screenshot/login.png "Login")
![Beranda](https://github.com/deniace/permintaan_sample/blob/master/screenshot/dashboard.png "Beranda")
![Akun](https://github.com/deniace/permintaan_sample/blob/master/screenshot/akun.png "akun")
![Naive Bayes](https://github.com/deniace/permintaan_sample/blob/master/screenshot/naive-bayes.png "Naive bayes")
![Import excel](https://github.com/deniace/permintaan_sample/blob/master/screenshot/import-excel.png "import excel")
![Area](https://github.com/deniace/permintaan_sample/blob/master/screenshot/area.png "Area")
![Division](https://github.com/deniace/permintaan_sample/blob/master/screenshot/division.png "division")
![Permintaan sample](https://github.com/deniace/permintaan_sample/blob/master/screenshot/permintaan-sample.png "Permintaan sample")
![tambah permintaan baru](https://github.com/deniace/permintaan_sample/blob/master/screenshot/tambah-permintaan-baru.png "tambah permintaan baru")
![Detail permintaan](https://github.com/deniace/permintaan_sample/blob/master/screenshot/detail-permintaan.png "Detail permintaan")