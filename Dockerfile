FROM php:5.6-apache

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
  php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
  php composer-setup.php && \
  php -r "unlink('composer-setup.php');"
RUN apt-get update && apt-get install git zip -y
RUN mv composer.phar /usr/local/bin/composer && \
  composer create-project unicalabs/agrippa /var/www/html/agrippa

RUN docker-php-ext-install pdo mbstring tokenizer
COPY apache-agrippa.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html/agrippa

RUN touch storage/database.sqlite
RUN composer update
RUN php artisan migrate
RUN chown -R www-data:www-data storage bootstrap/cache