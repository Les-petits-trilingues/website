FROM wordpress:5.6-fpm-alpine

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY ./docker/wordpress/php/99-custom.ini /usr/local/etc/php/conf.d/99-custom.ini
RUN rm -r /usr/src/wordpress/wp-content/themes
COPY ./themes /var/www/html/wp-content/themes
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN rm -rf /var/www/html/wp-content/themes/vendor; \
    composer install -qno --no-dev --working-dir=/var/www/html/wp-content/themes
