## Laravel 5 Education Metodical Complex ##

**Laravel 5 EMC** is a developing application.

### Установка ###

* `git clone https://github.com/VadimPolh/emc_main.git EMC`
* `cd EMC`
* `composer install`
* `php artisan key:generate`
* Создайте базу данных и заполните *.env*
* `php artisan migrate` для создания таблиц
* `php artisan db:seed` для заполнения таблиц
* Настройте *config/mail.php* для отправки писем

### Включено  ###

* [HTML5 Boilerplate](http://html5boilerplate.com) for front architecture
* [Bootstrap](http://getbootstrap.com) for CSS and jQuery plugins
* [Font Awesome](http://fortawesome.github.io/Font-Awesome) for the nice icons
* [Highlight.js](https://highlightjs.org) for highlighting code
* [Startbootstrap](http://startbootstrap.com) for the free templates
* [CKEditor](http://ckeditor.com) the great editor
* [Filemanager](https://github.com/simogeo/Filemanager) the easy file manager

### Реализованно ###

* Home page
* Custom Error Page 404
* Authentication (registration, login, logout, password reset)
* Users roles : administrator (all access), redactor (create and edit post, upload and use medias in personnal directory), and user (create comment in blog)
* Blog with comments
* Search in posts
* Tags on posts
* Contact us page
* Admin dashboard with new messages, users, posts and comments
* Users admin (roles filter, show, edit, delete, create)
* Messages admin
* Posts admin (list with dynamic order, show, edit, delete, create)
* Medias gestion

### Включенные пакеты ###

* laravelcollective/html

### Примочки ###

Для теста приложения используйте следующих пользователей :

* Administrator : email = admin@la.fr, password = admin
* Redactor : email = redac@la.fr, password = redac
* User : email = walker@la.fr, password = walker
* User : email = slacker@la.fr, password = slacker
