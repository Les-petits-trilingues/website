FROM nginx:alpine

COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/nginx/conf.d /etc/nginx/conf.d
COPY ./docker/nginx/nginxconfig.io /etc/nginx/nginxconfig.io
COPY --from=wordpress:5.6-fpm-alpine /usr/src/wordpress /var/www/html