<?php
class Region extends Controller {
    // Récupération et affichage des données au click sur une région
  	public function index( string $region ) {

  		$membres = DB::select('SELECT * FROM member WHERE region = ?', [$region]);
      		// Formatage de la date d'inscription pour chaque membre
            foreach ( $membres as $key => $membre ) {
            $date = date_create( $membre['created_at'] );
            $membres[$key]['created_at'] = date_format( $date, 'd/m/Y' );
    	}

  		$annonces = DB::select('SELECT * FROM annonces WHERE region = ? AND validated = 1', [$region]);
  		    // Formatage de la date pour chaque annonces
            foreach ( $annonces as $key => $annonce ) {
    	        $date = date_create( $annonce['created_at'] );
        	    $annonces[$key]['created_at'] = date_format( $date, 'd/m/Y' );
    	}

  		$assos = DB::select('SELECT * FROM assos WHERE region = ?', [$region]);

        $villes = DB::select('SELECT * FROM meteo_region WHERE region = ?', [$region]);

        $villes = explode(",", $villes[0]['villes']);


		$this->view( 'home/region', ['membres' => $membres, 'annonces' => $annonces, 'assos' => $assos, 'villes' => $villes]);
  	}
    // Gestion de l'envoi de message depuis la liste des membres de la région
    public function message() {
        if(!empty($_POST)) {
            extract($_POST);
            // Définition de l'expéditeur du msg
            $sender = DB::select('SELECT * FROM member WHERE id = ?', [$sendBy]);
            // Insertion du msg en BDD
            DB::insert('INSERT INTO messages (message, send_to, send_by) VALUES (:message, :sendTo, :sendBy)', [
                'message' => htmlspecialchars($message),
                'sendTo'  => htmlspecialchars($sendTo),
                'sendBy'  => htmlspecialchars($sender[0]['pseudo'])
            ]);

            header('Location: '.$url);
        }

    }    
}