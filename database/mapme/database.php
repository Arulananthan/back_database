
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" /> -->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
width: 100.5%;
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
    width: 28%; /* Could be more or less, depending on screen size */
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

</style>
</head>
<body>
<!-- <form class="modal-content animate" action="" method="post" enctype="multipart/form-data"> -->
      <form class="modal-content animate" id="signup" name="signup" action="" method="post" enctype="multipart/form-data" autocomplete="off">
            <fieldset class="preview_sql">
                <div class="container">
                    <label for="fname"><b>Table Name</b></label><br>
                    <input type="text" placeholder="Enter the Table Name" name="t_name" id="t_name" ><br>

                    <label for="lname"><b>Function Name</b></label><br>
                    <input type="text" placeholder="Please enter the function name" name="f_name" id="f_name"><br>

                    <label for="lname"><b>Query</b></label><br>
                    <textarea name="query" id="query" placeholder="Please Writte the Query..." style="width: 333px;height: 187px;" class="CodeMirror-scroll"></textarea><br>
                    <br>
                    <input type="text" name="dbname" id="dbname" value="test" readonly>
                    <div id="listtable"></div>
                    <!-- <select name="d_name[]" id="d_name" style="width: 345px;height: 107px;" multiple>
                        <?php
                         $connn = mysqli_connect('localhost','root','','test');
                         $databases = mysqli_query($connn,"show tables");
                             while($fet_databases = mysqli_fetch_array($databases)){  ?>
                             <option value="<?php echo $fet_databases['Database']; ?>"><?php echo $fet_databases['Database']; ?></option>
                         <?php }?>
                    </select><br><br> -->
                    <div id="button">
                    <button type="button" name="excute" id="excute" onclick="admultisearch()">Excute</button>
                  </div>
				 <input type="button" onClick="location.href='copy.php'" value='copy' class="btn-primary">
					<input type="button" onClick="location.href='log.php'" value='Log' class="btn-info">
                </div>
          </fieldset>
      </form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

function admultisearch()
{
  var tname = $("#t_name").val();
  var fname = $("#f_name").val();
  var query = $("#query").val();
  var dbname = $("#dbname").val();
  alert(fname);
  if(fname == "DROP" || fname == "DELETE"){
	   var txt;
		var r = confirm("Do you really want to execute  " + fname +" Records..");
		if (r == true) {
		txt = "You pressed OK!";
		} else {
		txt = "You pressed Cancel!";
		return false;
		} 
  }
$.ajax({
type:'POST',
url: 'ajax_mysql.php',
data:{'tname':tname,'fname':fname,'query':query,'dbname':dbname},
success: function(data){
//alert(data);
alert("The Search Result is:");
$('#listtable').html(data).hide(6000);
//$('#listtable').html(data);
//$("#button").hide();
 $("#signup")[0].reset();   
}
});
}
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
  <script>
  $( function() {
    var availableTags = ["CREATE","INSERT","UPDATE","REPLACE","ADD","DROP","DELETE","ALTER"];
    $( "#f_name" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
  

<script>

</script>
<style>
$.confirm({
    boxWidth: '30%',
    useBootstrap: false,
});
$.confirm({
    boxWidth: '500px',
    useBootstrap: false,
});
</style>
</body>
</html>
