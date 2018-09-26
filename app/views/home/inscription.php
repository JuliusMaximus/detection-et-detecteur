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
            <div class="alert alert-danger"><?= $data['erreur']['pseudo'] ?></div>
            <?php endif; ?>
          <?php if ( isset( $data['erreur']['email'] ) ) : ?>
              <div class="alert alert-danger"><?= $data['erreur']['email'] ?></div>
            <?php endif; ?>
            <?php if ( isset( $data['erreur']['dpt'] ) ) : ?>
              <div class="alert alert-danger"><?= $data['erreur']['dpt'] ?></div>
            <?php endif; ?>
            <?php if ( isset( $data['erreur']['region'] ) ) : ?>
                <div class="alert alert-danger"><?= $data['erreur']['region'] ?></div>
            <?php endif; ?>
            <?php if ( isset( $data['erreur']['password'] ) ) : ?>
                <div class="alert alert-danger"><?= $data['erreur']['password'] ?></div>
            <?php endif; ?>
            <?php if ( isset( $data['erreur']['passwordConf'] ) ) : ?>
                <div class="alert alert-danger"><?= $data['erreur']['passwordConf'] ?></div>
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
                <option value="GRE">Grand Est</option>
                <option value="NAQ">Nouvelle-Aquitaine</option>
                <option value="ARA">Auvergne-Rhône-Alpes</option>
                <option value="BFC">Bourgogne-Franche-Comté</option>
                <option value="BRE">Bretagne</option>
                <option value="CVL">Centre-Val de Loire</option>
                <option value="COR">Corse</option>
                <option value="IDF">Île-de-France</option>
                <option value="OCC">Occitanie</option>
                <option value="HDF">Hauts-de-France</option>
                <option value="NOR">Normandie</option>
                <option value="PDL">Pays de la Loire</option>
                <option value="PAC">Provence-Alpes-Côte d'Azur</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="dpt">Département</label>
              <select id="dpt" name="dpt" class="form-control">
                <option value=""></option>
                <option value="1">01 - Ain</option>
                <option value="2">02 - Aisne</option>
                <option value="3">03 - Allier</option>
                <option value="4">04 - Alpes de Haute Provence</option>
                <option value="5">05 - Hautes Alpes</option>
                <option value="6">06 - Alpes Maritimes</option>
                <option value="7">07 - Ardèche</option>
                <option value="8">08 - Ardennes</option>
                <option value="9">09 - Ariège</option>
                <option value="10">10 - Aube</option>
                <option value="11">11 - Aude</option>
                <option value="12">12 - Aveyron</option>
                <option value="13">13 - Bouches du Rhône</option>
                <option value="14">14 - Calvados</option>
                <option value="15">15 - Cantal</option>
                <option value="16">16 - Charente</option>
                <option value="17">17 - Charente Maritime</option>
                <option value="18">18 - Cher</option>
                <option value="19">19 - Corrèze</option>
                <option value="2A">2A - Corse du sud</option>
                <option value="2B">2B - Haute Corse</option>
                <option value="21">21 - Côte d'Or</option>
                <option value="22">22 - Côtes d'Armor</option>
                <option value="23">23 - Creuse</option>
                <option value="24">24 - Dordogne</option>
                <option value="25">25 - Doubs</option>
                <option value="26">26 - Drôme</option>
                <option value="27">27 - Eure</option>
                <option value="28">28 - Eure et Loir</option>
                <option value="29">29 - Finistère</option>
                <option value="30">30 - Gard</option>
                <option value="31">31 - Haute Garonne</option>
                <option value="32">32 - Gers</option>
                <option value="33">33 - Gironde</option>
                <option value="34">34 - Hérault</option>
                <option value="35">35 - Ille et Vilaine</option>
                <option value="36">36 - Indre</option>
                <option value="37">37 - Indre et Loire</option>
                <option value="38">38 - Isère</option>
                <option value="39">39 - Jura</option>
                <option value="40">40 - Landes</option>
                <option value="41">41 - Loir et Cher</option>
                <option value="42">42 - Loire</option>
                <option value="43">43 - Haute Loire</option>
                <option value="44">44 - Loire Atlantique</option>
                <option value="45">45 - Loiret</option>
                <option value="46">46 - Lot</option>
                <option value="47">47 - Lot et Garonne</option>
                <option value="48">48 - Lozère</option>
                <option value="49">49 - Maine et Loire</option>
                <option value="50">50 - Manche</option>
                <option value="51">51 - Marne</option>
                <option value="52">52 - Haute Marne</option>
                <option value="53">53 - Mayenne</option>
                <option value="54">54 - Meurthe et Moselle</option>
                <option value="55">55 - Meuse</option>
                <option value="56">56 - Morbihan</option>
                <option value="57">57 - Moselle</option>
                <option value="58">58 - Nièvre</option>
                <option value="59">59 - Nord</option>
                <option value="60">60 - Oise</option>
                <option value="61">61 - Orne</option>
                <option value="62">62 - Pas de Calais</option>
                <option value="63">63 - Puy de Dôme</option>
                <option value="64">64 - Pyrénées Atlantiques</option>
                <option value="65">65 - Hautes Pyrénées</option>
                <option value="66">66 - Pyrénées Orientales</option>
                <option value="67">67 - Bas Rhin</option>
                <option value="68">68 - Haut Rhin</option>
                <option value="69">69 - Rhône</option>
                <option value="70">70 - Haute Saône</option>
                <option value="71">71 - Saône et Loire</option>
                <option value="72">72 - Sarthe</option>
                <option value="73">73 - Savoie</option>
                <option value="74">74 - Haute Savoie</option>
                <option value="75">75 - Paris</option>
                <option value="76">76 - Seine Maritime</option>
                <option value="77">77 - Seine et Marne</option>
                <option value="78">78 - Yvelines</option>
                <option value="79">79 - Deux Sèvres</option>
                <option value="80">80 - Somme</option>
                <option value="81">81 - Tarn</option>
                <option value="82">82 - Tarn et Garonne</option>
                <option value="83">83 - Var</option>
                <option value="84">84 - Vaucluse</option>
                <option value="85">85 - Vendée</option>
                <option value="86">86 - Vienne</option>
                <option value="87">87 - Haute Vienne</option>
                <option value="88">88 - Vosges</option>
                <option value="89">89 - Yonne</option>
                <option value="90">90 - Territoire de Belfort</option>
                <option value="91">91 - Essonne</option>
                <option value="92">92 - Hauts de Seine</option>
                <option value="93">93 - Seine Saint Denis</option>
                <option value="94">94 - Val de Marne</option>
                <option value="95">95 - Val d'Oise</option>
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