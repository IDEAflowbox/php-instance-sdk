FROM git-ck.idea-commerce.com:5050/cyberkonsultant/webpanel:base

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

RUN composer config gitlab-domains git-ck.idea-commerce.com 

RUN composer config \
  --auth gitlab-token.git-ck.idea-commerce.com "8wySy6kfPb_Hs6yLst-r" \
  --no-ansi \
  --no-interaction

RUN composer -n --no-scripts --no-ansi install && \
    yarn install && \
    yarn encore production && \
    yarn build && \
    yarn build-serverside
