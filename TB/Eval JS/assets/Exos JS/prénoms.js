function prenom()
{

    var prenom=window.prompt("Saisissez un prénom");
    var tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
   
    if(tab.indexOf(prenom,0)==-1)
    {
        alert("Prénom inexistant");

    }else if(tab.indexOf(prenom,0)>-1)
    {
        alert("Prénom correct");
        tab.splice(tab.indexOf(prenom), 1);
        document.write(tab);
    }

}