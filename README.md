# Majoo test Framework Laravel
## instalasi

Note: Server pembuatan menggunakan laragon & mysql.

1. Clone project .
2. install composer jika belum 
3. nyalakan server lalu run terminal pada folderproject `php artisan serve` 
4. lalu run `php artisan key:generate`
5. lalu buat database mysql dengan nama  `majoo`
6. kemudian run `php artisan migrate:fresh --seed`
7. jalankan browser local `localhost:8000`
8. jika gambar tidak muncul delete `storage` pada `folderproject/public/`
9. lalu kemudian run `php artisan storage:link`
10. selesai.


## akses login 

Username: superadmin

password: password