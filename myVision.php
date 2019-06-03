<?php
namespace Google\Cloud\Samples\Auth;  /**** must be first line in code *****/
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
    $fileName = $_POST["imgName"]; // collect fime name/url passed from form
    // check if file name is local web url or GS archieved image
    // if local image convert to BASE64(?)
    //$filex = fopen($fileName,"r") or die ("unable to open file");
    /***************************************/ 
    echo $fileName."<br/>";
    if ( strchr($fileName,'http') != FALSE) {
        $isWeb = TRUE;
        $isLocal = FALSE;  
        return $fileName;    
     /*   }  elseif {   
     *check if it cloud based storage ie google storage (gs://(<-- maybe??))**
     * $isCloud = TRUE;
     */
    } else {
        /** assume that image is local based then ** */
        $isLocal = TRUE;
        $isWeb = FALSE;
    }
    /*if ($isWeb) {
      *  return $fileName;
    *}*/
    if ($isLocal) {
        fopen($fileName,'r');
        $contents = file_get_contents($fileName);
        fclose($fileName); // <<<<<< file is left open error to be solved
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

//$imgSource = "https://images.pexels.com/photos/257540/pexels-photo-257540.jpeg";  //test image
$imgSource = collectImgSource(); // call function to gather filename & location of image file ie local/web/G:S


/****    tempory disabled  *********
//$requestedFeatures = collectFeature();  // Gather features image is to be analysed for 
************************************/
//$requestedFeatures = collectFeature();
$requestedFeatures = [TYPE::LABEL_DETECTION, TYPE::FACE_DETECTION, TYPE::LANDMARK_DETECTION, TYPE::OBJECT_LOCALIZATION, TYPE::SAFE_SEARCH_DETECTION] ;

// prepare the image to be annotated
$response = $imageAnnotator->annotateImage($imgSource,$requestedFeatures);

$imageAnnotator->close();
//echo "off to generate xml file now please hold <br/>";
include ('myVisionXML.php');
return ;
?>