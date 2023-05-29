const errore_nome = document.getElementById('errore_nome');
const errore_cognome = document.getElementById('errore_cognome');
const errore_username = document.getElementById('errore_username');
const errore_email = document.getElementById('errore_email');
const errore_password = document.getElementById('errore_password');


function validazione_nome(){

    const nome = document.getElementById('nome');
    const valore_nome = nome.value;
    console.log('ciao '+ valore_nome);
    if( valore_nome.length === 0){
        errore_nome.innerHTML = 'Inserire il Nome';
        return false;
    }
    errore_nome.innerHTML='';
       
}
function validazione_cognome(){
    const cognome = document.getElementById('cognome');
    const valore_cognome = cognome.value;
    console.log('ciao '+ valore_cognome);
    if( valore_cognome.length === 0){
        errore_cognome.innerHTML = 'Inserire il Cognome';
        return false;
    }
    errore_cognome.innerHTML='';
    
}

function validazione_username(){
    const username = document.getElementById('username');
    const valore_username = username.value;
    console.log('ciao '+ valore_username);
    if( valore_username.length === 0){
        errore_username.innerHTML = 'Inserire username';
        return false;
    }
    if( !/^[a-zA-Z0-9_]{5,100}$/.test(valore_username)){
        
        errore_username.innerHTML ='Username non Valido';
        
    }else{
        errore_username.innerHTML ='';
    }
    
}
function validazione_email(){
    const email = document.getElementById('email');
    const valore_email = email.value;
    console.log('ciao '+ valore_email);
    if( valore_email.length === 0){
        errore_email.innerHTML = 'Inserire email';
        return false;   
    }else{
        if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(email.value).toLowerCase())) {
            errore_email.innerHTML='Email non valida';
        } else {
            fetch("controllo_email.php?q="+encodeURIComponent(String(valore_email).toLowerCase())).then(OnResponse).then(jsonEmail);
        }
    }
}
function validazione_password(){
    const password = document.getElementById('password');
    const valore_password = password.value;
    console.log('ciao '+ valore_password);
    if( valore_password.length === 0){
        errore_password.innerHTML = 'Inserire password';
        return false;
    }
    if( valore_password.length < 8 ){
        errore_password.innerHTML = 'Caratteri password minimi: 8';
        return false;
    }
    errore_password.innerHTML='';

}


function jsonEmail(json) {

    if (json.exists===true) {
       errore_email.innerHTML='Email già in uso'; 
        
    }else{
        errore_email.innerHTML ='';
    }
}

function OnResponse(response) {
    return response.json();
}

const errori = [];