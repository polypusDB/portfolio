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
            
        });
        /**
         * ouvrir la boîte de dialoague
         */
        parent_projet.addEventListener("click", function(evt){
            dialog_box.classList.toggle("close");
            console.log(evt.clientX);
            if(evt.target.classList.contains("plus")){
                
            }
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


        selecteur.addEventListener("click", function(evt){
            if(!evt.target.classList.contains("actif")){
                selecteurLan.classList.toggle("actif");
                selecteurDes.classList.toggle("actif");

                laDescription.classList.toggle("actif");
                listeLanguages.classList.toggle("actif");
            }
        })




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
            console.log(fader.children[1]);
            appearOnScroll.observe(fader);
        })



        



    });

})()