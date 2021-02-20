FROM wordpress:5.6-fpm-alpine

# [PHP]
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
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

COPY ./docker/wordpress/docker-entrypoint.sh /usr/local/bin/docker-entrypoint-custom
RUN chmod +x /usr/local/bin/docker-entrypoint-custom

ENTRYPOINT ["docker-entrypoint-custom"]
CMD ["php-fpm"]
