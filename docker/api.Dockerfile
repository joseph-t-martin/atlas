FROM php:8.2-fpm
RUN apt-get update && apt-get install -y git zip unzip

WORKDIR /usr/src/api
COPY api /usr/src/api

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

RUN composer install
RUN php artisan key:generate
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
