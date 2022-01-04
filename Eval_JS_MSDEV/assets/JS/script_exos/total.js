function total()
{
var PU=window.prompt("Saisissez le prix unitaire");
var QTECOM=window.prompt("Saisissez la quantité commandée");
var TOT=parseInt(PU)*parseInt(QTECOM);
var REM;
var PORT;
/////////////////////////
//Pour une remise de 5%//
/////////////////////////
    if(TOT>=100 && TOT<=200)
    {
        REM=5
        var rem=TOT*REM/100; //on calcule la valeur de la remise
        TOT=parseInt(TOT)-rem;
        
        if(TOT>500) //si le prix remisé>500 = frais de port gratuit
        {
            var port=0;
            TOT=TOT+port;
            
        }else if(TOT<=500) //si le prix remisé<500 = frais de port 2% du prix
        {
            PORT=2;
            var port=TOT*PORT/100; // on calcule la valeur des frais de port
            
            if(port<6)// Si frais de port <6 alors on applique le minimum de 6€ pour les frais
            {
                port=6;           
                TOT=TOT+port;
                console.log(TOT);
            }else if(port>=6)//Si port>6 on ajoute au prix
            {
    
                TOT=TOT+port;
                console.log(TOT);
            }

        }
    }
    //////////////////////////
    //Pour une remise de 10%//
    //////////////////////////

    if(TOT>200)
    {
        REM=10;
        var rem=TOT*REM/100; //on calcule la valeur de la remise
        TOT=parseInt(TOT)-rem;
        

        if(TOT>500)//Si prix remisé>500 alors port=gratuit
        {
            var port=0;
            TOT=TOT+port;
            console.log(TOT);
        }else if(TOT<=500) //Si prix remisé <=500 alors port=2% du prix
        {
            PORT=2
            var port=TOT*PORT/100; //on calcule la valeur des frais de port
            
            if(port<6)  //Si port <6 alors on applique le minimum de 6€ et on ajoute au prix
            {
                port=6;
                TOT=TOT+port;
                console.log(TOT);
            }else if(port>=6) // si port>6 on ajoute les frais de port au prix
            {
                TOT=TOT+port;
                console.log(TOT);
            }
        }
    }

    ///////////////
    //Sans remise//
    ///////////////

    if (TOT<100) //Si prix total<100 alors pas de remise
    {
        rem=0;
        PORT=2;
        var port=TOT*PORT/100; // on calule la valeur des frais de port

        if(port<6)//Si frais de port<6 on applique le minimum de 6€ et on ajoute au prix
        {
            port=6;
            TOT=TOT+port;       
            console.log(TOT);
        }else if(port>=6)// Si frais de port>6 on ajoute au prix
        {
            TOT=TOT+port;
            console.log(TOT);
        }
    }

    alert("Vous devez payer "+TOT+" €.");
    alert("Vous bénéficiez d'une remise de "+rem+" €.");
    alert("Vous payez "+port+" € de frais de port.")
}