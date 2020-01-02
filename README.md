# Projet Symfony - UnBonBlog


## About :

Projet réalisé par : 
Lefebvre Thomas et Roussé Julien

Les routes /new (ajouter un post), /post/edit (editer le post) et post/delete (supprimer le post), ne sont disponibles que pour un utilisateur (admin) connecté.
Le blog implémente FosUser pour se connecter et accéder à ses fonctionnalités.

Voici un admin enregistré : 
id  : adminblog
mdp : unbonmotdepasse


## To install the project for development purpose on your machine

1. Make sure PHP7, Symfony and Composer are installed on your machine, if not follow [this link](https://symfony.com/doc/current/setup.html)

2. Clone the repository and run the following commands

```console
composer install
php bin/console doctrine:schema:update --force
```

## To run the project locally 

**Run the following command :**

```console
php bin/console server:run
```

## Access to the production version online

This project is currently hosted on Heroku and is available at [this address](https://rousse-lefebvre-blog.herokuapp.com)

