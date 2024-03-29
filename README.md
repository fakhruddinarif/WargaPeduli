# WargaPeduli

## Deskripsi

WargaPeduli adalah sebuah sistem `e-gevorment` yang berfokus pada tingkat rukun warga dan dibawahnya.Pada sistem ini nantinya meliputi manajemen pendataan penduduk,manajemen bantuan sosial, manajemen pengaduan atau saran, dan informasi tentang kegiatan pada tingkat rukun warga dan dibawahnya.Sistem ini telah melalui wawancara dari bapak ketua warga dengan nama `Bapak Sukron` yang tinggal di `Jalan Kalpataru RT.04 RW.03 Kec.Jatimulyo Kec.Lowokwaru Kota Malang`.

## Tech Stack & Framework

- Laravel 10 : https://laravel.com/docs/10.x
- MySQL (Database) : https://www.mysql.com/
- Laragon : https://laragon.org/
- TailwindCSS : https://tailwindcss.com/

## Library & Driver

- DOMPDF : https://github.com/barryvdh/laravel-dompdf
- MailGun : https://github.com/symfony/mailgun-mailer

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

### Run Seeder

```shell
php artisan db:seed --class=namaSeeder
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

### Run Server

```bash
php artisan serve
```
