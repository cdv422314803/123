任务 我用的laravel php框架 sqlite数据库

composer install

.env 配置 DB_DATABASE 项

php artisan serve

用Postman

http://127.0.0.1:8000/api/signin?name=12345&email=12345@12345&password=12345 已经注册过 
然后 http://127.0.0.1:8000/api/login?name=12345&email=12345@12345&password=12345 复制token 
然后 http://127.0.0.1:8000/api/me