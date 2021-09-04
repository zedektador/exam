#!/bin/sh

set -e

role=${CONTAINER_ROLE:-app}

if [ "$role" = "app" ]; then
    exec apache2-foreground
elif [ "$role" = "queue" ]; then
	php /var/www/html/artisan migrate
	echo "Running the queue..."
        php /var/www/html/artisan queue:work --verbose --tries=3 --timeout=3600 --daemon --queue=default,process_export
elif [ "$role" = "scheduler" ]; then
    php /var/www/html/artisan migrate
    while [ true ]
    do
      php /var/www/html/artisan schedule:run --verbose --no-interaction &
      sleep 60
    done
else
    echo "Could not match the container role \"$role\""
    exit 1
fi

exec $@