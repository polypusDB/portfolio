<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="./scripts/script.js"></script>
    <script src="./scripts/lazy_annimation.js"></script>
    <script src="./scripts/menu.js"></script>

    <link rel="stylesheet" type="text/css" href="./styles/reset.css">
    <link rel="stylesheet" type="text/css" href="./styles/font.css">
    <link rel="stylesheet" type="text/css" href="./styles/particules.css">
    <link rel="stylesheet" type="text/css" href="./styles/entete.css">
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <link href="https://fonts.googleapis.com/css?family=Overpass:300,400&display=swap" rel="stylesheet"> -->
    <title>Saul Turbide</title>
</head>

<?php
    include("./modele/connection.php");
    
?>

<body>
    <!-- TEMPLATE POUR LES DÉTAILS DE PROJETS -->
    <template id="detailProjet">
            <h2 class="nom_mobile">{{titre}}</h2>
            <div class="left">
                <img src="{{src}}" atl="{{alt}}"/>
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
            <!-- FIN DU TEMPLATE -->
    </template>
    <!-- SECTION ENTÊTE -->
    <section id="enteteNav" class="entete navObs">
        <!-- BARRE DE NAVIGATION -->
        <nav>
            <!-- MENU BURGER  -->
            <div class="bumper"></div>
            <div class="menu_burger">
                <div class="_haut"></div>
                <div class="_milieu"></div>
                <div class="_bas"></div>
            </div>
            <ul class="menu">
                <li><a class="enteteNav actif" href="#enteteNav">ACCUEIL</a></li>
                <li><a class="proposNav" href="#proposNav">À PROPOS</a></li>
                <li><a class="projetsNav" href="#projetsNav">PROJETS</a></li>
                <li><a class="contactNav" href="#contactNav">CONTACT</a></li>
                <li><a href="http://saulturbide.com/dist/">EXPLORATOIRE</a></li>
            </ul>
        </nav>
        <div>
            <h1>BONJOUR, JE M'APPELLE <span>SAUL TURBIDE</span><br>ET JE SUIS INTÉGRATEUR MULTIMÉDIA</h1>
            <a href="#projetsNav" class="btnVoir">VOIR MES RÉALISATIONS</a>
        </div>
        <!-- DIVISION SYSTÈME DE PARTICULES -->
        <div id="particules">
        <ul class="lesparticules">
            <li><img src="./images/icones/css.png" alt="particules"></li>
            <li><img src="./images/icones/css.png" alt="particules"></li>
            <li><img src="./images/icones/css.png" alt="particules"></li>
            <li><img src="./images/icones/html.png" alt="particules"></li>
            <li><img src="./images/icones/html.png" alt="particules"></li>
            <li><img src="./images/icones/html.png" alt="particules"></li>
            <li><img src="./images/icones/js.png" alt="particules"></li>
            <li><img src="./images/icones/js.png" alt="particules"></li>
            <li><img src="./images/icones/js.png" alt="particules"></li>
        </ul>
    </div>
    </section>
    <!-- SECTION À PROPOS -->
    <section id="proposNav" class="propos navObs">
        <h2>À PROPOS</h2>
        <!-- DIVISION COMPÉTENCES -->
        <div class="icones">
            <div>
                <div class="icone">
                    <img src="./images/icones/fuse.png" alt="iconefuse"/>
                </div>
                <p>PERFORMANCE</p>
            </div>
            <div>
                <div class="icone">
                    <img src="./images/icones/frontEnd.png" alt="iconeFrontEnd"/>
                </div>
                <p>FRONT END</p>
            </div>
            <div>
                <div class="icone">
                    <img src="./images/icones/adap.png" alt="iconeadaptabilité"/>
                </div>
                <p>ADAPTATIF</p>
            </div>
            <div>
                <div class="icone">
                    <img src="./images/icones/baseDonne.png" alt="iconeBaseDeDonné"/>
                </div>
                <p>BACK END</p>
            </div>
        </div>
        <!-- SECTION : QUI-SUIS JE -->
        <article>
            <div class="qui">
                <div>
                    <div class="profil">
                        <img src="./images/profil.jpg" alt="SaulTurbide">
                    </div>
                    <h3>QUI SUIS-JE?</h3>
                    <p>Finissant en Intégration multimédia au Collège de 
                        Maisonneuve et passionné par le développement web.
                         Toujours à la recherche de nouveaux défis!</p>
                    <a href="#contactNav">une idée en tête?</a>
                </div>
            </div>
            <!-- ASIDE BARRES DE COMPÉTENCES -->
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
            <!-- FIN DE L'AFFICHAGE DES BARRES DE COMPÉTENCES -->
        </article>
        <!-- FIN DE LA SECTION QUI-SUIS JE -->
    </section>
     <!-- SECTION POUR L'AFFICHEGE DES PROJETS -->
    <section id="projetsNav" class="projets navObs">
        <h3>PROJETS</h3>
        <!-- DIV POUR LES FILTRES -->
        <div class="filtres">
            <ul>
                <li class="filtre actif">TOUS</li>
                <li class="filtre">WEB</li>
                <li class="filtre">JEUX</li>
                <li class="filtre">3D</li>
            </ul>
            <!-- FIN DES FILTRES -->
        </div>
        
        <!-- AFFICHAGE DES PROJETS -->
        <article class="mesProjets">
        <?php
        /**
         * Include de la connection à la base de données
         * boucle dans les projets et affichega des éléments requis
         */
            include("./modele/listeProjets.php");
            // include("./modele/projetDetails.php");
            for($i = 0; $i<= count($res)-1; $i++){
                extract($res[$i]);
                ?>
                
                <div class="unProjet <?=$id?> <?=$type?>">
                    <div class="imgContainer pointer">
                        <img src="<?=$images[0]["src"]?>" atl="<?=$images[0]["meta"] ?>">
                    </div>
                    <div class="projetHov <?=$id?>">
                        <div  class="texte <?=$id?>">
                            <p class="titre"><?=$titre ?></p>
                            <a class="plus <?=$id?>">EN SAVOIR PLUS</a>
                        </div>
                    </div>
                </div>
            <?php
            }
        ?>
        <!-- FIN DE L'AFFICHAGE DES PROJETS -->
        </article>
        <!-- FIN DE LA SECTION POUR LES PROJETS -->
    </section>
    <!-- FOOTER -->
    <footer id="contactNav" class="navObs">
        <div>
            <h3>Contact</h3>
            <p>saul.turbide@gmail.com</p>
        </div>
        <p>Intéressé par ce que vous voyez? Vous avez des idées vraiment cool et vous cherchez des gens pour les réaliser? </p>
        <p>N’hésitez pas à me contacter pour en parler et nous devrions pouvoir concrétiser votre vision!</p>
        <!-- FIN DU FOOTER -->
    </footer>
    <!-- SECTION BOÎTE DE DIALOGUE -->
    <section class="projetSelect close">
        <div class="btn_X">
                    <div class="x_droit"></div>
                    <div class="x_gauche"></div>
        </div>
        <div class="contenue"></div>
    </section>
</body>
</html>

