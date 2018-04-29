<?php

if (!isset($handle)) {
    $handle = mysql_connect("localhost", "root", "");
    if (!$handle) {
        die("Cannot connect to mysqlDB : ".mysql_error());
    }
	mysql_select_db("ticketrestov1");
}

// effetcue une requete sur la BDD et quitte en cas d'erreur
function query_safe($req) {
    $result = mysql_query($req);
    if (!$result) {
        die("Requete invalide : ".mysql_error());
    }
    return $result;
}

function s($str) {
    return mysql_real_escape_string($str);
}


//ajoute une option dans la table 'options' de la bdd
//retourne query_safe();
function add_option($key, $val) {
	$sql = "INSERT INTO options (opt_key, opt_val) VALUES ('".$key."', '".$val."')";
	return query_safe($sql);
}

//Cree un ficher .sql pour sauvegarder la base
function dumpMySQL($serveur, $login, $password, $base, $mode)
{
    $connexion = mysql_connect($serveur, $login, $password);
    mysql_select_db($base, $connexion);
    
    $entete = "-- ----------------------\n";
    $entete .= "-- dump de la base ".$base." au ".date("d-M-Y")."\n";
    $entete .= "-- ----------------------\n\n\n";
    $creations = "";
    $insertions = "\n\n";
    
    $listeTables = mysql_query("show tables", $connexion);
    while($table = mysql_fetch_array($listeTables))
    {
        // si l'utilisateur a demandé la structure ou la totale
        if($mode == 1 || $mode == 3)
        {
            $creations .= "-- -----------------------------\n";
            $creations .= "-- creation de la table ".$table[0]."\n";
            $creations .= "-- -----------------------------\n";
            $listeCreationsTables = mysql_query("show create table ".$table[0], $connexion);
            while($creationTable = mysql_fetch_array($listeCreationsTables))
            {
              $creations .= $creationTable[1].";\n\n";
            }
        }
        // si l'utilisateur a demandé les données ou la totale
        if($mode > 1)
        {
            $donnees = mysql_query("SELECT * FROM ".$table[0]);
            $insertions .= "-- -----------------------------\n";
            $insertions .= "-- insertions dans la table ".$table[0]."\n";
            $insertions .= "-- -----------------------------\n";
            while($nuplet = mysql_fetch_array($donnees))
            {
                $insertions .= "INSERT INTO ".$table[0]." VALUES(";
                for($i=0; $i < mysql_num_fields($donnees); $i++)
                {
                  if($i != 0)
                     $insertions .=  ", ";
                  if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
                     $insertions .=  "'";
                  $insertions .= addslashes($nuplet[$i]);
                  if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
                    $insertions .=  "'";
                }
                $insertions .=  ");\n";
            }
            $insertions .= "\n";
        }
    }
 
    mysql_close($connexion);
 
 	$name = "backup/sauv- ticketresto-".date("Y-M-d").".sql";
 
    $fichierDump = fopen($name, "wb");
    fwrite($fichierDump, $entete);
    fwrite($fichierDump, $creations);
    fwrite($fichierDump, $insertions);
    fclose($fichierDump);
}
