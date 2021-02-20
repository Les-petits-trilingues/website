#!/bin/sh
set -e

echo "Install composer deps"
composer install -qno --no-dev --working-dir=/var/www/html
chown -R www-data:www-data /var/www/html

exec /usr/local/bin/docker-entrypoint.sh "$@"