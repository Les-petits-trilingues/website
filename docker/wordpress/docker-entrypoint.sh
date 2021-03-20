#!/bin/sh
set -e

echo "Reset OPCache"
php -r "opcache_reset();"

echo "Install composer deps"
composer install -qnoa --no-dev
chown -R www-data:www-data /var/www/html

exec /usr/local/bin/docker-entrypoint.sh "$@"