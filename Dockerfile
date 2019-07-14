FROM php:7.3-apache
MAINTAINER ryan@webgrip.nl
RUN a2enmod rewrite
WORKDIR /var/www/html
COPY . /var/www/html
ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf
EXPOSE 80
CMD /usr/sbin/apache2ctl -D FOREGROUND
