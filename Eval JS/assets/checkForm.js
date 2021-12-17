
    var formValid = document.getElementById("validation");

    var nom = document.getElementById("nom");
    var missNom = document.getElementById("missNom");
    var nomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
    
    var prenom = document.getElementById("prenom");
    var missPrenom = document.getElementById("missPrenom");
    var prenomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
    
    var date = document.getElementById("ddn");
    var missDate = document.getElementById("missDate");

    var cp = document.getElementById("cp");
    var missCp = document.getElementById("missCp");
    var cpValid = /^[0-9]{5}$/;
    
    var adresse = document.getElementById("adresse");
    var missAdresse = document.getElementById("missAdresse");
    var adresseValid = /^[0-9]+\s[A-Za-z]+\s[A-Za-z\s\W]*$/; 
    
    var ville = document.getElementById("ville");
    var missVille = document.getElementById("missVille");
    var villeValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/

    var email = document.getElementById("email");
    var missEmail = document.getElementById("missEmail");
    var emailValid = /^[a-z0-9.-]+@[a-z0-9.-]{2,}[.][a-z]{2,4}$/

    var sujet = document.getElementById("sujet");
    var missSujet = document.getElementById("missSujet"); 

    var question = document.getElementById("question");
    var missQuestion = document.getElementById("missQuestion");
    var questionValid = /^[\D0-9]*$/

    var check = document.getElementById("check");
    var missCheck = document.getElementById("missCheck");


    formValid.addEventListener('click', validation);

    

    function validation(event){

        ///////////////////////////
        //Validation du champ Nom//
        ///////////////////////////

        //Si le champ est vide
        
        if (nom.validity.valueMissing){
            event.preventDefault();
            missNom.textContent = 'Nom manquant';
            missNom.style.color ='red';

        //Si le format de données est incorrect

        }else if(nomValid.test(nom.value) == false){
            event.preventDefault();
            missNom.textContent = "Format incorrect";
            missNom.style.color = "orange";
        }

        //////////////////////////////
        //Validation du champ Prénom//
        //////////////////////////////

        if(prenom.validity.valueMissing){
            event.preventDefault();
            missPrenom.textContent = "Prénom manquant";
            missPrenom.style.color= "red";
        
        }else if(prenomValid.test(prenom.value) == false){
            event.preventDefault();
            missPrenom.textContent = "Format incorrect";
            missPrenom.style.color = "orange";
        }
        
       
        ////////////////////////////////
        //Validation Date de naissance//
        ////////////////////////////////

        if(date.validity.valueMissing){
            event.preventDefault();
            missDate.textContent = "Date de naissance manquante";
            missDate.style.color = "red";
        }



        /////////////////////////////
        //Validation du Code postal//
        /////////////////////////////

        if(cp.validity.valueMissing){
            event.preventDefault();
            missCp.textContent = "Code Postal manquant";
            missCp.style.color ="red";

        }else if(cpValid.test(cp.value) == false){
            event.preventDefault();
            missCp.textContent = "Format incorrect";
            missCp.style.color = "orange";
        }

        ///////////////////////////
        //Validation de l'adresse//
        ///////////////////////////

        
        if( adresse.value !="" && adresseValid.test(adresse.value) == false){
            event.preventDefault();
            missAdresse.textContent = "Format incorrect";
            missAdresse.style.color = "orange"
        }

        //////////////////////////
        //Validation de la ville//
        //////////////////////////

        if(ville.value !="" && villeValid.test(ville.value) == false){
            event.preventDefault();
            missVille.textContent = "Format incorrect";
            missVille.style.color = "orange";
        }
    
        ////////////////////
        //Validation Email//
        ////////////////////

        if(email.validity.valueMissing){
            event.preventDefault();
            missEmail.textContent = "Adresse Email manquante";
            missEmail.style.color = "red";
        }else if(emailValid.test(email.value) == false){
            event.preventDefault();
            missEmail.textContent = "Format incorrect";
            missEmail.style.color =" orange";
        }
        
        ////////////////////
        //Validation sujet//
        ////////////////////

        if(sujet.validity.valueMissing){
            event.preventDefault();
            missSujet.textContent = "Indiquez un sujet";
            missSujet.style.color = "red";
        }

        ///////////////////////
        //Validation Question//
        ///////////////////////
    
        if(question.validity.valueMissing){
            event.preventDefault();
            missQuestion.textContent = "Ecrivez votre question";
            missQuestion.style.color = "red";
        }else if(questionValid.test(question.value) == false){
            event.preventDefault();
            missQuestion.textContent = "Format incorrect";
            missQuestion.style.color = "orange";
        }


        ////////////
        //CheckBox//
        ////////////
    
        if(check.validity.valueMissing){
            event.preventDefault();
            missCheck.textContent = "Cochez cette case pour continuer";
            missCheck.style.color = "red";
        }
    
    
    
    
    
    
    
    }   