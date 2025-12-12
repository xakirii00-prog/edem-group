#!/bin/bash

# Запускаем миграции
php artisan migrate --force

# Запускаем сидеры
php artisan db:seed --force

# Запускаем сервер
php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
