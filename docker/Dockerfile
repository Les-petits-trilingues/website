FROM wordpress:5.5.3-fpm-alpine

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY ./docker/php/99-custom.ini /usr/local/etc/php/conf.d/99-custom.ini
RUN rm -r /var/www/html/wp-content/themes
COPY ./themes/lpt /var/www/html/wp-content/themes/lpt
