### PHP Modern Static Website
Setup your PHP-powered modern static website in minutes.

### Features
* Clean URLs
* Separate templating
* Easy to setup
* Uses modern PHP libraries
* 100% PHPUnit Code Coverage

### Requires

* PHP >= 7.4
* [Webserver](https://www.slimframework.com/docs/v3/start/web-servers.html) - Apache or nginx
* [Composer](https://getcomposer.org/download/) 
* [Bash](https://www.gnu.org/software/bash/)
* [Xdebug](https://xdebug.org/) (optional, for Code Coverage) 

### Install

* Go to application's root dir
* Edit `deploy.sh` and update paths to your `php`, `composer.phar` and `phpunit` as needed
* Run `sh deploy.sh` for dev and `sh deploy.sh prod` for prod
* Update `.env` (as needed)
* Manage the html templates in `/views`, including updating common layout in `views/partials/layout.twig`
* To add a new page:
  * Go to `/src/Home/HomeController.php` and add desired `route` under `PAGE_LIST`
  * Then go to `/views` and add a template with the same name as the `route` (i.e if you want to add a page for `/pricing`, you will add `pricing` in `/src/Home/HomeController.php` > `PAGE_LIST` and create a new `pricing.twig` under `/views`)
 
### Libraries

* [Route](https://route.thephpleague.com/)
* [Container](https://container.thephpleague.com/)
* [Laminas](https://docs.laminas.dev/)
* [PHP dotenv](https://github.com/vlucas/phpdotenv)
* [Twig](https://twig.symfony.com/)
