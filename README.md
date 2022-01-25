# Techinical Test


## Soal 1 Web
1. pull repositor 
```
git pull https://github.com/Alwanly/articley-app.git
```
2. masuk direktori articel-app
3. run `docker-compose up -d`
4. run `docker-compose exec app php artisan config:cache `
5. run `docker-compose exec app php artisan migrate:fresh --seed`
6. Website dapat diakses lewat browser dengan url `http://127.0.0.1:80`
7. Untuk reporter menulis artikel dapat login lewat dashboard dengan url `http://127.0.0.1:80/login`
8. Data user 
```
Superadmin

email   : superadmin@mail.com
pass    : superadmin123

```
```
reporter 1

email   : reporter1@mail.com
pass    : reporter1

```
```
editor 1

email   : editor1@mail.com
pass    : editor1

```

## Soal 2
dapat diliat pada file `countLetter.txt`

## Soal 3
dapat dilit pada file `Soal3_query.sql`