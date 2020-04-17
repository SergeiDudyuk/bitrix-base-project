FROM php:fpm

RUN apt-get update && apt-get -y --no-install-recommends install \
    apt-utils \
    firebird-dev \
    libicu-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libmagickwand-dev \
    bzip2-doc \
    libexif-doc \
    freetype2-doc \
    libtool \
    ghostscript \
    gsfonts \
    libjxr-tools \
    libpng-tools \
    libcupsfilters1 \
    dbus \
    fonts-droid-fallback \
    javascript-common \
    libpaper-utils \
    fonts-noto-mono \
    libzip-dev \
    libmcrypt-dev


RUN pecl install imagick \
    mcrypt \
    xdebug

RUN docker-php-ext-install -j$(nproc) \
    intl \
    soap \
    gd \
    opcache \
    zip

RUN docker-php-ext-enable \
    imagick \
    mcrypt \
    xdebug

ADD php.ini /usr/local/etc/php/php.ini

RUN usermod -u 1000 --shell /bin/bash www-data && groupmod -g 1000 www-data

RUN apt-get update && apt-get -y install \
    msmtp \
    msmtp-mta \
    ca-certificates \
    cron

ADD msmtprc /etc/msmtprc
RUN chmod 644 /etc/msmtprc

RUN apt-get install -y cron && touch cronfile && \
    echo "*/1 * * * * www-data php -f /var/www/project/local/cli/cron-events.php" > cronfile && \
    crontab cronfile && \
    rm cronfile

WORKDIR /var/www/

RUN ln -s project/sites/s1 bitrix && chown -h www-data bitrix

WORKDIR /var/www/project

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

CMD service cron start && php-fpm
