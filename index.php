<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once 'model/Data.php'; ?>
    <title>Chat</title>
</head>
<body>
    <div id="boxDialogue"></div>
    <form method="POST" action="process/process-mess.php">
        <input type="text" id="message" name="message"/>
        <button id="btnMessage">Envoie</button>
    </form>
    <form method="POST" action="process/process-connect.php">
        <input type="text" name="pseudo"/>
        <button id="btnConnect">Connect</button>
    </form>


<script>
    
    let btnMessage = document.querySelector('#btnMessage');
    let btnConnect = document.querySelector('#btnConnect');

    btnMessage.addEventListener('click', function(e) {
        e.preventDefault();
    })
    btnConnect.addEventListener('click', function(e){
        e.preventDefault();
    })
    
    btnMessage.addEventListener('click', function(callback){
        let intext = document.querySelector('#message').value;
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    console.log("Réponse reçu: %s", this.responseText);
                }else{
                    console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
                }
            }
        }
        xhr.open('POST', 'process/process-mess.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('message='+ intext);
        
    })
</script>

</body>
</html>