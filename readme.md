

## Admin Panel component

This is a web application that is build on top of laravel and uses many packages but the ones worth mentioning are
https://github.com/Zizaco/entrust and https://github.com/spatie/laravel-backup.
Its main purpose is to allow programmers to speed up the development
of their apps by giving an already made admin panel which can be implemented on top of your existing system.
to install you must download and do a composer install, migrate and php artisan serve
  
  
 The admin panel is currently linked to a small system to manage medicaments in a pharmacy

### How to use

- Clone the repository with __git clone__
- Run __composer install__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Add a second database coneccion, in this project i used remotemysql.com like this

DB_CONNECTION_SECOND=mysql
DB_HOST_SECOND=remotemysql.com
DB_PORT_SECOND=3306
DB_DATABASE_SECOND=yMbc196y39
DB_USERNAME_SECOND=yMbc196y39
DB_PASSWORD_SECOND=XZTuyYjXHV

To successfully use this remote database service normally you would have to add a couple of things in your config folder however it is already set up to use remote MySQL. If you are going to use another remote database, make sure to add all its credentials needed for it to work. In the remote database there is a table with the same structure as the bitacora in the migrations files

- Run __php artisan key:generate__
- Run __php artisan migrate:refresh --seed__

If you open the seed folder you will see that by default a single user is created with all the permissions that will allow him to enter the system. Just place that username and password in the login screen. 
There is a function that saves the activity of the user to the remote database, this function can be found in the controller controller.php is called registrarEnBitacora(accion). 
Before leaving the app folder notice that I have made a model for the remote database 

- That's it - load the homepage, use the username and password created by default and you can start using it
Note: if you dont wish to use a second remote database that is fine too!


---



## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
