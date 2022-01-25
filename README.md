# Techinical Test


## Soal 1 Web
1. pull repositor 
```
git pull https://github.com/Alwanly/articley-app.git
```
2. masuk direktori articel-app
3. copy env `cp .env.example .env`, lalu setup database dengan
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=db_article
DB_USERNAME=root
DB_PASSWORD=123123123
```
4. run `docker-compose up -d`
5. run `docker-compose exec app php artisan key:generate `
6. run `docker-compose exec app php artisan config:cache `
7. run `docker-compose exec app php artisan migrate:fresh --seed`
8. Website dapat diakses lewat browser dengan url `http://127.0.0.1:80`
9. Untuk reporter menulis artikel dapat login lewat dashboard dengan url `http://127.0.0.1:80/login`
10. Data user 
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
pass    : editor

```

## Soal 2
dapat diliat pada file `countLetter.txt`

## Soal 3
dapat dilit pada file `Soal3_query.sql`