FROM php:8.2-fpm


RUN apt-get update && apt-get install -y \
    libonig-dev \
    && docker-php-ext-install mbstring


WORKDIR /var/www/html


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
