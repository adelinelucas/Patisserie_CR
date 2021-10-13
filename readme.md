# Patisserie Claire et Romain

Patisserie Claire et Romain est un site internet fictif vitrine pour la patisserie Claire et Romain. Ce site est basé sur le tutoriel de Yoan Dev : "https://yoandev.co/".

## Environnement de développment 

### Pré-requis

    * PHP 7.4
    * Composer
    * Symfony CLI 
    * Docker
    * Docker-compose
    * node-js et npm

Vous pouvez vérifier les pré-requis(sauf Docker et Docker-compose) avec la commande suivante de la CLI Symfony : 

```bash
symfony check:requirements
```
### Lancer l'environnement de développement 

```bash 
composer install
npm install
npm run build
docker-compose up -d
symfony serve -d
```

### Ajouter des données de test
```bash 
symfony console doctrine:fixtures:load
```
## Lancer des tests

```bash 
php bin/unit --testdox
```
### Envoi des mails de contacts

Les mails de contact sont stockés en BDD pour permettre au patissier de les envoyer par mail. Il faut mettre en place un cron sur :

```bash 
symfony console app:send-contact
```