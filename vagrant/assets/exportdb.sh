mkdir -p ./vagrant/backup
echo "Backing up db..."
mysqldump --add-drop-database -u root -p'' play > ./vagrant/backup/db.sql
echo "DB backup done."
