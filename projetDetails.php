<?php

$servername = "localhost"; // db5000288875.hosting-data.io
$username = "root"; // dbu297767
$password = ""; //1073582St.
$db = "portfolio"; //dbs282112

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$res = Array();
$sql = "SELECT  p.*, i.*
from projets p
JOIN imageprojet ip
ON ip.id_projet = p.id
JOIN images i
ON i.id_image = ip.id_image";
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
                unset($projet["id_image"]);
                unset($projet["src"]);
                unset($projet["role"]);
                unset($projet["meta"]);
                $res[] = $projet;
            }
            else if(isset($pro) && $pro['id'] == $projet['id']){
                $i = count($res)-1;
                $res[$i]["images"][] = array(
                                            "src" => $projet["src"],
                                            "role" => $projet["role"],
                                            "meta" => $projet["meta"],
                                            );
            }
    }

    

}

echo var_dump($res);

?>

