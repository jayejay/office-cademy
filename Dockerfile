FROM php:7.4.33-fpm-alpine

RUN docker-php-ext-install pdo_mysql
RUN apk add --update sudo

RUN adduser -D appuser \
        && echo "appuser ALL=(ALL) NOPASSWD: ALL" > /etc/sudoers.d/appuser \
        && chmod 0440 /etc/sudoers.d/appuser

USER appuser

RUN sudo apk update
RUN sudo apk add bash
RUN sudo apk add curl
# RUN php composer.phar install
# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN sudo composer install