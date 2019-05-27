<?php

header ( "content-type: application/xml; charset=ISO-8859-15");
$xml = new DOMDocument();


$root = $xml->createElement( "ImageItem") ; // create the root
$xml_fileInfo = $xml->createElement("Image");
$xml_fileInfo->setAttribute("fileName","ImageFileName");
$xml_fileInfo->setAttribute("location","FileImageLocation(local/web/GS");


$xml_safeSearch = $xml->createElement("Safe_Search");
$xml_safeSearch->setAttribute("Adult","likeliAdult");
$xml_safeSearch->setAttribute("Spoof","likeliSpoof");
$xml_safeSearch->setAttribute("Medical","likeliMedical");
$xml_safeSearch->setAttribute("Violence","likeliViolence");
$xml_safeSearch->setAttribute("Racy","likeliRacy");
$xml_fileInfo->appendChild($xml_safeSearch);

$xml_labels = $xml->createElement("Labels");
$xml_labelItem = $xml->createElement("labelItem");
$xml_labelItem->setAttribute("Keyword","DescriptionReturned");
$xml_labelItem->setAttribute("accuracy","probablityScoreReturned%");
$xml_labels->appendChild($xml_labelItem);

$xml_labels = $xml->createElement("Labels");
$xml_labelItem = $xml->createElement("labelItem");
$xml_labelItem->setAttribute("Keyword","DescriptionReturned1");
$xml_labelItem->setAttribute("accuracy","probablityScoreReturned%1");
$xml_labels->appendChild($xml_labelItem);

$xml_labels = $xml->createElement("Labels");
$xml_labelItem = $xml->createElement("labelItem");
$xml_labelItem->setAttribute("Keyword","DescriptionReturned2");
$xml_labelItem->setAttribute("accuracy","probablityScoreReturned%2");
$xml_labels->appendChild($xml_labelItem);

$xml_labels = $xml->createElement("Labels");
$xml_labelItem = $xml->createElement("labelItem");
$xml_labelItem->setAttribute("Keyword","DescriptionReturned3");
$xml_labelItem->setAttribute("accuracy","probablityScoreReturned3");
$xml_labels->appendChild($xml_labelItem);

$xml_landmark = $xml->createElement("Landmarks");
$xml_landmarkItem = $xml->createElement("landmarkItem");
$xml_landmarkItem->setAttribute("Keyword","DescriptionReturned");
$xml_landmarkItem->setAttribute("accuracy","probablityScoreReturned");
$xml_landmark->appendChild($xml_landmarkItem);


$xml_fileInfo->appendChild($xml_landmark);
$xml_fileInfo->appendChild($xml_labels);
$xml->appendChild($xml_fileInfo);

echo $xml->saveXML();
?>
