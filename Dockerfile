from oraclelinux:7

RUN yum install -y oracle-php-release-el7

RUN yum install -y php nano php-common php-bcmath php-json php-mbstring php-pgsql php-tokenizer php-xml php-zip

RUN yum -y install php-oci8-19c

RUN yum -y install oracle-release-el7

RUN yum -y install oracle-instantclient19.5-basic

RUN curl -sS https://getcomposer.org/installer | php

RUN mv composer.phar /usr/local/bin/composer

RUN mkdir /home/SistemaPlanilla

WORKDIR /home/SistemaPlanilla/

ENTRYPOINT ["tail"]

CMD ["-f","/dev/null"]


