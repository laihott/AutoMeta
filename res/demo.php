<?php
namespace Google\Cloud\Samples\Auth;
echo "entering php script <BR/>";
require __DIR__ . '/vendor/autoload.php';
# imports the Google Cloud client library

//use Google\Cloud\Vision\V1\Image;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Feature\Type;


# instantiates a client
// instantiates new imageannotatorClient with credentails for authorising in .json
$vision =new ImageAnnotatorClient(['credentials'=>__DIR__.'/autopro-234567.json']);


echo "img data collected preparing to enter collection of features<br/>";
//$requestedFeatures = collectFeature() ; // Gather feature image is to be analys3ed for
$imgSource = "https://images.pexels.com/photos/257540/pexels-photo-257540.jpeg";
//$image = file_get_contents($fileName);
/*   $features = [TYPE::LABEL_FEATURE, TYPE::#nextFEATURE] <---format to send feature requests */
 $myfeatures= [TYPE::LABEL_DETECTION, 4, TYPE::SAFE_SEARCH_DETECTION, TYPE::WEB_DETECTION,2]; //<<<<<<-------  //working example of TYPE label tag! <<<<<---------
 $response = $vision->annotateImage($imgSource, $myfeatures);
 
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
 $safe = $response->getSafeSearchAnnotation();
 
 if ($safe) {
    echo ("safe search :" . PHP_EOL . "<br/>");
    $likeihood = ['Unkown', 'Very Unlikely', 'Unlikey', 'Possible', 'Likely', 'Very Unlikely'];
    $adult = $safe->getAdult();
    $medical = $safe->getMedical();
    $spoof = $safe->getSpoof();
    $violence = $safe->getViolence();
    $racy = $safe->getRacy();

    echo("Adult:"  . $likeihood[$adult] . "<BR/>");
    echo("Medical: "  . $likeihood[$medical]. "<BR/>");
    echo("Spoof: " . $likeihood[$spoof]. "<BR/>");
    echo("Violence: ". $likeihood[$violence]. "<BR/>");
    echo("Racy: " . $likeihood[$racy]. "<BR/>");

 } else {
     echo ("No SafeSearch Results Returned <BR/>");
 }

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