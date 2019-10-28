FROM php:fpm

RUN rm /etc/apt/preferences.d/no-debian-php

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    apt-utils \
    php7.3-mbstring \
    php7.3-mysql \
    php7.3-intl \
    php7.3-interbase \
    php7.3-soap \
    php7.3-gd \
    php7.3-imagick \
    php7.3-opcache \
    php7.3-zip

ADD php.ini /etc/php/7.3/fpm/conf.d/90-php.ini
ADD php.ini /etc/php/7.3/cli/conf.d/90-php.ini

RUN usermod -u 1000 --shell /bin/bash www-data && groupmod -g 1000 www-data

RUN apt-get install -y msmtp msmtp-mta ca-certificates

ADD msmtprc /etc/msmtprc
RUN chmod 644 /etc/msmtprc

RUN apt-get install -y cron && touch cronfile && \
    echo "*/1 * * * * www-data php -f /var/www/project/local/cli/cron-events.php" > cronfile && \
    crontab cronfile && \
    rm cronfile

WORKDIR /var/www/

RUN ln -s project/sites/s1 bitrix && chown -h www-data bitrix

WORKDIR /var/www/project

CMD service cron start && php-fpm