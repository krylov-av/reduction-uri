#########################
How to use this project
#1. download this pakage
#2. Load dependences
composer install
#3. make frontend (in project used bootstrap)
npm install
npm run dev
#4. Create .env from .env.example
cp .env.example .env
Pay attention to database config

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=secret

#5. Apply migrations
php artisan migrate:fresh --seed

#6. make script up (with wachd or supervisor)
run in foreground
php artisan queue:work --queue default
run in background
php artisan queue:work --queue default &

show run jobs
jobs

switch to job 2 in foregoround
fg %2

stop job = Ctrl + C
=========================
run job with logs
php artisan queue:work --queue=default > storage/logs/jobs.log &

Also, we can run workers at night and calculate statistic at night,
when our users are out of work.

################################################################################
##   Many Thanks to Stanislav Protasevich for helping to create this project  ##
################################################################################








Other info.
==================================

#Make cv like
https://si-dev.com/

#How to create brand new project.
First of all remove directories.
.git
.idea

1. Clean all images in Docker
docker images
...
docker rmi {IMAGE ID}

2. Install Laravel
docker run --rm --interactive --tty --volume "%cd%":/app composer create-project --prefer-dist laravel/laravel project

3. move everything from folder project to root folder
4. remove filder project

5. install frontend
npm install
npm run dev

6. edit .env-file and pay attention to database
...
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=secret

7.run containers
docker-compose up -d

if something went wrong you can revise logs
docker logs <container-id>
Link
===================
Project description
Tables: Users, Links Statistic

php artisan make:model Link -m
php artisan make:model Statistic -m
php artisan make:factory LinkFactory
php artisan make:factory StatisticFactory
php artisan make:seeder UserSeeder
php artisan make:seeder LinkSeeder
php artisan make:seeder StatisticSeeder

php artisan migrate:fresh

Seed separated tables
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=LinkSeeder


Seed base in tinker
$users = User::factory()->count(10)->create();
$links = Link::factory()->count(10)->create();
$statistics = Statistic::factory()->count(10)->make();

Make 1 record
$link = new App\Models\Link;
$link->link = 'qweqweqwe';
$link->shortlink = 'qwe';
$link->save();
==========================
#install bootstrap
composer require laravel/ui
php artisan ui bootstrap

apt-get install npm
npm install && npm run dev

add jquery
npm install jquery
================================
upgrade to uuid
$statistic = \App\Models\Statistic::factory()->count(3)->make();
foreach ($statistics as $statistic){print $statistic->id." ".$statistic->ip."\r\n";}
