<p align="center"><a href="https://bukuinformatika.com" target="_blank"><img src="https://bukuinformatika.com/wp-content/uploads/2021/02/icon.png" width="100"></a></p>


## Membuat Aplikasi CRUD Laravel + AdminLTE

Langkah - langkah : 

1. Install Laravel 
2. Integrasi AdminLTE
3. Konfigurasi Halaman Admin 
4. Membuat fungsi CRUD

## Link Tutorial

- **[Website](https://bukuinformatika.com/membuat-aplikasi-crud-laravel-adminlte/)**
- **[YouTube](https://www.youtube.com/watch?v=UKIinMvcZ54)**


## Lisensi

Aplikasi bebas digunakan untuk berbagai kepentingan, akan tetapi jika digunakan untuk kepentingan komersial sebaiknya mencantumkan link sumber utama [https://bukuinformatika.com](https://bukuinformatika.com).

Semoga Bermanfaat. Wassalam.

Run command

php artisan adminlte:install
php artisan ui bootstrap --auth
php artisan adminlte:install --type=full
php artisan adminlte:plugins install

php artisan vendor:publish --tag=ckfinder-assets --tag=ckfinder-config
php artisan vendor:publish --tag=ckfinder-views
php artisan vendor:publish --tag=ckfinder
mkdir -m 777 public/userfiles
php artisan ckfinder:download
