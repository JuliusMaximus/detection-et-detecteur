<?php
class Connexion extends Controller {
    public function index() {
    	if ( isset( $_SESSION['admin'] ) ) {
      		header( 'Location: /admin' );
    	}

	    if ( !empty( $_POST ) ) {
	      extract( $_POST );
	      // on vérifie si le compte existe
	      $admin = $this->accountExists();
	      // Récupération de l'id de session
	      if ( $admin ) {
	        $_SESSION['admin'] = 'OK';

	        header( 'Location: /admin' );
	      }
	      else {
	        $erreur = 'Identifiants erronés';
	      }
	      // Transmition des erreurs à la vue
	      $this->view( 'admin/connexion', ['erreur' => $erreur] );
	    }

	    $this->view( 'admin/connexion' );
    }

    // Permet de vérifier les données de connexion
	private function accountExists() : array {
	    $admin = DB::select( 'SELECT email, password from admin where email = ?', [$_POST['login']] );

	    if ( $admin && password_verify( $_POST['password'], $admin[0]['password'] ) ) {
	      return $admin[0];
	    }
	    else {
	      return [];
	    }
	}
}