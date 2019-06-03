// javascript function for calling image file to be anasyled 
// and gathering and output of the keywords -retreieved from the xml file

function displayXml(xml){

    const xmlDoc=xml.responseXML;
    const keyWordNode= xmlDoc.getElementsByTagName("Keywords");
    var keyWordItem = keyWordNode[0].childNodes;
    var myList = "<ul>";
        for (i=0; i<keyWordItem.length; i++) {
            if (keyWordItem[i].nodeType == 1) {
   myList += "<li>" + keyWordItem[i].innerHTML + "</li>";
 }
            //myList +="<li>" + xx[i].nodeValue + "</li>";
        }
    myList +="</ul><br/> File Annalsyed succesfully";
    document.getElementById("keywordlist").innerHTML = myList;

}

function loadfile() {
var clientXml = new XMLHttpRequest;
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
clientXml.open("GET","demo.xml");
clientXml.send();
}

function myFunction() {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState== 4 && this.status == 200) {   
            document.getElementById("keywordlist").innerHTML = "Analying image please wait......";
            loadfile();
        }

    };
    xhttp.open("POST","myVision.php",true);
    //document.getElementById("demo").innerHTML = "Analying image please wait......";
    xhttp.send();

}