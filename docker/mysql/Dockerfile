FROM mysql:5.7
# maybe we should try mysql v8 ?

ADD my.cnf /etc/mysql/conf.d/my.cnf

RUN usermod -u 1000 mysql && groupmod -g 1000 mysql

USER mysql

WORKDIR /var/www/project

CMD mysqld