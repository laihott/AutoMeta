// To check from URL if upload was successful and prints text based on the result
//  if(window.location.href.indexOf("upload1") > -1) {
//       document.getElementById('uploadstatus').innerHTML += 'Upload successful.';
//}
//    else if(window.location.href.indexOf("upload0") > -1) {
//        document.getElementById('uploadstatus').innerHTML += 'Upload failed.<br>Why? I dont have enough intelligence yet to tell you. Maybe your file was too big. Or your picture too stupid.';
//} 

// drag and drop javascript
  var fileobj;
  function upload_file(e) {
    e.preventDefault();
    for (i = 0;i<e.dataTransfer.files.length; i++){
    fileobj = e.dataTransfer.files[i];
    ajax_file_upload(fileobj);
  }
  }
 
  function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
        fileobj = document.getElementById('selectfile').files[0];
      ajax_file_upload(fileobj,'ajax.php');
    };
  }
 
  function ajax_file_upload(file_obj,action) {
    if(file_obj != undefined) {
        var form_data = new FormData();                  
        form_data.append('file', file_obj);
      $.ajax({
        type: 'POST',
        url: action,
        contentType: false,
        processData: false,
        data: form_data,
        //dataType: 'json',
        success:function(response) {
          if (response['status']=='invalid') {
            //invlaid file format
            $("#err").html("Invalid File!").fadeIn();
          }
          else {
            var name= response['name'];
            //view upload file.
            $("#preview").html('<img src="' +response['path']+'">').fadeIn();
            $("#file_name").html(response).fadeIn();
            //$("#form")[0].rest();
            loadfile(response['path'],response['name']);
          }
          //alert(response);
          //$('#selectfile').val('');
        }
      });
    }

  }