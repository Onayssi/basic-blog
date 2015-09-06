<?php
require_once('helpers/connect.php');
require_once('helpers/modules.php');

ob_start();

session_start();

$q = filter_input(INPUT_GET, 'q');
$q = explode("/", $q, 3);

// Rewriting Page Name //	
$cid= filter_input(INPUT_GET, 'cid');
if(!$cid){
    $fetching__current_page = $database->select("pages","*",["name_rw"=>$q['0']]);
    $cid = $fetching__current_page[0]['id'];
if(!$cid){
    $fetching_main_page = $database->select("pages","*",["id"=>1]);
    $cid = $fetching_main_page[0]['id'];
    header("Location:".BURL."/".$fetching_main_page[0]['name_rw']);
}
}
// End rewriting Page Name //

ob_flush();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=EntityTITLE?> - Welcome</title>
    <!-- shortcut icon -->
    <link rel='shortcut icon' type='image/x-icon' href='icons/favicon.ico' />
    <!-- project main core CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!-- include summernote -->
    <link rel="stylesheet" href="css/summernote.css"> 
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">    
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->   
    <script src="js/callback.js"></script>
  </head>
<body>
 <?php 
    include("inc/navbar.php");?>
    <div class="container container-pages">
     <!-- calling pages -->
     <?php include_once('inc/data.php');?>      
    </div> <!-- /container -->
    <?php include("inc/footer.php");?>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <!-- include summernote -->
    <script type="text/javascript" src="js/summernote.js"></script>     
    <script type="text/javascript">
    $(document).ready(function() {
          $('.summernote').summernote({
            height: 150,
            tabsize: 2
          });
          $("[data-event='showImageDialog'").remove();
        // Ajax load with Modal Popup
        $("#popupModalDEL").on("show.bs.modal", function(e) {
        var link = $(e.relatedTarget);
        var record_id = link.attr("data-record-id");
        $(this).find(".modal-body").load("callback/popup-delete-post.php?id="+record_id);          
        });
    });        
    </script>    
</body>
</html>