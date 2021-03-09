$(function() {
  'use strict';

  //création d'une base de donnée à distance et d'une autre local
  var remoteDB = new PouchDB('http://senaleche.internet-box.ch:5984/boissons');
  var localDB = new PouchDB('LocalDB');

  // syncronise unidirectionnellement la BDD local vers la distante
  localDB.replicate.to(remoteDB).on('complete', function () {
    console.log("sync Successfully");
  }).on('error', function (err) {
    console.log(err);
  });

  // Validation du formulaire
  $("#DrinkForm").submit(function(e){
    //ràécupère les données
    var data = $(this).serializeArray();
    var id = new Date().toISOString();
    id = id.split(".")[0] // garde la date comme ID mais enlève la valeure oZ
    //Crée un document avec comme clé les nom des champs
    var observations = {_id:id}
    jQuery.each(data, function(i, object){
      observations[object.name]=object.value;
    });
    // enregistre le document dans la base local
    localDB.put(observations, function callback(err, result) {
          if (!err) {
            console.log('Successfully posted an observation!');
          } else {
            console.log(err);
          }
        });
    });
});
