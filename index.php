<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
</head>
<body>
    <!-- la div qui contiendras le chat -->
    <div id="boxDialogue"></div>
    <!--  -->
    <form method="POST" action="process/process-mess.php">
        <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo"/>
        <input type="text" id="message" name="message" placeholder="Message"/>
        <button id="btnMessage">Envoie</button>
    </form>
    <aside id="part">
        <h3></h3>
        <button id="btnNumMess">Combien de message ?</button>
    </aside>
<script>
    // Déclaration des variables qui vont être utilisées.
    let btnNumMess = document.querySelector('#btnNumMess');
    let btnMessage = document.querySelector('#btnMessage');
    let div = document.querySelector('#boxDialogue');
    let aside = document.querySelector('#part');
    let h3 = document.querySelector('h3');
    let xhr;
    let ancienMax;
    // Au chargement de la page on lance la function xhrInst ...
    window.onload = xhrInst;
    // ... que voici.
    function xhrInst() {
        xhr = new XMLHttpRequest();
    };
    // On retire les parametres par default des button.
    btnMessage.addEventListener('click', function(e) {
        e.preventDefault();
    });
    btnNumMess.addEventListener('click', function(e){
        e.preventDefault();
    });
    // Pour afficher le nombre de message
    btnNumMess.addEventListener('click', function(){
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    let messdb = JSON.parse(this.response);
                    h3.innerHTML = messdb[0][0];   
                }
            }        
        }
        xhr.open("POST","process/num-mess.php", true);
        xhr.send();
    });
    // On defini l'effet du click/button
    // Au moment du click ...
    btnMessage.addEventListener('click', function(){
        // ... on place le contenu des inputs dans des variables, ...
        let intext = document.querySelector('#message').value;
        let pseudo = document.querySelector('#pseudo').value;
        // ... on verifie si elles ont quelques choses, ...
        if (typeof(intext)!='undefined' && typeof(pseudo)!='undefined') {
            // ... ici on fabrique notre message d'erreur si besoin, ...
            xhr.onreadystatechange = function() {
                // ... si la requette est faite ...
                if (this.readyState === XMLHttpRequest.DONE) {
                    // ... et que le status de la requette es 200(tout est ok) ...
                    if (this.status === 200) {
                        // ... alors un petit message en console pour dire ok ...
                        console.log("Réponse reçu: %s", this.responseText);
                    }else{
                        // ... dans le cas contraire on affiche le status, ...
                        console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
                    }
                }
            }
            // ... mtn que tout est pret, on prepare l'ouverture de l'echange ...
            xhr.open('POST', 'process/process-mess.php', true);
            // ... ?je sais pas, essentiel pour que sa marche (copi/coll)? ...
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            // ... on envoie la requette avec ce qu'on veut faire passer.
            xhr.send('message='+intext+'&pseudo='+pseudo);
        }else{
            // si les champs étais vide.
            alert('Remplisser les champs');
        }
    });
    // ici on vas mettre a jour le chat de foncer repeter
    setInterval(function request() {
        // ... on parametre notre requette ...
        xhr.onreadystatechange = function() {
            // ... si elle est faite ...
            console.log(xhr.readySate);
            if (xhr.readyState === XMLHttpRequest.DONE) {
                // ... si tout es bon ...
                if(xhr.status === 200){
                    // ... alors on decode le fichier renvoyer par php préalablement jsoné ...
                    let messdb = JSON.parse(this.response);
                    // ... ici on verifie si la div est vide ...
                    if(div.innerHTML === ""){
                        // ... place la longueur du tab de coté ...
                        ancienMax = messdb.length;
                        // ... pour chaque element du tab on l'affiche
                        for(let i =0; i < messdb.length; i++){
                            // ... tous sa c'est de l'aff ...
                            let h4 = document.createElement('h4');
                            let p = document.createElement('p');
                            h4 = div.appendChild(h4);
                            p = div.appendChild(p);
                            h4.innerHTML = messdb[i][1];
                            p.innerHTML = messdb[i][0];
                        
                        }
                        // ... ducoup si la div n'est pas vide ...
                    }else{
                        // ... on place la longueur du tab qu'on vien d'avoir ...
                        // (garder en tete que ce script s'execute a chaque interval apres la charge de la page)
                        for(let i = ancienMax; i < messdb.length; i++){
                            let h4 = document.createElement('h4');
                            let p = document.createElement('p');
                            h4 = div.appendChild(h4);
                            p = div.appendChild(p);
                            h4.innerHTML = messdb[i][1];
                            p.innerHTML = messdb[i][0];
                            // on remplace l'ancienne value de ancienMax pour la prochaine boucle
                            ancienMax = messdb.length;
                        } 
                    }
                }else{
                    console.log("Reponse de l'erreur", this.status);
                }
            }
        }
        // ... on prepare ... 
        xhr.open("POST","process/seek-mess.php", true);
        // ... on envoi sans argument...
        xhr.send();// et tous, sa toute les 0.5s.
    }, 0500);
</script>

</body>
</html>