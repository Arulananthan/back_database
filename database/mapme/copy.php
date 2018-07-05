
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" /> -->
<?php
//print_r($_SERVER["DOCUMENT_ROOT"]);exit; ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 30.5%;
padding: 7px 10px;
margin: 6px 0;
display: inline-block;
border: 1px solid #ccc;
box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 30%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    /* width: auto; */
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 20px;
   background-color:0;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 36%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
/* validation */
#commentForm {
		width: 500px;
	}
	#commentForm label {
		width: 250px;
	}
	#commentForm label.error, #commentForm input.submit {
		margin-left: 253px;
    color:red;
	}
	#signupForm {
		width: 670px;
	}
	#signupForm label.error {
		margin-left: 10px;
		width: auto;
		display: inline;
    color:red;
	}
	#newsletter_topics label.error {
		display: none;
		margin-left: 103px;
	}
  .CodeMirror-scroll {
    overflow: scroll !important;
    /* margin-bottom: -30px; */
    margin-right: -30px;
    padding-bottom: 30px;
    height: 100%;
    outline: none;
    position: relative;
}
fieldset, .preview_sql {
    margin-top: 1em;
    border-radius: 4px 4px 0 0;
    -moz-border-radius: 4px 4px 0 0;
    -webkit-border-radius: 4px 4px 0 0;
    border: #aaa solid 1px;
    padding: 0.5em;
    background: #eee;
    text-shadow: 1px 1px 2px #fff inset;
    -moz-box-shadow: 1px 1px 2px #fff inset;
    -webkit-box-shadow: 1px 1px 2px #fff inset;
    box-shadow: 1px 1px 2px #fff inset;
}
user agent stylesheet
fieldset {
    display: block;
    -webkit-margin-start: 2px;
    -webkit-margin-end: 2px;
    -webkit-padding-before: 0.35em;
    -webkit-padding-start: 0.75em;
    -webkit-padding-end: 0.75em;
    -webkit-padding-after: 0.625em;
    min-width: -webkit-min-content;
    border-width: 2px;
    border-style: groove;
    border-color: threedface;
    border-image: initial;
}
.ui-widget-header {
    border: 1px solid #e78f08;
    background: #368ee0 url(images/ui-bg_gloss-wave_35_f6a828_500x100.png) 50% 50% repeat-x;
    color: #ffffff;
    font-weight: bold;
}
</style>

</head>
<body>
 <form class="modal-content animate" action="" method="post" enctype="multipart/form-data" id="signup" name="signup" >
  <!--<form  id="signup" name="signup" action="" method="post" enctype="multipart/form-data" autocomplete="off">-->
    <fieldset class="preview_sql">

      <!--<select name="d_name[]" id="d_name" style="width: 345px;height: 107px;" multiple>-->
	  <input type="text" name="test" id="test" value="test" style="width: 345px;" readonly><br>
    <lable style="color:green"><b>Master Database</b></lable>
    <br>
      <select id="d_name" class="multiselect" multiple="multiple" name="d_name[]">
          <?php
           $connn = mysqli_connect('localhost','root','','test');
           $databases = mysqli_query($connn,"show tables");
           while($fet_databases = mysqli_fetch_array($databases)){?>
         <option value="<?php echo $fet_databases['Tables_in_test']; ?>"><?php echo $fet_databases['Tables_in_test']; ?></option>
         <?php }?>
      </select><br><br>
      <label style="color:green"><b>User-Database</b></lable>
	   <select name="d_dbname[]" class="multiselect" id="d_dbname" style="width: 462px;height: 127px;" multiple="multiple">
          <?php
           $connn = mysqli_connect('localhost','root','','test');
           $databases = mysqli_query($connn,"show DATABASES");
           while($fet_databases = mysqli_fetch_array($databases)){
           if($fet_databases['Database'] !='performance_schema' && $fet_databases['Database'] !='phpmyadmin' && $fet_databases['Database'] !='information_schema'  && $fet_databases['Database'] !='test'  ) {
             ?>
         <option value="<?php echo $fet_databases['Database']; ?>"><?php echo $fet_databases['Database']; ?></option>
       <?php }
       }?>
      </select><br><br>

      <button type="button" name="excute" id="excute">Excute</button>
	  <input type="button" onClick="location.href='log.php'" value='Log' class="btn-info">
	  <input type="button" onClick="location.href='database.php'" value='master' class="btn-info">
    </div>
	<div id="message"></div>
  </fieldset>
  </form>
  <link rel="stylesheet" href="js/multiselect/css/common.css" type="text/css" />
	<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
	<link type="text/css" href="js/multiselect/css/ui.multiselect.css" rel="stylesheet" />
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/multiselect/js/plugins/localisation/jquery.localisation-min.js"></script>
	<script type="text/javascript" src="js/multiselect/js/plugins/scrollTo/jquery.scrollTo-min.js"></script>
	<script type="text/javascript" src="js/multiselect/js/ui.multiselect.js"></script>


	<script type="text/javascript">
		$(function(){
			$(".multiselect").multiselect();
		});
	</script>



<script>
$(document).ready(function(){
$("#excute").click(function(){
  var dtname = $("#d_name").val();
  var ddbname = $("#d_dbname").val();
  alert(dtname);
  alert(ddbname);

$.ajax({
type:'POST',
url: 'ajax_mysql1.php',
data:{'dtname':dtname,'ddbname':ddbname},
success: function(data){
//alert(data);
alert("The Search Result is:");
//$('#message').html(data).hide(6000);
$('#message').html(data);
$("#signup")[0].reset();
//$("#button").hide();
window.location.reload();
}
});
});
});

</script>
