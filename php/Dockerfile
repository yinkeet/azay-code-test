FROM php:7.4-cli

# Install neccessary extensions
RUN apt-get update \
    && apt-get install -y libzip-dev zip \
    && docker-php-ext-install bcmath zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# PHP overides
COPY conf/php.overrides.ini /usr/local/etc/php/conf.d/php.overrides.ini

WORKDIR /app