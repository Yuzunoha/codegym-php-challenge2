FROM php:8-apache

# 設定ファイルをdockerコンテナ内のPHP、Apacheに読み込ませる
ADD php.ini /usr/local/etc/php/

# パッケージをインストールする
RUN apt-get update && apt-get install -y libonig-dev && docker-php-ext-install pdo_mysql mysqli

# 作業ディレクトリを指定する
WORKDIR /var/www/html

# htmlディレクトリの読み書き権限を設定する
RUN chmod -R 777 /var/www/html
