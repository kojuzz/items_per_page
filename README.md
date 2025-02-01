1. Download the ZIP and extract.
2. Change `.env.example` to `.env`.
3. Run the following commands in the terminal.

```bash
composer install
npm install
npm run build
php artisan migrate
php artisan db:seed --class=ItemsTableSeeder
php artisan key:generate
composer run dev
```

4. After running the above commands, you can browse the application at http://localhost:8000
   
- - - - - - - - - - - - - - - - - - - - - - - - - 
View the running project at https://ipp.stun5.com
