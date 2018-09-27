<?php
class Home extends Controller {
  public function index() {
    $this->view( 'home/index', []);
  }

  // Connexion à l'espace d'administration
  public function connexion() {
    if ( isset( $_SESSION['id'] ) ) {
      header( 'Location: /account' );
    }

    if ( !empty( $_POST ) ) {
      extract( $_POST );
      // on vérifie si le compte existe
      $member = $this->accountExists($pseudoConnexion, $password);
      // Récupération de l'id de session
      if ( $member ) {
        $_SESSION['id'] = $member['id'];

        header( 'Location: /' );
      }
      else {
        $erreur = 'Identifiants erronés';
      }
      // Transmition des erreurs à la vue
      $this->view( 'home/index', ['erreur' => $erreur] );
    }

    $this->view( 'home/index' );
  }
  // Déconnexion de l'espace d'administration
  public function deconnexion() {
    if ( !isset( $_SESSION['id'] ) ) {
      header( 'Location: /' );
    }
    // On supprime toutes les données de session et on redirige vers la page de connexion
    $_SESSION = [];

    if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
    }

    session_destroy();

    header( 'Location: /' );
  }
  
  // Permet de vérifier les données de connexion
  private function accountExists($pseudo, $password) : array {
    $member = DB::select( 'SELECT id, password FROM member WHERE pseudo = ?', [$pseudo] );

    if ($member && password_verify( $password, $member[0]['password'])) {
      return $member[0];
    }
    else {
      return [];
    }
  }
}