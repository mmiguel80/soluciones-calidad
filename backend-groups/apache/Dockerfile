FROM httpd:2.4.33-alpine
COPY apache/vhost.conf /usr/local/apache2/conf/vhost.conf
RUN echo "Include /usr/local/apache2/conf/vhost.conf" \
    >> /usr/local/apache2/conf/httpd.conf

COPY ./www /var/www/html/
