function displayXml(xml){

    const xmlDoc = xml.responseXML;
    const keyWordNode = xmlDoc.getElementsByTagName("Keywords");
    var keyWordItem = keyWordNode[0].childNodes;
    var myList = "<ul>";
        for (i=0; i<keyWordItem.length; i++) {
            if (keyWordItem[i].nodeType == 1) {
   myList += "<li>" + keyWordItem[i].innerHTML + "</li>";
 }
            //myList +="<li>" + xx[i].nodeValue + "</li>";
        }
    myList += "</ul><br/> File Annalsyed succesfully";
    document.getElementById("keywordlist").innerHTML = myList;

}

function loadfile(path,file) {
  // NOTE path is returned as /var/www/html
  // hard code path to "correct" value
  path = 'gallery/';
var clientXml; //= new XMLHttpRequest;
if (window.XMLHttpRequest) {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  clientXml = new XMLHttpRequest();
} else {  // code for IE6, IE5
  clientXml = new ActiveXObject("Microsoft.XMLHTTP");
}

clientXml.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
   /*document.getElementById("keywordList").innerHTML = this.responseText;*/ 
   displayXml(this);
  } else  { 
    document.getElementById("keywordlist").innerHTML = "file status : readystate : " + this.statusText ; 
  }
}

clientXml.open("GET",path+file,true);
clientXml.send();
}