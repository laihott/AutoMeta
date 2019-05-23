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
use Google\Cloud\Vision\V1\Feature;
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
        *
        *build a enumlated type variable from variables passed
        *from previous form $_POST(features)
        *and convert to type enum
        * [TYPE::FACE_DETECTION, TYPE::LANDMARK_DETECTION, TYPE::LABEL_DETECTION, .........]
    ****************************************/
}

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

//$imgSource = "https://images.pexels.com/photos/257540/pexels-photo-257540.jpeg";  //test image
$imgSource = collectImgSource(); // call function to gather filename & location of image file ie local/web/G:S


/****    tempory disabled  *********
//$requestedFeatures = collectFeature();  // Gather features image is to be analysed for 
************************************/

$requestedFeatures = [TYPE::LABEL_DETECTION, TYPE::FACE_DETECTION, TYPE::LANDMARK_DETECTION, TYPE::OBJECT_LOCALIZATION, TYPE::SAFE_SEARCH_DETECTION] ;


$response = $imageAnnotator->annotateImage($imgSource,$requestedFeatures);

getLabelsResults($response);
getFacesResults($response);
getLandmarksResults($response);
getObjectsResults($response);
getSafeSearchResults($response);

function getLabelsResults( $response ) {
    /**  performs label detection on the image file */
    $labels = $response->getLabelAnnotations();
    if ($labels) {
        echo("Labels:" ."<BR/>");
        foreach ($labels as $label) {
            echo($label->getDescription())." : Accuracy of ";
            $prob =$label->getscore();
            $prob =round(($prob *= 100),2,PHP_ROUND_HALF_UP);
            echo $prob. " % <BR/>";
            
        }
    } else {
        echo("No Labels Detected <br/>");

    } 
}   /* End of get label results */

function getFacesResults($response) {

    /**************************************************************************
     * Faceail Detection supports mulitple faces wihtin an image along wiht the 
     * associated facail attributes such as emotional state or wearing headwear
     * FACIL RECOGNITON IS NOT SUPPORTED
     * *********************************************************************** */

    $faces = $response ->getFaceAnnotations();
    if ($faces){
        $likeliHood = ["Unkown", "Very Unlikely", "Unlikely", "Possible", "Likely", "Very Likely"];
        echo ( count($faces). " : faces detected <br/>");
        foreach ($faces as $face) {
            $anger = $face->getAngerLikelihood();
            printf("Anger: " . "<BR/>" .  $likeliHood[$anger]);
            $joy = $face->getJoyLikelihood();
            printf("Joy: " . "<BR/>" .  $likeliHood[$joy]);
            $surprise = $face->getSurpriseLikelihood();
            printf("Surprise: " . "<BR/>" .  $likeliHood[$surprise]);
        // get bounds
            $vertices = $face->getBoundingPoly()->getVertices();
            $bounds = [];
            foreach ($vertices as $vertex) {
                $bounds[] = sprintf((""), $vertex->getX(), $vertex->getY());
            }
            print('Bounds: ' . join(', ',$bounds) . PHP_EOL);
        print(PHP_EOL);
        }
    } 
}
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

function getLandmarksResults ( $response ) {

    $landmarks = $response->getLandmarkAnnotations();
    echo( "Landmark/s found :". count($landmarks)."<BR/>");
    foreach ($landmarks as $landmark) {
        echo ($landmark->getDescription()."<BR/>");
    }

} /* End of get Landmoark Results */

function getObjectsResults( $response ) {

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
         echo(count($objects)." \"objects\" detected in Image");
        foreach ($objects as $object) {
            $name = $object->getName();
            $score = $object->getScore();
            $vertices = $object->getBoundingPoly()->getNormalizedVertices();
            echo("Confidence : ". $name.",".$score."<BR/>");
            print('Normalized bounding polygon vertices :'."<BR/>");
            foreach ($vertices as $vertex){
                $vertexX = $vertex->getX();
                $vertexY = $vertex->getY();
                echo(" : $vertexX , $vertexY <BR/>");
            }
            
        }
        print(PHP_EOL);
     } else {
         echo (" No objects Detected");
     }
}   /* End of get object  results function */

function getSafeSearchResults( $response ){

    $likeliHood = ["Unkown", "Very Unlikely", "Unlikely", "Possible", "Likely", "Very Likely"];
    $safe = $response ->getSafeSearchAnnotation();
    $adult = $safe->getAdult();
    $spoof = $safe->getSpoof();
    $medical = $safe->getMedical();
    $violence = $safe->getViolence();
    $racy = $safe->getRacy();
    echo ("Safe Search Results : <BR/>");
    echo ("Adult : ".$likeliHood[$adult]."<BR/>");
    echo ("Spoof : ".$likeliHood[$spoof]."<BR/>");
    echo ("Medical : ".$likeliHood[$medical]."<BR/>");
    echo ("Violence : ".$likeliHood[$violence]."<BR/>");
    echo ("Racy : ".$likeliHood[$racy]."<BR/>");

} /* end of Safe Search Results */
    $imageAnnotator->close();


# [END vision_quickstart]123456
return $response;
?>