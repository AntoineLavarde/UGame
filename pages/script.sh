#!/bin/bash

while true; do
    php $(find /var/www/html -name "update.php");
    sleep 5;
done
