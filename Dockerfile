FROM php:8.2 as php

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libpng-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

RUN docker-php-ext-install pdo pdo_mysql bcmath

RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

WORKDIR /var/www
COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY --chown=www:www . /var/www
RUN chown -R www-data:www-data /var/www

RUN chmod +x Docker/entrypoint.sh

ENV PORT=8000
ENTRYPOINT [ "Docker/entrypoint.sh" ]
