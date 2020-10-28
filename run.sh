#!/bin/bash

if [ -z $SYSLOG_USERNAME ];then
    export SYSLOG_USERNAME=admin
fi
if [ -z $SYSLOG_PASSWORD ];then
    export SYSLOG_PASSWORD=changeme1234
fi

cd /var/www/html
php -f create-user.php
chown www-data:www-data config.auth.user.php
rm -f create-user.php

service rsyslog start && apache2ctl -D FOREGROUND