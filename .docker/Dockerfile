FROM docker.pentagrama.net.br/docker/php/7.2/nginx:1.0.0

COPY .docker/default.conf.template /etc/nginx/conf.d/default.conf.template
COPY .docker/entry.sh /opt/entry.sh

COPY . /var/www/html

RUN composer install


RUN cat /var/www/html/.docker/supervisor-horizon.conf >> /etc/supervisor/conf.d/supervisord.conf
