function tableMulti(nb){
var nb=window.prompt("Saisissez un nombre");

	for(var i=0; i<=10; i++)
	{
		var res=parseInt(i)*parseInt(nb);
        document.write(nb+" x "+i+" = "+res);
        document.write ("</br>");
	}
	
}		
