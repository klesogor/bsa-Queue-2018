# set up php and apache
FROM php:7.2-apache
COPY . /var/www/html

#required instalations
RUN apt-get update && apt-get install -y \
        cron \
        git \
        curl \
        zip \
        gnupg2 \
        unzip 

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

RUN composer install --no-scripts

#basic extensions for laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring mysqli

#give rwx permission to project files



RUN chmod 744 -R .



RUN cp .env.example .env
RUN php artisan key:generate
