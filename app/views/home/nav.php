
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <!-- menu burger -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- navbar -->
    <a class="navbar-brand" href="/">Détection et détecteurs</a>
    <div class="collapse navbar-collapse" id="navbarToggler">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">La détection de métaux</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Déposer une annonce</a>
        </li>
      </ul>
      <!-- account connexion -->
      <div class="btn-group dropdown">
        <button type="button" class="btn btn-outline-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mon compte <i class="far fa-user"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right">
        <form action="" method="post" class="px-4 py-3" role="form">
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="email@example.com">
          </div>
          <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" placeholder="*******">
          </div>
          <button type="submit" class="btn btn-warning">Connexion</button>
        </form>
        <div class="dropdown-divider"></div>
        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#inscription">
          Pas encore inscrit?
        </button>
        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#forgetpPassword">
          Mot de passe oublié?
        </button>
      </div>
      </div> 
    </div>
  </div>
</nav>
<!-- Modal inscription -->
<div class="modal fade" id="inscription" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Title">Inscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" role="form">
          <div class="form-group">
            <label for="emailInscription">Adresse e-mail</label>
            <input type="email" class="form-control" id="emailInscription" aria-describedby="emailHelp" placeholder="exemple@email.com">
            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre email avec quiconque.</small>
          </div>
          <div class="form-group">
            <label for="passwordInscription">Mot de passe</label>
            <input type="password" class="form-control" id="passwordInscription" placeholder="*******">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Valider</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal forget password -->
<div class="modal fade" id="forgetpPassword" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Title">Récupération de votre mot de passe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" role="form">
          <div class="form-group">
            <label for="emailRecup">Adresse e-mail</label>
            <input type="email" class="form-control" id="emailrecup" aria-describedby="emailHelp" placeholder="exemple@email.com">
            <small id="emailHelp" class="form-text text-muted">Entrez l'adresse email renseignée lors de votre incription.<br>Vous y recevrez un nouveau mot de passe.</small>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary">Valider</button>
      </div>
    </div>
  </div>
</div>