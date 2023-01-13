FROM wordpress:php7.4

# update Ubuntu & install nodejs and npm into container
RUN apt update \
    && apt upgrade -y \
    && apt-get install nodejs npm -y

# install composer into container
RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/usr/bin

# install xdebug into container
RUN pecl install "xdebug-3.1.6" && docker-php-ext-enable xdebug

# install wp-cli
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp

# add php.ini files into image
ADD ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini
ADD ./docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# add php-8.1 fpm pool.d www.conf config file, to avoid clearing the environment (clear_env = no)
ADD ./docker/php/www.conf /etc/php/7.4/fpm/pool.d/www.conf
