download the zip and extra
change .env.example to .env

bash
composer install
npm install
npm run build
php artisan migrate
php artisan db:seed --class=ItemsTableSeeder
php artisan key:generate
composer run dev
