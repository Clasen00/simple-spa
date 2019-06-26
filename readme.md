# Пример простого spa приложения #

## Как запустить проект ##

Для запуска приложения необходимо выполнить следующие команды:

### Устанавливаем пакеты composer ###

    composer install

### Устанавливаем зависимости yarn ###

    yarn install

### Создаем миграции doctrine и выполняем их ###

    bin/console doctrine:migrations:diff
    bin/console doctrine:migrations:migrate

### Запускаем сборщик ###

    yarn dev

### Запускаем symfony ###

    php bin/console server:run
