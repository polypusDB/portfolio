(function(){
    window.addEventListener("load", function(){
        /**
         * GESTION DE L'OUVERTURE ET DE LA FERMETURE DU MENU, AINSI QUE LE 
         * SCROLL EST DÉSACTIVÉ SI MENU EST OUVERT
         */
        let body = document.querySelector("body");
        let menu_burg = document.querySelector(".menu_burger");
        let menu_ul = document.querySelector(".menu");
        let liensNav = document.querySelectorAll(".menu a");

        liensNav.forEach(lien => {
            
            lien.addEventListener("click", function(){
                menu_burg.classList.remove("actif");
                menu_burg.classList.add("fermer");
                menu_ul.classList.toggle("open");
                body.classList.remove("noScroll");
                
            })
        })

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

    })
})()