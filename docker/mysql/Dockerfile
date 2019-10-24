FROM mysql:8.0.15

ADD my.cnf /etc/mysql/conf.d/my.cnf

RUN usermod -u 1000 mysql && groupmod -g 1000 mysql

USER mysql

WORKDIR /var/www/project

CMD ["mysqld"]
