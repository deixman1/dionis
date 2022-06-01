FROM php:8.1-fpm

RUN apt-get update && apt-get install -y git

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN cd /root/ \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && mv -v composer.phar /usr/local/bin/composer \
    && chmod 0755 /usr/local/bin/composer