
#Установка проекта

###1. Скачиваем composer.phar(если composer не установлен в системе глобально) - открываем терминал в папке куда нужно сохранить composer и вводим команду
```html
php -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"
```

###2. Скачиваем файлы с гит

```html
git clone http://github.com/logs12/blog.git
```
или

```html
git init
git remote add origin http://github.com/logs12/blog.git
git checkout -b origin origin/master
git pull
```

###3. Запускаем composer
```html
php composer.phar update
```

###4. Create database
```html
yii migrate
```