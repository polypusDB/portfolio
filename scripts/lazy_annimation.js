(function(){
    window.addEventListener("load", function(){
    
        /**
         * Détecte si le système d'exploitation est exécuté sur un iphone, un ipad ou un ipod
         * source pour la ligne de détection https://stackoverflow.com/questions/9038625/detect-if-device-is-ios
         */
        var isIOS = /(iPhone|iPod|iPad)/i.test(navigator.platform);


        const faders = document.querySelectorAll(".fade-in");
        const navObs = document.querySelectorAll(".navObs");
        let menuElem = document.querySelectorAll(".menu li a");

        /**
         * si le navigateur n'est pas sur un iphone, un ipad ou un ipod on exécute le code ci-dessous
         * On fait des fade-in sur la section des compétances et change la classe actif dans le menu selon l'emplacement 
         * survollé sur la page
         */
         if(isIOS == false){
             /**
              * CES OPTIONS SONT UTILISÉ PAR L'INTERSECTION OBSERVER
              * ET LES PARAMÈTRES UTILISÉ CI-DESSOUS REPRÉSENTE LA PRÉSENCE REQUIS PAR L'ITEM OBSERVÉ POUR LANCÉ
              * L'ÉVÈNEMENT "threshold" REPRÉSENTE 100% ET LE "rootMargin" REPRÉSENTE OU L'OBESRVATION PREND LIEU PAR RAPPORT
              * À L'ÉCRAN DONC DANS CE CAS SI L'ÉCRAN COMPLET PLUS 50 PX EN HAUT ET EN BAS
              */
            const appreaOptions = {
                root: null,
                threshold: 1,
                rootMargin: "-50px 0px"
            };
        
            /**
             * L'OBSERVEUR RECOIS EN PARAMÈTRE LES OBJETS OBSERVÉ ET LANCE UN ÉVÈNEMENT A CHAQUE ENTRÉ ET SORTIE DE LA ZONE OBSERVABLE
             * DANS LE CAS PRÉSENT ON N'OBSERVE QUE L'ENTRÉ ET ON AJOUTE UNE CLASSE APPEAR QUI LANCE L'ANNIMATION CSS
             */
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

            /**
             * ICI ON SET LES ÉLÉMENTS OBSERVABLE SELON CES CONDITIONS
             */
            faders.forEach(fader => {
                appearOnScroll.observe(fader);
            })


            /**
             * MÊME PROCÉDÉ QUE PLUS HAUT AVEC ES ÉLÉMENTS DIFFÉRENT ET DES MESURES DIFFÉRENTES
             * ÉLÉMENT OBSERVÉ EST LES SECTIONS POUR CHANGÉ LA CLASS ACTIF DANS LE MENU
             */
            const obsOption = {
                root: null,
                threshold: 0.25,
                rootMargin: "0px"
            };

            const interNav = new IntersectionObserver(function(entries, interNav){
                entries.forEach(entry =>{
                    if(!entry.isIntersecting){
                        return;
                    }
                    menuElem.forEach(menuItem =>{
                        if(menuItem.classList.contains(entry.target.id)){
                            menuItem.classList.add("actif")
                        }
                        else{
                            menuItem.classList.remove("actif")
                        }
                    })
                });
            }, obsOption)
        
            /**
             * OBSERVATION DES SECTIONS
             */
            navObs.forEach(navob => {
                interNav.observe(navob);
            })
        
         } // SI ON N'EST PAS SUR IPHONE IPAD OU IPOD ON LOAD MET LA CLASS APPEAR DIRECTEMENT SINON LES ÉLÉMENTS NE SONT PAS VISIBLE
         else{
            faders.forEach(fader => {
                fader.classList.add("appear");
                fader.children[1].classList.add("appear");
            })
            
         }
    })
})()