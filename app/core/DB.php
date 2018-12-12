<?php
// Gestion de la communication avec la BDD
class DB extends PDO {
    const DSN = 'mysql:host=localhost;dbname=bdd-detection';
    const USER = 'root';
    const PASSWORD = '';

    public function __construct() {
        try {
            parent::__construct( self::DSN, self::USER, self::PASSWORD );
        }
        catch ( PDOException $e ) {
             die( 'Erreur : ' . $e->getMessage() );
        }
    }
    // Gère les requètes SELECT
    public static function select ( string $query, array $params = [] ) : array {
        $bdd = new DB;

        if ( $params ) {
            $req = $bdd->prepare( $query );
            $req->execute( $params );
        }
        else {
            $req = $bdd->query( $query );
        }

        $data = $req->fetchAll();

        return $data;
    }
    // Gère les requètes SELECT avec option LIMIT pour la pagination
    public static function selectWithLimit ( string $query, int $start, int $perPage, int $id = NULL ) : array {
        $bdd = new DB;

        if (isset( $id )) {
            $req = $bdd->prepare( $query );
            $req->bindValue('start', $start, PDO::PARAM_INT);
            $req->bindValue('perPage', $perPage, PDO::PARAM_INT);
            $req->bindValue('id', $id);
            $req->execute();
        }
        else {
            $req = $bdd->prepare( $query );
            $req->bindValue('start', $start, PDO::PARAM_INT);
            $req->bindValue('perPage', $perPage, PDO::PARAM_INT);
            $req->execute();
        }

        $data = $req->fetchAll();

        return $data;
    }
    // Gère les requètes SELECT avec retour du nombre d'entrée
    public static function selectAndCount ( string $query, array $params = [] ) : int {
        $bdd = new DB;

        if ( $params ) {
            $req = $bdd->prepare( $query );
            $req->execute( $params );
        }
        else {
            $req = $bdd->query( $query );
        }
        
        $result = $req->fetchAll();
        $row = count( $result );

        return $row;
    }
    // Gère les requètes UPDATE
    public static function update ( string $query, array $params = [] ) : int {
        $bdd = new DB;

        if ( $params ) {
            $req = $bdd->prepare( $query );
            $req->execute( $params );

        }
        else {
            $req = $bdd->query( $query );
        }
        
        $updated = $req->rowCount();

        return $updated;
    }
    // Gère les requètes INSERT
    public static function insert ( string $query, array $params = [] ) : int {
        $bdd = new DB;

        if ( $params ) {
            $req = $bdd->prepare( $query );
            $req->execute( $params );
        }
        else {
            $req = $bdd->query( $query );
        }

        $inserted = $req->rowCount();

        return $inserted;
    }
    // Gère les requètes DELETE
    public static function delete ( string $query, array $params = [] ) : int {
        $bdd = new DB;

        if ( $params ) {
            $req = $bdd->prepare( $query );
            $req->execute( $params );
        }
        else {
            $req = $bdd->query( $query );
        }

        $deleted = $req->rowCount();

        return $deleted;
    }
}
