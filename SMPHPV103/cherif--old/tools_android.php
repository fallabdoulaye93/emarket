<?php
/**
 * Created by PhpStorm.
 * User: papangom
 * Date: 10/22/19
 * Time: 12:18
 */
header("Content-Type: text/plain");
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Africa/Dakar');
ini_set('display_errors', 1);
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Credentials: true');
    header("Access-Control-Allow-Methods: GET, POST");
    header('Access-Control-Allow-Headers: Keep-Alive,User-Agent,X-Requested-With,Cache-Control,Content-Type,X-Authorization');    // cache for 1 day
}


// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}



function Connection()
{

    $conn = NULL;
    try {
        $conn = new PDO("mysql:host=mysql-layefall93.alwaysdata.net;dbname=layefall93_elephant2025", "221763_root", "rootCLINIC");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    } catch (PDOException $e) {
        return $e;
    }


}

function securite_xss($string)
{
    $string = htmlspecialchars($string, ENT_QUOTES);
    $string = strip_tags($string);
    return $string;
}

/*
function login($login, $password){
    try{
        $dbh = Connection();
        //var_dump($dbh);die();
        $sql = "SELECT u.* FROM utilisateur u WHERE u.identifiant = :login AND password = :mypass";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue('login', $login);
        $stmt->bindValue('mypass', $password);
        $stmt->execute();
        if($stmt->rowCount() === 1){
            $user = $stmt->fetchObject();
            if($user->etat == 'actif'){
                if($user->type == 3) {
                    if ($user->password === sha1($password)) {
                        $infosrole = getRole($user->id_role);

                        if (is_object($infosrole)) {
                            return json_encode(array('errorCode' => 0, 'errorMessage' => '', 'id' => $user->id, 'prenom' => $user->prenom, 'nom' => $user->nom, 'matricule' => $user->matricule, 'gie' => $user->nomgie, 'idgie' => $affectation->idgie, 'idbus' => $affectation->bus_id));
                        }
                    } else {
                        //Mot de passe incorrect
                        return json_encode(array('errorCode' => 11, 'errorMessage' => 'Mot de passe incorrect', 'u' => $user));
                    }
                }
                else{
                    return json_encode(array('errorCode' => 100, 'errorMessage' => 'Profil non autorisé'));
                }
            }
            else{
                //Utilisateur inactive
                return json_encode(array('errorCode' => 10, 'errorMessage' => 'Utilisateur inactive'));
            }
        }
        else if($stmt->rowCount() > 1){
            //Login dupliqué
            return json_encode(array('errorCode' => 9, 'errorMessage' => 'Login dupliqué'));
        }
        else{
            //Erreur sql
            return json_encode(array('errorCode' => 8, 'errorMessage' => 'Login ou mot de passe incorrect'));
        }
    }
    catch (PDOException $e){
        return json_encode(array('errorCode' => 6, 'errorMessage' => 'Erreur sql='.$e));
    }
}

function genererTicket($numtransac, $uuid, $iduser, $nbre_section, $montant, $idbus, $trajet, $gie, $section_courante, $date){

    $etat = 1;
    try{
        $dbh = Connection();
        $sql = "INSERT INTO `transaction`(`num_transaction`, `date`, `receveur`, `bus`, `trajet`, `ticket`, `etat`, `montant`, `numGIE`, `nombre_section`, `section_courante`, `uuid`) VALUES (:num_transaction, :date_creation, :receveur, :bus, :trajet, :ticket, :etat, :montant, :numGIE, :nombre_section, :section_courante, :uuid)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue('num_transaction', $numtransac);
        $stmt->bindValue('date_creation', $date);
        $stmt->bindValue('receveur', $iduser);
        $stmt->bindValue('bus', $idbus);
        $stmt->bindValue('trajet', $trajet);
        $stmt->bindValue('ticket', $nbre_section);
        $stmt->bindValue('etat', $etat);
        $stmt->bindValue('montant', $montant);
        $stmt->bindValue('numGIE', $gie);
        $stmt->bindValue('nombre_section', $nbre_section);
        $stmt->bindValue('section_courante', $section_courante);
        $stmt->bindValue('uuid', $uuid);
        return $stmt->execute();
    }
    catch (PDOException $e){
        return $e;
    }
}

function genererNumTransaction(){
    do{
        $num = mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9);
        try{
            $dbh = Connection();
            $sql = "SELECT id FROM `transaction` WHERE `num_transaction` = :num_transaction";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('num_transaction', $num);
            $stmt->execute();
        }
        catch (PDOException $e){
            $num = -1;
        }
    }
    while($stmt->rowCount() > 0);
    return $num;

}
*/

