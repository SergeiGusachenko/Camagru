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
<style>
.head1 { grid-area: header; 
}
.main2 { grid-area: main;
  background-image: url("images/goodBackground.jpg");			
 }
.right { grid-area: right;
 }
.footer { grid-area: footer; 
  background-image: url("images/goodBackground.jpg");			
}
.logout { grid-area: logout; 
}

.grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header logout'
    'main main main main main right'
    'image1 image2 image3 image4 image5 right'
    'button1 button2 button3 button4 button5 right'
    'footer footer footer footer footer footer';
  grid-gap: 3px;
  background-image: url("images/goodBackground.jpg");		
  padding: 3px;
}
div[target] {
			box-shadow: 5px 2px 19px rgb(27, 124, 189);			
      background-image: url("images/goodBackground.jpg");			
    }
    
div.image1{content: url(images/galaxyWor.png) ;height: 95% !important;
		grid-area: image1;
		}		
		div.image2{content: url(images/pony.png);height: 95% !important;
			grid-area: image2;		
		}
		div.image3{content: url(images/blackandwhite.png); height: 95% !important;
			grid-area: image3;
		}
    div.image4{content: url(images/stitch.jpeg);
			grid-area: image4;		
		}
		div.image5{content: url(images/kissclipart.png);height: 95% !important;
			grid-area: image5;
    }

  div.button1{
    font-size: 20px !important;
    grid-area: button1;
  }

  div.button2{
    font-size: 20px !important;
    grid-area: button2;
  }

  div.button3{
    font-size: 20px !important;
    grid-area: button3;
  }

  div.button4{
    font-size: 20px !important;
    grid-area: button4;
  }

  div.button5{
    font-size: 20px !important;    
    grid-area: button5;
  }
    


.grid-container > div {
  background-image: url("images/goodBackground.jpg");			
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
  border-radius: 5px;
  box-shadow: 5px 2px 19px rgb(27, 124, 189);		
}
html {
  min-width: 1412px !important;
    max-height: 1014px !important;
    position: relative;
    height: 100%;
}
#container {
    margin: 0px auto;
    width: 500px;
    height: 375px;
    border: 1px #999 solid;
    
}
#video {
    width: 500px;
    height: 375px;
    background-image: url("images/goodBackground.jpg");			
    
}

</style>
<body>

<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</style>
</head>
<body>

<div class="grid-container">
  <div class="head1"  style="color: white;"><b>CAMAGRU</b></div>

  <div class="main2">
    <div class="camera"><video id="video">Video stream not available.</video><br><button id="startbutton">Take photo</button></div>
  </div>
  <div class="logout5">
    <a href="index.php?logout='1'" style="color: white; font-size: 20px">Sign out</a>
  </div> 

  <div target="_" class="image1"></div>
		<div target="_" class="image2"></div>
		<div target="_" class="image3"></div>
		<div target="_" class="image4"></div>
		<div target="_" class="image5"></div>

    <div  class="button1" style="color:white;" > <button id="putWar">Put photo</button></div>
		<div  class="button2" style="color:white;"> <button id="putPony">Put photo</button></div>
		<div  class="button3" style="color:white;"> <button id="putBlackWar">Put photo</button></div>
		<div  class="button4" style="color:white;"> <button id="putStitch">Put photo</button></div>
		<div  class="button5" style="color:white;"> <button id="putWeed">Put photo</button></div>

  <div class="right"><canvas id="canvas"></canvas></div>
  <div class="footer" style="color: white; font-size: 20px;">sgusache @2019</div>
</div>
</div>
</body>
</html>


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
  putWar = document.getElementById('putWar');
  putStitch = document.getElementById('putStitch');
  putPony = document.getElementById('putPony');
  putBlackWar = document.getElementById('putBlackWar');
  putWeed = document.getElementById('putWeed');

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

putWeed.addEventListener('click', function(ev){
    takeputWeed();
    ev.preventDefault();
  }, false);

  startbutton.addEventListener('click', function(ev){
    takepicture();
    ev.preventDefault();
  }, false);
putBlackWar.addEventListener('click', function(ev){
    takeputBlackWar();
    ev.preventDefault();
  }, false);

putPony.addEventListener('click', function(ev){
    takeputPony();
    ev.preventDefault();
  }, false);
  putWar.addEventListener('click', function(ev){
    takeputWar();
    ev.preventDefault();
  }, false);

  putStitch.addEventListener('click', function(ev){
    takeputStitch();
    ev.preventDefault();
  }, false);
}

function   takeputWeed(){
  var img1 = document.createElement("img");
  img1.src = "images/kissclipart.png";
  var context = canvas.getContext('2d');
  if (width && height) {
    canvas.width = width;
    canvas.height = height;
		context.save();
    context.drawImage(video, 0, 0, width, height);
    context.drawImage(img1,0,0, width, height);
    var data = canvas.toDataURL('image/png');
}
}

function   takeputBlackWar(){
  var img1 = document.createElement("img");
  img1.src = "images/blackandwhite.png";
  var context = canvas.getContext('2d');
  if (width && height) {
    canvas.width = width;
    canvas.height = height;
		context.save();
    context.drawImage(video, 0, 0, width, height);
    context.drawImage(img1,0,0,img1.width/5,img1.height/5);
    var data = canvas.toDataURL('image/png');
}
}

function takeputPony() {
  var img1 = document.createElement("img");
  img1.src = "images/pony.png";
  var context = canvas.getContext('2d');
  if (width && height) {
    canvas.width = width;
    canvas.height = height;
		context.save();
    context.drawImage(video, 0, 0, width, height);
    context.drawImage(img1,10,10,img1.width/2,img1.height/2);
    var data = canvas.toDataURL('image/png');
  } 
}

function takeputStitch() {
  var img1 = document.createElement("img");
  img1.src = "images/Lstitch.png";
  var context = canvas.getContext('2d');
  if (width && height) {
    canvas.width = width;
    canvas.height = height;
		context.save();
    context.drawImage(video, 0, 0, width, height);
    context.drawImage(img1,10,10,img1.width/2,img1.height/2);
    
  
    var data = canvas.toDataURL('image/png');
  } 
}

function takepicture() {
  var img1 = document.createElement("img");
  var context = canvas.getContext('2d');
  if (width && height) {
    canvas.width = width;
    canvas.height = height;
		context.save();
    context.drawImage(video, 0, 0, width, height);
    
  
    var data = canvas.toDataURL('image/png');
  } 
}

function takeputWar() {
  var img1 = document.createElement("img");
  img1.src = "images/galaxyWor.png";
  var context = canvas.getContext('2d');
  if (width && height) {
    canvas.width = width;
    canvas.height = height;
		context.save();
    context.drawImage(video, 0, 0, width, height);
    context.drawImage(img1,0,0,img1.width/5,img1.height/5);
    
  
    var data = canvas.toDataURL('image/png');
  } 
}


window.addEventListener('load', startup, false);
})();

</script>


