PROJ MHB-VS
===========

built on Symfony 2.5.*

0. install PHP interpreter
1. install SQL server
2. install Composer
3. git clone https://github.com/mdPlusPlus/mhb-vs.git symfony


TODO
====
- .gitignore muss vermutlich noch angepasst werden wegen /web/bundles/
(unter windows lokale kopie, soll auf server nur symlink sein, eventuell auf server löschen und update assets machen)
(außerdem vllt parameters.yml drauf setzen)
- MySQL-Konfiguration auf Produktiv-VM anpassen (bzw Anleitung schreiben für Deployment)
- .htacces relativieren?


Deployment
==========

- (?) Umleitung von 80 auf 8000 (apache sites-available ?)
- (?) composer update macht .git history kaputt

Voraussetzungen
----------------
- PHP (>5.5 ?)
- MySQL
- (?) Composer

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


Development
===========

- PhpStorm
- parameters.yml
