FROM php:8.0.3-cli

RUN echo "Europe/Zagreb" > /etc/timezone; dpkg-reconfigure tzdata

# Install/configure PHP extensions
COPY docker/php/extensions.sh /usr/local/bin/
RUN /usr/local/bin/extensions.sh

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions intl zip xdebug^3

# Use the default development PHP configuration
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

COPY --from=composer:2.0.12 /usr/bin/composer /usr/bin/composer

WORKDIR /app

CMD ["composer", "run", "--timeout=0", "serve"]
