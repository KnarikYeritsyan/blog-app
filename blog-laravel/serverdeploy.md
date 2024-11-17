# Deploy Server laravel project

## making up server environment

### xampp
- **[install xampp on ubuntu server](https://www.9lessons.info/2015/12/amazon-ec2-setup-with-ubuntu-and-xampp.html)**

```
sudo apt-get update
wget https://www.apachefriends.org/xampp-files/7.3.15/xampp-linux-x64-7.3.15-0-installer.run
wget https://www.apachefriends.org/xampp-files/7.4.7/xampp-linux-x64-7.4.7-0-installer.run
sudo chmod +x xampp-linux-x64-7.3.15-0-installer.run
sudo chmod +x xampp-linux-x64-7.4.7-0-installer.run
sudo ./xampp-linux-x64-7.3.15-0-installer.run
sudo ./xampp-linux-x64-7.4.7-0-installer.run
sudo /opt/lampp/lampp restart
```
**Configure httpd**
```
vi /opt/lampp/etc/extra/httpd-xampp.conf
```
change to
````
# since XAMPP 1.4.3
<Directory "/opt/lampp/phpmyadmin">
AllowOverride AuthConfig Limit
Order allow,deny
Allow from all
Require all granted
ErrorDocument 403 /error/XAMPP_FORBIDDEN.html.var
</Directory>
````
**Security Settings**
```
sudo /opt/lampp/xampp security
```
#### install composer
- **[install composer on ubuntu server](https://www.ionos.com/community/hosting/php/install-and-use-php-composer-on-ubuntu-1604/)**
```
apt install composer

sudo apt-get update
sudo apt-get install curl
sudo curl -s https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```
#### setup laravel project
``cd /opt/lampp/htdocs``, clone repository with git, add ``.htaccess`` file and paste this
```
vi /opt/lampp/htdocs/.htaccess
```
```
RewriteEngine On
RewriteCond %{REQUEST_URI} !^/market/public/
RewriteRule (.*) /market/public/$1
```
.htaccess with port
```
RewriteEngine on
RewriteCond  %{SERVER_PORT} ^80$
RewriteCond %{REQUEST_URI} !^/blog_vuejs/dist/
RewriteRule (.*) /blog_vuejs/dist/$1

RewriteCond  %{SERVER_PORT} ^8080$
RewriteCond %{REQUEST_URI} !^/blog/public/
RewriteRule (.*) /blog/public/$1
```
add ``.env`` file to project (look at the .env1 file)
```
vi /opt/lampp/htdocs/blog/.env
```
**instal composer dependencies**
```
composer install --ignore-platform-reqs
```
clear configs
```
/opt/lampp/bin/php artisan config:cache
/opt/lampp/bin/php artisan cache:clear
/opt/lampp/bin/php artisan config:clear
```
change permissions
```
sudo chown -R ubuntu:www-data storage
sudo chown -R ubuntu:www-data public
sudo chmod -R 777 storage
sudo chmod -R 777 /opt/lampp/htdocs/blog/storage/logs
sudo chmod -R 777 /opt/lampp/htdocs/blog/storage/framework/sessions
sudo chmod -R 777 /opt/lampp/htdocs/blog/public
sudo chmod -R 777 /opt/lampp/htdocs/blog/public/assets/
sudo chmod -R 777 bootstrap/cache
```
migrate the project
```
/opt/lampp/bin/php artisan migrate
```
run db seeder
```
/opt/lampp/bin/php artisan db:seed
```
seed image folders
```
cd public/assets/img
mkdir categories
mkdir categories/img
mkdir categories/img_resize
mkdir products
mkdir products/img
mkdir products/img_resize
mkdir sliders
mkdir sliders/img
mkdir sliders/img_resize
sudo chmod -R 777 /opt/lampp/htdocs/blog/public/assets/img/categories/
sudo chmod -R 777 /opt/lampp/htdocs/blog/public/assets/img/products/
sudo chmod -R 777 /opt/lampp/htdocs/blog/public/assets/img/sliders/
```

copy from server
```
scp -r -i C:\Users\HP\Downloads\site.pem ubuntu@18.158.228.22:/opt/lampp/htdocs/blog/public/assets/img/sliders/img C:\Users\HP\Downloads\server
```
copy to server
```
scp -r -i C:\Users\HP\Downloads\site.pem C:\xampp\htdocs\blog\public\assets\img\products\img\ ubuntu@18.158.228.22:/opt/lampp/htdocs/blog/public/assets/img/products
scp -r -i C:\Users\HP\Downloads\site.pem C:\xampp\htdocs\blog\public\assets\img\products\img_resize\ ubuntu@18.158.228.22:/opt/lampp/htdocs/blog/public/assets/img/products
```

### to open server port go to following files

```
vi /opt/lampp/etc/original/httpd.conf
vi /opt/lampp/etc/httpd.conf 
```
add this line
```
Listen 8080
```