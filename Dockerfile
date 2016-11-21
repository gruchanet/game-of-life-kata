FROM php:7.1.0RC6-cli

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

RUN apt-get update \
    && apt-get install -yqq zip \
    && rm -rf /var/lib/apt/lists/* \
    && apt-get clean -yqq