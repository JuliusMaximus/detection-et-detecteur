<!DOCTYPE html>
<html lang="fr">
  <head>
  	<meta charset="utf-8">
  	<meta name="description" content="inscription à détection et détecteur">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="/css/nav.css">
  	<link rel="stylesheet" href="/css/footer.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  	<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
  	<title>Créer un compte</title>
  </head>
  <body>
  	<header>
  		<?php include 'nav.php'; ?>
  	</header>
  	<section>
      <div class="container d-flex flex-column align-items-center" role="main">
        <h1 class="text-xs-center mt-5">Formulaire d'inscription</h1>
        <form action="/inscription/regist" method="post" class="col-lg-8 mt-5 mb-5" role="form">
          <!-- Affichage des erreurs -->
          <?php if ( isset( $data['erreur']['pseudo'] ) ) : ?>
            <div class="alert alert-warning"><?= $data['erreur']['pseudo'] ?></div>
            <?php endif; ?>
          <?php if ( isset( $data['erreur']['email'] ) ) : ?>
              <div class="alert alert-warning"><?= $data['erreur']['email'] ?></div>
            <?php endif; ?>
            <?php if ( isset( $data['erreur']['dpt'] ) ) : ?>
              <div class="alert alert-warning"><?= $data['erreur']['dpt'] ?></div>
            <?php endif; ?>
            <?php if ( isset( $data['erreur']['region'] ) ) : ?>
                <div class="alert alert-warning"><?= $data['erreur']['region'] ?></div>
            <?php endif; ?>
            <?php if ( isset( $data['erreur']['password'] ) ) : ?>
                <div class="alert alert-warning"><?= $data['erreur']['password'] ?></div>
            <?php endif; ?>
            <?php if ( isset( $data['erreur']['passwordConf'] ) ) : ?>
                <div class="alert alert-warning"><?= $data['erreur']['passwordConf'] ?></div>
            <?php endif; ?>
            <?php if ( isset( $data['success']['validation'] ) ) : ?>
                <?php unset($_POST['email'], $_POST['pseudo']);?>
                <div class="alert alert-success">
                  <?= $data['success']['validation'] ?>
                </div>
            <?php endif; ?>   
          <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" name="pseudo" id="pseudo" value="<?php if ( isset( $_POST['pseudo'] ) ) echo $_POST['pseudo'] ?>">
            <label for="email">Votre Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="nom@exemple.com" value="<?php if ( isset( $_POST['email'] ) ) echo $_POST['email'] ?>">
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="region">Région</label>
              <select id="region" name="region" class="form-control">
                <option value=""></option>
                <option value="Grand Est">Grand Est</option>
                <option value="Nouvelle-Aquitaine">Nouvelle-Aquitaine</option>
                <option value="Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
                <option value="Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
                <option value="Bretagne">Bretagne</option>
                <option value="Centre-Val de Loire">Centre-Val de Loire</option>
                <option value="Corse">Corse</option>
                <option value="Île-de-France">Île-de-France</option>
                <option value="Occitanie">Occitanie</option>
                <option value="Hauts-de-France">Hauts-de-France</option>
                <option value="Normandie">Normandie</option>
                <option value="Pays de la Loire">Pays de la Loire</option>
                <option value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</option>
              </select>
            </div>
            
            <div class="form-group col-md-6">
              <label for="dpt">Département</label>
              <select id="dpt" name="dpt" class="form-control">
                <option value=""></option>
                <option value="01 - Ain">01 - Ain</option>
                <option value="02 - Aisne">02 - Aisne</option>
                <option value="03 - Allier">03 - Allier</option>
                <option value="04 - Alpes de Haute Provence">04 - Alpes de Haute Provence</option>
                <option value="05 - Hautes Alpes">05 - Hautes Alpes</option>
                <option value="06 - Alpes Maritimes">06 - Alpes Maritimes</option>
                <option value="07 - Ardèche">07 - Ardèche</option>
                <option value="08 - Ardennes">08 - Ardennes</option>
                <option value="09 - Ariège">09 - Ariège</option>
                <option value="10 - Aube">10 - Aube</option>
                <option value="11 - Aude">11 - Aude</option>
                <option value="12 - Aveyron">12 - Aveyron</option>
                <option value="13 - Bouches du Rhône">13 - Bouches du Rhône</option>
                <option value="14 - Calvados">14 - Calvados</option>
                <option value="15 - Cantal">15 - Cantal</option>
                <option value="16 - Charente">16 - Charente</option>
                <option value="17 - Charente Maritime">17 - Charente Maritime</option>
                <option value="18 - Cher">18 - Cher</option>
                <option value="19 - Corrèze">19 - Corrèze</option>
                <option value="2A - Corse du sud">2A - Corse du sud</option>
                <option value="2B - Haute Corse">2B - Haute Corse</option>
                <option value="21 - Côte d'Or">21 - Côte d'Or</option>
                <option value="22 - Côtes d'Armor">22 - Côtes d'Armor</option>
                <option value="23 - Creuse">23 - Creuse</option>
                <option value="24 - Dordogne">24 - Dordogne</option>
                <option value="25 - Doubs">25 - Doubs</option>
                <option value="26 - Drôme">26 - Drôme</option>
                <option value="27 - Eure">27 - Eure</option>
                <option value="28 - Eure et Loire">28 - Eure et Loire</option>
                <option value="29 - Finistère">29 - Finistère</option>
                <option value="30 - Gard">30 - Gard</option>
                <option value="31 - Haute Garonne">31 - Haute Garonne</option>
                <option value="32 - Gers">32 - Gers</option>
                <option value="33 - Gironde">33 - Gironde</option>
                <option value="34 - Hérault">34 - Hérault</option>
                <option value="35 - Ille et Vilaine">35 - Ille et Vilaine</option>
                <option value="36 - Indre">36 - Indre</option>
                <option value="37 - Indre et Loire">37 - Indre et Loire</option>
                <option value="38 - Isère">38 - Isère</option>
                <option value="39 - Jura">39 - Jura</option>
                <option value="40 - Landes">40 - Landes</option>
                <option value="41 - Loir et Cher">41 - Loir et Cher</option>
                <option value="42 - Loire">42 - Loire</option>
                <option value="43 - Haute Loire">43 - Haute Loire</option>
                <option value="44 - Loire Atlantique">44 - Loire Atlantique</option>
                <option value="45 - Loiret">45 - Loiret</option>
                <option value="46 - Lot">46 - Lot</option>
                <option value="47 - Lot et Garonne">47 - Lot et Garonne</option>
                <option value="48 - Lozère">48 - Lozère</option>
                <option value="49 - Maine et Loire">49 - Maine et Loire</option>
                <option value="50 - Manche">50 - Manche</option>
                <option value="51 - Marne">51 - Marne</option>
                <option value="52 - Haute Marne">52 - Haute Marne</option>
                <option value="53 - Mayenne">53 - Mayenne</option>
                <option value="54 - Meurthe et Moselle">54 - Meurthe et Moselle</option>
                <option value="55 - Meuse">55 - Meuse</option>
                <option value="56 - Morbihan">56 - Morbihan</option>
                <option value="57 - Moselle">57 - Moselle</option>
                <option value="58 - Nièvre">58 - Nièvre</option>
                <option value="59 - Nord">59 - Nord</option>
                <option value="60 - Oise">60 - Oise</option>
                <option value="61 - Orne">61 - Orne</option>
                <option value="62 - Pas de Calais">62 - Pas de Calais</option>
                <option value="63 - Puy de Dôme">63 - Puy de Dôme</option>
                <option value="64 - Pyrénées Atlantiques">64 - Pyrénées Atlantiques</option>
                <option value="65 - Hautes Pyrénées">65 - Hautes Pyrénées</option>
                <option value="66 - Pyrénées Orientales">66 - Pyrénées Orientales</option>
                <option value="67 - Bas Rhin">67 - Bas Rhin</option>
                <option value="68 - Haut Rhin">68 - Haut Rhin</option>
                <option value="69 - Rhône">69 - Rhône</option>
                <option value="70 - Haute Saône">70 - Haute Saône</option>
                <option value="71 - Saône et Loire">71 - Saône et Loire</option>
                <option value="72 - Sarthe">72 - Sarthe</option>
                <option value="73 - Savoie">73 - Savoie</option>
                <option value="74 - Haute Savoie">74 - Haute Savoie</option>
                <option value="75 - Paris">75 - Paris</option>
                <option value="76 - Seine Maritime">76 - Seine Maritime</option>
                <option value="77 - Seine et Marne">77 - Seine et Marne</option>
                <option value="78 - Yvelines">78 - Yvelines</option>
                <option value="79 - Deux Sèvres">79 - Deux Sèvres</option>
                <option value="80 - Somme">80 - Somme</option>
                <option value="81 - Tarn">81 - Tarn</option>
                <option value="82 - Tarn et Garonne">82 - Tarn et Garonne</option>
                <option value="83 - Var">83 - Var</option>
                <option value="84 - Vaucluse">84 - Vaucluse</option>
                <option value="85 - Vendée">85 - Vendée</option>
                <option value="86 - Vienne">86 - Vienne</option>
                <option value="87 - Haute Vienne">87 - Haute Vienne</option>
                <option value="88 - Vosges">88 - Vosges</option>
                <option value="89 - Yonne">89 - Yonne</option>
                <option value="90 - Territoire de Belfort">90 - Territoire de Belfort</option>
                <option value="91 - Essonne">91 - Essonne</option>
                <option value="92 - Hauts de Seine">92 - Hauts de Seine</option>
                <option value="93 - Seine Saint Denis">93 - Seine Saint Denis</option>
                <option value="94 - Val de Marne">94 - Val de Marne</option>
                <option value="95 - Val d'Oise">95 - Val d'Oise</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="passwordInscription">Mot de passe</label>
            <input type="password" class="form-control" id="passwordInscription" name="passwordInscription" placeholder="*******">
          </div>
          <div class="form-group">
            <label for="passwordConf">Confirmation mot de passe</label>
            <input type="password" class="form-control" id="passwordConf" name="passwordConf" placeholder="*******">
          </div>
          <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
        </form>
      </div>
  	</section>
  	<!-- inclusion du footer -->
  	<?php include("footer.php"); ?>

  	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  	<script src="/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>