echo "Reloading msdb..."

echo 'DROP DATABASE IF EXISTS msdb' | mysql -u root
echo 'CREATE DATABASE msdb' | mysql -u root

php bin/console doctrine:migrations:migrate

php bin/console doctrine:fixtures:load
