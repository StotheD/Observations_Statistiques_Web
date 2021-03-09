<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <title>Dear Data - Drink</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/DB.css">
  </head>
  <body>
    <div id="sync-wrapper">

    </div>
    <section id="cover" class="min-vh-100">
      <div id="cover-caption">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4">
              <h1 class="py-2 text-truncate">Dear Data - Drink</h1>
              <div class="px-2">
                <form id="DrinkForm">
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-3 pt-0">Type</legend>
                      <div class="col-sm-9">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input class="custom-control-input" type="radio" name="type" id="type1" value="froid" checked>
                          <label class="custom-control-label" for="type1">froid</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input class="custom-control-input" type="radio" name="type" id="type2" value="chaud">
                          <label class="custom-control-label" for="type2">chaud</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input class="custom-control-input" type="radio" name="type" id="type3" value="gazeux">
                          <label class="custom-control-label" for="type3">gazeux</label>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <div class="form-group row">
                    <label for="contenant" class="col-sm-3 col-form-label">Contenant</label>
                    <div class="col-sm-9">
                      <select class="custom-select" name="contenant">
                        <option value="verre">Verre</option>
                        <option value="pet">PET</option>
                        <option value="alu">Alu</option>
                        <option value="robinet">Robinet</option>
                        <option value="autre">Autre</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Alcool" class="col-sm-3 col-form-label">% d'alccol</label>
                    <div class="col-sm-9">
                        <input type="double" class="form-control" name="alcool" id="Alcool">
                    </div>
                  </div>
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-4 pt-0">Consommation</legend>
                      <div class="col-sm-8">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input class="custom-control-input" type="radio" name="lieu" id="consommation1" value="maison" checked>
                          <label class="custom-control-label" for="consommation1">Maison</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input class="custom-control-input" type="radio" name="lieu" id="consommation2" value="exterieur">
                          <label class="custom-control-label" for="consommation2">Exterieur</label>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <div class="form-group row">
                    <label for="ExtraInfo" class="col-sm-3 col-form-label">Notes</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="ExtraInfo" name="notes" rows="2"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </body>
  <script type="text/javascript" src="JS/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="JS/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="JS/pouchdb-7.2.1.min.js"></script>
  <script src="JS/app.js"></script>
</html>
