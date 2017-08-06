<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Chat</title>
</head>
<body>
    <!-- la div qui contiendras le chat -->
    <div id="boxDialogue"></div>
    <!--  -->
    <form method="POST" action="process/process-mess.php">
        <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo"/>
        <input type="text" id="message" name="message" placeholder="Message"/>
        <button class="btn btn-lg btn-primary" id="btnMessage">Envoie</button>
    </form>
    <aside id="part">
        <h3></h3>
        <button class="btn btn-lg btn-primary"id="btnNumMess">Combien de message ?</button>
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
                    console.log(messdb);
                    h3.innerHTML = messdb[0];   
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
        let xhr = new XMLHttpRequest();
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
   ////////////////////////////////  ici on vas mettre a jour le chat avec les message de la base de donné
   // on place notre requette dans un setInterval pour lui demander de l'appliquer tout les tant de temps.
    setInterval(function request() {
        // on instancie notre XmlHttpRequest (ajax)
        xhr = new XMLHttpRequest();


        // ... on declare des instructions pour notre requette
        // ... à un certain moment de celle-ci
        xhr.onreadystatechange = function() {
            // ... on verifie si elle est faite, .DONE étant la dernière étape ...
            if (xhr.readyState === XMLHttpRequest.DONE) {
                // ... on verifie l'état de cette request, 200 = tout est ok ...
                if(xhr.status === 200){
                    // ... on sait que l'on vas envoyer notre requette vers le fichier PHP 
                    // ... cibler par le xhr.open (plus bas)qui lui, nous ressort un fichier JSON ...
                    // ... le resultat de notre requette se trouve dans 'response'(mot prédéfini)
                    let tableauMess = JSON.parse(xhr.response);
                    
                    
                    // Ce qu'il y a dans 'tableauMess' :
                    // les infos que l'on cherche se trouve dans un tableau, 
                    // dans sql. ->(key = column - value = ligne )
                    // puis pour tout envoyer en meme temps, sql place chaque
                    // tableau dans un tableau, et envoie ce dernier.


                    // ... ici on verifie si la div d'affichage est vide 
                    if(div.innerHTML === "") {
                        // ... je prend la longueur du tableau ressorti du JSON, ...
                        // ... donc tous nos messages pour le mettre dans une variable
                        // ... qui va nous servir dans le else ...
                        ancienMax = tableauMess.length;
                        // ... ici on boucle sur chaque element du tableau ...
                        for(let i =0; i < ancienMax; i++){
                            // ... tous sa c'est de l'aff ...
                            let h4 = document.createElement('h4');
                            let p = document.createElement('p');
                            h4 = div.appendChild(h4);
                            p = div.appendChild(p);
                            // ici messdb[i = 1,2,3,ect] pour chaque iteration du for,
                            // donc -> message1 -> message2 -> ect 
                            // et le 2em crochet cible notre column de notre tableau.
                            h4.textContent = tableauMess[i][1];
                            p.textContent = tableauMess[i][0];
                            

                        
                        }
                        // (garder en tete que ce script s'execute à chaque interval apres la charge de la page)
                        // ... ducoup si la div n'est pas vide, c'est qu'il y a deja des messages dedans.
                        //  Nous, on veut afficher uniquement le nouveau message
                        // Pour sa on recupere l'ancienne valeur de la longueur de notre tableau
                        // defini dans le precedent interval
                    }else{
                            for(let i = ancienMax; i < tableauMess.length; i++){
                            let h4 = document.createElement('h4');
                            let p = document.createElement('p');
                            h4 = div.appendChild(h4);
                            p = div.appendChild(p);
                            h4.innerHTML = tableauMess[i][1];
                            p.innerHTML = tableauMess[i][0];
                            // on remplace l'ancienne value de ancienMax pour la prochaine boucle
                            ancienMax = tableauMess.length;
                        } 
                    }
                }
            }
        }
        // ... on prepare notre requette avec :
        // une methode, un chemin/fichier, et sa maniere (true = async / false = sync)
        // (async = envoi sans reset la page / sync = changement de page) ... 
        xhr.open("POST","process/seek-mess.php", true);
        // ... on envoi sans argument car on as pas besoin de transmettre 
        // des infos a php, c'est l'inverse dans ce cas...
        xhr.send();
    // et tous, sa toute les 0.5s.
    }, 0500);
</script>

</body>
</html>