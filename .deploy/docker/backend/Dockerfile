FROM php:7.4-fpm

WORKDIR /app

RUN apt-get update && apt-get install -y

COPY .deploy/docker/backend/entrypoint.sh /entrypoint-component.sh


USER root


CMD ["php-fpm", "-O", "-F" ]
