<nav class="navbar navbar-expand-lg navbar-light" id="topOfPage">
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
                    <a class="nav-link" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ladetection">La détection de métaux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/annonces">Déposer une annonce</a>
                </li>
            </ul>
            <!-- account connexion -->
            <div class="btn-group dropdown">
                <?php if (isset($_SESSION['id'])) : ?>
                <button type="button" class="btn btn-outline-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Connecté <i class="far fa-user"></i>
                </button>
                <?php else : ?>
                <button type="button" class="btn btn-outline-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Connexion <i class="fas fa-lock"></i>
                </button>
                <?php endif; ?>
                <div class="dropdown-menu dropdown-menu-right">
                    <?php if (isset($_SESSION['id'])) : ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="/account">Mon compte</a></li>
                        <li class="list-group-item"><a href="/home/deconnexion">Déconnexion</a></li>
                    </ul>
                    <?php else : ?>
                    <!-- formulaire de connexion -->
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
            </div> 
        </div>
    </div>
</nav>
<!-- Modal forget password -->
<div class="modal fade" id="forgetPassword" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Title">Récupération de votre mot de passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (isset($data['erreur']['email'])) : ?>
                  <div class="alert alert-danger"><?= $data['erreur']['email'] ?></div>
                <?php endif; ?>
                <?php if (isset($data['success']['validation'])) : ?>
                  <div class="alert alert-success"><?= $data['success']['validation'] ?></div>
                <?php endif; ?>
                <form action="/home/forgetPassword" method="post" role="form">
                    <div class="form-group">
                        <label for="emailRecup">Adresse e-mail</label>
                        <input type="email" class="form-control" id="emailrecup" name="emailrecup" aria-describedby="emailHelp" placeholder="exemple@email.com">
                        <small id="emailHelp" class="form-text text-muted">Entrez l'adresse email renseignée lors de votre incription.<br>Vous y recevrez un nouveau mot de passe.</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>