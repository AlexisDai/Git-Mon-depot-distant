function age()
{

var nb;
var comp1=0;//-20 ans
var comp2=0;//+40 ans
var comp3=0;//20-40 ans

do{
	nb=window.prompt("Saisissez un âge");
	
	if(nb<20)
	{
		comp1++;
	}
	
	if(nb>40)
	{
		comp2++;
	}
	
	if(nb>=20 && nb<=40)
	{
		comp3++;
	}
	
}while(nb<100);

alert("Il y a "+comp1+" personnes d'âges inférieurs à 20 ans.");
alert("Il y a "+comp2+" personnes d'âges supérierus à 40 ans.");
alert("Il y a "+comp3+" personnes d'âges compris entre 20 et 40 ans.")


}