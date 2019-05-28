<?php
include 'myVision.php';
//$xmlFile = generate_XmlFileName($imgSource);

// create the xml document
//header ( "content-type: application/xml; charset=ISO-8859-15");
$xml = new DOMDocument('1.0', 'UTF-8');
// create the root elemenet
$root = $xml->createElement("ImageItem");
$xml_fileInfo = $xml->createElement("Image");
//split filename into approate parts -in progess
//
//
//
$xml_fileInfo->setAttribute("fileName","ImageFileName");
$xml_fileInfo->setAttribute("location","FileImageLocation(local/web/GS");

//function getSafeSearchResults( $response ){

$likeliHood = ["Unkown", "Very Unlikely", "Unlikely", "Possible", "Likely", "Very Likely"];
$safe = $response ->getSafeSearchAnnotation();
$adult = $safe->getAdult();
$spoof = $safe->getSpoof();
$medical = $safe->getMedical();
$violence = $safe->getViolence();
$racy = $safe->getRacy();
//generate XML safe Search Branch
$xml_safeSearch = $xml->createElement("Safe_Search");
$xml_safeSearch->setAttribute("Adult",$adult);
$xml_safeSearch->setAttribute("Spoof",$spoof);
$xml_safeSearch->setAttribute("Medical",$medical);
$xml_safeSearch->setAttribute("Violence",$violence);
$xml_safeSearch->setAttribute("Racy",$racy);
$xml_fileInfo->appendChild($xml_safeSearch);
/** echo ("Safe Search Results : <BR/>");
*echo ("Adult : ".$likeliHood[$adult]."<BR/>");
*echo ("Spoof : ".$likeliHood[$spoof]."<BR/>");
*echo ("Medical : ".$likeliHood[$medical]."<BR/>");
*echo ("Violence : ".$likeliHood[$violence]."<BR/>");
*echo ("Racy : ".$likeliHood[$racy]."<BR/>"); */

/******************************************************************** */
/**************end of Safe Search Results *****************************/
/******************************************************************** */

    /** ********** performs label detection on the image *************** *
     * write output to .xml file
     * <Labels>
     *      <LabelItem labelid="$labelID"> // unique id for each label
     *          <Description accuracy="int">
     *              #Description/Label returned by Google Vison 
     *          </Description>
     *      </LabelItem>
     *  </Labels>
     * ******************************************************************/   
$labels = $response->getLabelAnnotations();
    if ($labels) {
        // Create Label branch 
        $xml_label = $xml->createElement("Labels");
        //echo("Labels:" ."<BR/>");
        foreach ($labels as $label) {
            //echo ($Label."<BR/>");
            $prob = $label->getscore();
            $prob = round(($prob *= 100),2,PHP_ROUND_HALF_UP);
            $keyword = $label->getDescription();
            // creat sub branch within Label Branch
            $xml_labelItem = $xml->createElement("labelItem",$keyword);
            $xml_labelItem->setAttribute("accuracy",$prob); // assign atribute to branch
            $xml_label->appendChild($xml_labelItem); // write current Label sub branch to main 'Label' perant branch
            //repeat for all label item
        }
    } else {
        //echo("No Labels Detected <br/>");

    }  
/********************************************************************************** */
/************************** End of get label results ********************************/
/********************************************************************************** */

//function getLandmarksResults ( $response ) {

$landmarks = $response->getLandmarkAnnotations();
    //echo( "Landmark/s found :". count($landmarks)."<BR/>");
    if ($landmarks) {
        // Create Landmark Branch
        $xml_landmark = $xml->createElement("Landmarks");
        foreach ($landmarks as $landmark) {
            $keyword = $landmark->getDescription();
            $xml_landmarkItem = $xml->createElement("landmarkItem",$keyword);
            $prob = $landmark->getscore();
            $prob = round(($prob *= 100),2,PHP_ROUND_HALF_UP);
            $xml_landmarkItem->setAttribute("accuracy",$prob);
            $xml_landmark->appendChild($xml_landmarkItem);
            //echo ($landmark->getDescription()."<BR/>");
        } 
    } else {
        //echo (" no landmarks detected");
    }

