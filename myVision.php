<?php
namespace Google\Cloud\Samples\Auth;  /**** must be first line in code *****/
/**
 * Copyright 2019
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


// includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';

// imports the Google Cloud client library
// use Google\Protobuf\Internal\DescriptorPool;
use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
//use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Feature\Type;

function collectImgSource () {
    $fileName = "";
    $isLocal = FALSE;
    $isWeb = FALSE;
    if (isset($_FILES['file']['name'])) :
        $fileName =$_FILES['file']['name']; 
    endif ;
    if (isset($_POST["file"])) :
        $fileName = $_POST["file"]; // collect fime name/url passed from form
    endif;
    // check if file name is local web url or GS archieved image
    // if local image convert to BASE64(?)
    
    if ( strchr($fileName,'http') != FALSE) {
        $isWeb = TRUE; 
        return $fileName;    
     /*   }  elseif {   
     *check if it cloud based storage ie google storage (gs://(<-- maybe??))**
     * $isCloud = TRUE;
     */
    } else {
        /** assume that image is local based then ** */
        if ($fileName) :
            $isLocal = TRUE;
        endif;
    }
    /*if ($isWeb) {
      *  return $fileName;
    *}*/
    if ($isLocal) {
        if ($isLocal && !($_POST["file"]) ) :
            $fileName = __DIR__ . "/uploads/$fileName";
        endif;
        //fopen($dir.$fileName,'r');
        $contents = file_get_contents($fileName,false);
        //fclose($fileName); // << file is left open error to be solved
        $fileX64 = base64_encode($contents); // convert file based image to basex64
     return $fileX64 ;
    }    
}

function collectFeature() {
      
    /************************************************************************** 
    *   LANDMARK_DETECTION 	- Run landmark detection.
    *   SAFE_SEARCH_DETECTION -	Run Safe Search to detect 
    *                           potentially unsafe or undesirable content.
    *   OBJECT_LOCALIZATION
    *   LABEL_DETECTION
    *   FACE_DETECTION 	Run face detection.
    *       "boundingPoly" : - Frame the face detected
    *       Emotional states detected - from face Detection :
    *           joyLikeliHood : 
    *           sorrowLikeliHood :
    *           angelLikeliHood :
    *           surpiseLikeliHood :
    *           headwearLikeliHood : is subject wearing headwear.
    *       Image State Detection : -
    *           underExposedLikeliHood : 
    *           blurredLikeliHood :           
    *
    ************************************************************************ 
    *{
    *   "type": enum(Type),
    *   "maxResults": number,
    *   "model": string
    *   }
    *build a enumlated type variable from variables passed
    *from previous form $_POST(features)
    *and convert to type enum
    * [TYPE::FACE_DETECTION, TYPE::LANDMARK_DETECTION, TYPE::LABEL_DETECTION, .........]
    *************************************************************************************/

        $requestFeatures = $_POST["features"];
        foreach ($requestFeatures as $requestFeature) {
            if ($requestFeature="face") {
                $feature[] +=TYPE::FACE_DECTECTION;
            }
            if ($requestFeature="landmark") {
                $feature[]+=TYPE::LANDMARK_DETECTION;
            }
            if ($requestFeature="label") {
                $feature[]+=TYPE::LABEL_DETECTION;
            }
            if ($requestFeature="object") {
                $feature[]+=TYPE::OBEJECT_DETECTION;
            }
            if ($requestFeature="safe") {
                $feature[]+=TYPE::SAFE_SEARCH_DETECTION;
            }
        }
        return $feature;
        
}

// instantiates new imageannotatorClient with credentails for authorising in .json
$imageAnnotator =new ImageAnnotatorClient(['credentials'=>__DIR__.'/autopro-234567.json']);

//$imgSource = "https://images.pexels.com/photos/257540/pexels-photo-257540.jpeg";  //test image
$imgSource = "";
$imgSource = collectImgSource(); // call function to gather filename & location of image file ie local/web/G:S
if ($imgSource =="" ) :
    echo "No file detected";
    return;
endif;

/****    tempory disabled  *********/
//$requestedFeatures = collectFeature();  // Gather features image is to be analysed for 
/************************************/
//$requestedFeatures = collectFeature();
$requestedFeatures = [TYPE::LABEL_DETECTION, TYPE::FACE_DETECTION, TYPE::LANDMARK_DETECTION, TYPE::OBJECT_LOCALIZATION, TYPE::SAFE_SEARCH_DETECTION] ;

// prepare the image to be annotated
$response = $imageAnnotator->annotateImage($imgSource,$requestedFeatures);

include "myVisionXML.php";
$imageAnnotator->close();

?>