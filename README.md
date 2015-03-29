PROJ MHB-VS
===========

built on Symfony 2.6.*

1. install dependencies (libxrender1, git, php5-cli, php5-curl, pdo-mysql, ...)
2. install Composer
3. clone mdPlusPlus/mhb-vs.git (gir clone https://github.com/mdPlusPlus/mhb-vs)
4. cd mhb-vs && composer install


Deployment
==========

- Umleitung von 80 auf 8000 (apache sites-available)
- parameters.yml
- assets:install
- SQL-DB, ggf. Rollen und Semester anlegen (DefaultController)

Voraussetzungen
----------------

- PHP (>5.5 ?)
- MySQL
- Composer


Development
===========

- PhpStorm
- parameters.yml

MySQL
-----
- MySQL-Sever verfügbar machen
in `/etc/mysql/my.cnf`
`bind-address = 0.0.0.0`
oder `bind-address = IP_DES_SERVERS`
ggf. `#skip-networking` (auskommentieren)
- MySQL-User anlegen
`mysql -u root -p
create database if not exists symfony;
create user 'mysqluser'@'%' identified by 'mysqlpass';
grant all privileges on symfony.* to 'mysqluser'@'%';
flush privileges;
quit
sudo service mysql restart
`
