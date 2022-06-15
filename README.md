# 👨🏻‍💻 BACK-END CHALLENGE

## 1. Frameworks

In computer programming, a software framework is an abstraction in which software providing generic functionality can be selectively changed by additional user-written code, thus providing application-specific software.

### 1.1 Web Application w/ Laravel 6.x

Laravel is a PHP Framework for Web Applications. If you are not familiar with it please read the following sections of the Laravel Docs:
- https://laravel.com/docs/6.x/configuration
- https://laravel.com/docs/6.x/structure

### 1.2 Automated Testing w/ PHPUnit

In software testing, test automation is the use of software separate from the software being tested to control the execution of tests and the comparison of actual outcomes with predicted outcomes.

Test automation can automate some repetitive but necessary tasks in a formalized testing process already in place, or perform additional testing that would be difficult to do manually.

Test automation is critical for code quality, system stability and modern techniques like continuous delivery and continuous testing.

![](https://static1.smartbear.co/smartbear/media/images/resources/articles/content/test-automation-pyramid.png)

There are three main categories for automated testing: Unit, Integration/API, E2E/UI. The base of the pyramid, Unit tests, are cheaper and faster, for implementation and execution thus allowing a larger number of them. As well - climbing up the pyramid - end-2-end tests are slower and more expensive, resulting naturally in fewer tests for that category.

PHPUnit is a PHP Framework for Automated Testing. For more information on how to write tests with it please refer to: https://phpunit.readthedocs.io/pt_BR/latest/writing-tests-for-phpunit.html

## 2. REST API

Representational state transfer (REST) is a software architectural style that defines a set of constraints to be used for creating Web services. Web services that conform to the REST architectural style, called RESTful Web services, provide interoperability between computer systems on the internet. RESTful Web services allow the requesting systems to access and manipulate textual representations of Web resources by using a uniform and predefined set of stateless operations.

For more information on REST set of constraints please refer to: https://restfulapi.net

---
## 3. Setting up environment

### 3.1 Create SQLite database
Inside /backend
```bash
touch database/database.sqlite
```
then in .env
```bash
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```
For more information: https://laravel.com/docs/6.x/database#configuration

### 3.2 Serve Laravel
Inside /backend
```bash
php artisan serve --port 8000
```
This will serve a Laravel development server at http://localhost:8000

---
## 4. Challenge
Create a book managing application (CRUD) containing:
- A [Migration](https://laravel.com/docs/6.x/migrations#generating-migrations) with author, title, release date and rating information;
- A [Eloquent Model](https://laravel.com/docs/6.x/eloquent#defining-models) for the created migration;
- A **REST compliant** [Resource Controller](https://laravel.com/docs/6.x/controllers#resource-controllers) containing index, store, update and destroy methods;
- Automated unit tests w/ PHPUnit to ensure the application expected outputs.
