FROM jakzal/phpqa:alpine
COPY ./www /project/
COPY ./test /project/
WORKDIR /project
RUN parallel-lint index.php
RUN parallel-lint lib/database.php
RUN parallel-lint lib/functions.php
RUN phpunit DatabaseTest.php


FROM php:7.2.7-fpm
RUN docker-php-ext-install mysqli pdo_mysql
COPY ./www /var/www/html/