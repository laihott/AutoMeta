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
    $contents = file_get_contents($fileName);
    fclose($fileName);
    $fileX64 = base64_encode($contents); // convert file based image to basex64
    $imgJsonX64 =$fileX64;
    return $imgJsonX64 ;
}

function collectFeature() {
      
    //$myFeatures = array();
    $myFeatures = $_POST["features"];
    /*$len = count($myFeatures);
    foreach ($myFeatures as $myx) {
        $i=0;
        $strFeature = "TYPE::$myx";
        echo $strFeature."<BR/>";
        $tmpx[$i]=$strFeature;
        $i++;
    }
    
   $strFeature = [ $tmpx(0), $tmpx(1), $tmpx(2), $tmpx(3)];
    foreach ($tmpx as $x) {echo $x.", ";};*/
    return $myFeatures;
}

# instantiates a client
// instantiates new imageannotatorClient with credentails for authorising in .json
$imageAnnotator =new ImageAnnotatorClient(['credentials'=>__DIR__.'/autopro-234567.json']);
  
   /**************************************************************************
    * 
    * {
    *   "type": enum(Type),
    *   "maxResults": number,
    *   "model": string
    *   }
    *
    *   FACE_DETECTION 	Run face detection.
    *   LANDMARK_DETECTION 	Run landmark detection.
    *   SAFE_SEARCH_DETECTION 	Run Safe Search to detect potentially unsafe or undesirable content.
    *   OBJECT_LOCALIZATION
    *
    * Generate JSON field from supplied options selected and passed vis $_POST
    *   dectect image labels - LABEL_DETECTION
    *   detect face - FACE_DETECTION
    *       Frame the face - "boundingPoly":{}
    *       emotions : 
    *                   Joy - joyLikeliHood
    *                   Sorrow - sorrowLikeliHood
    *                   Anger - angerLikeliHood
    *                   Surpise - surpiseLikeliHood
    *       Headwear - headwearLikeliHood
    *       Image State :- underExposedLikeliHood
    *                      blurredLikeliHood
    *   detect Landmarks - LANDMARK_DETECTION
    *   object Deteection - OBJECT_DETECTION
    *   safe image search - SAFE_SEARCH_DETECTION
    *
    *
    ************************************************************************   
   
    *$imgRequestJSON = "{ \"image\": $imgSource }, \"features\":[ { $reqFeatures } ] }"
    *return $imgRequestJSON */

# prepare the image to be annotated

// $image = file_get_contents($fileName);

# performs label detection on the image file

//$imgSource = collectImgSource(); // call function to gather filename / type of location of image file ie local/web/G:S
echo "img data collected preparing to enter collection of features<br/>";
$requestedFeatures = collectFeature();  // Gather feature image is to be analys3ed for
$imgSource = "https://images.pexels.com/photos/257540/pexels-photo-257540.jpeg";
//$image = file_get_contents($fileName);

 echo "<BR/> i got so far but i didnt really make it <BR/>";
 //$requestedFeatures = [TYPE::LABEL_DETECTION];

 $response = $imageAnnotator->annotateImage($imgSource,$requestedFeatures);
 //$response = $imageAnnotator->labelDetection($imgSource);
 /*$response = $imageAnnotator->annotateImages( '{ "requests": [
     {
         "image":{"content": $imgSource},
         "feature":[ { $requestedFeatures}  ]
     }
     ]
    }'

    ); */
    // $imgSource,$requestedFeatures);
 echo "<BR/>hay";
 $labels = "";
$labels = $response->getLabelAnnotations();
if ($labels) {
    echo("Labels:" . PHP_EOL."<BR/>");
    foreach ($labels as $label) {
        echo($label->getDescription())." : Accuracy of ";
        $prob =$label->getscore();
        $prob =round(($prob *= 100),2,PHP_ROUND_HALF_UP);
        echo $prob. " % <BR/>";
        
    }
} else {
    echo('No label found' . PHP_EOL);
    $imageAnnotator->close();

}
# [END vision_quickstart]123456
return $labels;
?>