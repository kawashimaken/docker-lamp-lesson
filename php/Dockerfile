FROM php:7.0-apache
COPY php.ini /usr/local/etc/php/
# COPY composer.json /var/www/html

RUN apt-get update \
  && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libmcrypt-dev git\
  && docker-php-ext-install pdo_mysql mysqli mbstring gd iconv mcrypt

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
# RUN composer install
