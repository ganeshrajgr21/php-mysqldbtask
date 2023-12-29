#!/bin/bash

#updating the os:
apt-get update

#installing apache2:
apt-get install -y apache2

#installing php:
apt-get install php -y

#installing mysqlclient:
apt install mysql-client-core-8.0 -y 
