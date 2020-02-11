(function(){
    window.addEventListener("load", function(){

        
        let btn_close = document.querySelector(".btn_X");
        let dialog_box = document.querySelector(".projetSelect");
        let parent_projet = document.querySelector(".mesProjets");
        let filtres = document.querySelector(".filtres");
        let filtre = document.querySelectorAll(".filtre");

        let body = document.querySelector("body");


        
        /**
         * ÉLÉMENTS POUR LE TEMPLATE
         */
        let template = document.querySelector("#detailProjet");
        let parent = document.querySelector(".contenue");

        
        /**
         * SET UP DE LA VARIABLE POUR LES PROJETS
         */
        let projets = [];

        /**
         * RÉCUPÉRATION DES PROJETS POUR L'AFFICHAGE DES DÉTAILS
         * UNE SEULE REQUÊTE POUR NE PAS LANCER À CHAQUE FOIS QU'ON CLIQUE SUR UN NOUVEAU PROJET
         */
        function getProjets(){
            $.get("./modele/projetDetails.php", (data)=>{
                projets = JSON.parse(data);
            })
        }

        /**
         * OUVERTURE DE LA BOÎTE DE DIALOGUE 
         * (AFFICHAGE DES DÉTAILS D'UN PROJET          
         */
        parent_projet.addEventListener("click", function(evt){
            // VALIDATION POUR LES FILTRES QUI DÉTECTE UNE CLASSE RAJOUTÉ
            if(!evt.target.parentNode.classList.contains("desactive" )){
                body.classList.add("noScroll");
                /**
                 * SI LA CLASSE N'EST PAS PRÉSENTE ON PEU OUVRIR LES DÉTAILS DU PROJET
                 */

                //DÉTECTION DE L'ID DU PROJET
                let projectID = evt.target.parentNode.classList[1];
                let leProjet = projets[projectID-1];
                leProjet.src = leProjet.images[0].src;
                leProjet.alt = leProjet.images[0].meta;
                let unProjet = template.cloneNode(true);
                for(let prop in leProjet){
                    // REMPLACE LES ÉLÉMENTS ENTRE LES {{}} PAR CEUL CONTENUE DANS LA VARIABLE leProjet
                    let regExp = new RegExp("{{"+prop+"}}", "g");
                    unProjet.innerHTML = unProjet.innerHTML.replace(regExp, leProjet[prop]);   
                }
                // LE NOEUD EST INSÉRÉ AU PARENT ET ON TOGGLE LA CLASSE POUR LA BOÎTE DE DIALOGUE
                let nouveauNoeud = document.importNode(unProjet.content, true);
                parent.append(nouveauNoeud);
                dialog_box.classList.toggle("close");
                // CHARGEMENT DE LA LISTE DE LANGUAGES / PROGRAMMES
                loadingliste(leProjet.languages);
            }
        });

        /**
         * FUNCTION QUI CHARGE LA LISTE DES LANGUAGES
         * @param liste array   
         */
        function loadingliste(liste){
            let listeParent = document.querySelector(".laListeLanguages");
            for(let i=0;i<=liste.length;i++){
                let li = document.createElement("LI");
                li.textContent = liste[i];
                listeParent.append(li);
            }
        }

        /**
         * FERMETURE DE LA BOÎTE DE DIALOGUE 
         * (AFFICHAGE DES DÉTAILS D'UN PROJET)
         */
        btn_close.addEventListener("click", function(){
            dialog_box.classList.toggle("close");
            body.classList.remove("noScroll");
            // RESET DU PARENT COMME VIDE
            parent.innerHTML = "";
        });



        /**
         * LISTENER DES FILTRES POUR LES PROJET
         */
        filtres.addEventListener("click", function(evt){
            //PLACE LES PROJETS DANS UN ARRAY
            let projetFiltrer = parent_projet.children;
            var arrProjet = [].slice.call(projetFiltrer);
            //DÉTECTE QUEL FILTRE EST ACTIF ET CHANGE LA CLASSE ACTIF DE LA FAÇON APPROPRIÉ
            if(evt.target.classList.contains("filtre") && !evt.target.classList.contains("actif")){
                for(let i = 0; i<filtre.length; i++){
                    filtre[i].classList.remove("actif");
                }
                evt.target.classList.add("actif");
                // LOOP DANS LES PROJETS POUR ACTIVER ET DÉSACTIVER SELON LE FILTRE CHOISIS
                arrProjet.forEach(filtrerP =>{
                    var arrChild = [].slice.call(filtrerP.children);
                    filtrerP.classList.remove("desactive");
                    if(evt.target.innerHTML == "TOUS"){
                        filtrerP.classList.remove("desactive");
                    }
                    else if(!filtrerP.classList.contains(evt.target.innerHTML)){
                        filtrerP.classList.add("desactive");
                        arrChild.forEach(unChild =>{
                            unChild.classList.add("desactive");
                        })
                    }
                })
            }
        }) 



        /**
         * DÉTECTION DES CLICK DANS LE BOITE DE DIALOGUE
         */
        dialog_box.addEventListener("click", function(evt){    
            let listeLanguages = document.querySelector(".laListeLanguages");
            let laDescription = document.querySelector(".laDescription");

            let selecteurLan = document.querySelector(".languages");
            let selecteurDes = document.querySelector(".description");
            // SI ON CLIQUE SUR L'ICONE FILTRE ENTRE LES LANGUES ET LA DESCRIPTION ON CHANGE LE CONTENUE QUI APPARAIS À L'ÉCRAN
            if(evt.target.classList.contains("languages") || evt.target.classList.contains("description")){
                if(!evt.target.classList.contains("actif")){
                    selecteurLan.classList.toggle("actif");
                    selecteurDes.classList.toggle("actif");
                    laDescription.classList.toggle("actif");
                    listeLanguages.classList.toggle("actif");
                }

            }
        });


        getProjets();


    });




})()