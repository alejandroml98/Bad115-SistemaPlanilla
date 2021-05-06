from oraclelinux:7

RUN sudo yum install -y oracle-php-release-el7

RUN sudo yum install -y php nano php-common php-bcmath openssl php-json php-mbstring php-pgsql php-tokenizer php-xml php-zip

RUN yum install php-oci8-19c

RUN yum -y install oracle-release-el7

RUN yum -y install oracle-instantclient19.5-basic

RUN curl -sS https://getcomposer.org/installer | php

RUN sudo mv composer.phar /usr/local/bin/composer
