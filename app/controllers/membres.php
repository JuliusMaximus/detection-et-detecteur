<?php
class Membres extends Controller {
	// Récupération et affichage de la liste des membres dans l'admin
    public function index( int $id = 1 ) {
    	if ( !isset($_SESSION['admin']) ) {
    		header( 'Location: /connexion' );
    	}

    	// pagination de la liste des annoncess
	    $perPage = 10;
	    $total = DB::selectAndCount( 'SELECT id FROM member' ); // récupération du nombre de ligne
	    $pagesTotal = ceil( $total/$perPage ); // calcule du nombre de page
	    // définition de la page courante
	    if( isset( $id ) && !empty( $id) &&  $id > 0 &&  $id <= $pagesTotal ) {
	        $currentPage =  $id;
	    } else {
	        $currentPage = 1;
	    }
	    // définition du premier membre de la page
	    $start = ( $currentPage - 1 ) * $perPage;
	    // Récupération des membres suivant la page demandée
	    $membres = DB::selectWithLimit( 'SELECT * FROM member ORDER BY id DESC LIMIT :start, :perPage', $start, $perPage );

    	// Formatage de la date et du retour à ligne
        foreach ( $membres as $key => $membre ) {
        	$date = date_create( $membre['created_at'] );
        	$membres[$key]['created_at'] = date_format( $date, 'd/m/Y' );
      		$membres[$key]['description'] = nl2br( $membre['description'] );
    	}
    	// Transmition à la vue
      	$this->view( 'admin/membres', ['membres' => $membres, 'currentPage' => $currentPage, 'pagesTotal' => $pagesTotal] );
    }

	// Suppression d'un membre via la liste
	public function deleteMember( int $idMember ) {
	    if ( !isset( $_SESSION['admin'] ) ) {
	        header( 'Location: /connexion' );
	    }

	    DB::delete( 'DELETE FROM member WHERE id = ?', [$idMember]);

	    header( 'Location: /membres' );
	}
}