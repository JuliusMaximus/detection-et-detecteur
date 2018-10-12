<?php
class Annonces extends Controller {
    public function index() {
        $this->view( 'home/annonces', [] );
    }
  
    public function dropAnAds() {
        $membre = DB::select('SELECT * FROM member WHERE id = ?', [$_SESSION['id']]);

        if ( !empty( $_POST ) ) {
            extract( $_POST );
            $erreur = [];
            $success = [];
            // Gestion des erreurs du formulaire
            if (empty($title)) {
              $erreur['title'] = 'Titre manquant !';
            }

            if ( empty( $descAnnonce ) ) {
              $erreur['descAnnonce'] = 'Description manquante !';
            }

            if (empty($price)) {
          	  $erreur['price'] = 'Veuillez préciser un prix !';
          	}

            if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) { 
                if (!in_array($_FILES['picture']['type'], ['image/png', 'image/jpeg'])) {
                  $erreur['picture'] = 'Format incorrect (PNG et JPEG acceptés)';
                }
                elseif ($_FILES['picture']['size'] > 2048000) {
                  $erreur['picture'] = 'Image trop volumineuse (Max 2Mo)';
                }
            }

            if ( !$erreur ) { 
                $extension = str_replace('image/', '', $_FILES['picture']['type']);
                $name = bin2hex(random_bytes(8)) . '.' .$extension;

                if (move_uploaded_file($_FILES['picture']['tmp_name'], ROOT.'public/img/img_annonces/' . $name)) {
                    // insertion de l'annonce en BDD
                    DB::insert('INSERT INTO annonces (post_id, pseudo, title, descAnnonce, price, picture, region, dpt) VALUES (:post_id, :pseudo, :title, :descAnnonce, :price, :picture, :region, :dpt)', [
                      'post_id'     => $membre[0]['id'],
                      'pseudo'      =>  $membre[0]['pseudo'],
                      'title'       => htmlspecialchars($title),
                      'descAnnonce' => htmlspecialchars($descAnnonce),
                      'price'       => htmlspecialchars($price),
                      'picture'     => $name,
                      'region'      => $membre[0]['region'],
                      'dpt'         => $membre[0]['dpt']
                    ]);

                    $success['validation']= 'Votre annonces a bien été soumise et sera publiée dans les 24h !';
                  }
                  else {
                    $erreur['send'] = 'Erreur lors de l\'envoi du fichier';
                  }
            }
            // Transmition des données à la vue
            $this->view( 'home/annonces', ['erreur' => $erreur, 'success' => $success] );
  	    } 
    }
}