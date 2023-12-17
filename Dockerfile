FROM php:8.2

COPY --from=golang:1.21.3 /usr/local/go /usr/local/go
ENV PATH="/usr/local/go/bin:${PATH}"

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN apt-get update && apt-get install -y zip unzip

RUN pecl install xdebug-3.2.0 \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

ARG workdir=/sortings
WORKDIR ${workdir}
