# Simple Modular Application
    CRUD opeartion over article module

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
5. Update database information in the .env file.
6. Run migrations and seeds:
    ```bash
    php artisan migrate --seed
    ```
7. Generate an encryption key for the app:
  ```
      php artisan key:generate
  ```
8. Run Servers
  ```
      php artisan serve
  ```
9. If you need to run test cases
```
      vendor/bin/phpunit tests
```

Now, open your web browser and got `http://localhost:8000` .

### Docs & Help

- [Laravel 6.x Documentation](https://laravel.com/docs/6.x)
