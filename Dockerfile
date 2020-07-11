FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

# Composer install
COPY --from=composer /usr/bin/composer /usr/bin/composer
