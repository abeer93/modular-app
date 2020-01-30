# Simple Modular Application
    Simple laravel application implement creating your own module inside laravel app.

## Requirement

```
  1. [Laravel 6.x](https://laravel.com/docs/6.x)
  2. [PHP >= 7.0] (http://php.net/downloads.php)
  3. [Composer](https://getcomposer.org/)
```

## Installation
1. Clone the repo via this url 
  ```
    git clone https://github.com/abeer93/modular-app.git
  ```

2. Enter inside the folder
```
  cd modular-app
```
3. Create a `.env` file by running the following command 
  ```
    cp .env.example .env
  ```
4. Install various packages and dependencies: 
  ```
    composer install
  ```
5. Publsih module config and routes and view
    
    a. add module service provider to provider array in config/app
    ```
      App\Article\ArticleServiceProvider::class,
    ```
    b. load module files
    ```
      php artisan vendor:publish
    ```
    and choose App\Article\ArticleServiceProvider from the list which will display it will be 1
    
6. Update database information in the .env file.
7. Run migrations and seeds:
  ```bash
    php artisan migrate --seed
  ```
8. Generate an encryption key for the app:
  ```
    php artisan key:generate
  ```
9. Run Servers
  ```
    php artisan serve
  ```
10. If you need to run test cases
```
  vendor/bin/phpunit tests
```

Now, open your web browser and got `http://localhost:8000` .

### Docs & Help

- [Laravel 6.x Documentation](https://laravel.com/docs/6.x)
