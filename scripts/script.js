(function(){
    window.addEventListener("load", function(){

        let body = document.querySelector("body");
        let btn_close = document.querySelector(".btn_X");
        let dialog_box = document.querySelector(".projetSelect");
        let parent_projet = document.querySelector(".mesProjets");
        let filtres = document.querySelector(".filtres");
        let filtre = document.querySelectorAll(".filtre");
        let menu_burg = document.querySelector(".menu_burger");
        let menu_ul = document.querySelector(".menu");



        

        let template = document.querySelector("#detailProjet");
        let parent = document.querySelector(".contenue");

        let liensNav = document.querySelectorAll(".menu a");

        let projets;


        function getProjets(){
            $.get("projetDetails.php",{"idProjet" : 1}, (data)=>{
                
                projets = JSON.parse(data);
                
            })
        }

        liensNav.forEach(lien => {
            
            lien.addEventListener("click", function(){
                menu_burg.classList.remove("actif");
                menu_burg.classList.add("fermer");
                menu_ul.classList.toggle("open");
                body.classList.remove("noScroll");
            })
        })
        // function renderProjet(data){
        //     console.log(data);

        // }

        menu_burg.addEventListener("click", function(){
            if(menu_burg.classList.contains("actif")){
                menu_burg.classList.remove("actif");
                menu_burg.classList.add("fermer");
                body.classList.remove("noScroll");
            }
            else{
                menu_burg.classList.add("actif");
                menu_burg.classList.remove("fermer");
                body.classList.add("noScroll");


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

            console.log(leProjet)
            leProjet.src = leProjet.images[0].src;
            let unProjet = template.cloneNode(true);
            for(let prop in leProjet){

                let regExp = new RegExp("{{"+prop+"}}", "g");
                unProjet.innerHTML = unProjet.innerHTML.replace(regExp, leProjet[prop]);   
            }
            let nouveauNoeud = document.importNode(unProjet.content, true);
            parent.append(nouveauNoeud);

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


        dialog_box.addEventListener("click", function(evt){

    
            let listeLanguages = document.querySelector(".laListeLanguages");
            let laDescription = document.querySelector(".laDescription");

            let selecteurLan = document.querySelector(".languages");
            let selecteurDes = document.querySelector(".description");
            // console.log(evt.target.classList)
            if(evt.target.classList.contains("languages") || evt.target.classList.contains("description")){
                if(!evt.target.classList.contains("actif")){

                    
                    selecteurLan.classList.toggle("actif");
                    selecteurDes.classList.toggle("actif");
    
                    laDescription.classList.toggle("actif");
                    listeLanguages.classList.toggle("actif");
                }

            }
        });








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