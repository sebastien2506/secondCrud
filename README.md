# secondCrudG2

## Installation 

Installation de la dernière version stable avec les dépendances courantes pour un site web

    symfony new FirstCrudG2 --webapp
    cd FirstCrudG2

### Mise à jour de composer

    composer update

### Lancement du serveur

    symfony serve -d

https://127.0.0.1:8000

### Création d'un contrôleur

    php bin/console make:controller HomeController

2 fichiers sont créés, le contrôleur et sa vue :

    created: src/Controller/HomeController.php
    created: templates/home/index.html.twig

Pour voir le chemin généré pour le contrôleur

    php bin/console debug:route

Pour voir le détail du chemin généré pour le contrôleur

    php bin/console debug:route

Pour le fichier

```php
<?php
#src/Controller/HomeController.php

# ...
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
# ...
```

On souhaite avoir cette page comme accueil réel de notre site

```php
<?php
#src/Controller/HomeController.php

# ...
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'titre' => 'homepage',
        ]);
    }
# ...
```

Et le template

```twig
{% extends 'base.html.twig' %}

{% block title %}{{ titre }}{% endblock %}

{% block body %}
<div class="container">
    <h1>{{ titre }}</h1>
</div>
{% endblock %}

```

### Création d'une entité

    php bin/console make:entity Article

    created: src/Entity/Article.php
    created: src/Repository/ArticleRepository.php

Le premier fichier sera le "mapping - DTO" d'une donnée, le deuxième sera un Manager

### Création du fichier de configuration

On va copier le fichier `.env` en `.env.local` :

    cp .env .env.local

Puis on va modifier la clef secrète

```env
# .env.local

APP_SECRET=VotreVraiClefSecrete
```

#### Lien vers la database


Pour le moment la database activée est en PostgreSQL, on va la commenter avec #

```env
# .env.local

###> doctrine/doctrine-bundle ###

# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
DATABASE_URL="mysql://root:@127.0.0.1:3306/firstcrudg2?serverVersion=8.0.31&charset=utf8mb4"
# DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=10.11.2-MariaDB&charset=utf8mb4"
# DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"

###< doctrine/doctrine-bundle ###
```



### Création de la database

    php bin/console doctrine:database:create
    # version raccourcie
    php bin/console d:d:c

### Migration vers MySQL

    php bin/console make:migration

puis

    php bin/console doctrine:migrations:migrate
    # OU
    php bin/console d:m:m

### Création du CRUD

    php bin/console make:crud Article

Fichiers installés :
```
created: src/Controller/ArticleController.php
 created: src/Form/ArticleType.php
 created: templates/article/_delete_form.html.twig
 created: templates/article/_form.html.twig
 created: templates/article/edit.html.twig
 created: templates/article/index.html.twig
 created: templates/article/new.html.twig
 created: templates/article/show.html.twig
 created: tests/Controller/ArticleControllerTest.php
```
