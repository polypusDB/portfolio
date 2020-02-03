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
    <title>Document</title>
</head>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "portfolio";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully<br>";



    $sql = "SELECT * from projets";
    echo $sql."<br>";
    $projets = $conn->query($sql);
    
    // var_dump($projets);


    // $conn->close();
?>

<body>
    
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
            <h1>BONJOUR, JE M'APPELLE <span>SAUL TURBIDE</span><br>¨ET JE SUIS INTÉGRATEUR MULTIMÉDIA</h1>
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
                    <a href="#">une idée en tête?</a>
                </div>
            </div>
            
            <aside>
                <div class="competences fade-in">
                    <div class="language">
                        <p>JavaScript</p>
                    </div>
                    <div class="mesure">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>PHP</p>
                    </div>
                    <div class="mesure">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>CSS</p>
                    </div>
                    <div class="mesure">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>HTML</p>
                    </div>
                    <div class="mesure">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>Sql</p>
                    </div>
                    <div class="mesure">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>Maya</p>
                    </div>
                    <div class="mesure">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>Photoshop</p>
                    </div>
                    <div class="mesure">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>Illustrator</p>
                    </div>
                    <div class="mesure">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>Premiere</p>
                    </div>
                    <div class="mesure">
                        <div class="plein"></div>
                    </div>
                </div>
                <div class="competences fade-in">
                    <div class="language">
                        <p>Unity</p>
                    </div>
                    <div class="mesure">
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
            if ($projets->num_rows > 0) {
                // output data of each row
                while($row = $projets->fetch_assoc()) {
                    extract($row);
                    ?>
                    <div class="unProjet">
                        <div class="imgContainer">
                            <img src="./images/art_pub_mtl_miniature.jpg">
                        </div>
                        <div class="projetHov">
                            <div class="texte">
                                <p class="titre"><?=$titre ?></p>
                                <a class="plus">EN SAVOIR PLUS</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    // echo "id: " . $row["id"]. " - titre: " . $row["titre"]. " " . $row["description"]. "<BR>TYPE : " . $row["type"] ."<br>";
                }
            } else {
                echo "0 results";
            }
        ?>


            <!-- <div class="unProjet">
                <div class="imgContainer">
                    <img src="./images/art_pub_mtl_miniature.jpg">
                </div>
                <div class="projetHov">
                    <div class="texte">
                        <p class="titre">ART PUB MTL</p>
                        <a class="plus">EN SAVOIR PLUS</a>
                    </div>
                </div>
            </div>             -->
            <div class="unProjet">
                <div class="imgContainer">
                    <img src="./images/art_pub_mtl_miniature.jpg">
                </div>
                <div class="projetHov">
                    <div class="texte">
                        <p class="titre">ART PUB MTL</p>
                        <a class="plus">EN SAVOIR PLUS</a>
                    </div>
                </div>
            </div>            
            <div class="unProjet">
                <div class="imgContainer">
                    <img src="./images/art_pub_mtl_miniature.jpg">
                </div>
                <div class="projetHov">
                        <div class="texte">
                                <p class="titre">ART PUB MTL</p>
                                <a class="plus">EN SAVOIR PLUS</a>
                            </div>
                </div>
            </div>            
            <div class="unProjet">
                <div class="imgContainer">
                    <img src="./images/art_pub_mtl_miniature.jpg">
                </div>
                <div class="projetHov">
                        <div class="texte">
                                <p class="titre">ART PUB MTL</p>
                                <a class="plus">EN SAVOIR PLUS</a>
                            </div>
                </div>
            </div>            
            <div class="unProjet">
                <div class="imgContainer">
                    <img src="./images/art_pub_mtl_miniature.jpg">
                </div>
                <div class="projetHov">
                    <div class="texte">
                        <p class="titre">ART PUB MTL</p>
                        <a class="plus">EN SAVOIR PLUS</a>
                    </div>
                </div>
            </div>
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
        <div class="contenue">
            <h2 class="nom_mobile">ART PUB MTL</h2>
            <div class="left">
                <img src="./images/mokup.png"/>
                
            </div>
            <div class="right">
                <h2 class="nom">ART PUB MTL</h2>
            <p class="type">WEB</p>
            <div class="selecteurContenue">
                <p class="description actif">DESCRIPTION</p>
                <p class="languages">LANGUAGES</p>
            </div>
                <p class="laDescription actif">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget odio sit amet sem porttitor sollicitudin. Suspendisse lectus metus, porta quis suscipit sit amet, eleifend sit amet eros. Fusce a velit et ipsum elementum lacinia at id libero. Donec ac est id metus blandit dignissim id vitae augue. Ut sed congue sapien. Aenean mollis nulla at lorem sollicitudin placerat.</p>
                <ul class="laListeLanguages">
                    <li>PHP</li>
                    <li>JAVASCRIPT</li>
                    <li>HTML</li>
                    <li>AJAX</li>
                    <li>CSS</li>
                </ul>
            </div>
            <a href="#" class="btn_lien">VOIR LE PROJET</a>
        </div>
    </section>
</body>
</html>
