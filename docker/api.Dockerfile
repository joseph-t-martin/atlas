FROM php:8.2-fpm
WORKDIR /usr/src/api
COPY .. /usr/src/api
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
