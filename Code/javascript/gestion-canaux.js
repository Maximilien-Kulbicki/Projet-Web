
    // affiche le canal dans la liste 
    function afficher_canal(nom,chemin){
        let canal = document.createElement("li");
        canal.className = "canal";
        canal.setAttribute("data-chemin",chemin);
        canal.innerHTML = nom;
        document.getElementById("canaux").appendChild(canal);
    }

    // recupere le nom des canaux et le chemin pour discussion
    // json represente la reponse du serveur
    // qui est un tableau associatif (nom => chemin) 
    function get_canaux(json){
        document.getElementById('canaux').innerHTML=""; // on vide les canaux existants

        var canaux = JSON.parse(json.responseText);
        for( let nom in canaux){
            afficher_canal(nom,JSON.parse(json.responseText)[nom]);
        }

    }

    // verifie que le nom d'un canal est utilisable
    // pas vide, pas d'espace, pas de caracteres spéciaux, tout attaché
    function nom_valide(nom){
        let bool = true;
        let array = Array.from(nom);
        let caracteres =  [' ','/','.',',',';','?','!',':'];

        function est_bon(element, index, array){
            for(let i=0;i<caracteres.length;i++){
                if(element == caracteres[i]){
                    return false;
                }
            }
            return true;
        }

        for (let i=0;i<array.length;i++){
            if(!array.every(est_bon)){
                bool = false;
            }
        }
        return bool;
        
    }

    // ajoute un canal dans la liste des canaux 
    // doit vérifier qu'aucun autre canal ne porte le même nom
    // ecrit dans la balise prévue lors d'une erreur de saisie 
    function ajouter_canal(nom){
        let bool = true;
        let canaux = document.querySelectorAll("li.canal");
        for(let canal of canaux){
            if (canal.innerHTML==("#"+nom) || !nom_valide(nom)){
                bool = false;
            }
        }

        if (bool){
            let request = new simpleAjax("liste-canaux.php","post","put=yes&nom="+nom,get_canaux);
        }

        else{ // message d'erreur
            document.getElementById("erreur-nom").style.visibility = "visible";
            document.getElementById("erreur-nom").innerHTML = "Nom invalide - veuillez reessayez";
        }
    }

    // supprime un canal selon son nom et la discussion qui va avec 
    // se fait en ajax 
    function supp_canaux(nom){

    }

    // affiche la liste des canaux dans le corps de la page 
    function afficher_canaux(){
        let request = new simpleAjax("liste-canaux.php","post","get=yes",get_canaux); // remplis le tableau canaux
    }

    window.onload = function(){
        afficher_canaux();

        document.getElementById("canal-submit").onclick = function(){ // on associe le clique du bouton valider ... 
            let nom = document.querySelector("#ajout-canal input").value;
            ajouter_canal(nom);
        }
    }


    
