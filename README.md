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
* edit /var/www/app/Config/api.php

#### Notes ####
* Make sure bindfs & hostmanager are installed
* ```vagrant plugin install vagrant-bindfs```
* ```vagrant plugin install vagrant-hostmanager```
* Don't want to use vagrant? 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Apache users will need to point the vhost to the /public directory (htaccess is already provided in public)
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; nginx users will need to forward requests through index.php ( try_files $uri $uri/ /index.php$is_args$args; )
