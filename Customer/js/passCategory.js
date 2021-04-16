function passCategory(elementID,catID)
{
	console.log(elementID+" , "+catID);
	if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else{
        xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange= function(){
        if (this.readyState==4 && this.status==200) {
        	if(str!=0)
        	{
        		document.getElementById(elementID).innerHTML = this.responseText;
        	}
        }
    }
    xmlhttp.open("GET","getByCategory.php?value="+catID, true);
    xmlhttp.send();
}