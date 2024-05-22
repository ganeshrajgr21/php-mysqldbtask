FROM php:8.1-apache
WORKDIR /var/www/html
COPY . .
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Install PHP dependencies via Composer
RUN a2enmod rewrite
EXPOSE 80
CMD ["apache2-foreground"]
