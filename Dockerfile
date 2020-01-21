FROM php:7
RUN apt-get update -y && apt-get install -y openssl zip unzip git
WORKDIR /app
COPY . /app
RUN composer install
CMD php artisan serve --port=3000
EXPOSE 3000

