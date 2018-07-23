# set up php and apache
FROM php:7.2-apache
COPY . /var/www/html

#install composer
RUN apt-get update && apt-get install -y curl git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#basic extensions for laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring mysqli

#install project dependensies
RUN composer install

#give rwx permission to project files

RUN chmod 744 -R .

RUN cp .env.example .env
RUN php artisan key:generate