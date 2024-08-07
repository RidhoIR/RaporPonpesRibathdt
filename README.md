# Proyek RekapitulasiYudisium

## Description

Proyek Sistem Penilaian pada Siswa Pondok adalah sebuah aplikasi berbasis web yang digunakan untuk memasukkan nilai - nilai siswa.

tech stack : laravel + Bootstrap

-   dokumentasi laravel berada di [laravel](https://laravel.com/)
-   dokumentasi Bootstrap berada di [Bootstrap](https://getbootstrap.com/)

## Cara Menjalankan Program

1. Clone repositori proyek dari GitHub:

```bash
git clone <URL_REPOSITORI>
```

2. Masuk ke dalam folder project

3. install composer untuk laravel

```bash
composer install
```

4. install node module javascript

```bash
npm install
```

5. copy file .env.example dan paste

6. rename file yang dipaste menjadi .env

7. nyalakan database

jika belum mempunyai database

```bash
php artisan migrate
```

jika sudah mempunyai database

```bash
php artisan migrate:fresh --seed
```

Jika ingin seed database

```bash
php artisan db:seed
```

8. generate key laravel

```bash
php artisan key:generate
```

9. Jalankan Laravel

```bash
php artisan serve
```

10. jalankan run time

```bash
npm run dev
```

## pembagian branch

`{nama_kamu}_dev` misal nama saya safir maka branch yang akan saya push adalah safir_dev

`frontend` merge dari divisi frontend dan berisi tampilan yang sudah di query dari backend

`dev` berisi gabungan branch backend dan front end

`backend` merge dari divisi backend dan hanya berisi query dari controller

`main` branch yang sudah siap di deploy dan sudah di cock check tidak ada bug

## Pembagian Penugasan divisi

### Front end

-   ryan
-   arum
-   Ridho

### back end

-   ibrahim
-   safir
-   Ridho

## Proses Pengerjaan

1. buat branch untuk pengerjaan

```bash
git checkout -b safir_dev {jika kamu safir}
```

2. kerjakan fitur yang akan kamu kerjakan

3. setelah sudah kamu kerjakan

```bash
git add .
```

4. jangan lupa standart penamaan commit di paling bawah

```bash
git commit -m "{nama commit}"
```

5. push ke branch kalian

```bash
git push origin safir_dev {jika kamu safir}
```

6. setelah sudah selesai langsung chat saja ke grub

## standart penamaan commit :

jika menambahkan fitur

```bash
git commit -m "add {nama fitur}"
```

jika memperbaiki fitur atau ada bug

```bash
git commit -m "fix {nama fitur}"
```

jika melakukan pembaruan pada fitur yang sudah ada

```bash
git commit -m "update {nama fitur}"
```

jika menghapus fitur

```bash
git commit -m "remove {nama fitur}"
```

jika melakukan perbaikan pada struktur kode tanpa mengubah fungsionalitasnya

```bash
git commit -m "refactor {nama fitur}"
```

jika menambahkan atau memperbarui dokumentasi

```bash
git commit -m "docs: {deskripsi}"
```

jika menambahkan atau memperbarui pengujian

```bash
git commit -m "test: {deskripsi}"
```
