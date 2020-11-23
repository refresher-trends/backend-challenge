# 👨🏻‍💻 BACK-END CHALLENGE

## 1. Frameworks

In computer programming, a software framework is an abstraction in which software providing generic functionality can be selectively changed by additional user-written code, thus providing application-specific software.

### 1.1 Laravel 5.8

Laravel is a PHP Framework for Web Applications.

https://laravel.com/docs/5.8/configuration
https://laravel.com/docs/5.8/structure

### 1.2 PHPUnit

PHPUnit is a PHP Framework for Automated Testing.
![](https://static1.smartbear.co/smartbear/media/images/resources/articles/content/test-automation-pyramid.png)
https://phpunit.readthedocs.io/pt_BR/latest/writing-tests-for-phpunit.html

## 2. REST API

https://www.hostgator.com.br/blog/api-restful

---
## 3. Setting up environment

### 3.1 Create SQLite database
```bash
touch database/database.sqlite
```
then in .env
```bash
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```
For more information: https://laravel.com/docs/5.8/database#configuration

### 3.2 Serve Laravel
```bash
php artisan serve --port 8000
```
This will serve a Laravel development server at http://localhost:8000

---
## 4. Challenge
Create a book managing application containing:
- A [Migration](https://laravel.com/docs/5.8/migrations#generating-migrations) with author, title, release date and rating information;
- A [Eloquent Model](https://laravel.com/docs/5.8/eloquent#defining-models) for the created migration;
- A **REST compliant** [Resource Controller](https://laravel.com/docs/5.8/controllers#resource-controllers) containing index, store, update and destroy methods;
- Automated unit tests w/ PHPUnit to ensure the application expected outputs.