FROM php:8.3-cli

WORKDIR /app

COPY . .

RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev \
    libpng-dev libjpeg-dev libfreetype6-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install zip gd

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-10000}