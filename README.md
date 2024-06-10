# WargaPeduli

## Deskripsi

WargaPeduli adalah sebuah sistem `e-gevorment` yang berfokus pada tingkat rukun warga dan dibawahnya.Pada sistem ini nantinya meliputi manajemen pendataan penduduk,manajemen bantuan sosial, manajemen pengaduan atau saran, dan informasi tentang kegiatan pada tingkat rukun warga dan dibawahnya.Sistem ini telah melalui wawancara dari bapak ketua warga dengan nama `Bapak Sukron` yang tinggal di `Jalan Kalpataru RT.04 RW.03 Kec.Jatimulyo Kec.Lowokwaru Kota Malang`.

## Tech Stack & Framework

- Laravel 10 : https://laravel.com/docs/10.x
- MySQL (Database) : https://www.mysql.com/
- TailwindCSS : https://tailwindcss.com/

## Software Requirement

- Git : https://git-scm.com/downloads
- Composer 2.6.6 : https://getcomposer.org/download/
- NodeJS 20 : https://nodejs.org/en/download/current
- PHP 8.1 or Laragon with bundling PHP 8.1 : https://www.php.net/downloads.php or https://laragon.org/download/index.html
- Postman or Apidog : https://www.postman.com/downloads/ or https://apidog.com/

## Team

- Moch. Cholilur Rokhman
- Muhammad Fakhruddin Arif
- Nanda Putra Khamdani
- Hilyatul Jannah

## Library & Driver

- DOMPDF : https://github.com/barryvdh/laravel-dompdf
- Data Table : https://livewire.laravel.com/docs/installation
- UUID : https://github.com/ramsey/uuid

## Installation

1. Fork repository
    - Cari Fork di sudut kanan repo dan klik
    - Klik Create Fork di bagian bawah, pastikan Anda menghapus centang pada Copy the master branch only
    - Jika di repositori Anda telah melakukan fork dari alamat repositori di atas, maka proses fork Anda berhasil
2. Clone fork repository
```shell
git clone https://github.com/Your_Github_Address/WargaPeduli.git
```
3. Masuk ke path folder repository
```shell
cd WargaPeduli
```
4. Install dependency
```shell
composer install
composer update
npm install
```
5. Salin file `.env.example` to `.env`
```shell
cp .env.example .env
```
6. Generate key
```shell
php artisan key:generate
```

## Database Migration

Semua database migration terdapat pada folder `database/migrations`

### Membuat Model, Migration, dan Seeder

```shell
php artisan make:model namaModel --migration --seed
```

### Run Migration

```shell
php artisan migrate
```

### Run Data Untuk Database

```shell
php artisan db:seed LevelSeeder

php artisan db:seed RukunTetanggaSeeder

php artisan db:seed BantuanSosialSeeder

php artisan db:seed KeluargaSeeder

php artisan db:seed WargaSeeder

php artisan db:seed UserSeeder
```

## Run Application & Testing

### Membuat Test

```shell
php artisan make:test namaTest
```

### Run Test
```shell
php artisan test
```

### Run Server*

```bash
php artisan serve
```
*Buka browser dan akses localhost `http://localhost:8000` (Untuk Laravel Server) atau `http://localhost/WargaPeduli/public` (Untuk Laragon Server)
