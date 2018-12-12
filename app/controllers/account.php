<?php
class Account extends Controller {
  	// Récupération des données et envoi à la vue
  	public function index() {
	  	if (!isset($_SESSION['id'])) {
	      header('Location: /');
	    }
	    $membre = $this->account_informations();

	    $annonces = DB::select('SELECT * FROM annonces WHERE post_id = ?', [$_SESSION['id']]);

	    $messages = DB::select('SELECT * FROM messages WHERE send_to = ? ORDER BY id DESC', [$membre['pseudo']]);

	    // Formatage de la date pour chaque annonces
        foreach ( $annonces as $key => $annonce ) {
        	$date = date_create( $annonce['created_at'] );
        	$annonces[$key]['created_at'] = date_format( $date, 'd/m/Y' );
    	}

    	// Formatage de la date pour chaque messages
        foreach ( $messages as $key => $message ) {
        	$date = date_create( $message['send_at'] );
        	$messages[$key]['send_at'] = date_format( $date, 'd/m/Y' );
    	}

	    $this->view( 'home/account', ['membre' => $membre, 'annonces' => $annonces, 'messages' => $messages]);
    }
    /* 
     * Récupère les infos du membre connecté.
     * $_SESSION['id'] est défini lors de la connexion
     * au compte qui prend comme valeur l'id du membre en BDD
    */
    private function account_informations() : array {
		$membre = DB::select('SELECT * FROM member WHERE id = ?', [$_SESSION['id']]);

		return $membre[0];
	}
	// Suppression d'une annonce
	public function deleteAnnonce( int $idAnnonce ) {
	    if ( !isset( $_SESSION['id'] ) ) {
	        header( 'Location: /connexion' );
	    }

	    $annonce = DB::select( 'SELECT picture from annonces where id = ?', [$idAnnonce] );

	    unlink( ROOT . 'public/img/img_annonces' . $annonce[0]['picture'] ); // suppression image

	    DB::delete( 'DELETE FROM annonces WHERE id = ?', [$idAnnonce]);

	    header( 'Location: /account' );
	}
	// Suppression d'un message
	public function deleteMessage( int $idMessage ) {
		if ( !isset( $_SESSION['id'] ) ) {
	        header( 'Location: /connexion' );
	    }

	    DB::delete( 'DELETE FROM messages WHERE id = ?', [$idMessage]);

	    header( 'Location: /account' );
	}
	// Gestion de l'envoi de message depuis l'espace membre
	public function message() {
        if(!empty($_POST)) {
            extract($_POST);
            // insertion du message en BDD
            DB::insert('INSERT INTO messages (message, send_to, send_by) VALUES (:message, :sendTo, :sendBy)', [
                'message' => htmlspecialchars($message),
                'sendTo'  => htmlspecialchars($sendTo),
                'sendBy'  => htmlspecialchars($sendBy)
            ]);
            // On renvoi sur la vue
            $sent = "Votre message a bien été envoyé !";

            $membre = $this->account_informations();

		    $annonces = DB::select('SELECT * FROM annonces WHERE post_id = ?', [$_SESSION['id']]);

		    $messages = DB::select('SELECT * FROM messages WHERE send_to = ? ORDER BY id DESC', [$membre['pseudo']]);

		    // Formatage de la date pour chaque annonces
	        foreach ( $annonces as $key => $annonce ) {
	        	$date = date_create( $annonce['created_at'] );
	        	$annonces[$key]['created_at'] = date_format( $date, 'd/m/Y' );
	    	}

	    	// Formatage de la date pour chaque messages
	        foreach ( $messages as $key => $message ) {
	        	$date = date_create( $message['send_at'] );
	        	$messages[$key]['send_at'] = date_format( $date, 'd/m/Y' );
	    	}

		    $this->view( 'home/account', ['membre' => $membre, 'annonces' => $annonces, 'messages' => $messages, 'sent' => $sent]);
        }

    }
    // Modification de l'avatar
    public function updateAvatar(){
    	if (!isset($_SESSION['id'])) {
		    header('Location: /');
		}

		$membre = $this->account_informations();

		$annonces = DB::select('SELECT * FROM annonces WHERE post_id = ?', [$_SESSION['id']]);

		$messages = DB::select('SELECT * FROM messages WHERE send_to = ? ORDER BY id DESC', [$membre['pseudo']]);

		if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
			$erreur = [];
			$success = [];
			// On vérifie le format et la taille de l'image
		    if (!in_array($_FILES['avatar']['type'], ['image/png', 'image/jpeg'])) {
		        $erreur['avatar'] = 'Format incorrect (PNG et JPEG acceptés)';
		    }
		    elseif ($_FILES['avatar']['size'] > 2048000) {
		        $erreur['avatar'] = 'Image trop volumineuse (Max 2Mo)';
		    }

		  	if (!$erreur) {
		  		// On récupère l'extention et on renome l'image
			    $extension = str_replace('image/', '', $_FILES['avatar']['type']);
			    $name = bin2hex(random_bytes(8)) . '.' .$extension;

			    if (move_uploaded_file($_FILES['avatar']['tmp_name'], ROOT.'/public/img/img_profils/' . $name)) {
			        // mise à jour de la BDD et suppression ancienne image
			        DB::update('UPDATE member SET avatar = :avatar WHERE id = :id', [
				        'avatar' => $name,
				        'id'     => $_SESSION['id']
			        ]);
                  	// On supprime l'ancienne image
			        if ($membre['avatar'] != 'default.png') {
			          unlink(ROOT.'/public/img/img_profils/' . $membre['avatar']);
			        }

			        $success['validation'] = 'Votre avatar a été mis à jours !';
			    }
			    else {
			        $erreur['avatar'] = 'Erreur lors de l\'envoi du fichier';
			    }
			}
	      
	      	$this->view('home/account', ['erreur' => $erreur, 'success' => $success, 'membre' => $membre, 'annonces' => $annonces, 'messages' => $messages]);
		}
		else {
			$erreur['avatar'] = 'Aucun fichier séléctionné !';

			$this->view('home/account', ['erreur' => $erreur, 'membre' => $membre]);
		}
    }
    // Modification des infos du profil
    public function updateProfil() {
    	if (!isset($_SESSION['id'])) {
     		header('Location: /');
    	}

    	$membre = $this->account_informations();

    	$annonces = DB::select('SELECT * FROM annonces WHERE post_id = ?', [$_SESSION['id']]);

		$messages = DB::select('SELECT * FROM messages WHERE send_to = ? ORDER BY id DESC', [$membre['pseudo']]);

	    if (!empty($_POST)) {
	        extract($_POST);
	        $erreur = [];
	        $success = [];
	        // Gestion des erreurs du formulaire
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
		        // modification du membre en bdd
		        DB::update('UPDATE member SET email = :email, region = :region, dpt = :dpt, description = :description WHERE id = :id', [
						'email'       => $email,
						'dpt'         => htmlspecialchars($dpt),
						'region'      => htmlspecialchars($region),
						'description' => htmlspecialchars($description),
						'id'          => $_SESSION['id']
	      		]);
		        
		        $success['validation'] = 'Votre profil a été mis à jours !';
	      	}
	      
	      	$this->view('home/account', ['erreur' => $erreur, 'success' => $success, 'membre' => $membre, 'annonces' => $annonces, 'messages' => $messages]);
	    }
    }
    // Modification du mdp
    public function updatePassword() {
    	if ( !isset( $_SESSION['id'] ) ) {
            header( 'Location: /' );
	    }

	    $membre = $this->account_informations();

	    $annonces = DB::select('SELECT * FROM annonces WHERE post_id = ?', [$_SESSION['id']]);

		$messages = DB::select('SELECT * FROM messages WHERE send_to = ? ORDER BY id DESC', [$membre['pseudo']]);

	    if (!empty($_POST)) {
		    extract($_POST);
		    $erreur = [];
		    $success = [];
		    // gestion des erreurs du formulaire
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

		    $this->view( 'home/account', ['erreur' => $erreur, 'success' => $success, 'membre' => $membre, 'annonces' => $annonces, 'messages' => $messages] );
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