// fonction qui permet de créer un nouveau chargement d'un village à une coopérative
function insertChargementImportation($type_produit, $poids, $nombre_sacs, $valeur, $immatriculation_vehicule, $nom_chauffeur, $tel_chauffeur, $village, $cooperative, $campagne, $pisteur, $tags){
    $etat_chargement = 0;
    $date_chargement = date('Y-m-d H:i:s');
    $date_depart = date('Y-m-d H:i:s') ;

    try {
        $dbh = Connection();
        $sql = "INSERT INTO `importation_chargement`(`date_chargement`, `date_depart`, `etat_chargement`, `nom_chauffeur`, `nombre_sac`, `num_immatriculation_vehicule`, `num_tel_chauffeur`, `poids`, `type`, `valeur`, `id_campagne`, `id_village_depart`, `id_pisteur`) VALUES (:date_chargement, :date_depart, :etat_chargement, :nom_chauffeur, :nombre_sac, :num_immatriculation_vehicule, :num_tel_chauffeur, :poids, :type_produit, :valeur, :id_campagne, :id_village_depart, :id_pisteur)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue('date_chargement', $date_chargement);
        $stmt->bindValue('date_depart', $date_depart);
        $stmt->bindValue('etat_chargement', $etat_chargement);
        $stmt->bindValue('nom_chauffeur', $nom_chauffeur);
        $stmt->bindValue('nombre_sac', $nombre_sacs);
        $stmt->bindValue('num_immatriculation_vehicule', $immatriculation_vehicule);
        $stmt->bindValue('num_tel_chauffeur', $tel_chauffeur);
        $stmt->bindValue('poids', $poids);
        $stmt->bindValue('type_produit', $type_produit);
        $stmt->bindValue('valeur', $valeur);
        $stmt->bindValue('id_campagne', $campagne);
        $stmt->bindValue('id_village_depart', $village);
        $stmt->bindValue('id_pisteur', $pisteur);
        $stmt->execute();
        $idchargement = $dbh->lastInsertId();

        foreach ($tags as $tag){
            $sql2 = "UPDATE tags SET id_chargement = :idchargement WHERE serial = :serial_number";
            $stmt2 = $dbh->prepare($sql2);
            $stmt2->bindValue('idchargement', $idchargement);
            $stmt2->bindValue('serial_number', $tag);
            $stmt2->execute();
        }
        return 1;
    }
    catch (PDOException $e){
        return $e;
    }
}


// fonction qui permet de créer un nouveau chargement d'une coopérative à une destination finale
function insertChargementExportation($type_produit, $poids, $nombre_sacs, $valeur, $immatriculation_vehicule, $nom_chauffeur, $tel_chauffeur, $cooperative, $destination_finale,  $campagne, $operateur, $tags){
    $etat_chargement = 0;
    $etat_chargement = 0;
    $date_chargement = date('Y-m-d H:i:s');
    $date_depart = date('Y-m-d H:i:s') ;

    try {
        $dbh = Connection();
        $sql = "INSERT INTO `exportation_chargement`(`date_chargement`, `date_depart`, `etat_chargement`, `nom_chauffeur`, `nombre_sac`, `num_immatriculation_vehicule`, `num_tel_chauffeur`, `poids`, `type`, `valeur`, `id_campagne`, `id_destination_finale`, `id_operateur`) VALUES (:date_chargement, :date_depart, :etat_chargement, :nom_chauffeur, :nombre_sac, :num_immatriculation_vehicule, :num_tel_chauffeur, :poids, :type_produit, :valeur, :id_campagne, :id_destination_finale, :id_operateur)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue('date_chargement', $date_chargement);
        $stmt->bindValue('date_depart', $date_depart);
        $stmt->bindValue('etat_chargement', $etat_chargement);
        $stmt->bindValue('nom_chauffeur', $nom_chauffeur);
        $stmt->bindValue('nombre_sac', $nombre_sacs);
        $stmt->bindValue('num_immatriculation_vehicule', $immatriculation_vehicule);
        $stmt->bindValue('num_tel_chauffeur', $tel_chauffeur);
        $stmt->bindValue('poids', $poids);
        $stmt->bindValue('type_produit', $type_produit);
        $stmt->bindValue('valeur', $valeur);
        $stmt->bindValue('id_campagne', $campagne);
        $stmt->bindValue('id_destination_finale', $destination_finale);
        $stmt->bindValue('id_operateur', $operateur);
        $stmt->execute();
        $idchargement = $dbh->lastInsertId();

        foreach ($tags as $tag){
            $sql2 = "UPDATE tags SET id_chargement = :idchargement WHERE serial = :serial_number";
            $stmt2 = $dbh->prepare($sql2);
            $stmt2->bindValue('idchargement', $idchargement);
            $stmt2->bindValue('serial_number', $tag);
            $stmt2->execute();
        }
        return 1;
    }
    catch (PDOException $e){
        return $e;
    }
}


