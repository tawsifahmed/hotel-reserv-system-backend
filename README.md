## About Hotel Reservation System

This project is built using `laravel/framework` version `^10.10` and requires PHP 8.1.

To get started with the Hotel Reservation System, follow these steps:

1. **Install Dependencies**:
    ```bash
    composer install
    ```
2. **Environment File Creation**:
    ```bash
    copy the env.example and make it .env
    ```

3. **Generate Application Key**:
    ```bash
    php artisan key:generate
    ```
4. **Migrations**:
    ```bash
    php artisan migrate --seed
    ```   
    or if you want to refresh existing tables
    ```bash
    php artisan migrate:fresh --seed
    ```
    or if you want to import a db,
    ```bash
    import in phpmyadmin, config in .env and no need to run migration
    ```

4. **Create Storage Link**:
    ```bash
    php artisan storage:link
    ```    

5. **Serve the Application**:
    ```bash
    php artisan serve 
    ```

6. **admin credentials**:
```
 'email' => 'hrs_admin@gmail.com',
 'password' => 12345678 from database/seeders
```    

These steps will set up the project and start the development server.
