<?php

header ( "content-type: application/xml; charset=ISO-8859-15");
$xml = new DOMDocument();
$xml->formatOutput = TRUE;


$root = $xml->createElement( "ImageItem") ; // create the root
$xml_fileInfo = $xml->createElement("Image");
$xml_fileInfo->setAttribute("fileName","ImageFileName");
$xml_fileInfo->setAttribute("location","FileImageLocation(local/web/GS");

// add safe search result to fileIno Node
$xml_safeSearch = $xml->createElement("Safe_Search");
$xml_safeSearch->setAttribute("Adult","likeliAdult");
$xml_safeSearch->setAttribute("Spoof","likeliSpoof");
$xml_safeSearch->setAttribute("Medical","likeliMedical");
$xml_safeSearch->setAttribute("Violence","likeliViolence");
$xml_safeSearch->setAttribute("Racy","likeliRacy");
$xml_fileInfo->appendChild($xml_safeSearch);

// Create Label branch
$xml_label = $xml->createElement("Labels");
// creat sub branch within Label Branch
$xml_labelItem = $xml->createElement("labelItem","description returned from vision");
$xml_labelItem->setAttribute("accuracy","probablityScoreReturned%1"); // assign atribute to branch
$xml_label->appendChild($xml_labelItem); // write current Label sub branch to main 'Label' perant branch
//repeat for all label item


// Create Landmark Branch
$xml_landmark = $xml->createElement("Landmarks");

$xml_landmarkItem = $xml->createElement("landmarkItem");
$xml_landmarkItem->setAttribute("Keyword","DescriptionReturned");
$xml_landmarkItem->setAttribute("accuracy","probablityScoreReturned");
$xml_landmark->appendChild($xml_landmarkItem);

$xml_object = $xml ->createElement("Objects");

$xml_objectItem = $xml->createElement("objectItem");
$xml_objectItem->setAttribute("Keyword","Description");
$xml_objectItem->setAttribute("accuracy","probablityScoreReturned");
$xml_objectVertices = $xml->createElement("vertices");
$xml_objectVertices->setAttribute("xy","vertice_x1y1");
$xml_objectVertices->setAttribute("x2y2","vertice_x2y2");
$xml_objectVertices->setAttribute("x3y3","vertice_x3y3");
$xml_objectVertices->setAttribute("x4y4","vertice_x4y4");

$xml_objectItem->appendChild($xml_objectVertices);
$xml_object-> appendChild($xml_objectItem);

$xml_face = $xml->createElement("faces");

$xml_faceObject = $xml->createElement("faceObject");
$xml_faceEmotionProb = $xml->createElement("emotionalLikeliHood");

$xml_faceEmotion = $xml->createElement("emotion");
$xml_faceEmotion->setAttribute("Anger","angerLikeliHood");
$xml_faceEmotionProb->appendChild($xml_faceEmotion);

$xml_faceEmotion = $xml->createElement("emotion");
$xml_faceEmotion->setAttribute("Joy","joyLikeliHood");
$xml_faceEmotionProb->appendChild($xml_faceEmotion);

$xml_faceEmotion = $xml->createElement("emotion");
$xml_faceEmotion->setAttribute("Sorrow","sorrowLikeliHood");
$xml_faceEmotionProb->appendChild($xml_faceEmotion);

$xml_faceEmotion = $xml->createElement("emotion");
$xml_faceEmotion->setAttribute("Surpise","surpiseLikeliHood");
$xml_faceEmotionProb->appendChild($xml_faceEmotion);

$xml_faceEmotion = $xml->createElement("emotion");
$xml_faceEmotion->setAttribute("Headwear","headwearLikeliHood");
$xml_faceEmotionProb->appendChild($xml_faceEmotion);

$xml_faceObject->appendChild($xml_faceEmotionProb);

$xml_faceVertices = $xml->createElement("vertices");
$xml_faceVertices->setAttribute("xy","vertice_x1y1");
$xml_faceVertices->setAttribute("x2y2","vertice_x2y2");
$xml_faceVertices->setAttribute("x3y3","vertice_x3y3");
$xml_faceVertices->setAttribute("x4y4","vertice_x4y4");

$xml_faceObject->appendChild($xml_faceVertices);

$xml_face->appendChild($xml_faceObject);


$xml_fileInfo->appendChild($xml_label);
$xml_fileInfo->appendChild($xml_landmark);
$xml_fileInfo->appendChild($xml_object);
$xml_fileInfo->appendchild($xml_face);

$xml->appendChild($xml_fileInfo);

file_put_contents(__DIR__.'/xmlfile.xml',$xml->saveXML());
//echo $xml->saveXML();

?>