//fonction qui permet de lister l'ensemble des chargements en cours d'un utilisateur
function getChargementsByState($idrole, $userid, $etat, $idcampagne) {
        try {
            $dbh = Connection();
            if($idrole === 300){
                $sql = "SELECT * FROM importation_chargement WHERE id_pisteur = :pisteur AND etat_chargement = :etat AND id_campagne = :idcampagne ";
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue('pisteur', $userid);
                $stmt->bindValue('etat', $etat);
                $stmt->bindValue('idcampagne', $idcampagne);

                $stmt->execute();
            
            if($stmt->rowCount() === 0){
                return json_encode(array('errorCode' => 1, 'errorMessage' => 'Pas de Chargement pour cet utilisateur'));
            }
            else {
                $chargements = $stmt->fetchAll();
                return json_encode(array('errorCode' => 0, 'errorMessage' => '' , 'chargements' => $chargements ));
            }
            } else if($idrole === 400){
                $sql = 'SELECT * FROM exportation_chargement WHERE id_operateur = :operateur AND etat_chargement = :etat ';
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue('operateur', $userid);
                $stmt->bindValue('etat', $etat);

                $stmt->execute();
            
            if($stmt->rowCount() === 0){
                return json_encode(array('errorCode' => 1, 'errorMessage' => 'Pas de Chargement pour cet utilisateur'));
            }
            else {
                $chargements = $stmt->fetchAll();
                return json_encode(array('errorCode' => 0, 'errorMessage' => '' , 'chargements_encours' => $chargements ));
            }
            }           
            
        }
        catch(PDOException $e){
            return json_encode(array('errorCode' => 5, 'errorMessage' => 'Erreur sql='.$e));
        }    
}

//function qui permet d'avoir les détails d'un chargement en donnant comme paramètre son id et le role de l'utilisateur (opérateur ou pisteur)
function getDetailsChargement($idrole, $idchargement) {
    try {
        $dbh = Connection();
        if($idrole === 300){
            $sql = "SELECT c.* FROM importation_chargement c  WHERE id_chargement = :idchargement ";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('idchargement', $idchargement);

            $stmt->execute();
        
        if($stmt->rowCount() === 1){
            $chargement = $stmt-> fetchObject();
            return json_encode(array('errorCode' => 0, 'errorMessage' => 'Chargement trouvé' , 'chargement' => $chargement));
            }
        else {
            return json_encode(array('errorCode' => 4, 'errorMessage' => 'Erreur sur id du chargement'));
            }
        }
    }
    catch(PDOException $e){
        return json_encode(array('errorCode' => 5, 'errorMessage' => 'Erreur sql='.$e));
    }    

}

