FROM php:7.3-fpm-alpine

#COPY composer.lock composer.json /var/www/html/

WORKDIR /var/www/html

RUN docker-php-ext-install pdo_mysql 
RUN docker-php-ext-install sockets

RUN docker-php-ext-enable pdo_mysql sockets
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

COPY . .
RUN composer update
RUN composer install


EXPOSE 9000

CMD ["php-fpm"]