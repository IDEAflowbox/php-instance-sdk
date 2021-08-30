ARG  CI_REGISTRY_IMAGE
FROM $CI_REGISTRY_IMAGE:base

ENV TZ Europe/Warsaw

ENV GLOBAL_COMPOSER_HOME /root/.composer
ENV PATH $PATH:/root/.composer/vendor/bin
ENV COMPOSER_ALLOW_SUPERUSER 1

ADD ./docker-files/crontabs /etc/crontabs/
RUN chmod 755 /etc/crontabs/www-data

WORKDIR /var/www

ADD ./ /var/www

ARG XDEBUG_ENABLED
RUN if [[ "$XDEBUG_ENABLED" = "1" ]] ; then pecl install xdebug \
  && docker-php-ext-enable xdebug \
  && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo "xdebug.client_host = host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo "xdebug.client_port = 9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; fi

RUN composer -n --no-ansi install && \
    chown -R www-data:www-data var/ && \
    yarn install && \
    yarn encore production
