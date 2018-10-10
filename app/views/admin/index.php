<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Espace d'administration">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="/css/admin.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
	<title>Espace d'administration</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light" id="topOfPage">
    		<div class="container">
      			<a class="navbar-brand" href="/admin">Espace d'administration</a>
      			<ul class="nav navbar-nav pull-xs-right">
		            <li class="nav-item"><a class="nav-link" href="/"  target="_blank">Aller sur le site</a></li>
		            <li class="nav-item">
		            <li class="nav-item"><a class="nav-link" href="/admin/deconnexion">Déconnexion</a></li>
		        </ul>
    		</div>
		</nav>
	</header>
	<section>
		
            <div class="card-body">
              <div class="container">
              	<a class="btn btn-warning m-4" href="/admin"><i class="fas fa-sync-alt"></i>&nbsp;Actualiser</a>
                <div class="row table-responsive">
                  <!-- Liste des commentaires -->
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Date</th>
                          <th>Auteur</th>
                          <th>Commentaire</th>
                          <th>Prix</th>
                          <th>Valider</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Récupération et Construction de la liste-->
                        <?php
                        foreach($data['annonces'] as $key => $annonce) :
                        ?>
                        <tr>
	                        <th><?= $annonce['id'] ?></th>
	                        <td><?= $annonce['created_at'] ?></td>
	                        <td><?= $annonce['pseudo'] ?></td>
	                        <td><?= $annonce['descAnnonce'] ?></td>
	                        <td><?= $annonce['price'] ?></td>
	                        <td>
		                        <?php
		                        if ( !$annonce['validated']) : // on affiche un icon grisé si il n'est pas validé
		                        ?>
		                        <a href="/admin/validate/<?= $annonce['post_id'] ?>"><i class="far fa-check-square fa-2x"></i></a>
		                        <?php 
		                        else : // sinon icon vert
		                        ?>
		                        <i class="fas fa-check-square fa-2x"></i>
		                        <?php
		                        endif;
		                        ?>
	                        </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                      </tbody>
                    </table>
                    <!-- Construction des liens de pagination -->
                    <nav aria-label="Page commentaires">
                        <ul class="pagination">
	                        <li class="page-item">
	                            <a class="page-link text-warning" href="/admin/<?= $data['currentPage'] - 1 ?>" aria-label="Precedent">
	                                <span aria-hidden="true">&laquo;</span>
	                                <span class="sr-only">Precedent</span>
	                          </a>
	                        </li>
	                        <?php 
	                        for( $i = 1;$i <= $data['pagesTotal'];$i++ ) :
	                        ?>
	                        <?php if ($i == $data['currentPage']) : ?>
	                        <li class="page-item"><a class="page-link bg-warning text-white" href="/admin/<?= $i ?>"><?= $i ?></a></li>
	                        <?php else: ?>
	                        <li class="page-item"><a class="page-link text-warning" href="/admin/<?= $i ?>"><?= $i ?></a></li>
	                        <?php endif; ?>
	                        <?php
	                        endfor;
	                        ?>
	                        <li class="page-item">
	                            <a class="page-link text-warning" href="/admin/<?= $data['currentPage'] + 1 ?>" aria-label="suivant">
	                            <span aria-hidden="true">&raquo;</span>
	                            <span class="sr-only">suivant</span>
	                          </a>
	                        </li>
                        </ul>
                    </nav>
                  </div>
                </div>
              </div>
          
	</section>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>