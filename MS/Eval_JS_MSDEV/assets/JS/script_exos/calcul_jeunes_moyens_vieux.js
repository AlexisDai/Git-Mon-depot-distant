var age;
var comp1=0;
var comp2=0;
var comp3=0;

function calcul(){
    do{
        age = window.prompt("Indiquez un âge");

        if (age<20){
            comp1++;
        }

        if (age>40){
            comp2++;
        }

        if (age>=20 && age<=40){
            comp3++;
        }
    }while(age<100)

    window.alert("Il y a "+comp1+" jeunes");
    window.alert("Il y a "+comp2+" vieux.");
    window.alert("Il y a "+comp3+" personnes entre 20 et 40 ans.");
}