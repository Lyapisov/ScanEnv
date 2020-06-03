FROM php:7.4-cli-alpine

RUN apk update && apk add autoconf g++ make bash postgresql-dev git \
    && pecl install xdebug redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable xdebug redis

RUN docker-php-ext-install pdo_pgsql pgsql

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

RUN apk add unzip

RUN adduser -D -u 1000 appuser

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet \
    && composer global require hirak/prestissimo --no-plugins --no-scripts \
    && rm -rf /root/.composer/cache

WORKDIR /app

USER appuser

