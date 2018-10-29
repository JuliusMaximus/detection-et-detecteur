<?php
class Meteo extends Controller {
    public function index() {
    	if (!empty($_POST)) {
    		extract($_POST);

    		$json = file_get_contents('http://www.prevision-meteo.ch/services/json/'.$ville);
			$json = json_decode($json, TRUE);
			
        	$this->view( 'home/meteo', ['json'=>$json] );
    	}
    }
}