# Please run the below command to start

  ```sh
  composer install
  ```
Also rename the file .env.example to .env, add your database credentials to the .env file. And then run the below commands

```sh
php artisan key:generate
php artisan migrate --seed
```
