<?php

$servername = "localhost"; // db5000288875.hosting-data.io
$username = "root"; // dbu297767
$password = ""; //1073582St.
$db = "portfolio"; //dbs282112

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$res = Array();
$sql = "SELECT  p.*, i.*, l.nom
from projets p
JOIN imageprojet ip
ON ip.id_projet = p.id
JOIN images i
ON i.id_image = ip.id_image
join projet_languages pl
on pl.id_projet = p.id
JOIN languageprogramme l
ON l.nom = pl.nom_lang
WHERE i.role = 'mokup'
ORDER BY p.id";
$projets = $conn->query($sql);




if ($projets->num_rows > 0) {
    while($projet = $projets->fetch_assoc()) {
        $pro = end($res);
            if(isset($pro) && $pro['id'] != $projet['id']){
                $projet["images"] = array();
                $projet["images"][] = array(
                                            "src" => $projet["src"],
                                            "role" => $projet["role"],
                                            "meta" => $projet["meta"],
                                            );
                $projet["languages"] = array();

                $projet["languages"][] = $projet["nom"];
                unset($projet["nom"]);
                unset($projet["id_image"]);
                unset($projet["src"]);
                unset($projet["role"]);
                unset($projet["meta"]);
                $res[] = $projet;
            }
            else if(isset($pro) && $pro['id'] == $projet['id']){
                $i = count($res)-1;
                $res[$i]["languages"][] = $projet["nom"];
            }
    }

    

}

echo json_encode($res);


//var_dump($res);
?>

