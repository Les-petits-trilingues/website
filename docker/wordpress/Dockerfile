FROM wordpress:5.6-fpm-alpine

# [PHP]
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY ./docker/wordpress/php/99-custom.ini /usr/local/etc/php/conf.d/99-custom.ini

# [WordPress]
# We remove default content, otherwise it overwrite our own files and folders
RUN rm -r /usr/src/wordpress/wp-content

# [Theme]
COPY ./.env /var/www/html/.env
COPY ./wp-content/themes /var/www/html/wp-content/themes
# [Composer]
COPY ./composer.json /var/www/html/composer.json
COPY ./composer.lock /var/www/html/composer.lock
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN rm -rf /var/www/html/wp-content/themes/vendor; \
    composer install -qno --no-dev --working-dir=/var/www/html; \
    chown -R www-data:www-data /var/www/html