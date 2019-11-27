# Projet Symfony - UnBonBlog

## To install the project for development purpose on your machine

1. Make sure PHP7, Symfony and Composer are installed on your machine, if not follow [this link](https://symfony.com/doc/current/setup.html)

2. Clone the repository and run the following commands

```console
composer update
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

## To run the project locally 

**Run the following command :**

```console
php bin/console server:run
```

## Access to the production version online

This project is currently hosted on Heroku and is available at [this address](https://https://rousse-lefebvre-blog.herokuapp.com/?fbclid=IwAR1qrooC7nWnCEm54V1PuFCzfUcyQFf-9J48tzmFuyrE-o_ERf9FMs3-VyM)
