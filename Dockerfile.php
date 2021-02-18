FROM php:7.2.34-fpm-stretch AS userdb-php 

RUN apt-get update && apt-get install -y git zip unzip libpq-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev 

RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-install pdo pdo_mysql gd zip


RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" && \
    echo "max_input_vars = 3000" >> /usr/local/etc/php/conf.d/uploads.ini && \
    echo "log_errors = On" >> /usr/local/etc/php/conf.d/log.ini && \
    echo "error_log = /dev/stderr" >> /usr/local/etc/php/conf.d/log.ini && \
    echo "zend.multibyte = On" >> /usr/local/etc/php/conf.d/mb.ini && \
    echo "date.timezone = Europe/Prague" > /usr/local/etc/php/conf.d/timezone.ini

RUN echo "<?php header('Location: /userdb/'); " > /var/www/html/index.php #"

RUN mkdir -p /opt/userdb/vendor

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

WORKDIR /opt/userdb

COPY composer.json /opt/userdb/
COPY composer.lock /opt/userdb/

RUN composer install


FROM userdb-php

RUN mkdir -p /opt/userdb/app/config
RUN echo "" > /opt/userdb/app/config/config.local.neon

# copy application (bind volume to the path during development in order to override the baked-in app version)
COPY src/ /opt/userdb

# make some dirs writable by apache httpd
RUN chmod 777 -R /opt/userdb/log && \
    chmod 777 -R /opt/userdb/temp && \
    chmod 777 -R /opt/userdb/vendor/mpdf/mpdf/tmp

