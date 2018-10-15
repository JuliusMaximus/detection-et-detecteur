<?php
class Region extends Controller {
  	public function index( string $region ) {

  		$membres = DB::select('SELECT * FROM member WHERE region = ?', [$region]);
  		// Formatage de la date d'inscription pour chaque membre
        foreach ( $membres as $key => $membre ) {
        	$date = date_create( $membre['created_at'] );
        	$membres[$key]['created_at'] = date_format( $date, 'd/m/Y' );
    	}

  		$annonces = DB::select('SELECT * FROM annonces WHERE region = ?', [$region]);
  		// Formatage de la date pour chaque annonces
        foreach ( $annonces as $key => $annonce ) {
        	$date = date_create( $annonce['created_at'] );
        	$annonces[$key]['created_at'] = date_format( $date, 'd/m/Y' );
    	}

  		$assos = DB::select('SELECT * FROM assos WHERE region = ?', [$region]);

		$this->view( 'home/region', ['membres' => $membres, 'annonces' => $annonces, 'assos' => $assos]);
  	}
}