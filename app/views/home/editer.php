<!-- page d'édition d'annonces depuis l'espace membre -->
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Modifiier une annonce depuis son espace membre">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="/css/nav.css">
		<link rel="stylesheet" href="/css/editer.css">
		<link rel="stylesheet" href="/css/footer.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
		<title>Modifier une annonce</title>
	</head>
	<body>
		<header>
			<?php include 'nav.php'; ?>
		</header>
		<section class="container">
		    <div class="card card-body mt-5">
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
		        <?php if ( isset( $data['erreur']['send'] ) ) : ?>
			        <div class="alert alert-warning"><?= $data['erreur']['send'] ?></div>
			    <?php endif; ?>
			    <?php if ( isset( $data['erreur']['picture'] ) ) : ?>
			        <div class="alert alert-warning"><?= $data['erreur']['picture'] ?></div>
			    <?php endif; ?>
			    <?php if ( isset( $data['success']['updatePicture'] ) ) : ?>
	            <div class="alert alert-success">
	                <?= $data['success']['updatePicture'] ?>
	                <!-- retour au compte membre -->
	                <a class="btn btn-warning btn-sm ml-5" href="/account" role="button"><i class="fas fa-undo-alt"></i> Mon compte</a>
				</div>
	        	<?php endif; ?>
	        	<?php if ( isset( $data['success']['updateAnnonce'] ) ) : ?>
	            <div class="alert alert-success">
	                <?= $data['success']['updateAnnonce'] ?>
	                <!-- retour au compte membre -->
	                <a class="btn btn-warning btn-sm ml-5" href="/account" role="button"><i class="fas fa-undo-alt"></i> Mon compte</a>
				</div>
	        	<?php endif; ?>
	        	<!-- formulaire -->
			  	<h2 class="mb-5">Modifier votre annonce</h2> 
			  	<!-- modification photo --> 
			    <form action="/editer/updatePicture/<?= $data['annonce']['id'] ?>" method="post" enctype="multipart/form-data">   
			      	<div class="row mb-5">
				      	
				      	<div class="form-group col-md-5">
				      		<label for="picture">Modifier la photo (fichier jpg, png - max 2 Mo)</label>
		    				<input type="file" class="form-control-file" id="picture" name="picture">
		    				<button type="submit" class="btn btn-warning mt-4">Valider</button>
		    			</div>
		    			<div class="form-group col-md-3 ">
				      		<img src="/img/img_annonces/<?= $data['annonce']['picture'] ?>" alt="picture" class="img-fluid">
				      	</div>
		    			
					</div>
			    </form>
			    <!-- modification contenue -->
			    <form action="/editer/updateAnnonce/<?= $data['annonce']['id'] ?>" method="post">	
				    <div class="form-group">
			            <label for="title">Titre</label>
			            <input type="text" class="form-control" name="title" id="title" value="<?= $data['annonce']['title'] ?>">
			            <label for="descAnnonce">Description de l'annonce</label>
					    <textarea class="form-control" id="descAnnonce" name="descAnnonce" rows="3"><?= $data['annonce']['descAnnonce'] ?></textarea>
					    <label for="price">Prix</label>
					    <div class="form-group col-4 col-sm-2 col pl-0">
					    	<input type="number" class="form-control" name="price" id="price" value="<?= $data['annonce']['price'] ?>">
				    	</div>
		            </div>
				    <button type="submit" class="btn btn-warning mt-2">Valider</button>
				</form>
		    </div>
		</section>
		<!-- inclusion du footer -->
		<?php include("footer.php"); ?>

		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="/public/js/account.js"></script>
	</body>
</html>