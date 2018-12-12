<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Tchater avec les prospecteurs de votre région, consulter les annonces de détecteurs de métaux et les associations du coin">
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
		<!-- boutons de navigations -->
		<div id="buttons" class="container d-flex justify-content-center mt-5 mb-1">
			<button id="btnProspecteur" class="btn region m-1" type="button" data-toggle="collapse" data-target="#prospecteur" aria-expanded="false" aria-controls="les prospécteurs de la région">
			    Les prospecteurs <span class="badge badge-light"><?= count($data['membres']) ?></span>
			</button>
			<button id="btnAnnonces" class="btn region m-1" type="button" data-toggle="collapse" data-target="#annonces" aria-expanded="false" aria-controls="Les annonces">
			    Les annonces <span class="badge badge-light"><?= count($data['annonces']) ?></span>
			</button>
			<button id="btnAssos" class="btn region m-1" type="button" data-toggle="collapse" data-target="#assos" aria-expanded="false" aria-controls="Les associations">
			    Les associations <span class="badge badge-light"><?= count($data['assos']) ?></span>
			</button>
			<button id="btnMeteo" class="btn region m-1" type="button" data-toggle="collapse" data-target="#meteo" aria-expanded="false" aria-controls="Votre météo">
			    La météo <i class="fas fa-sun"></i>
			</button>
		</div>
		<section class="container">
			<!-- liste des prospecteurs de la region -->
			<div class="collapse show" id="prospecteur">
				<div class="card card-body">
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
							    <h5 class="card-title"><img src="/public/img/img_profils/<?= $membre['avatar'] ?>" alt="avatar membre"><b><?= $membre['pseudo'] ?></b> <small>&nbsp;&nbsp;&nbsp; Dpt. <?= $membre['dpt'] ?></small></h5>
							    <h6 class="card-subtitle mb-2 text-muted">Membre depuis le <?= $membre['created_at'] ?></h6>
							    <p class="card-text"><?= $membre['description'] ?></p>
							    <div class="btn-group dropright">
							        <?php if (isset($_SESSION['id'])) : ?>
							        <button type="button" class="btn btn-outline-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="-65,5">
							          Lui envoyer un message
							        </button>
							        <div class="dropdown-menu">
							          <form action="/region/message" method="post" class="form-inline px-4 py-3" role="form">
							          	<input type="HIDDEN" name="sendTo" value="<?= $membre['pseudo'] ?>">
							          	<input type="HIDDEN" name="sendBy" value="<?= $_SESSION['id'] ?>">
							          	<input type="HIDDEN" name="url" value="<?= $_SERVER['REQUEST_URI'] ?>">  
							            <div class="form-group">
							              <textarea class="form-control" name="message" placeholder="message..." required="Message vide !" cols="20" rows="1" maxlength="500"></textarea>
							            </div>
							            <button type="submit" class="btn btn-warning ml-2 mt-1 p-2">Envoyer</button>
							          </form>
							        </div>
							        <?php else: ?>
									<p class="text-muted font-weight-bold">Vous devez être connecté pour lui envoyer un message<p>
							    	<?php endif; ?>
							    </div>
						    </div>
						</div>
		                <?php
		                endforeach;
		                ?>
				    </div>
				</div>  
			</div>
			<!-- liste des annonces de la région -->
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
							    <div class="card-body">
								    <h5 class="card-title"><b><?= $annonce['title'] ?></b></h5>
								    <img class="card-img-top" src="/img/img_annonces/<?= $annonce['picture'] ?>" alt="Card image cap">
								    <p class="card-text mb-0"><?= $annonce['descAnnonce'] ?></p>
							    </div>
							    	<ul class="list-group list-group-flush">
							    		<li class="list-group-item"><b>Prix:</b> <?= $annonce['price'] ?> €</li>
							    	</ul>
							    <div class="btn-group dropup">
							        <?php if (isset($_SESSION['id'])) : ?>
							        <button type="button" class="btn btn-outline-warning dropdown-toggle m-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							          Contacter le vendeur
							        </button>
							        <div class="dropdown-menu">
							          <form action="/region/message" method="post" class="px-4 py-3" role="form">
							          	<input type="HIDDEN" name="sendTo" value="<?= $membre['pseudo'] ?>">
							          	<input type="HIDDEN" name="sendBy" value="<?= $_SESSION['id'] ?>">
							          	<input type="HIDDEN" name="url" value="<?= $_SERVER['REQUEST_URI'] ?>">  
							            <div class="form-group">
							              <textarea class="form-control" name="message" placeholder="message..." required="Message vide !" rows="3" maxlength="500">Annonce: <?= $annonce['title'] ?></textarea>
							            </div>
							            <button type="submit" class="btn btn-warning">Envoyer</button>
							          </form>
							        </div>
							        <?php else: ?>
									<p class="text-muted font-weight-bold">Vous devez être connecté pour lui envoyer un message<p>
							    	<?php endif; ?>
							    </div>
							</div>
			                <?php
			                endforeach;
			                ?> 
			            </div>  
				    </div>
			    </div>
			</div>
			<!-- liste des associations de la région -->
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
			<!-- météo de la région -->
			<div class="collapse" id="meteo">
			    <div class="card card-body d-flex align-items-center">
				  	<h2 class="mb-1">La météo de votre région</h2>
				  	<p>Consultez les prévisions météo de chez vous avant de sortir détecter !</p>
				  	<form class="form-inline mt-5" action="/meteo/index" method="post"> 
		      				<label class="mr-2" for="ville"><b>Villes</b></label>
							<select id="ville" name="ville" class="form-control mr-2">
								<?php
				                foreach( $data['villes'] as $key => $ville ) :
				                ?>
				                <option value="<?= $ville ?>"><?= $ville ?></option>
				                <?php
				                endforeach;
				                ?>
	              			</select>
							<button type="submit" class="btn btn-warning">Valider</button>
		    			
			    	</form>
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