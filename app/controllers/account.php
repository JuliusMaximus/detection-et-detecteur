<?php
class Account extends Controller {
  	public function index() {
	  	if (!isset($_SESSION['id'])) {
	      header('Location: /');
	    }
	    $membre = $this->account_informations();

	    $this->view( 'home/account', ['membre' => $membre]);
    }

    private function account_informations() : array {
		$membre = DB::select('SELECT * FROM member WHERE id = ?', [$_SESSION['id']]);

		return $membre[0];
	}

    public function updateAvatar(){
    	if (!isset($_SESSION['id'])) {
		  header('Location: /');
		}

		$membre = $this->account_informations();

		if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
			$erreur = [];
			$success = [];

		    if (!in_array($_FILES['avatar']['type'], ['image/png', 'image/jpeg'])) {
		      $erreur['avatar'] = 'Format incorrect (PNG et JPEG acceptés)';
		    }
		    elseif ($_FILES['avatar']['size'] > 2048000) {
		      $erreur['avatar'] = 'Image trop volumineuse (Max 2Mo)';
		    }

		  	if (!$erreur) {
			    $extension = str_replace('image/', '', $_FILES['avatar']['type']);
			    $name = bin2hex(random_bytes(8)) . '.' .$extension;

			    if (move_uploaded_file($_FILES['avatar']['tmp_name'], ROOT.'/public/img/img_profils/' . $name)) {
			      // mise à jour de la BDD et suppression ancienne image
			      DB::update('UPDATE member SET avatar = :avatar WHERE id = :id', [
			        'avatar' => $name,
			        'id'     => $_SESSION['id']
			      ]);
                  
			      if ($membre['avatar'] != 'default.png') {
			        unlink(ROOT.'/public/img/img_profils/' . $membre['avatar']);
			      }

			      $success['validation'] = 'Votre avatar a été mis à jours !';
			    }
			    else {
			      $erreur['avatar'] = 'Erreur lors de l\'envoi du fichier';
			    }
			}
			$membre = $this->account_informations();
	      
	      	$this->view('home/account', ['erreur' => $erreur, 'success' => $success, 'membre' => $membre]);
		}
		else {
			$erreur['avatar'] = 'Aucun fichier séléctionné !';

			$this->view('home/account', ['erreur' => $erreur, 'membre' => $membre]);
		}
    }

    public function updateProfil() {
    	if (!isset($_SESSION['id'])) {
     	 header('Location: /');
    	}

	    if (!empty($_POST)) {
	      extract($_POST);
	      $erreur = [];
	      $success = [];

	      if (empty($email)) {
	        $erreur['email'] = 'Adresse e-mail manquante !';
	      }
	      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL )) {
	        $erreur['email'] = 'Adresse e-mail invalide !';
	      }

	      if (empty($dpt)) {
	        $erreur['dpt'] = 'Veuillez séléctionner un département !';
	      }

	      if (empty($region)) {
	        $erreur['region'] = 'Veuillez séléctionner une région !';
	      }

	      if (empty($description)) {
	        $erreur['description'] = 'Veuillez complèter votre présentation !';
	      }

	      if (!$erreur) {
	        // insertion du membre en bdd
	        DB::update('UPDATE member SET email = :email, region = :region, dpt = :dpt, description = :description WHERE id = :id', [
					'email'       => $email,
					'dpt'         => htmlspecialchars($dpt),
					'region'      => htmlspecialchars($region),
					'description' => htmlspecialchars($description),
					'id'          => $_SESSION['id']
      		]);
	        
	        $success['validation'] = 'Votre profil a été mis à jours !';
	      }
	      $membre = $this->account_informations();
	      
	      $this->view('home/account', ['erreur' => $erreur, 'success' => $success, 'membre' => $membre]);
	    }
    }

    public function updatePassword() {
    	if ( !isset( $_SESSION['id'] ) ) {
            header( 'Location: /' );
	    }

	    if (!empty($_POST)) {
		    extract($_POST);
		    $erreur = [];
		    $success = [];
		    // gestion des erreurs
		    if (empty($oldpassword)) {
		        $erreur['oldpassword'] = 'Ancien mot de passe manquant !';
		    }
		    elseif (!$this->password_ok()) {
		        $erreur['oldpassword'] = 'Ancien mot de passe erroné !';
		    }

            if (empty($newpassword)) {
		        $erreur['newpassword'] = 'Nouveau mot de passe manquant !';
    	    }
		    elseif (strlen($newpassword) < 8) {
		        $erreur['newpassword'] = 'Nouveau mot de passe trop court. Min 8 caractères !';
		    }
	        if (empty($newpasswordconf)) {
		        $erreur['newpasswordconf'] = 'confirmation du nouveau mot de passe manquante !';
		    }
		    elseif ($newpasswordconf != $newpassword) {
		        $erreur['newpasswordconf'] = 'Confirmation du nouveau mot de passe différente !';
		    }

		    if (!$erreur) { // on sauvegarde et on affiche un message
		        $this->password_save();
		        $success['validation'] = 'Nouveau mot de passe enregistré avec succès !';
		    }  

		    $membre = $this->account_informations();

		    $this->view( 'home/account', ['erreur' => $erreur, 'success' => $success, 'membre' => $membre] );
	    }
    }

    // Contrôle du mot de passe pour modification
	private function password_ok() : bool {
	    $membre = DB::select('SELECT password FROM member WHERE id = ?', [$_SESSION['id']]);

	    if (password_verify($_POST['oldpassword'], $membre[0]['password'])) {
	        return true;
	    }

	    else {
	        return false;
	    }
	}
	// Gère l'enregistrement du mot de passe
	private function password_save(string $password = '') {
	    $newpassword = $_POST['newpassword'] ?? $password;

	    DB::update('UPDATE member SET password = :password WHERE id = :id', [
			'password' => password_hash($newpassword, PASSWORD_DEFAULT),
			'id'       => $_SESSION['id']
	    ]);
	  
	}
    
}