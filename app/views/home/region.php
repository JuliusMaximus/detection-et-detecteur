<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Tchater avec les prospécteurs de votre région, consulter les annonces de détecteurs de métaux et les associations du coin">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="/css/nav.css">
	<link rel="stylesheet" href="/css/region.css">
	<link rel="stylesheet" href="/css/footer.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
	<title>Les prospecteurs de la région</title>
</head>
<body>
	<header>
		<?php include 'nav.php'; ?>
	</header>
	<div id="buttons" class="container d-flex justify-content-center mt-5 mb-1">
		<button id="btnProspecteur" class="btn region m-1" type="button" data-toggle="collapse" data-target="#prospecteur" aria-expanded="false" aria-controls="les prospécteurs de la région">
		    Les prospecteurs <span class="badge badge-light"><?= count($data['membres']) ?></span>
		</button>
		<button id="btnAnnonces" class="btn region m-1" type="button" data-toggle="collapse" data-target="#annonces" aria-expanded="false" aria-controls="Les annonces">
		    Les annonces <span class="badge badge-light"><?= count($data['annonces']) ?></span>
		</button>
		<button id="btnAssos" class="btn region m-1" type="button" data-toggle="collapse" data-target="#Assos" aria-expanded="false" aria-controls="Les associations">
		    Les associations <span class="badge badge-light"><?= count($data['assos']) ?></span>
		</button>
	</div>
	<section class="container">
		<div class="collapse show" id="prospecteur">
			<div class="row">
				<div class="card card-body col-md-8">
				  	<h2 class="mb-5">Les Prospecteurs de votre région</h2>  
				  	<div id="membres" data-spy="scroll">
					    <!-- Récupération et Construction de la liste-->
					    <?php
		                if ( empty($data['membres']) ) :
		            	?>
		            	<div class="card card-body">
		            		<h5 class="card-title">Aucun membres inscrit dans votre région</h5>
		            	</div>
		            	<?php
						endif;
						?>
		            	<?php
		                foreach( $data['membres'] as $key => $membre ) :
		                ?>
						<div class="card mb-1 mr-2">
							<div class="card-body">
							    <h5 class="card-title"><b><?= $membre['pseudo'] ?></b> <small>&nbsp;&nbsp;&nbsp; Dpt. <?= $membre['dpt'] ?></small></h5>
							    <h6 class="card-subtitle mb-2 text-muted">Membre depuis le <?= $membre['created_at'] ?></h6>
							    <p class="card-text"><?= $membre['description'] ?></p>
							    <a href="#" class="btn btn-warning card-link">Tchater</a>
						    </div>
						</div>
		                <?php
		                endforeach;
		                ?>
				    </div>
				</div>
				<div class="card card-body col-md-4">
				</div>
			</div>  
		</div>
		<div class="collapse" id="annonces">
		    <div class="card card-body">    
	            <div class="container">
	            	<h2 class="mb-5">Les annonces dans votre région</h2>
		             <!-- Récupération et Construction de la liste-->
		            <div class="row">
		            	<?php
		                if ( empty($data['annonces']) ) :
		            	?>
		            	<div class="card card-body">
		            		<h5 class="card-title">Aucune annonces dans votre région</h5>
		            	</div>
		            	<?php
						endif;
						?>
		            	<?php
		                foreach( $data['annonces'] as $key => $annonce ) :
		                ?>
						<div class="card col-sm-12 col-md-6 col-lg-4 m-2">
						    <img class="card-img-top" src="/img/img_annonces/<?= $annonce['picture'] ?>" alt="Card image cap">
						    <div class="card-body">
							    <h5 class="card-title"><b><?= $annonce['title'] ?></b></h5>
							    <p class="card-text"><?= $annonce['descAnnonce'] ?></p>
						    </div>
						    	<ul class="list-group list-group-flush">
						    		<li class="list-group-item"><b>Prix:</b> <?= $annonce['price'] ?></li>
						    	</ul>
						    <div class="card-body pr-0">
						    	<a role="button" href="#" class="card-link btn btn-warning float-right">Contacter le vendeur</a>
						    </div>
						</div>
		                <?php
		                endforeach;
		                ?> 
		            </div>  
			    </div>
		    </div>
		</div>
		<div class="collapse" id="assos">
		    <div class="card card-body">
			  	<h2 class="mb-5">Les associations de votre région</h2>
			    <!-- Récupération et Construction de la liste-->
			    <?php
                if ( empty($data['assos']) ) :
            	?>
            	<div class="card card-body">
            		<h5 class="card-title">Aucune associations connues dans votre région</h5>
            	</div>
            	<?php
				endif;
				?>
            	<?php
                foreach( $data['assos'] as $key => $asso ) :
                ?>
				<div class="card mb-1 mr-2">
					<div class="card-body">
					    <h5 class="card-title"><b><?= $asso['title'] ?></b></h5>
					    <p class="card-text"><b>Adresse : </b><?= $asso['adress'] ?></p>
				    	<p class="card-text"><b>Téléphone : </b><?= $asso['phone'] ?></p>
			    		<p class="card-text"><b>Site internet : </b><a href="<?= $asso['net'] ?>" target="_blank"><?= $asso['net'] ?></a></p>
		    			<p class="card-text"><b>Email : </b><?= $asso['email'] ?></p>
				    </div>
				</div>
                <?php
                endforeach;
                ?>
		    </div>
		</div>
	</section>
	<!-- inclusion du footer -->
	<?php include("footer.php"); ?>

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="/public/js/region.js"></script>
</body>
</html>