//fonction qui permet de récupérer les informations de la cargaison en fonction du numéro de téléphone du chauffeur
function getChargementByTelChauffeur($idrole, $tel_chauffeur) {
    try {
        $dbh = Connection();
        if($idrole === 400){
            $sql = "SELECT c.*, v.*, CONCAT(u.prenom,' ', u.nom) as pisteur, u.telephone, u.matricule, d.code_cooperative, d.nom_cooperative FROM importation_chargement c INNER JOIN village v ON v.id_village = c.id_village_depart INNER JOIN utilisateur u ON u.id_utilisateur = c.id_pisteur INNER JOIN cooperative d ON d.id_cooperative = u.id_cooperative WHERE c.etat_chargement = 0 AND c.num_tel_chauffeur = :tel_chauffeur ";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('tel_chauffeur', $tel_chauffeur);

            $stmt->execute();
        
        if($stmt->rowCount() === 1){
            $chargement = $stmt-> fetchObject();
            return json_encode(array('errorCode' => 0, 'errorMessage' => 'Chargement trouvé' , 'chargement' => $chargement));
            }
            else if($stmt->rowCount() > 1){
                return json_encode(array('errorCode' => 2, 'errorMessage' => 'Plusieurs cargaisons en cours avec le même chauffeur'));
            }
            else {
                return json_encode(array('errorCode' => 4, 'errorMessage' => 'Erreur sur id du chargement'));
                }
        }
        else if($idrole === 700){
            $sql = "SELECT c.*, v.*, concat(u.prenom,' ', u.nom) as operateur, u.telephone, u.matricule, d.code_cooperative, d.nom_cooperative FROM exportation_chargement c INNER JOIN destination_finale v ON v.id_destinataire_finale = c.id_destination_finale INNER JOIN utilisateur u ON u.id_utilisateur = c.id_operateur INNER JOIN cooperative d ON d.id_cooperative = u.id_cooperative WHERE c.etat_chargement = 0 AND c.num_tel_chauffeur = :tel_chauffeur";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('tel_chauffeur', $tel_chauffeur);

            $stmt->execute();
        
        if($stmt->rowCount() === 1){
            $chargement = $stmt-> fetchObject();
            return json_encode(array('errorCode' => 0, 'errorMessage' => 'Chargement trouvé' , 'chargement' => $chargement));
            }
            else if($stmt->rowCount() > 1){
                return json_encode(array('errorCode' => 2, 'errorMessage' => 'Plusieurs cargaisons en cours avec le même chauffeur'));
            }
            else {
                return json_encode(array('errorCode' => 4, 'errorMessage' => 'Erreur sur id du chargement'));
                }
        }
    }
    catch(PDOException $e){
        return json_encode(array('errorCode' => 5, 'errorMessage' => 'Erreur sql='.$e));
    }    

}

//fonction qui permet de récupérer l'historique des affectations de sacs d'un utilisateur en fonction de son id
function getHistoriqueAffectationTags($iduser) {
    try {
        $dbh = Connection();
            $sql = "SELECT h.id, h.date_affectation, concat(u.prenom, ' ', u.nom, ' (',r.libelle,')') as affectea, p.nom_cooperative, t.numlot, COUNT(h.id_tag) as nombre_sacs FROM historique_affectation_tag h INNER JOIN utilisateur u ON u.id_utilisateur = h.id_user_affecte INNER JOIN role r ON r.id_role = u.id_role INNER JOIN tags t ON t.id = h.id_tag LEFT JOIN cooperative p ON p.id_cooperative = u.id_cooperative WHERE h.user_crea = :iduser GROUP BY h.id_user_affecte , t.numlot";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('iduser', $iduser);

            $stmt->execute();
            if($stmt->rowCount() === 0){
                return json_encode(array('errorCode' => 4, 'errorMessage' => 'Aucune affectation effectuée'));
                }
                else {
                    $affectations = $stmt-> fetchAll();
                    return json_encode(array('errorCode' => 0, 'errorMessage' => 'Affectations' , 'affectations' => $affectations));
                }       
    }
    catch(PDOException $e){
        return json_encode(array('errorCode' => 5, 'errorMessage' => 'Erreur sql='.$e));
    }   
}


//fonction qui permet de récupérer l'historique des affectations de sacs d'un utilisateur en fonction de son id
function getHistoriqueAffectationTagsCCC() {
    try {
        $dbh = Connection();
            $sql = "SELECT h.id, h.date_affectation, concat(u.prenom, ' ', u.nom, ' (',r.libelle,')') as affectea, p.nom_cooperative, t.numlot, COUNT(h.id_tag) as nombre_sacs FROM historique_affectation_tag h INNER JOIN utilisateur u ON u.id_utilisateur = h.id_user_affecte INNER JOIN role r ON r.id_role = u.id_role INNER JOIN tags t ON t.id = h.id_tag LEFT JOIN cooperative p ON p.id_cooperative = u.id_cooperative GROUP BY h.id_user_affecte , t.numlot";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('iduser', $iduser);

            $stmt->execute();
            if($stmt->rowCount() === 0){
                return json_encode(array('errorCode' => 4, 'errorMessage' => 'Aucune affectation effectuée'));
                }
                else {
                    $affectations = $stmt-> fetchAll();
                    return json_encode(array('errorCode' => 0, 'errorMessage' => 'Affectations' , 'affectations' => $affectations));
                }       
    }
    catch(PDOException $e){
        return json_encode(array('errorCode' => 5, 'errorMessage' => 'Erreur sql='.$e));
    }   
}

