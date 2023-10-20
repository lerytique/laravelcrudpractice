# testCrudLaravelTask (php8.2)
<p>Проект сделан с разделением логики, используя Service и Repository. Роутинг разделён на web и api. web.php выдаёт view на blade шаблонах(вы можете посмотреть пути слагов в этом файле), в то время как api.php это конфигурация для роутов на операции CRUD. Для этого написаны два контроллера - PostController для api и DisplayController для web. </p>
# Для запуска поекта используйте следующие команды
<ul>
  <li>docker-compose up -d --build</li>
  <li>docker exec -it art_app bash</li>
  <li>php artisan migrate</li>
  <li>php artisan serve</li>
</ul>
