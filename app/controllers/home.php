<?php
class Home extends Controller {
    public function index() {
        $this->view( 'home/index', []);
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

    // Connexion à l'espace membre
    public function connexion() {
        if ( isset( $_SESSION['id'] ) ) {
          header( 'Location: /account' );
        }

        if ( !empty( $_POST ) ) {
            extract( $_POST );
            // on vérifie si le compte existe avec les infos du formulaire
            $member = $this->accountExists($pseudoConnexion, $password);
            // Définition de l'id de session
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
      
      
    // Gestion de l'oubli de mot de passe
    public function forgetPassword() {
      	if (isset($_SESSION['id'])) {
      		header('Location: /account.php');
    	}

    	if (!empty($_POST)) {
        	extract($_POST);
        	$erreur = [];
        	$success = [];
            // Gestion des erreurs de formulaire
        	if (empty($emailrecup)) {
        	    $erreur['email'] = 'Adresse e-mail manquante !';
        	}
        	elseif (!filter_var($emailrecup, FILTER_VALIDATE_EMAIL)) {
        	    $erreur['email'] = 'Adresse e-mail invalide !';
        	}
        	elseif ($this->mail_free($emailrecup)) {
        	    $erreur['email'] = 'Adresse e-mail inconnue !';
        	}

        	if (!$erreur) {
                // On crée un nouveau mdp
        	    $password = bin2hex(random_bytes(8));
                // On modifie le mdp oublié en bdd
        	    $this->password_update($password, $emailrecup);

        	    $message = '
        	    <h1> Voici votre nouveau mot de passe : </h1>
        	    <p>
        	      Mot de passe : <b>' . $password . '</b><br>
        	      Pensez à le modifier lors de votre prochaine visite !
        	    </p>
        	    ';
                // On envoi le nouveau mdp par mail au membre
        	    $this->mail_html('Nouveau mot de passe', $message);

        	    unset($emailrecup);

        	    $success['validation'] = "Nouveau mot de passe envoyé !";
        	}
            // on envoi les infos à la vue
    	    $this->view('home/index', ['erreur' => $erreur, 'success' => $success]);
    	}

    	$this->view('home/index');
    }
    // Permet de vérifier si l'email existe déjà lors de d'une inscription
    private function mail_free(string $email) : bool {
        $member = DB::select('SELECT id FROM member WHERE email = ?', [$email]);

        if ($member) {
          return false;
        }

        else {
          return true;
        }
    }
    // Gère l'envoie d'email
    private function mail_html(string $subject, string $message) {
    	$headers = 'From: Julien <contact@weckjulien.fr>' . "\r\n";
    	$headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8';

        mail($_POST['emailrecup'], $subject, $message, $headers);
    }
    // Gère la modification du mdp pour les oubli de mdp
    private function password_update(string $password, string $email) {
    	DB::update('UPDATE member SET password = :password WHERE email = :email', [
    		'password' => password_hash($password, PASSWORD_DEFAULT),
    		'email'    => $email
    	]);
    }
}