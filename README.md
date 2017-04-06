# RB MVC Microframework

This is a very simple PHP MVC microframework.


## Getting Started

It is created for education purposes to explain the basics of a MVC Framework.
This framework has the power of composer built-in, so you may use it to simple projects or grow it up as you need.

### Prerequisites

* PHP >= 5.6.0
* composer
* PSR-4 autoload
* MySQL (you can easily change the database to use)


### Installing

Clone the project files.

```
$ git clone git@github.com:romuloberri/rbmicroframework.git
```

On Apache points the site root to the folder "public" (If it is an development enviroment this is not necessary).

Into the rbmicroframework project folder run composer

```
$ composer install
```

Start creating your app. Have fun! :)


## Creating your app

* `/public` - the folder to be published as the site root
 * `/public/index.php` - the only file needed on this folder to run the app. This calls every route needed.

* `/test` - Implement here the unit tests

* `/vendor` - Third party components. Managed by composer, do not edit direcly.

* `/bootstrap.php` - Instantiates the classes needed (autoload, PDO and starts the session)

* `/src` - the app code goes here
 * `/src/config/` - the configuration files
  * `/src/config/Params.php` - setup the database connection params and increment with other params needed by the application.
  * `/src/config/Route.php` - setup the default route and the allowed routes following the instructions inside the file.

 * `/src/controller/` - the controller files (see Controller structure)

 * `/src/model/` - the model files (with the suffix `Model.php`)

 * `/src/view/` - the view files (with the suffix `View.php`)

* `/assets` - public files that will be acessed by the app, like:
 * `/assets/js` - all required javascript files (copy manually the JQuery to this folder)
 * `/assets/img` - site images
 * create another folders as needed

### Controller structure

The `/public/index.php` file find the controller class and its actions following these rules:

The filename must have the suffix `Controller.php`.

```
/src/controller/UserController.php
```

The class name must match the filename and extends the `Controller `class
```
class UserController extends Controller {
```

The action functions must be public and have the suffix `Action`. And the default action is the `indexAction`.
```
public function indexAction() {
  // your code here...
}
```

## Authors

* **Rômulo Berri** - *Initial work* - [romuloberri](https://github.com/romuloberri)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Inspiration: The Vanhackathon inspires me to put this study on git to the public, and maybe we can use this in the hackathon. (http://www.vanhack.com/hackathon/)
