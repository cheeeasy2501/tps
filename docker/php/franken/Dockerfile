FROM dunglas/frankenphp

WORKDIR /var/www/html

#RUN install-php-extensions pcntl gd xdebug opcache redis swoole zip
RUN install-php-extensions pcntl opcache redis swoole zip

RUN install-php-extensions opcache pdo pdo_pgsql pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ARG COMPOSER_ALLOW_SUPERUSER=1

COPY .. /var/www/html

#RUN pecl install redis

RUN composer install && composer dumpautoload -o

ENTRYPOINT ["php", "artisan", "octane:frankenphp"]
#ENTRYPOINT ["php", "artisan", "octane:start"]