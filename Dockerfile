FROM php:8.2-fpm

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www

ENV NGINX_CONFIG_PATH=/etc/nginx/conf.d/default.conf