/************************************************************************************ */
/********************* End of get Landmark Results **********************************/
/************************************************************************************ */


/****** function getObjectsResults( $response ) {*/

    /**********************************
     *  "localalizedObjectAnnotations": 
     *      "name"
     *      "score"
     *      "boundingPoly" : {
     *          "normalizedVertices":[
     *              {x,y}, {x,y}, {x,y}, {x,y}] }
     * 
     ************************************/

     $objects = $response->getLocalizedObjectAnnotations();
     if ($objects) {
        $xml_object = $xml ->createElement("Objects");
        // echo(count($objects)." \"objects\" detected in Image");
        foreach ($objects as $object) {
            $name = $object->getName();
            $prob = $object->getScore();
            $prob = round(($prob *= 100),2,PHP_ROUND_HALF_UP);
            $xml_objectItem = $xml->createElement("objectItem",$name);
            $xml_objectItem->setAttribute("accuracy",$prob);
            $vertices = $object->getBoundingPoly()->getNormalizedVertices();
            $xml_objectVertices = $xml->createElement("vertices");
            //echo("Confidence : ". $name.",".$score."<BR/>");
            //print('Normalized bounding polygon vertices :'."<BR/>");
            foreach ($vertices as $vertex){
                $vertexX = $vertex->getX();
                $vertexY = $vertex->getY();
                $xml_objectVertices->setAttribute("verticesXY",$vertexX.",".$vertexY);
                $xml_objectItem->appendChild($xml_objectVertices);
                //echo(" : $vertexX , $vertexY <BR/>");
            }
            $xml_object-> appendChild($xml_objectItem);    
        }
        //print(PHP_EOL);
     } else {
         //echo (" No objects Detected");
     }
/************************* End of get object  results function **************************/
    
/*************************  function getFacesResults($response) { ***********************/


    /**************************************************************************
     * Faceail Detection supports mulitple faces wihtin an image along wiht the 
     * associated facail attributes such as emotional state or wearing headwear
     * FACIL RECOGNITON IS NOT SUPPORTED
     * *********************************************************************** */

