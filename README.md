<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## :computer: API Test Inosoft 

The following is the procedure for using the backend program from the inosoft backend test locally:

##	:link: Architecture Program

- Menggunakan [PHP ^7.3 | PHP ^8.0](https://www.php.net/)
- Menggunakan [Database MongoDb](https://www.mongodb.com/compatibility/mongodb-laravel-intergration) ([MongoDB Compass](https://www.mongodb.com/try/download/community) | [MongoDB Atlas](https://www.mongodb.com/atlas))
- Menggunakan [Laravel 8](https://laravel.com/docs/8.x)

## :gear: Prerequisites
- Clone repo ini
- Telah memiliki installasi mongodb di dalam php driver maupun device, untuk cara installasi bisa dilihat [disini](https://www.php.net/manual/en/mongodb.installation.php)
- MongoDB database telah terhubung


## :arrow_forward: Running Program (try in local)
### :cd: Install Composer Dependencies
- Buka file laravel dan install semua composer yang tersedia 
  - Ketik code tersebut di terminal yang tersedia:
```text
composer install
```
  - Apabila terdapat konflik mengenai library jenssegers/mongodb, maka anda dapat melihat detailnya [disini](https://github.com/jenssegers/laravel-mongodb)


### :cd: Install NPM Dependencies
- Ketik code tersebut di terminal yang tersedia:
```text
npm install
```

### :computer: .env setting
- Copy file `env.example` kedalam project dan ganti menjadi file `.env`
- Didalam file `.env` ganti 
```dotenv
DB_CONNECTION=mysql
```
menjadi 
```dotenv
DB_CONNECTION=mongodb
``` 
- Lalu tambahkan setting mongodb sebagai berikut:
```dotenv
MONGO_DB_HOST=127.0.0.1 #sesuaikan dengan uri koneksi dari mongodb yang ada
MONGO_DB_PORT=27017 #sesuaikan dengan uri koneksi dari mongodb yang ada
MONGO_DB_DATABASE=test-inosoft #sesuaikan dengan database yang akan digunakan
MONGO_DB_USERNAME=
MONGO_DB_PASSWORD=
```
- Lalu jalankan code berikut di terminal yang ada untuk generate `APP_KEY=`
```text
php artisan key=generate
```
- dan jalankan kode berikut di terminal yang ada untuk generate `JWT_SECRET=`
```text
php artisan jwt:secret
```


### :bookmark_tabs: Database Migration dan Seed
- Jalankan kode berikut di terminal yang ada untuk melakukan migration dan seeder kedalam database mongodb yang telah terhubung:
```text
php artisan migrate:fresh --seed
```


### :desktop_computer: Menjalankan Server
Menjalankan server diperlukan untuk percobaan ataupun testing dan menjalankan fitur dari API

- Jalankan kode berikut untuk menjalankan laravel server:
```text
php artisan serve
```

### :test_tube: Running Test
- Jalankan kode berikut di terminal yang tersedia untuk melakukan test. Pastikan test folder dan file tersedia di `\test` :
```text
php artisan test
```


### :open_book: API Postman Documentation
Untuk dokumentasi dapat dilihat [disini](https://documenter.getpostman.com/view/10737931/2s8YstTD4T)


### :adult: Biodata Job Applicant
####Brian Sayudha | briansayudha@gmail.com

