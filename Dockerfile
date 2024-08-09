FROM php:8.2-fpm-alpine

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN apk update \
    upgrade;

RUN install-php-extensions pdo_pgsql
RUN install-php-extensions redis
RUN install-php-extensions memcached
RUN install-php-extensions mongodb
RUN install-php-extensions sockets
