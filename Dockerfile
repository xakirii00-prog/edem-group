FROM php:8.4-cli

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libsqlite3-dev

# Установка расширений PHP
RUN docker-php-ext-install pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Рабочая директория
WORKDIR /app

# Копируем файлы
COPY . .

# Устанавливаем зависимости
RUN composer install --no-dev --optimize-autoloader

# Права на storage
RUN chmod -R 775 storage bootstrap/cache

# Создаём SQLite базу
RUN touch database/database.sqlite

# Генерируем ключ если нет
RUN php artisan key:generate --force || true

# Порт
EXPOSE 10000

# Копируем скрипт запуска
COPY start.sh /app/start.sh
RUN chmod +x /app/start.sh

# Запуск
CMD ["/bin/bash", "/app/start.sh"]
