# install project

composer install 

#env file
rename file .env.example to .env

php artisan generate:key

#database 
set name database and same .env
#env file 

FILESYSTEM_DRIVER=public 

#migrate and seed 
php artisan migrate 

php artisan db:seed

# run server 
php artisan serve 

# file storage 

php artisan storage:link


