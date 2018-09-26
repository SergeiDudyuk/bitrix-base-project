FROM nginx:1.15.3

ADD conf/nginx.conf /etc/nginx/
ADD conf/default.conf /etc/nginx/conf.d/
ADD conf/upstream.conf /etc/nginx/conf.d/

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

WORKDIR /var/www/
RUN ln -s project/sites/s1 bitrix && chown -h www-data bitrix

WORKDIR /var/www/project

CMD nginx