//fonction qui permet de faire la réception de chargement à la destination, opérateur ou destination finale
function receptionChargement($idchargement, $idrole, $iduser) {
    try {
        $dbh = Connection();
        if($idrole === 400){ //lorsque le chargement arrive à la coopérative et est réceptionné par un opérateur
            $sql = "UPDATE importation_chargement SET etat_chargement = 1 , id_operateur = :iduser WHERE id_chargement = :idchargement";
            $sql1 = "UPDATE tags SET id_chargement = 0 WHERE id_chargement = :idchargement";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('iduser', $iduser);
            $stmt->bindValue('idchargement', $idchargement);
            $stmt->execute();
            $stmt1 = $dbh->prepare($sql1);
            $stmt1->bindValue('idchargement', $idchargement);
            return $stmt1->execute();

        }
        //lorsque le chargement arrive à la destination finale  et est réceptionné par un représentant
        if($idrole === 700){
            $sql = "UPDATE exportation_chargement SET etat_chargement = 1 WHERE id_chargement = :idchargement";
            $sql1 = "UPDATE tags SET id_chargement = 0 WHERE id_chargement = :idchargement";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('idchargement', $idchargement);
            $stmt->execute();
            $stmt1 = $dbh->prepare($sql1);
            $stmt1->bindValue('idchargement', $idchargement);
            return $stmt1->execute();
        }
    }
    catch(PDOException $e){
        return json_encode(array('errorCode' => 5, 'errorMessage' => 'Erreur sql='.$e));
    } 
}

//fonction qui permet d'avoir les statistiques sur la quantité de produit acheté par type de produit
function getStatsByTypeCampagne($idrole, $iduser, $idcampagne){
    try {
        $dbh = Connection();
        //pour le pisteur
        if($idrole === 300){
            $sql = "SELECT SUM(c.poids) as poids_total , c.type FROM importation_chargement c WHERE c.id_campagne = :idcampagne AND id_pisteur = :iduser GROUP BY type";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('idcampagne', $idcampagne);
            $stmt->bindValue('iduser', $iduser);
            $stmt->execute();
            if($stmt->rowCount() === 0){
                return json_encode(array('errorCode' => 4, 'errorMessage' => 'Pas de chargement trouvé'));
            }
            else {
                $pourcentage = $stmt-> fetchAll();
                return json_encode(array('errorCode' => 0, 'errorMessage' => 'Total chargement par type et par campagne' , 'pourcentage' => $pourcentage));
            }
        }
        //pour l'opérateur
        if($idrole === 400){
            $sql = "SELECT SUM(c.poids) as poids_total , c.type FROM exportation_chargement c WHERE c.id_campagne = :idcampagne AND id_operateur = :iduser GROUP BY type";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('idcampagne', $idcampagne);
            $stmt->bindValue('iduser', $iduser);
            $stmt->execute();
            if($stmt->rowCount() === 0){
                return json_encode(array('errorCode' => 4, 'errorMessage' => 'Pas de chargement trouvé'));
            }
            else {
                $pourcentage = $stmt-> fetchAll();
                return json_encode(array('errorCode' => 0, 'errorMessage' => 'Total chargement par type et par campagne' , 'pourcentage' => $pourcentage));
            }
        }
    }
    catch(PDOException $e){
        return json_encode(array('errorCode' => 5, 'errorMessage' => 'Erreur sql='.$e));
    } 
}


//toute les campagnes et par rapport au produit 
function getStatsByType($idrole, $iduser){
    try {
        $dbh = Connection();
        //pour le pisteur
        if($idrole === 300){
            $sql = "SELECT SUM(c.poids) as poids_total , c.type FROM importation_chargement c WHERE id_pisteur = :iduser GROUP BY type";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('iduser', $iduser);
            $stmt->execute();
            if($stmt->rowCount() === 0){
                return json_encode(array('errorCode' => 4, 'errorMessage' => 'Pas de chargement trouvé'));
            }
            else {
                $pourcentage = $stmt-> fetchAll();
                return json_encode(array('errorCode' => 0, 'errorMessage' => 'Total Chargement par type' , 'pourcentage' => $pourcentage));
            }
        }
        //pour l'opérateur
        if($idrole === 400){
            $sql = "SELECT SUM(c.poids) as poids_total , c.type FROM exportation_chargement c WHERE id_operateur = :iduser GROUP BY type";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('iduser', $iduser);
            if($stmt->rowCount() === 0){
                return json_encode(array('errorCode' => 4, 'errorMessage' => 'Pas de chargement trouvé'));
            }
            else {
                $pourcentage = $stmt-> fetchAll();
                return json_encode(array('errorCode' => 0, 'errorMessage' => 'Total Chargement par type' , 'pourcentage' => $pourcentage));
            }
        }
    }
    catch(PDOException $e){
        return json_encode(array('errorCode' => 5, 'errorMessage' => 'Erreur sql='.$e));
    } 
}

