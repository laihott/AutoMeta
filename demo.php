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
//$requestedFeatures = "[type:LABEL_DECTECTION]"; /*collectFeature()*/ ; // Gather feature image is to be analys3ed for
$imgSource = "https://images.pexels.com/photos/257540/pexels-photo-257540.jpeg";
//$image = file_get_contents($fileName);
 echo "<BR/> regFeatures : ".$requestedFeatures;
 echo "<BR/> i got so far but i didnt really make it<br/>";
 
 $myfeatures= [TYPE::LABEL_DETECTION];
 echo "im here <br/>";
 $response = $vision->annotateImage($imgSource, $myfeatures);
 echo "<br/>oh oh <br/>";

 //$response = $img->requestObject();
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