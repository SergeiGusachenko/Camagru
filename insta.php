<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<style>
.head1 { grid-area: header; 
}
.main2 { grid-area: main; }
.right3 {
  box-sizing: border-box;	
  grid-area: right;
  max-width:100%;
  max-height:100%;
}

.footer4 { grid-area: footer; }
.logout5 { grid-area: logout; }
div.image1{content: url(images/galaxyWor.png);
		grid-area: image1;
		}		
		div.image2{content: url(images/pony.png);
			grid-area: image2;		
		}
		div.image3{content: url(images/sea.jpeg);height: 95% !important;
			grid-area: image3;
		}
		div.image4{content: url(images/stickers.jpeg);height: 95% !important;
			grid-area: image4;
		}
		div.image5{content: url(images/stitch.jpeg);height: 95% !important;
			grid-area: image5;		
		}

    div[target] {
			margin-top:5px;
			width: 100%;
			box-sizing: border-box;		
			height: absolute;
			text-align: center;			
			box-shadow: 5px 2px 19px rgb(27, 124, 189);			
			background-color: #f0f0f0;
		}
.grid-container {
  display: grid;
  max-width: 853px;
  grid-template-areas:
    'header header header header header logout'
    'main main main main main right'
    'main main main main main right'
    'main main main main main right'
    'main main main main main right'
    'main main main main main right'        
    'image1 image2 image3 image4 image5 image6';
  grid-gap: 3px;
  padding: 3px;
}

.grid-container > div {
  background-image: url("images/goodBackground.jpg");		  
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}

#container {
    margin: 0px auto;
    width: 500px;
    height: 375px;
    border: 1px #999 solid;
}
#videoElement {
    width: 500px;
    height: 375px;
    background-color: #666;
}

.TakePhoto{  
  color:white;
  background-image: url("images/goodBackground.jpg");		    
  font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  box-shadow: 5px 2px 19px rgb(27, 124, 189);			
}
.logout5 {
  box-shadow: 5px 2px 19px rgb(27, 124, 189);			
  font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.Video {
  box-shadow: 5px 2px 19px rgb(27, 124, 189);			
}
<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</style>
</head>
<body>

<div class="grid-container">
  <div class="head1"  style="color: white;	font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><b>CAMAGRU</b></div>

  <div class="main2">
    <div class="camera"><video class="Video" id="video">Video stream not available.</video><br><button class="TakePhoto" id="startbutton">Take photo</button></div>
  </div>
  <div class="logout5">
    <a href="index.php?logout='1'" style="color: white; font-size: 20px;	font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Sign out</a>
  </div> 

  <div class="right3"><canvas id="canvas"></canvas></div>
  <div target="_" class="image1"></div>
		<div target="_" class="image2"></div>
		<div target="_" class="image3"></div>
		<div target="_" class="image4"></div>
		<div target="_" class="image5"></div>
		<div target="_" class="image6"></div>
</div>


<script>

(function() {

  var width = 320;    // We will scale the photo width to this
  var height = 0;     // This will be computed based on the input stream
  var streaming = false;
  var video = null;
  var canvas = null;
  var photo = null;
  var startbutton = null;

  function startup() {
    video = document.getElementById('video');
    canvas = document.getElementById('canvas');
    photo = document.getElementById('photo');
    startbutton = document.getElementById('startbutton');

    navigator.getMedia = ( navigator.getUserMedia ||
                           navigator.webkitGetUserMedia ||
                           navigator.mozGetUserMedia ||
                           navigator.msGetUserMedia);

    navigator.getMedia(
      {
        video: true,
        audio: false
      },
      function(stream) {
        if (navigator.mozGetUserMedia) {
          video.mozSrcObject = stream;
        } else {
          var vendorURL = window.URL || window.webkitURL;
          video.srcObject = stream;
            video.play();
        }
        video.play();
      },
      function(err) {
        console.log("An error occured! " + err);
      }
    );

    video.addEventListener('canplay', function(ev){
      if (!streaming) {
        height = video.videoHeight / (video.videoWidth/width);
        if (isNaN(height)) {
          height = width / (4/3);
        }
      
        video.setAttribute('width', width);
        video.setAttribute('height', height);
        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);
        streaming = true;
      }
    }, false);

    startbutton.addEventListener('click', function(ev){
      takepicture();
      ev.preventDefault();
    }, false);

  }
  
  function takepicture() {
    var context = canvas.getContext('2d');
    if (width && height) {
      canvas.width = width;
      canvas.height = height;
      context.drawImage(video, 0, 0, width, height);
    
      var data = canvas.toDataURL('image/png');
    } 
  }
  window.addEventListener('load', startup, false);
})();

</script>

</body>
</html>

