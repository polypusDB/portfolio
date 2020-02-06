<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="./scripts/script.js"></script>
    <link rel="stylesheet" type="text/css" href="./styles/reset.css">
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400&display=swap" rel="stylesheet">
    <title>Saul Turbide</title>
</head>

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

    $conn->set_charset("utf8");

    $res = Array();
    $sql = "SELECT  p.*, i.*
    from projets p
    JOIN imageprojet ip
    ON ip.id_projet = p.id
    JOIN images i
    ON i.id_image = ip.id_image
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

    // include("./projetDetails.php");

?>

<body>
    <template id="detailProjet">
            <h2 class="nom_mobile">{{titre}}</h2>
            <div class="left">
                <img src="{{src}}"/>
            </div>
            <div class="right">
                <h2 class="nom">{{titre}}</h2>
            <p class="type">{{type}}</p>
            <div class="selecteurContenue">
                <p class="description actif">DESCRIPTION</p>
                <p class="languages">LANGUAGES</p>
            </div>
                <p class="laDescription actif">{{description}}</p>
                <ul class="laListeLanguages">
                </ul>
            </div>
            <a href="{{lien_web}}" target="_blank" class="btn_lien">VOIR LE CODE</a>
    </template>
    
    <section id="entete" class="entete">
        <nav>
            <div class="bumper"></div>
            <div class="menu_burger">
                <div class="_haut"></div>
                <div class="_milieu"></div>
                <div class="_bas"></div>
            </div>
            <ul class="menu">
                <li><a class="actif" href="#entete">ACCUEIL</a></li>
                <li><a href="#propos">À PROPOS</a></li>
                <li><a href="#projet">PORTFOLIO</a></li>
                <li><a href="#contact">CONTACT</a></li>
            </ul>
        </nav>
        <div>
            <h1>BONJOUR, JE M'APPELLE <span>SAUL TURBIDE</span><br>ET JE SUIS INTÉGRATEUR MULTIMÉDIA</h1>
            <a href="#projet" class="btnVoir">VOIR MES RÉALISATIONS</a>
        </div>
    </section>
    <section id="propos" class="propos">
        <h2>À PROPOS</h2>
        <div class="icones">
            <div>
                <div class="icone">
                    <img src="./images/icones/fuse.png"/>
                </div>
                <p>PERFORMANCE</p>
            </div>
            <div>
                <div class="icone">
                    <img src="./images/icones/frontEnd.png"/>
                </div>
                <p>FRONT END</p>
            </div>
            <div>
                <div class="icone">
                    <img src="./images/icones/adap.png"/>
                </div>
                <p>ADAPTATIF</p>
            </div>
            <div>
                <div class="icone">
                    <img src="./images/icones/baseDonne.png"/>
                </div>
                <p>BACK END</p>
            </div>
        </div>
        <article>
            <div class="qui">
                <div>
                    <div class="profil">
                        <img src="./images/profil.jpg">
                    </div>
                    <h3>QUI SUIS-JE?</h3>
                    <p>Finissant en Intégration multimédia au Collège de 
                        Maisonneuve et passionné par le développement web.
                         Toujours à la recherche de nouveaux défis!</p>
                    <a href="#contact">une idée en tête?</a>
                </div>
            </div>
            
            <aside>
                <div class="competences fade-in">
                    <div class="language">
                        <p>JavaScript</p>
                    </div>
                    <div class="mesure js">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language ">
                        <p>PHP</p>
                    </div>
                    <div class="mesure php">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>CSS</p>
                    </div>
                    <div class="mesure css">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>HTML</p>
                    </div>
                    <div class="mesure html">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>Sql</p>
                    </div>
                    <div class="mesure sql">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>Maya</p>
                    </div>
                    <div class="mesure maya">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>Photoshop</p>
                    </div>
                    <div class="mesure photoshop">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>Illustrator</p>
                    </div>
                    <div class="mesure ill">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>Premiere</p>
                    </div>
                    <div class="mesure premiere">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>Unity</p>
                    </div>
                    <div class="mesure unity">
                        <div class="plein"></div>
                    </div>
                </div>
            </aside>
        </article>
    </section>
    <section id="projet" class="projets">
        <h3>PROJETS</h3>
        <div class="filtres">
            <ul>
                <li class="filtre actif">TOUS</li>
                <li class="filtre">WEB</li>
                <li class="filtre">JEUX</li>
                <li class="filtre">3D</li>
            </ul>
        </div>
        <article class="mesProjets">



        <?php
                for($i = 0; $i<= count($res)-1; $i++){
                    extract($res[$i]);
                    ?>
                     <div class="unProjet  <?=$id?>">
                        <div class="imgContainer">

                            <img src="<?=$images[0]["src"]?>">
                        </div>
                         <div class="projetHov">
                            <div  class="texte  <?=$id?>">
                                <p class="titre"><?=$titre ?></p>
                                <a class="plus">EN SAVOIR PLUS</a>
                            </div>
                        </div>
                    </div>
                     <?php
                }

        ?>                      
        </article>
    </section>
    <footer id="contact">
        <div>
            <h3>Contact</h3>
            <p>saul.turbide@gmail.com</p>
        </div>
        <p>Intéressé par ce que vous voyez? Vous avez des idées vraiment cool et vous cherchez des gens pour les réaliser? </p>
        <p>N’hésitez pas à me contacter pour en parler et nous devrions pouvoir concrétiser votre vision!</p>
    </footer>
    <section class="projetSelect close">
        <div class="btn_X">
                    <div class="x_droit"></div>
                    <div class="x_gauche"></div>
        </div>
        <div class="contenue"></div>
    </section>
</body>
</html>