//stats tous les chargements par rapport au village 
function getStatsByTypeVillage($idrole, $iduser){
    try {
        $dbh = Connection();
        //pour le pisteur
        if($idrole === 300){
            $sql = "SELECT SUM(c.poids) as poids_total , v.nom_village FROM importation_chargement c INNER JOIN village v ON v.id_village = c.id_village_depart WHERE c.id_pisteur = :iduser GROUP BY v.nom_village";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('iduser', $iduser);
            $stmt->execute();
            if($stmt->rowCount() === 0){
                return json_encode(array('errorCode' => 4, 'errorMessage' => 'Pas de chargement trouve'));
            }
            else {
                $pourcentage = $stmt->fetchAll();
                return json_encode(array('errorCode' => 0, 'errorMessage' => 'Total chargement par type et par village' , 'pourcentage' => $pourcentage));
            }
        }
        //pour l'opérateur
        if($idrole === 400){
            $sql = "SELECT SUM(c.poids) as poids_total , v.adresse FROM exportation_chargement c INNER JOIN destination_finale v ON v.id_destinataire_finale = c.id_destination_finale WHERE c.id_operateur = :iduser GROUP BY v.adresse";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('iduser', $iduser);
            $stmt->execute();
            if($stmt->rowCount() === 0){
                return json_encode(array('errorCode' => 4, 'errorMessage' => 'Pas de chargement trouvé'));
            }
            else {
                $pourcentage = $stmt->fetchAll();
                return json_encode(array('errorCode' => 0, 'errorMessage' => 'Total chargement par type et par village' , 'pourcentage' => $pourcentage));
            }
        }
    }
    catch(PDOException $e){
        return json_encode(array('errorCode' => 5, 'errorMessage' => 'Erreur sql='.$e));
    } 
}

//stats des chargements en cours sur les chargements total
function getStatsChargementEncours($idrole, $iduser, $idcampagne){
    try {
        $dbh = Connection();
        //pour le pisteur
        if($idrole === 300){
            $sql = "SELECT 100 * count(*)/(SELECT COUNT(*) FROM importation_chargement a WHERE a.id_campagne = :idcampagne AND a.id_pisteur = :iduser) as pourcentage FROM importation_chargement c WHERE c.id_campagne = :idcampagne AND c.id_pisteur = :iduser AND c.etat_chargement = 0";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('idcampagne', $idcampagne);
            $stmt->bindValue('iduser', $iduser);
            $stmt->execute();
            if($stmt->rowCount() === 0){
                return json_encode(array('errorCode' => 4, 'errorMessage' => 'Pas de chargement en cours'));
            }
            else {
                $pourcentage = $stmt-> fetchObject();
                return json_encode(array('errorCode' => 0, 'errorMessage' => 'Pourcentage chargement en cours sur total' , 'pourcentage' => $pourcentage));
            }
        }
        //pour l'opérateur
        if($idrole === 400){
            $sql = "SELECT 100 * count(*)/(SELECT COUNT(*) FROM exportation_chargement a WHERE a.id_campagne = :idcampagne AND a.id_operateur = :iduser) as pourcentage FROM exportation_chargement c WHERE c.id_campagne = :idcampagne AND c.id_operateur = :iduser AND c.etat_chargement = 0";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue('idcampagne', $idcampagne);
            $stmt->bindValue('iduser', $iduser);
            $stmt->execute();
            if($stmt->rowCount() === 0){
                return json_encode(array('errorCode' => 4, 'errorMessage' => 'Pas de chargement en cours'));
            }
            else {
                $pourcentage = $stmt-> fetchObject();
                return json_encode(array('errorCode' => 0, 'errorMessage' => 'Pourcentage chargement en cours sur total' , 'pourcentage' => $pourcentage));
            }
        }
    }
    catch(PDOException $e){
        return json_encode(array('errorCode' => 5, 'errorMessage' => 'Erreur sql='.$e));
    } 
}

