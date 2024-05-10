#!/bin/sh

# update app cache
php artisan optimize

#start the app

php-fpm -D && nginx -g "daemon off;"

