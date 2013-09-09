Draggy demo
===========

Draggy is a code development tool and template engine that enables the user to create and maintain a functional
Skeleton of an application.

If you don't want a demo, you can either get the Draggy package from [here](https://github.com/j-d/draggy) or
download the [Symfony Standard Edition + Draggy bundle](https://github.com/j-d/symfony-standard-draggy).

The demo is a basic Health System, which features classes, class inheritance, one-to-one, one-to-many and many-to-many
relationships, and it was inspired by the sample found on the book
[Systems Analysis and Design with UML](http://eu.wiley.com/WileyCDA/WileyTitle/productCd-0470074787.html) by
[Wiley](http://www.wiley.com).

Installation (if you know what you are doing)
---------------------------------------------

Install composer (You can find how to install Composer here: [Composer](http://getcomposer.org/doc/00-intro.md))
   
``` 
cd
curl -s https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```
```
sudo composer create-project jd/draggy-demo /path/to/webroot/ master
```

Installation (for dummies)
--------------------------
Make sure you have all the necessary dependencies installed:

```
sudo apt-get install git apache2 php5 php5-sqlite php-apc php5-intl mysql-server php5-mysql phpmyadmin php-apc php5-intl curl acl
```

Install composer (You can find how to install Composer here: [Composer](http://getcomposer.org/doc/00-intro.md))
   
``` 
cd
curl -s https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```
```
sudo composer create-project jd/draggy-demo /var/www/draggy-demo/ master
```

If it is the first Symfony project you install on the machine, is going to take a few minutes.
It will eventually ask you to configure the parameters. Just accept the default values, but make sure that 
the MySQL password `database_password` is correct.

Next you have to give www-data some permissions on some folders for Symfony to work and for the model to be saved:
```
cd /var/www/draggy-demo/
sudo setfacl -R  -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs doc doc/history
sudo setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs doc doc/history
```

Next, create the database and populate the demo data for the project:

```
php app/console doctrine:database:create
php app/console doctrine:schema:update --force
php app/console doctrine:fixtures:load --no-interaction
```

Create the virtual host on Apache called `draggy-demo.local`

```
echo date.timezone = Europe/London | sudo tee -a /etc/php5/cli/php.ini
echo date.timezone = Europe/London | sudo tee -a /etc/php5/apache2/php.ini
echo short_open_tag = Off | sudo tee -a /etc/php5/cli/php.ini
echo short_open_tag = Off | sudo tee -a /etc/php5/apache2/php.ini

echo 127.0.0.1 draggy-demo.local | sudo tee -a /etc/hosts

sudo tee /etc/apache2/sites-available/draggy-demo << EOF
<VirtualHost *:80>
	DocumentRoot "/var/www/draggy-demo/web"
	DirectoryIndex app.php
	ServerName draggy-demo.local
	<Directory "/var/www/draggy-demo/web">
		AllowOverride All
		Allow from All
	</Directory>
</VirtualHost>
EOF

sudo a2ensite draggy-demo
sudo service apache2 reload

sudo a2enmod rewrite
sudo service apache2 reload
```

That's it! To see the model, just browse to the path you created http://draggy-demo.local/app_dev.php/_draggy and
to see the demo in action, just browse to http://draggy-demo.local/app_dev.php/doctor

Happy Draggy-ing!
