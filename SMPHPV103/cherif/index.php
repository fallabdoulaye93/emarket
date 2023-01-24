<?php
/**
 * Created by PhpStorm.
 * User: papangom
 * Date: 10/22/19
 * Time: 12:52
 */

require_once 'tools_android.php';


if(isset($_POST['action']) && !empty($_POST['action'])){
    $action = trim(securite_xss($_POST['action']));

    if($action === 'login'){
        $login = trim(securite_xss($_POST['login']));
        $password = trim(securite_xss($_POST['password']));
        if($login != '' && $password != ''){
            echo login($login, $password);
            exit();
        }
        else{
            echo json_encode(array('errorCode' => 10091, 'errorMessage' => 'Merci de remplir tous les champs!', "res" => $_POST));
            exit();
        }
    }
    //récupérer les chargements d'un utilisateur en fonction de l'état
    else if($action === 'getChargementsByState'){
        $iduser = (int) trim(securite_xss($_POST['iduser']));
        $idrole = (int) trim(securite_xss($_POST['idrole']));
        $etat =  (int) trim(securite_xss($_POST['etat']));
        $idcampagne =  (int) trim(securite_xss($_POST['id_campagne']));


        if($iduser != 0 && $idrole != 0 ) {
            echo getChargementsByState($idrole, $iduser , $etat, $idcampagne);
            exit();
        }
        else {
            echo json_encode(array('errorCode' => 1001, 'errorMessage' => 'role, id ou état du chargement manquant', "res" => $_POST));
        }
    }
    //Enregistrement d'une nouvelle cargaison en fonction du profil d'utilisateur
    else if($action === 'newChargement'){
        $idrole = (int) trim(securite_xss($_POST['idrole']));
        $type_produit = trim(securite_xss($_POST['type_produit']));
        $poids = (int) trim(securite_xss($_POST['poids']));
        $nombre_sacs = (int) trim(securite_xss($_POST['nombre_sacs'])); 
        $valeur = (float) trim(securite_xss($_POST['valeur']));
        $immatriculation_vehicule = trim(securite_xss($_POST['immatriculation_vehicule'])); 
        $nom_chauffeur = trim(securite_xss($_POST['nom_chauffeur'])); 
        $tel_chauffeur = trim(securite_xss($_POST['tel_chauffeur'])); 
        $cooperative = (int) trim(securite_xss($_POST['idcooperative'])); 
        $campagne = (int) trim(securite_xss($_POST['idcampagne']));
        $tags =  explode("|", trim(securite_xss($_POST['tags'])));

        //si l'utilisateur est un pisteur
        if($idrole === 300){
            $pisteur =  (int) trim(securite_xss($_POST['iduser'])); 
            $village = (int) trim(securite_xss($_POST['idvillage']));

            if($idrole != 0 && $type_produit != '' && $poids != 0 && $nombre_sacs != 0 && $valeur != 0 && $immatriculation_vehicule != '' && $nom_chauffeur != '' && $tel_chauffeur != '' && $cooperative != 0 && $campagne != 0 && $village != 0 && $pisteur != 0) {
                echo insertChargementImportation($type_produit, $poids, $nombre_sacs, $valeur, $immatriculation_vehicule, $nom_chauffeur, $tel_chauffeur, $village, $cooperative, $campagne, $pisteur, $tags);
                exit();
            }
            else {
                echo json_encode(array('errorCode' => 1001, 'errorMessage' => 'champs manquants, remplir tous les champs', "res" => $_POST));
            }
        }
        //si l'utilisateur est un pisteur
        else if($idrole === 400) {
            $operateur = (int) trim(securite_xss($_POST['iduser'])); 
            $destination_finale = (int) trim(securite_xss($_POST['iddestinationfinale']));

            if($idrole != 0 && $type_produit != '' && $poids != 0 && $nombre_sacs != 0 && $valeur != 0 && $immatriculation_vehicule != '' && $nom_chauffeur != '' && $tel_chauffeur != '' && $cooperative != 0 && $campagne != 0 && $destination_finale != 0 && $operateur != 0) {
                echo insertChargementExportation($type_produit, $poids, $nombre_sacs, $valeur, $immatriculation_vehicule, $nom_chauffeur, $tel_chauffeur, $cooperative, $destination_finale,  $campagne, $operateur, $tags);
                exit();
            }
            else {
                echo json_encode(array('errorCode' => 1001, 'errorMessage' => 'champs manquants, remplir tous les champs', "res" => $_POST));
            }
        }

    }
    //récupération des informations d'une cargaison en fonction du numéro de téléphone du chauffeur
    else if($action === 'getChargementByTelChauffeur'){
        $idrole = (int) trim(securite_xss($_POST['idrole']));
        $tel_chauffeur = trim(securite_xss($_POST['tel_chauffeur']));

        if($idrole != 0 && $tel_chauffeur != '') {
            echo getChargementByTelChauffeur($idrole, $tel_chauffeur);
            exit();
        }
        else {
            echo json_encode(array('errorCode' => 1001, 'errorMessage' => 'champs manquants, remplir tous les champs', "res" => $_POST));
        }
    }
    else if($action === 'getHistoriqueAffectationTags') {
        $iduser = (int) trim(securite_xss($_POST['iduser']));

        if($iduser != 0) {
            echo getHistoriqueAffectationTags($iduser);
            exit();
        }
        else {
            echo json_encode(array('errorCode' => 1001, 'errorMessage' => 'iduser manquant', "res" => $_POST));
        }
    }

    else if($action === 'getHistoriqueAffectationTagsCCC') {
            echo getHistoriqueAffectationTagsCCC();
            exit();
    }
    //réception cargaison par l'opérateur ou le destinataire final
    else if($action === 'receptionChargement') {
        $iduser = (int) trim(securite_xss($_POST['iduser']));
        $idrole = (int) trim(securite_xss($_POST['idrole']));
        $idchargement = (int) trim(securite_xss($_POST['idchargement']));

        if($iduser != 0 && $idrole != 0 && $idchargement != 0) {
            echo receptionChargement($idchargement, $idrole, $iduser);
            exit();
        }
        else {
            echo json_encode(array('errorCode' => 1001, 'errorMessage' => 'iduser ou idrole ou idchargement manquant', "res" => $_POST));
        }
    }
    //pourcentage de chargement en cours sur total dans une campagne
    else if($action === 'getStatsChargementEncours') {
        $iduser = (int) trim(securite_xss($_POST['iduser']));
        $idrole = (int) trim(securite_xss($_POST['idrole']));
        $idcampagne = (int) trim(securite_xss($_POST['idcampagne']));

        if($iduser != 0 && $idrole != 0 && $idcampagne != 0) {
            echo getStatsChargementEncours($idrole, $iduser, $idcampagne);
            exit();
        }
        else {
            echo json_encode(array('errorCode' => 1001, 'errorMessage' => 'iduser ou idcampagne ou idrole manquant', "res" => $_POST));
        }
    }
    //quantité de produit par type dans une campagne pour un utilisateur donné
    else if($action === 'getStatsByTypeCampagne') {
        $iduser = (int) trim(securite_xss($_POST['iduser']));
        $idrole = (int) trim(securite_xss($_POST['idrole']));
        $idcampagne = (int) trim(securite_xss($_POST['idcampagne']));

        if($iduser != 0 && $idrole != 0 && $idcampagne != 0) {
            echo getStatsByTypeCampagne($idrole, $iduser, $idcampagne);
            exit();
        }
        else {
            echo json_encode(array('errorCode' => 1001, 'errorMessage' => 'iduser ou idcampagne ou idrole manquant', "res" => $_POST));
        }
    }
    //quantité de produit par type et les villages (pour le pisteur) ou les destinations (pour l'opérateur)
    else if($action === 'getStatsByTypeVillage') {
        $iduser = (int) trim(securite_xss($_POST['iduser']));
        $idrole = (int) trim(securite_xss($_POST['idrole']));

        if($iduser != 0 && $idrole != 0) {
            echo getStatsByTypeVillage($idrole, $iduser);
            exit();
        }
        else {
            echo json_encode(array('errorCode' => 1001, 'errorMessage' => 'iduser ou idcampagne ou idrole manquant', "res" => $_POST));
        }
    }
    //récupérer détails d'un chargement en fonction de son id
    //Annuler car fait par Abdoulaye
    /*else if($action === 'getDetailsChargement'){
        $idrole = (int) trim(securite_xss($_POST['idrole']));
        $idchargement = (int) trim(securite_xss($_POST['idchargement']));

        if($idrole != 0 && $idchargement != 0) {
                echo getDetailsChargement($idrole, $idchargement);
                exit();
            }
    }*/
    else{
        echo json_encode(array('errorCode' => 1000, 'errorMessage' => 'Action not autorisée!'));
        exit();
    }

}
else{
    echo json_encode(array('errorCode' => 1000, 'errorMessage' => 'Action not reconnue!'));
    exit();
}

