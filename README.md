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
* TODO : Passer CouchDB en SSL via un certificats *Let's encrypt*

Afin de prévenir tout problèmes de droits, il faut créer une base local qui sera syncronisée avec la base distante :

    //création d'une base de donnée à distance et d'une autre local
   var remoteDB = new PouchDB('<ID_DU_RASPBERRY>:5984/<NOM_DE_LA_BASE>');
   var localDB = new PouchDB('LocalDB');

   // syncronise unidirectionnellement la BDD local vers la distante
   localDB.replicate.to(remoteDB).on('complete', function () {
     console.log("sync Successfully");
   }).on('error', function (err) {
     console.log(err);
   });

infos à venir....
