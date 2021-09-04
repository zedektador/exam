FROM php:7.2-apache-stretch

RUN apt-get update && apt-get install -y zip git libfreetype6-dev libjpeg62-turbo-dev libpng-dev libmagickwand-dev

COPY . /var/www/html
COPY .docker/php/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN mkdir /root/.ssh/

RUN chown -R root /root/.ssh/

RUN chown -R www-data:www-data /var/www/html && a2enmod rewrite headers
RUN docker-php-ext-install pdo_mysql bcmath && chown -R www-data:www-data /var/www/html && \
    docker-php-ext-install -j$(nproc) gd && \
    docker-php-ext-install zip && \
    pecl install imagick-beta

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=1.10.6

RUN chown -R www-data:www-data /usr/local/bin/php

COPY .docker/php/php.ini /usr/local/etc/php/php.ini
RUN chmod u+x /usr/local/etc/php/php.ini

COPY .docker/php/start.sh /usr/local/bin/
RUN chmod u+x /usr/local/bin/start.sh

WORKDIR /var/www/html
RUN touch storage/logs/lumen.log
RUN chmod 777 storage/logs/lumen.log
RUN composer install --no-dev --optimize-autoloader

CMD ["/usr/local/bin/start.sh"]
