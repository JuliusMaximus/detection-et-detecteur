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
	<title>Les prospécteurs de la région</title>
</head>
<body>
	<header>
		<?php include 'nav.php'; ?>
	</header>
	<div id="buttons" class="container d-flex justify-content-center mt-5">
		<button id="btnProspecteur" class="btn region m-1" type="button" data-toggle="collapse" data-target="#prospecteur" aria-expanded="false" aria-controls="les prospécteurs de la région">
		    Les prospécteurs
		</button>
		<button id="btnAnnonces" class="btn region m-1" type="button" data-toggle="collapse" data-target="#annonces" aria-expanded="false" aria-controls="Les annonces">
		    Les annonces 
		</button>
		<button id="btnAssos" class="btn region m-1" type="button" data-toggle="collapse" data-target="#Assos" aria-expanded="false" aria-controls="Les associations">
		    Les associations <span class="badge badge-light">4</span>
		</button>
	</div>
	<section class="container">
		<div class="collapse show" id="prospecteur">
			<div class="card card-body">
			  	<h2 class="mb-5">Les Prospécteurs de votre région</h2>  
			    
			    
			</div>  
		</div>
		<div class="collapse" id="annonces">
		    <div class="card card-body">    
	            <div class="container">
	            	<h2 class="mb-5">Les annonces dans région</h2>
		                
			    </div>
		    </div>
		</div>
		<div class="collapse" id="assos">
		    <div class="card card-body">
			  	<h2 class="mb-5">Les associations de votre région</h2>
			    3 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
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