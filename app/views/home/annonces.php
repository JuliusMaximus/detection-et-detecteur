<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Déposer une annonces pour vendre votre détecteur de métaux d'occasion ou des accessoires de détection">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="/css/annonces.css">
	<link rel="stylesheet" href="/css/nav.css">
	<link rel="stylesheet" href="/css/footer.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
	<title>Déposer une annonces</title>
</head>
<body>
	
	<header role="banner">

		<!-- inclusion du menu -->
		<?php include("nav.php"); ?>
		
	</header>
	<section>
		<div class="container" role="main">
			<h1 class="text-xs-center mt-5">Déposer votre annonce</h1>
			<?php if (isset($_SESSION['id'])) : ?>
			<form action="/annonces/dropAnAds" method="post" enctype="multipart/form-data" class="mt-5 mb-5" role="form">
				<!-- Affichage des erreurs -->
				<?php if ( isset( $data['erreur']['title'] ) ) : ?>
					<div class="alert alert-warning"><?= $data['erreur']['title'] ?></div>
			    <?php endif; ?>
				<?php if ( isset( $data['erreur']['descAnnonce'] ) ) : ?>
			        <div class="alert alert-warning"><?= $data['erreur']['descAnnonce'] ?></div>
			    <?php endif; ?>
			    <?php if ( isset( $data['erreur']['price'] ) ) : ?>
			        <div class="alert alert-warning"><?= $data['erreur']['price'] ?></div>
			    <?php endif; ?>
			    <?php if ( isset( $data['erreur']['picture'] ) ) : ?>
			        <div class="alert alert-warning"><?= $data['erreur']['picture'] ?></div>
			    <?php endif; ?>
			    <?php if ( isset( $data['erreur']['send'] ) ) : ?>
			        <div class="alert alert-warning"><?= $data['erreur']['send'] ?></div>
			    <?php endif; ?>
			    <?php if ( isset( $data['success']['validation'] ) ) : ?>
			    	<?php unset($_POST['title'], $_POST['descAnnonce'], $_POST['price']);?>
			        <div class="alert alert-success"><?= $data['success']['validation'] ?></div>
			    <?php endif; ?>		
			    <div class="form-group">
				  	<label for="title">Titre de l'annonce</label>
				    <input type="text" class="form-control" name="title" id="title" value="<?php if ( isset( $_POST['title'] ) ) echo $_POST['title'] ?>">
				    <label for="descAnnonce">Description de l'annonce</label>
				    <textarea class="form-control" id="descAnnonce" name="descAnnonce" rows="3"><?php if ( isset( $_POST['descAnnonce'] ) ) echo $_POST['descAnnonce'] ?></textarea>
				</div>
			    <div class="form-group col-4 col-sm-2 col pl-0">
			    	<label for="price">Prix</label>
				    <input type="number" class="form-control" name="price" id="price" value="<?php if ( isset( $_POST['price'] ) ) echo $_POST['price'] ?>">
			    </div>
		  		<div class="form-group col-sm-8 col-md-6 col-lg-4 pl-0">
		      		<label for="picture">Ajouter une photo (fichier jpg, png - max 2 Mo)</label>
    				<input type="file" class="form-control-file border rounded p-1" id="picture" name="picture">
    			</div>
			    <button type="submit" class="btn btn-warning mt-2">Envoyer</button>
			</form>
			<?php else : ?>
			<p>Merci de vous connecter ou vous inscrire ! </p>
			<form action="/home/connexion" method="post" class="px-4 py-3" role="form">
	            <div class="form-group">
	                <label for="pseudoConnexion">Pseudo</label>
	                <input type="text" class="form-control" id="pseudoConnexion" name="pseudoConnexion">
	            </div>
            	<div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="*******">
            	</div>
                <button type="submit" class="btn btn-warning">Connexion</button>
            </form>
            <div class="dropdown-divider"></div>
            <a type="button" class="btn btn-primary m-1" href="/inscription">
            Inscription !
            </a>
            <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#forgetPassword">
            Mot de passe oublié ?
            </button>
			<?php endif; ?>
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