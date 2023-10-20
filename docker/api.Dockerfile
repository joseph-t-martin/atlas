FROM php:8.2-fpm
WORKDIR /usr/src/api
COPY api /usr/src/api
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
