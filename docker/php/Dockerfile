FROM php:8.1-fpm

COPY php.ini /usr/local/etc/php/
COPY php.ini /usr/local/etc/php/conf.d/php.ini

RUN apt-get update && apt-get install -y \
      nano \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      npm \
      git && \
      docker-php-ext-install pdo_mysql && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD ["php-fpm"]