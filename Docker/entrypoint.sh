#!/bin/bash

# if [ ! -f "vendor/autoload.php" ]; then
#     composer install --no-progress --no-interaction
# fi

if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.example .env
else
    echo "env file exists."
fi

role=${CONTAINER_ROLE:-app}

if [ ! $JWT_SECRET ]; then
    php artisan jwt:secret
fi

if [ "$role" = "app" ]; then
    php artisan migrate
    php artisan key:generate
    php artisan optimize:clear
    php artisan db:seed
    php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
    exec docker-php-entrypoint "$@"
fi
