<?PHP
function generate_XmlFileName ($imageFileName){ /** Generates .xML filename for image */

// global $fileNameList;
// is image local web or cloud based ??
//Following is for local based
//take exisiting filename find postion of "."
// file name up to "." + xml = imageFilename.xml
//return imageFile.xmml

if (strchr($imageFileName,'/')) :
//if ( strchr($imageFileName,'http') != FALSE) :
    $lastSlash = 1 + strripos ($imageFileName,'/');
    $imageFileName = substr ($imageFileName,$lastSlash);
endif;

$extPos = stripos($imageFileName,".") ;
$strImageName = substr($imageFileName,0,$extPos);
$xml_imgName = $strImageName.".xml";
return $xml_imgName;


}     /** ******* End of collect_XMLFile ****** */
?>