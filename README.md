<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## The Duke of Berkshire
This test-project was created as part of a job interview for Kixx Concept.


## Valet
This project was developed with the use of [Laravel Valet](https://laravel.com/docs/9.x/valet). A simple and fast way to locally host a development environment on macOS.


## Setup
Below are the steps needed in order to setup this project
0. Clone this repository on your local machine ( I suggest using Valet, see the quick guide above ).
1. Install dependencies with ```npm install``` and ```composer install```
2. Duplicate the ```.env.example``` file and name it ```.env``` ( or rename ```.env.example``` to ```.env``` ).
3. Execute ```php artisan key:generate``` to generate a unique APP_KEY
4. Set up a database in your favourite program. The default name in ```.env``` is berkshire, if you rename it, make sure to update the ```.env```-file.
5. Execute ```php artisan migrate --seed``` in order to migrate all tables and fill them with dummy data.
6. See the next section on how to setup mail service (MailHog)


## Mail
For development: a test mail service (MailHog) has been set up. Emails are not sent to the address, but rather are caught in MailHog and can be seen for development/testing purposes. To visualise the email traffic, follow these steps:
1. Execute: ```brew install mailhog```
2. Execute: ```brew services start mailhog```
3. In the browser navigate to: {baseurl}/articles/{1}, fill in the form at the bottom of the page and hit the submit button 'verstuur nu'.
4. In the browser navigate to: http://127.0.0.1:8025/ to see how and what is being mailed


## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
