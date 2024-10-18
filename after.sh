#!/bin/bash

# Copy SSL Certificates
sudo cp -r /etc/ssl/certs/ca.homestead.hyper.crt /home/vagrant/hyper/.dev/ssl

# Set PHP version
sudo update-alternatives --set php /usr/bin/php8.3
sudo update-alternatives --set phar /usr/bin/phar8.3
sudo update-alternatives --set phar.phar /usr/bin/phar.phar8.3
sudo phpenmod xdebug


sudo add-apt-repository ppa:redislabs/redis -y

sudo apt update
sudo apt upgrade -y

sudo apt install cron -y
sudo apt install php-gmp
sudo apt install php-bcmath
sudo apt install php-igbinary
sudo apt install libc-ares-dev libcurl4-openssl-dev

sudo pecl install yaml
sudo apt-get install php-yaml

# NGINX
sudo apt install nginx-extras -y
sudo add-apt-repository ppa:ondrej/nginx -y

if [ -f ".dev/nginx/court-api.loc" ]; then
  sudo cp -r /home/vagrant/court/api/.dev/nginx/court-api.loc /etc/nginx/sites-available/
fi

# watcher install
php bin/hyperf.php vendor:publish hyperf/watcher

wget https://github.com/emcrisostomo/fswatch/releases/download/1.17.1/fswatch-1.17.1.tar.gz \
&& tar -xf fswatch-1.17.1.tar.gz \
&& cd fswatch-1.17.1/ \
&& ./configure \
&& make \
&& make install

sudo rm -rf fswatch-1.17.1.tar.gz

# SUPERVISOR
pip install --upgrade supervisor
pip install superlance

sudo cp -r /home/vagrant/hyper/.dev/supervisor/swoole.conf /etc/supervisor/conf.d/

sudo supervisorctl reread
sudo supervisorctl restart all
