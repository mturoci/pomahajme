FROM php:7.3

COPY . /app

WORKDIR /app

USER root

RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql
RUN apt-get update && apt-get install -y git zip unzip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "8000", "--env", "dev"]
