////////////////////// Chargez XMLHttpRequest //////////////
/*
let xhr;
*/
function xhrInit(xhr) {
    window.onload = xhrXml;

    function xhrXml() {
        xhr = new XMLHttpRequest();
    }
};
///////////////////// Envoie de requette ajax ///////////////
/*let objetSend = {
    'key1': value1,
    'key2': value2,
};
*/
function sendAjax(filePhp, stringSend) {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                console.log(this.response);

            }
        } else { console.log('') }
    }
    xhr.open("POST", filePhp, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //PHP///* header("Content-Type: text/plain"); */ 
    xhr.send(stringSend);
};
///////////////////// Requete de demande ajax /////////////////

function seekAjax(dataBase) {
    let xhr = new XMlHttpRequest();

}