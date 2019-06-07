<?php 
echo"entering php script <br/>";

$xml=simplexml_load_file("keywordtest.xml") or die ("Error : cant open file"); //adjust error message before publishing!!!!!!!!!
print_r($xml);
/*foreach($xml->children() as $subject){
    echo $subject->rdf .", <br>" ;
    echo $subject->li ."<br>";
}


/* $xmlDoc = new DOMDocument();
$xmlDoc->load("keywordtest.xmp");
$x=$xmlDoc->getElementsByTagName['<dc:subject>'] ; // searches for nonhierachy keyword list
    for ($i=0; $i<=$x->length-1; $i++) {
        //process only elemetn nodes
        if ($x->item($i)->nodeType==1)) {
            //if ($x->item($i)->childNodes->item(0)->nodeValue == $q) {
                $y=($x->item($i)->parentNode);
            //}
        }
    }

    $cd=($y->childNodes);

    for ($i=0; $i<$cd->length;$i++){
        //process only element nodes
        if ($cd-item($i)->nodeTypes ==1){
            echo("<b>. $cd->item($i]->nodeName.":</b>");
            echo($cd->item($i)->childNodes->item(0)->nodeValue);
            echo("<br>");
        }
    } */
    ?>
    