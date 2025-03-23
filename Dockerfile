FROM debian:latest

RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php php-mysql mariadb-server supervisor && \
    apt-get clean

RUN mkdir -p /var/run/mysqld && \
    chown -R mysql:mysql /var/run/mysqld

VOLUME /var/lib/mysql
VOLUME /var/log

ADD https://wordpress.org/latest.tar.gz /var/www/html/
RUN tar -xzf /var/www/html/latest.tar.gz -C /var/www/html/ --strip-components=1 && \
    rm /var/www/html/latest.tar.gz && \
    rm -f /var/www/html/index.html && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    echo "Fișiere WordPress:" && ls -la /var/www/html

COPY files/apache2/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY files/apache2/apache2.conf /etc/apache2/apache2.conf
COPY files/php/php.ini /etc/php/8.2/apache2/php.ini
COPY files/mariadb/50-server.cnf /etc/mysql/mariadb.conf.d/50-server.cnf
COPY files/supervisor/supervisord.conf /etc/supervisor/supervisord.conf

RUN a2enmod rewrite && service apache2 restart

EXPOSE 80

CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]

COPY files/wp-config.php /var/www/html/wordpress/wp-config.php