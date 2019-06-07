# AutoMeta
# Gallerie version 1.0 created 
# static responsive gallery preloaed with 4 demo images
# changed background to darkgrey
# moved CCS to seperate stylesheet

#basic genaertion of gallery using php - trail run 
#opens directory and takes each image in directory and displays it.
#needs major refining
#dynamic php script genertaing gallery
 #thumbnail dynmaic view added display issues to be resolved
 #dynamic php gallery :) :) :)
 xml taging order sorted - to be incorpated into myVision php
 possible soultion to request feeatures - coding adding not tested
 
 xml output to file added.
 xmltag.php generates template xml file
 template.xml  is xml template file for reference 
 Added file location dectection if image is web or local based
 retuens for web based 
 local based :  require composer google/protobuf
 sudo apt -get install php-bcmath

 requires bcmath libray installed in php

 throws safe search error on local file
 web based still analyse success
 
 03/06
intregreated the drop n drop exploer ajax upload page 
from the main site 
to accept the file requwest for google vision
**bugs not fully accepting uploaded files /url unklnow untested.**
keyword are ouputed to side pane correctly (when using hard coded url link)
url images analysed successfully
xml file generated succesfully for all images
xml file saved to gallery
for local images no return from google vision - xml file generated tags are empty.
drag and drop function not working in firefox - local images.
