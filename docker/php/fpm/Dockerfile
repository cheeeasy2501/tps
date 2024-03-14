FROM php:8.3.3-fpm

RUN apt update && apt upgrade && apt-get install -y libzip-dev


COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions gd xdebug redis opcache zip intl

RUN install-php-extensions pdo pdo_pgsql pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ARG COMPOSER_ALLOW_SUPERUSER=1

COPY .. /var/www/html

RUN composer install && composer dumpautoload -o

CMD ["php-fpm", "-F", "-R"]