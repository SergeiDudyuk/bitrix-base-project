FROM phpdockerio/php71-fpm:latest

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    php7.1-memcached \
    php7.1-memcache \
    php7.1-mbstring \
    php7.1-mysql \
    php7.1-intl \
    php7.1-interbase \
    php7.1-soap \
    php7.1-gd \
    php7.1-imagick \
    php7.1-mcrypt \
    php7.1-opcache \
    php7.1-zip

ADD php.ini /etc/php/7.1/fpm/conf.d/90-php.ini
ADD php.ini /etc/php/7.1/cli/conf.d/90-php.ini

RUN usermod -u 1000 --shell /bin/bash www-data && groupmod -g 1000 www-data

RUN apt-get install -y msmtp msmtp-mta ca-certificates
ADD msmtprc /etc/msmtprc
RUN chmod 644 /etc/msmtprc

WORKDIR /var/www/
RUN chown -R www-data .

RUN apt-get install -y cron

USER www-data

RUN touch cronfile && \
    echo "*/1 * * * * php -f /var/www/project/local/cli/cron-events.php" > cronfile && \
    crontab cronfile && \
    rm cronfile

RUN ln -s project/sites/s1 bitrix && chown -h www-data bitrix

WORKDIR /var/www/project

USER root

CMD service cron start && /usr/bin/php-fpm

RUN apt-get -y --no-install-recommends install php7.1-xdebug
ADD dev.ini /etc/php/7.1/fpm/conf.d/91-dev.ini
ADD dev.ini /etc/php/7.1/cli/conf.d/91-dev.ini