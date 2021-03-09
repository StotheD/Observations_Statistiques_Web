# Relevé d'observations à portées de main
Projet pour un cours de visualisation de données - sur les traces du projet [DearData](https://www.dear-data.com/theproject)

Le projet utilise la librairie PouchDB afin d'établire une communication entre un formulaire Bootstrap avec une basse de donnée NoSQL supporté par CouchDB

## Installation

* Pour héberger ma base CouchDB, j'ai utilisé mon Raspberry pi en le transformant en serveur via le tuto suivant : https://github.com/jguillod/couchdb-on-raspberry-pi
  - Comment accéder à son Raspberry via ssh : https://www.easyprogramming.net/raspberrypi/headless_raspbery_pi.php
  - Si la base a vocation à être accessible en dehors du réseau privé, il faut configurer sa boxe Internet pour accéder au Rasberry pi via une adresse ip publique
* Pour le site web, il suffit de référencer les ressources suivantes :
  - JS : [JQuery](https://jquery.com/download/) et [PouchDB](https://pouchdb.com/guides/setup-pouchdb.html)
  - CSS : [Bootstrap](https://getbootstrap.com/docs/5.0/getting-started/download/)

## Initialisation
Pour la création de formulaire à l'aide de bootstrap, se référer à : https://getbootstrap.com/docs/4.3/components/forms/

Les données sont ensuites traitées dans app.js

Afin de prévenir tout problèmes de droits, il faut créer une base local qui sera syncronisée avec la base distante :

    var remoteDB = new PouchDB('<ID_DU_RASPBERRY>:5984/<NOM_DE_LA_BASE>');
    var localDB = new PouchDB('LocalDB');

    localDB.replicate.to(remoteDB).on('complete', function () {
      console.log("sync Successfully");
    }).on('error', function (err) {
      console.log(err);
    });

## Récupération des données
Une fois le formulaire créé **avec des nom sur chaque champs**, il est possible de récupérer les données en ajax via Jquery, sous forme de tableau :

    $("#DrinkForm").submit(function(e){
      var data = $(this).serializeArray();
    });

Puis l'on crée un ID unique qui donnera une information sur la date et l'heure de l'observation :

    var id = new Date().toISOString();
    id = id.split(".")[0]

PouchDB accepte chaque nouvelles données sous forme de *document* unique, comme un JSON. Il n'est donc pas nécessaire de créer une syntaxe en amont comme avec MySQL. Voici comment créer le document dont
 * le nom de la clé correspondra au nom du champs récupéré via le formulaire (il définira ensuite au nom de la colonne de la base de donnée),
 * et dont la valeur correspond à la valeur du champs du formulaire récupéré.

    var observations = {_id:id}
    jQuery.each(data, function(i, object){
      observations[object.name]=object.value;
    });

Il nous reste qu'à envoyer ce document dans notre base locale :

    localDB.put(observations, function callback(err, result) {
      if (!err) {
        console.log('Successfully posted an observation!');
      } else {
        console.log(err);
      }
    });

## Récupération des données
Il est ensuite possible en se connectant à la base CouchDB (via <ID_DU_RASPBERRY>:5984/_utils) afin de récupérer les données inscrites sous forme de JSON, un format pratique pour du traitement en python.

## TODO
 * Passer CouchDB en SSL via un certificat *Let's encrypt* ce qui permetrait de passer le formulaire en SSL également.
 * Voir comment il est possible de protéger la base sans devoir se connecter via un nom d'utilisateur et un mot de passe affiché dans le fichier .js
