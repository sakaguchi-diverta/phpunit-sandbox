FROM php:7.4-cli

WORKDIR /tmp
RUN echo "[Install packages]" && \
    apt-get update && \
    apt-get install -y vim && \
    \
    echo "[Install uopz extension]" && \
    pecl install uopz && \
    docker-php-ext-enable uopz && \
    \
    echo "[Install runkit7 extension]" && \
    pecl install runkit7-4.0.0a2 && \
    docker-php-ext-enable runkit7 && \
    \
    echo "[Install composer]" && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    chmod +x composer-setup.php && \
    php -f composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html
