
## Project setup Guide
1 cp .env.example .env
2 php artisan key:generate
3 php artisan migrate
4 php artisan serve
5 php artisan db:seed
##user following credentials for login
'name' => 'John Doe',
'email' => 'john@example.com',
'password' => Hash::make('123456'),
