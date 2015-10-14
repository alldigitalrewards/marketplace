# Marketplace Client Demonstration #

## Getting Started ##

### Installation Instructions ###

* vagrant up
* vagrant ssh
* sudo su -
* apt-get install npm nodejs-legacy
* npm install -g bower
* exit
* sudo su www-data
* cd ~
* composer install && bower install && mysql -u developer -pdeveloper developer < sql/sql.sql

#### Notes ####
* Make sure bindfs & hostmanager are installed
* ```vagrant plugin install vagrant-bindfs```
* ```vagrant plugin install vagrant-hostmanager```