$faces = $response ->getFaceAnnotations();
if ($faces){
    $xml_face = $xml->createElement("faces");

    $likeliHood = ["Unkown", "Very Unlikely", "Unlikely", "Possible", "Likely", "Very Likely"];
    //echo ( count($faces). " : faces detected <br/>");
    foreach ($faces as $face) {
        $xml_faceObject = $xml->createElement("faceObject");
        $xml_faceEmotionProb = $xml->createElement("emotionalLikeliHood");
        $anger = $face->getAngerLikelihood();
        $xml_faceEmotion = $xml->createElement("emotion","Anger");
        $xml_faceEmotion->setAttribute("Anger",$likeliHood[$anger]);
        $xml_faceEmotionProb->appendChild($xml_faceEmotion);
        //printf("Anger: " . "<BR/>" .  $likeliHood[$anger]);
        $joy = $face->getJoyLikelihood();
        $xml_faceEmotion = $xml->createElement("emotion","Joy");
        $xml_faceEmotion->setAttribute("Joy",$likeliHood[$joy]);
        $xml_faceEmotionProb->appendChild($xml_faceEmotion);
        //printf("Joy: " . "<BR/>" .  $likeliHood[$joy]);
        $surprise = $face->getSurpriseLikelihood();
        $xml_faceEmotion = $xml->createElement("emotion","Surpise");
        $xml_faceEmotion->setAttribute("Surpise",$likeliHood[$surpise]);
        $xml_faceEmotionProb->appendChild($xml_faceEmotion);
        //printf("Surprise: " . "<BR/>" .  $likeliHood[$surprise]);
        $sorrow = $face->getSorrowLikelihood();
        $xml_faceEmotion = $xml->createElement("emotion","Sorrow");
        $xml_faceEmotion->setAttribute("Sorrow",$likeliHood[$sorrow]);
        $xml_faceEmotionProb->appendChild($xml_faceEmotion);
        //Output sorrow
        $headwear = $face->getwearHeadwearLikelihood();
        $xml_faceEmotion = $xml->createElement("emotion","Wearing headwear");
        $xml_faceEmotion->setAttribute("Headwear",$likeliHood[$headwear]);
        $xml_faceEmotionProb->appendChild($xml_faceEmotion);
        //Output hedwearing
        $xml_faceObject->appendChild($xml_faceEmotionProb);
        $xml_face->appendChild($xml_faceObject);
    // get bounds
        $vertices = $face->getBoundingPoly()->getVertices();
        $xml_faceVertices = $xml->createElement("vertices");
        foreach ($vertices as $vertex) {
            $vertexX = $vertex->getX();
            $vertexY = $vertex->getY();
            //$bounds[] = sprintf((""), $vertex->getX(), $vertex->getY());
            $xml_faceVertices->setAttribute("verticesXY",$vertexxX.",".$vertexY);   
        }
        $xml_faceObject->appendChild($xml_faceVertices);
        $xml_face->appendChild($xml_faceObject);
        //print('Bounds: ' . join(', ',$bounds) . PHP_EOL);
    //print(PHP_EOL);
    }
    //$xml_face ->appendChild($xml_faceObject);
} 
/**********************  End of Get Faces Results ********************************/
        /***************************************************
         * 
         *      Draw box arounf faces in progress 
         *      requires GD extension
         * 
         *      # draw box around faces
         *      if ($faces && $outFile) {
         *          $imageCreateFunc = [
         *          'png' => 'imagecreatefrompng',
         *           'gd' => 'imagecreatefromgd',
         *           'gif' => 'imagecreatefromgif',
         *           'jpg' => 'imagecreatefromjpeg',
         *           'jpeg' => 'imagecreatefromjpeg',
         *           ];
         *       $imageWriteFunc = [
         *           'png' => 'imagepng',
         *           'gd' => 'imagegd',
         *           'gif' => 'imagegif',
         *           'jpg' => 'imagejpeg',
         *           'jpeg' => 'imagejpeg',
         *        ];
         *      copy($path, $outFile);
         *      $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
         *      if (!array_key_exists($ext, $imageCreateFunc)) {    
         *               throw new \Exception('Unsupported image extension');
         *      }
         *      $outputImage = call_user_func($imageCreateFunc[$ext], $outFile);
         *     foreach ($faces as $face) {
         *         $vertices = $face->getBoundingPoly()->getVertices();
         *           if ($vertices) {
         *               $x1 = $vertices[0]->getX();
         *               $y1 = $vertices[0]->getY();
         *               $x2 = $vertices[2]->getX();
         *               $y2 = $vertices[2]->getY();
         *               imagerectangle($outputImage, $x1, $y1, $x2, $y2, 0x00ff00);
         *           }
         *       }
         *       call_user_func($imageWriteFunc[$ext], $outputImage, $outFile);
         *       printf('Output image written to %s' . "<BR/>" .  $outFile);
         ***************************************************************************/



        $xml_fileInfo->appendChild($xml_label);
        $xml_fileInfo->appendChild($xml_landmark);
        $xml_fileInfo->appendChild($xml_object);
        $xml_fileInfo->appendchild($xml_face);
        
        $xml->appendChild($xml_fileInfo);
        
        //echo $xml->saveXML();


        $rootPath = $_SERVER['DOCUMENT_ROOT'];
        $filename = $rootPath.'output.xml';
        $myXmlOutput = fopen($filename,"w") or die ("unable to open file");
        $myoutput = $xml;
        fwrite($myXmlOutput,$myoutput);
        fclose($myXmlOutput);
     



?>