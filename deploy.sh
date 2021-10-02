#!/usr/bin/env bash

arg1=${1:-dev}

cp .env.example .env

if [ "$arg1" = "prod" ]; then
    rm -rf views/cache
    mkdir views/cache

    php composer.phar install --no-ansi --no-dev --no-interaction --no-progress --optimize-autoloader
else
    rm -rf coverage
    mkdir coverage
    
    php composer.phar install
    php ./vendor/bin/phpunit --colors=always --configuration build.xml --no-coverage
    php ./vendor/bin/phpunit --colors=always --configuration build.xml --coverage-html coverage
    open coverage/index.html
fi
