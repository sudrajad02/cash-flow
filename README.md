# install dependencies
$ composer install

# setting env
$ edit env.example
$ edit adjust like your locale
$ change name .env

# running migration
$ php artisan migrate

# running seeder
$ php artisan db:seed

# running app
$ php artisan serve