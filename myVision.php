<?php
namespace Google\Cloud\Samples\Auth;  /**** must be first line in code *****/
echo "entering php script <BR/>";

/**
 * Copyright 2016 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

# [START vision_quickstart]
# includes the autoloader for libraries installed with composer

require __DIR__ . '/vendor/autoload.php';

# imports the Google Cloud client library

use Google\Cloud\Vision\V1\ImageAnnotatorClient;
//use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Feature\Type;

function collectImgSource () {
    $fileName = $_POST["imgName"]; // collect fime name/url passed from form
    // check if file name is local web url or GS archieved image
    // if local image convert to BASE64(?)
    //$filex = fopen($fileName,"r") or die ("unable to open file");
   /**$contents = file_get_contents($fileName);
    *fclose($fileName); 
    *$fileX64 = base64_encode($contents); // convert file based image to basex64
    *$imgJsonX64 =$fileX64;
    * return $imgJsonX64 ;
    ***************************************/ 
    return $fileName;   
}

function collectFeature() {
      
    /************************************** 
    *{
    *   "type": enum(Type),
    *   "maxResults": number,
    *   "model": string
    *   }
    *build a enumlated type variable from variables passed
    *from previous form $_POST(features)
    *and convert to type enum
    * [TYPE::FACE_DETECTION, TYPE::LANDMARK_DETECTION, TYPE::LABEL_DETECTION, .........]
    ****************************************/
        $requestFeatures = $_POST["features"];
        foreach ($requestFeatures as $requestFeature) {
            if ($requestFeature="Face") {
                $feature[]=TYPE::FACE_DECTECTION;
            }
            if ($requestFeature="Landmark") {
                $feature[]=TYPE::LANDMARK_DETECTION;
            }
            if ($requestFeature="Label") {
                $feature[]=TYPE::LABEL_DETECTION;
            }
            if ($requestFeature="Object") {
                $feature[]=TYPE::OBEJECT_DETECTION;
            }
            if ($requestFeature="Safe") {
                $feature[]=TYPE::SAFE_SEARCH_DETECTION;
            }
        }
        return $feature;
        
}

function generate_XmlFileName ($imageFileName){ /** Generates .xML filename for image */

    // global $fileNameList;
    // is image local web or cloud based ??
    //Following is for local based
    //take exisiting filename find postion of "."
    // file name up to "." + xml = imageFilename.xml
    //return imageFile.xmml
    $extPos = stripos($imageFileName,".") ;
    $strImageName = substr($imageFileName,0,$extPos);
    $xml_imgName = $strImageName.".xml";
    return $xml_imgName;

}     /** ******* End of collect_XMLFile ****** */

# instantiates a client
// instantiates new imageannotatorClient with credentails for authorising in .json
$imageAnnotator =new ImageAnnotatorClient(['credentials'=>__DIR__.'/autopro-234567.json']);
  
   /**************************************************************************
    * 
    * 
    *   
    *   LANDMARK_DETECTION 	- Run landmark detection.
    *   SAFE_SEARCH_DETECTION -	Run Safe Search to detect 
    *                           potentially unsafe or undesirable content.
    *   OBJECT_LOCALIZATION
    *   LABEL_DETECTION
    *   FACE_DETECTION 	Run face detection.
    *       "boundingPoly" : - Frame the face detected
    *       Emotional states detected - from face Detection :
    *
    *           joyLikeliHood : 
    *           sorrowLikeliHood :
    *           angelLikeliHood :
    *           surpiseLikeliHood :
    *           headwearLikeliHood : is subject wearing headwear.
    *
    *       Image State Detection : -
    *           underExposedLikeliHood : 
    *           blurredLikeliHood :           
    *       
    *   
    *
    *
    ************************************************************************  */ 
   
# prepare the image to be annotated

$imgSource = "https://images.pexels.com/photos/257540/pexels-photo-257540.jpeg";  //test image
//$imgSource = collectImgSource(); // call function to gather filename & location of image file ie local/web/G:S


/****    tempory disabled  *********
//$requestedFeatures = collectFeature();  // Gather features image is to be analysed for 
************************************/
//$requestedFeatures = collectFeature();
$requestedFeatures = [TYPE::LABEL_DETECTION, TYPE::FACE_DETECTION, TYPE::LANDMARK_DETECTION, TYPE::OBJECT_LOCALIZATION, TYPE::SAFE_SEARCH_DETECTION] ;


$response = $imageAnnotator->annotateImage($imgSource,$requestedFeatures);

//$xmlFile = generate_XmlFileName($imgSource);

// create the xml document
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
        echo("No Labels Detected <br/>");

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
        echo (" no landmarks detected");
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
                $xml_objectVertices->setAttribute("verticesXY",$vertexxX.",".$vertexY);
                $xml_objectItem->appendChild($xml_objectVertices);
                //echo(" : $vertexX , $vertexY <BR/>");
            }
            $xml_object-> appendChild($xml_objectItem);    
        }
        //print(PHP_EOL);
     } else {
         echo (" No objects Detected");
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
        print('Bounds: ' . join(', ',$bounds) . PHP_EOL);
    print(PHP_EOL);
    }
    $xml_face->appendChild($xml_faceObject);
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
        
        echo $xml->saveXML();
    $imageAnnotator->close();


# [END vision_quickstart]123456
return $response;
?>