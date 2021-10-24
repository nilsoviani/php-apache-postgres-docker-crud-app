FROM php:7.4-apache

ENV DEBIAN_FRONTEND=noninteractive

RUN a2enmod rewrite

RUN apt-get update && \
    apt-get -y install \
        libpq-dev \
        libpng-dev \
        libcurl4-openssl-dev \
        postgresql-common \
        postgresql-client \
        && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-install \
        gd \
        pdo \
        curl \
        pdo_pgsql