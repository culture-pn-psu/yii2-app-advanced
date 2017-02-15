#!/usr/bin/env bash

#== Import script args ==

github_token=$(echo "$1")

#== Bash helpers ==

function info {
  echo " "
  echo "--> $1"
  echo " "
}

#== Provision script ==

info "Provision-script user: `whoami`"

info "Configure composer"
composer config --global github-oauth.github.com ${github_token}
echo "Done!"

info "Install plugins for composer"
composer global require "fxp/composer-asset-plugin:^1.2.0" --no-progress

info "Install project dependencies"
cd /app
composer --no-progress --prefer-dist install

info "Init project"
#./init --env=Development --overwrite=y

info "Apply migrations"
#./yii migrate <<< "yes"

#info "Create DB"
#mysql -uroot <<< "CREATE DATABASE culture_db DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;"
#echo "Create DATABASE done!"

info "GRANT ALL PRIVILEGES to %"
mysql -uroot <<< "GRANT ALL PRIVILEGES ON culture_db.* TO 'root'@'%' WITH GRANT OPTION;"
echo "Set mysql done!"

#info "Apply yii2-user migrations"
#./yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations <<< "yes"


info "Create bash-alias 'app' for vagrant user"
echo 'alias app="cd /app"' | tee /home/vagrant/.bash_aliases

info "Enabling colorized prompt for guest console"
sed -i "s/#force_color_prompt=yes/force_color_prompt=yes/" /home/vagrant/.bashrc
