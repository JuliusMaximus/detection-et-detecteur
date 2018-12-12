<?php
class Editer extends Controller {
	// récupération et affichage de l'annonce à modifier
    public function index( int $id ) {
    	if ( !isset($_SESSION['id']) ) {
    		header ( 'Location: /connexion' );
    	}

    	$annonce = DB::select( 'SELECT * FROM annonces WHERE id = ?', [$id] );
      
        $this->view( 'home/editer', ['annonce' => $annonce[0]] );
    }

    // Modification d'une annonce existante
	public function updateAnnonce( int $idAnnonce ) {
	    if ( !isset( $_SESSION['id'] ) ) {
	        header( 'Location: /connexion' );
	    }

	    $annonce = DB::select( 'SELECT * FROM annonces WHERE id = ?', [$idAnnonce] );
	    // Gestion des erreurs
	    if ( !$annonce ) {
	        header( 'Location: /account' );
	    }

	    if ( !empty( $_POST ) ) {
	        extract( $_POST );
	        $erreur = [];
	        $success = [];

		    if ( empty( $title ) ) {
		        $erreur['title'] = 'Titre obligatoire !';
		    }

		    if ( empty( $descAnnonce ) ) {
		        $erreur['descAnnonce'] = 'Description obligatoire !';
		    }

		    if ( empty( $price ) ) {
		        $erreur['price'] = 'Veuillez indiquer le prix !';
		    }

		    if ( !$erreur ) { // Si aucune erreur on modifie l'annonce
		        DB::update( 'UPDATE annonces SET title = :title, descAnnonce = :descAnnonce, price = :price, validated = 0 WHERE id = :id', [
					'title'       => htmlspecialchars( $title ),
					'descAnnonce' => htmlspecialchars( $descAnnonce ),
					'price'       => htmlspecialchars( $price ),
					'id'          => $idAnnonce
		        ] );
		       
		        $success['updateAnnonce'] = 'Vos modifications ont bien été transmisent et seront validées sous 24h max !';
		        $annonce = DB::select( 'SELECT * FROM annonces WHERE id = ?', [$idAnnonce] );
		    }
		    
		    $this->view( 'home/editer', [ 'erreur' => $erreur, 'success' => $success, 'annonce' => $annonce[0] ] );  
	    }
	}
	// Modification de la photo de l'annonce
	public function updatePicture( int $idAnnonce ) {
    	if (!isset($_SESSION['id'])) {
		    header('Location: /');
		}

		$annonce = DB::select( 'SELECT * FROM annonces WHERE id = ?', [$idAnnonce] );
		// on vérifie les eventuelles erreurs
		if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
			$erreur = [];
			$success = [];

		    if (!in_array($_FILES['picture']['type'], ['image/png', 'image/jpeg'])) {
		      $erreur['picture'] = 'Format incorrect (PNG et JPEG acceptés)';
		    }
		    elseif ($_FILES['picture']['size'] > 2048000) {
		      $erreur['picture'] = 'Image trop volumineuse (Max 2Mo)';
		    }

		  	if (!$erreur) {
			    $extension = str_replace('image/', '', $_FILES['picture']['type']);
			    $name = bin2hex(random_bytes(8)) . '.' .$extension;

			    if (move_uploaded_file($_FILES['picture']['tmp_name'], ROOT.'public/img/img_annonces/' . $name)) {
			        // mise à jour de la BDD et suppression ancienne image
			        DB::update('UPDATE annonces SET picture = :picture WHERE id = :id', [
			        'picture' => $name,
			        'id'     => $idAnnonce
			        ]);
                  	// on supprime l'ancienne photo
			        if ($annonce[0]['picture'] != 'annonce_default.jpg') {
			        	unlink(ROOT.'public/img/img_annonces/' . $annonce[0]['picture']);
			        }

			        $annonce = DB::select( 'SELECT * FROM annonces WHERE id = ?', [$idAnnonce] );

			        $success['updatePicture'] = 'Votre photo a été mis à jours !';
			    }
			    else {
			        $erreur['picture'] = 'Erreur lors de l\'envoi du fichier';
			    }
			}
	      
	      	$this->view( 'home/editer', ['erreur' => $erreur, 'success' => $success, 'annonce' => $annonce[0]] );
		}
		else {
			$erreur['picture'] = 'Aucun fichier séléctionné !';

			$this->view('home/editer', ['erreur' => $erreur, 'annonce' => $annonce[0]]);
		}
    }
}