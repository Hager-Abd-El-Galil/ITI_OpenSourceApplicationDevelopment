FROM ubuntu:latest
LABEL maintainer="Your Name hager.galil66@gmail.com"
ENV TZ=Africa/Cairo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN apt update
RUN apt install unzip apache2 curl software-properties-common -y
RUN add-apt-repository ppa:ondrej/php
RUN apt update -y
RUN apt install php7.4 php7.4-json -y
COPY index.php /var/www/html
CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]
