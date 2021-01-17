FROM wordpress:5.6-fpm-alpine

# [PHP]
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY ./docker/wordpress/php/99-custom.ini /usr/local/etc/php/conf.d/99-custom.ini

# [WordPress]
# We remove default useless themes, so WordPress does not scan them
RUN rm -r /usr/src/wordpress/wp-content/themes

# [Theme]
COPY ./themes /var/www/html/wp-content/themes

# [Composer]
COPY --from=composer /usr/bin/composer /usr/bin/composer
# If a vendor folder exists localy, it prevents composer from doing a clean job
RUN rm -rf /var/www/html/wp-content/themes/vendor; \
    composer install -qno --no-dev --working-dir=/var/www/html/wp-content/themes
