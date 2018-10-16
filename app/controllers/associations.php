<?php
class Associations extends Controller {
    public function index( int $id = 1 ) {
    	if ( !isset($_SESSION['admin']) ) {
    		header( 'Location: /connexion' );
    	}

    	// pagination de la liste des annoncess
	    $perPage = 10;
	    $total = DB::selectAndCount( 'SELECT id FROM assos' ); // récupération du nombre de ligne
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
	    $assos = DB::selectWithLimit( 'SELECT * FROM assos ORDER BY id DESC LIMIT :start, :perPage', $start, $perPage );

      	$this->view( 'admin/associations', ['assos' => $assos, 'currentPage' => $currentPage, 'pagesTotal' => $pagesTotal] );
    }

	// Suppression d'une annonce
	public function deleteAssos( int $idAssos ) {
	    if ( !isset( $_SESSION['admin'] ) ) {
	        header( 'Location: /connexion' );
	    }

	    DB::delete( 'DELETE FROM assos WHERE id = ?', [$idAssos]);

	    header( 'Location: /associations' );
	}

	public function insertAssos() {
		if ( !isset($_SESSION['admin']) ) {
		  header( 'Location: /connexion' );
		}

		if ( !empty( $_POST ) ) {
	        extract( $_POST );

	        DB::insert( 'INSERT INTO assos (title, adress, phone, net, email, region) VALUES (:title, :adress, :phone, :net, :email, :region)', [
				'title'  => htmlspecialchars($title),
				'adress' => htmlspecialchars($adress),
				'phone'  => htmlspecialchars($phone),
				'net'    => htmlspecialchars($net),
				'email'  => htmlspecialchars($email),
				'region' => htmlspecialchars($region)
	        ] );

	        header( 'Location: /associations' );
	    }
	}
}