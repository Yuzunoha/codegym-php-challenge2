#! /usr/bin/sh

ip=`ec2-metadata -v | sed -e 's/public-ipv4: //g'`
echo "WEBサーバを起動しました
アプリケーションURL：http://"${ip}":20380/
phpMyAdminURL：http://"${ip}":20381/"

cat .env
