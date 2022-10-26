
# Grocelist
## About Laravel

Grocelist let you list all of your grocery needs quickly and easily. With grocelist you can share all of your groceries item to whoever that has the link. Also, grocelist has features such as:

- Trash deleted item
- Permanently delete trashed item
- Restore trashed item
- Subscribtion benefits

## Installation
1. Clone project
```
$ git clone https://github.com/auliamnaufal/Grocelist.git
```
2. Go to project's directory
```
$ cd Grocelist
```
3. Copy and paste .env file
```
$ cp .env.example .env
```
4. Open your .env file and change whatever that's needed (database name, username, password, etc)
5. install composer dependencies
```
$ composer install
```
6. install front-end dependencies
```
$ npm install
```
7. Generate key
```
$ php artisan key:generate
```
8. Migrate table
```
$ php artisan migrate
```
9. run serve
```
$ php artisan serve
```
10. run local development
```
$ npm run dev
```
11. Go to http://localhost:8000/

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
