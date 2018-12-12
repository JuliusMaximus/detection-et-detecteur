<?php
class Inscription extends Controller {
    public function index() {
        $this->view( 'home/inscription', []);
    }
    // Gestion inscription
    public function regist() {
        if (isset($_SESSION['id'])) {
            header('Location: /home/account.php');
        }
        
        if (!empty($_POST)) {
            extract($_POST);
            $erreur = [];
            $success = [];
            // Gestion des erreurs de formulaire
            if (empty($pseudo)) {
                $erreur['pseudo'] = 'Pseudo manquant !';
            }
            elseif (strlen($pseudo) < 3) {
                $erreur['pseudo'] = 'Pseudo trop court. 3 caractères min !';
            }
            elseif (!$this->pseudo_free()) {
                $erreur['pseudo'] = 'Ce pseudo est déjà utilisé !';
            }

            if (empty($email)) {
                $erreur['email'] = 'Adresse e-mail manquante !';
            }
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL )) {
                $erreur['email'] = 'Adresse e-mail invalide !';
            }
            elseif (!$this->mail_free()) {
                $erreur['email'] = 'Un compte existe déjà avec cette adresse e-mail !';
            }

            if (empty($dpt)) {
            $erreur['dpt'] = 'Veuillez séléctionner un département !';
            }

            if (empty($region)) {
                $erreur['region'] = 'Veuillez séléctionner une région !';
            }

            if (empty($passwordInscription)) {
                $erreur['password'] = 'Mot de passe manquant !';
            }
            elseif (strlen($passwordInscription) < 8) {
                $erreur['password'] = 'Le mot de passe est trop court. Min 8 caractères !';
            }

            if (empty($passwordConf)) {
                $erreur['passwordConf'] = 'Confirmation du mot de passe manquante !';
            }
            elseif ($passwordConf != $passwordInscription) {
                $erreur['passwordConf'] = 'Confirmation du mot de passe différente du mot de passe !';
            }

            if (!$erreur) {
                // insertion du membre en bdd
                DB::insert('INSERT INTO member (pseudo, email, dpt, region, password) VALUES (:pseudo, :email, :dpt, :region, :password)', [
                    'pseudo'   => htmlspecialchars($pseudo),
                    'email'    => $email,
                    'dpt'      => htmlspecialchars($dpt),
                    'region'   => htmlspecialchars($region),
                    'password' => password_hash($passwordInscription, PASSWORD_DEFAULT)
                ]);
            
                $success['validation'] = 'Inscription réussie !';
            }
      
            $this->view('home/inscription', ['erreur' => $erreur, 'success' => $success]);
        }
    }
    // Pour savoir si un compte existe déjà avec un email donné
    private function mail_free() : bool {
        $member = DB::select('SELECT id FROM member WHERE email = ?', [$_POST['email']]);

        if ($member) {
            return false;
        }

        else {
            return true;
        }
    }
    // Pour savoir si un compte existe déjà avec un pseudo donné
    private function pseudo_free() : bool {
        $member = DB::select('SELECT id FROM member WHERE pseudo = ?', [$_POST['pseudo']]);

        if ($member) {
           return false;
        }

        else {
           return true;
        }
    }
}
