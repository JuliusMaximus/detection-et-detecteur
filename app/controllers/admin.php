<?php
class Admin extends Controller {
	// Construction de la page d'administration
    public function index( int $id = 1 ) {
    	if ( !isset($_SESSION['admin']) ) {
    		header( 'Location: /connexion' );
    	}

    	// pagination de la liste des annoncess
	    $perPage = 10;
	    $total = DB::selectAndCount( 'SELECT id FROM annonces' ); // récupération du nombre de ligne
	    $pagesTotal = ceil( $total/$perPage ); // calcule du nombre de page
	    // définition de la page courante
	    if( isset( $id ) && !empty( $id) &&  $id > 0 &&  $id <= $pagesTotal ) {
	        $currentPage =  $id;
	    } else {
	        $currentPage = 1;
	    }
	    // définition du premier commentaire de la page
	    $start = ( $currentPage - 1 ) * $perPage;
	    // Récupération des annoncess suivant la page demandée
	    $annonces = DB::selectWithLimit( 'SELECT * FROM annonces ORDER BY validated, id DESC LIMIT :start, :perPage', $start, $perPage );

    	// Formatage de la date et du retour à ligne
        foreach ( $annonces as $key => $annonce ) {
        	$date = date_create( $annonce['created_at'] );
        	$annonces[$key]['created_at'] = date_format( $date, 'd/m/Y' );
      		$annonces[$key]['descAnnonce'] = nl2br( $annonce['descAnnonce'] );
    	}

    	$membres = DB::select( 'SELECT id from member', [] );

      	$this->view( 'admin/index', ['annonces' => $annonces, 'membres' => $membres, 'currentPage' => $currentPage, 'pagesTotal' => $pagesTotal] );
    }

    // Déconnexion de l'espace d'administration
	public function deconnexion() {
	    if ( !isset( $_SESSION['admin'] ) ) {
	        header( 'Location: /connexion' );
	    }
	    // On supprime toutes les données de session et on redirige vers la page de connexion
	    $_SESSION = [];

	    if ( ini_get("session.use_cookies") ) {
	        $params = session_get_cookie_params();
	        setcookie( session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	        );
	    }

	    session_destroy();

	    header( 'Location: /connexion' );
	}

	// Suppression d'une annonce
	public function deleteAnnonce( int $idAnnonce ) {
	    if ( !isset( $_SESSION['admin'] ) ) {
	        header( 'Location: /connexion' );
	    }

	    $annonce = DB::select( 'SELECT picture from annonces where id = ?', [$idAnnonce] );

	    unlink( ROOT . 'public/img/img_annonces' . $annonce[0]['picture'] ); // suppression de l'image

	    DB::delete( 'DELETE FROM annonces WHERE id = ?', [$idAnnonce]);

	    header( 'Location: /admin' );
	}

	// Validation des annonces
    public function validate( int $id ) {
	    if ( !isset( $_SESSION['admin'] ) ) {
	      header( 'Location: /connexion' );
	    }
	    else {
	      DB::update( 'UPDATE annonces SET validated = 1 WHERE post_id = ?', [$id] );

	      header( 'Location: /admin ');
	    }
    }
}