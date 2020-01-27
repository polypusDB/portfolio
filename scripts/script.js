(function(){
    window.addEventListener("load", function(){
        let btn_close = document.querySelector(".btn_X");
        let dialog_box = document.querySelector(".projetSelect");
        let parent_projet = document.querySelector(".mesProjets");
        let filtres = document.querySelector(".filtres");
        let filtre = document.querySelectorAll(".filtre");
        let menu_burg = document.querySelector(".menu_burger");
        let menu_ul = document.querySelector(".menu");
        

        menu_burg.addEventListener("click", function(){
            console.log(menu_burg);
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
            if(evt.target.classList.contains("plus")){
                dialog_box.classList.toggle("close");
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



    });

})()