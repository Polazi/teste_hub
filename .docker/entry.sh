#!/bin/bash

chmod -R 777 /var/www/html/storage/logs \
	     /var/www/html/storage/framework/sessions \
	     /var/www/html/storage/framework/views

rm -rf /var/log/nginx/*

ln -s /dev/stderr /var/log/nginx/error.log
ln -s /dev/stdout /var/log/nginx/access.log
