function verif1(){
    const categorie=document.getElementById("categorie").selectedIndex;
    if(categorie==0){
        alert('Veuillez choisir une catégorie');
        return false;
}
const des=document.getElementById("des").value;
if(!alpha(des)){
    alert('La description ne doit contenir que des lettres et des espaces');
    return false;
}
const s=document.getElementById("s").checked;
const m=document.getElementById("m").checked;
const l=document.getElementById("l").checked;
const xl=document.getElementById("xl").checked;
if(!document.getElementById("s").checked &&!document.getElementById("m").checked && !document.getElementById("l").checked && !document.getElementById("xl").checked)
{
    alert("veuillez selectionner une taille");
    return false;
}
const prix=document.getElementById("prix").value;
if((Number(prix)<100)||(Number(prix)>2000))
{
    alert("Verifiez le Prix");
    return false;
}

}
function alpha(ch){
    if((ch.length<10)||(ch.length>100))
    {
        test=false;
    }
    for (let i=0;i<ch.length;i++){
        if(ch[i]<"0"||ch>"9"&ch!=""){
            test=false;
        }
        return true;
    }
}
function verif2()
{
   const code=document.getElementById("code").value;
    if((Number(code)<1)||(isNaN(code))){
        alert("vérifier le code Habit");
        return false;
    }
   const cin=document.getElementById("cin").value;
    if(isNaN(cin)||(cin.length!=8)||((cin.charAt(0)!='0') && (cin.charAt(0)!='1') ) )
    {
        alert("Vérifier CIN ");
        return false;
    }
   const duree=document.getElementById("duree").value;
    if((duree>'4')||(duree<'1')){
        alert("Vérifier la durée");
    }
}
