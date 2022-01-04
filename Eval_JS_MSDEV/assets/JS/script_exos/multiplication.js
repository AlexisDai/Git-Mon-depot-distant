function tableMultiplication(){

    var nb = window.prompt("Entrez un nombre");
    var i;
    var resultat;

    for(i=0; i <= 10; i++){
        
        resultat = parseInt(nb) * parseInt(i);
        document.write(nb+" x "+i+" = "+resultat);
        document.write("<br>") 
    }
    
}