if [ -e /vagrant/backup/db.sql ]
  then
    sudo mysql -p'root' play  < /vagrant/backup/db.sql
    echo "imported db..."
fi
