(function(){
    window.addEventListener("load", function(){
        let btn_close = document.querySelector(".btn_X");
        let dialog_box = document.querySelector(".projetSelect");
        let parent_projet = document.querySelector(".mesProjets");
        let filtres = document.querySelector(".filtres");
        let filtre = document.querySelectorAll(".filtre");
        let menu_burg = document.querySelector(".menu_burger");
        let menu_ul = document.querySelector(".menu");

        let selecteur = this.document.querySelector(".selecteurContenue");
        let selecteurLan = this.document.querySelector(".languages");
        let selecteurDes = this.document.querySelector(".description");
        
        let listeLanguages = this.document.querySelector(".laListeLanguages");
        let laDescription = this.document.querySelector(".laDescription");

        let template = document.querySelector("#detailProjet");
        let parent = document.querySelector(".contenue");


        let projets;
        function getProjets(){
            $.get("projetDetails.php",{"idProjet" : 1}, (data)=>{
                
                // console.log(JSON.parse(data));
                projets = JSON.parse(data);
                // renderProjet();
                
            })
        }

        // function renderProjet(data){
        //     console.log(data);

        // }

        menu_burg.addEventListener("click", function(){
            if(menu_burg.classList.contains("actif")){
                menu_burg.classList.remove("actif");
                menu_burg.classList.add("fermer");
            }
            else{
                menu_burg.classList.add("actif");
                menu_burg.classList.remove("fermer");


            }
            menu_ul.classList.toggle("open");
        })
        /**
         * fermer la boîte de dialogue
         */
        btn_close.addEventListener("click", function(){
            dialog_box.classList.toggle("close");
            
            parent.innerHTML = "";
        });
        /**
         * ouvrir la boîte de dialoague
         */
        parent_projet.addEventListener("click", function(evt){
            let projectID = evt.target.parentNode.classList[1];
            let leProjet = projets[projectID-1];

            leProjet.src = leProjet.images[0].src;
            let unProjet = template.cloneNode(true);
            for(let prop in leProjet){

                let regExp = new RegExp("{{"+prop+"}}", "g");
                unProjet.innerHTML = unProjet.innerHTML.replace(regExp, leProjet[prop]);   
            }
            let nouveauNoeud = document.importNode(unProjet.content, true);
            parent.append(nouveauNoeud);
            // for(let i=0;i<=leProjet.languages.length;i++){
            //     let li = document.createElement("LI");
            //     li.textContent = leProjet.languages[i];
            //     listeParent.append(li);
            // }
            dialog_box.classList.toggle("close");
            loadingliste(leProjet.languages);

        });

        filtres.addEventListener("click", function(evt){
            
            if(evt.target.classList.contains("filtre")){
                for(let i = 0; i<filtre.length; i++){
                    console.log("allo");
                    filtre[i].classList.remove("actif");
                }
                evt.target.classList.add("actif");
            }
        })

        function loadingliste(liste){
            let listeParent = document.querySelector(".laListeLanguages");
            for(let i=0;i<=liste.length;i++){
                let li = document.createElement("LI");
                li.textContent = liste[i];
                listeParent.append(li);
            }
        }

        // selecteur.addEventListener("click", function(evt){
        //     if(!evt.target.classList.contains("actif")){
        //         selecteurLan.classList.toggle("actif");
        //         selecteurDes.classList.toggle("actif");

        //         laDescription.classList.toggle("actif");
        //         listeLanguages.classList.toggle("actif");
        //     }
        // })




        // window.addEventListener("scroll", function(){
        //     var rect = filtre.getBoundingClientRect(),
        //     scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
        //     scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        //     console.dir(rect); 
        // })




/**
 * LES FADES INS SONT ICI TEMPORAIREMENT!
 */     
const appreaOptions = {
    root: null,
    threshold: 1,
    rootMargin: "-50px 0px"
};

        const faders = document.querySelectorAll(".fade-in");
        const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll){

            entries.forEach(entry =>{
                if(!entry.isIntersecting){
                    return;
                }
                entry.target.classList.add("appear");
                entry.target.children[1].classList.add("appear");
                appearOnScroll.unobserve(entry.target);
            });



        }, appreaOptions)

    
        faders.forEach(fader => {
            // console.log(fader.children[1]);
            appearOnScroll.observe(fader);
        })



        
        getProjets();


    });

})()