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
 }
.right { grid-area: right0;
 }

.right1 { grid-area: right1;
 }

.right2 { grid-area: right2;
 }

.right3 { grid-area: right3;
 }

.right4 { grid-area: right4;
 }

.footer { grid-area: footer; 
}
.logout { grid-area: logout; 
}

.grid-container {
  max-height: 414px !important;
  
  display: grid;
  grid-template-areas:
    'header header header header header logout'
    'main main main main main right0'
    'main main main main main right1'
    'space space space space space right2'
    'image1 image2 image3 image4 image5 right3'        
    'button1 button2 button3 button4 button5 right4'
    'footer footer footer footer footer footer';
  grid-gap: 3px;
  padding: 3px;
}
div[target] {
  background-image: url("images/stars_milky.jpg");			
    }
    
div.image1{content: url(images/galaxyWor.png) ;height: 200px !important;
		grid-area: image1;
		}		
		div.image2{content: url(images/pony.png);height: 200px !important;
			grid-area: image2;		
		}
		div.image3{content: url(images/blackandwhite.png); height: 200px !important;
			grid-area: image3;
		}
    div.image4{content: url(images/stitch.jpeg);
      height: 200px !important;
			grid-area: image4;		
		}
		div.image5{content: url(images/kissclipart.png);height: 200px !important;
			grid-area: image5;
    }
  div.space{
    grid-area:space;
  }
  div.button1{
  background-image: url("images/stars_milky.jpg");			    
    font-size: 20px !important;
    grid-area: button1;
  }

  div.button2{
  background-image: url("images/stars_milky.jpg");			    
    font-size: 20px !important;
    grid-area: button2;
  }

  div.button3{
  background-image: url("images/stars_milky.jpg");			    
    font-size: 20px !important;
    grid-area: button3;
  }

  div.button4{
  background-image: url("images/stars_milky.jpg");			
    
    font-size: 20px !important;
    grid-area: button4;
  }

  div.button5{
  background-image: url("images/stars_milky.jpg");			    
    font-size: 20px !important;    
    grid-area: button5;
  }
    
  input{
    background-image: url("images/stars_milky.jpg");			

    }
div.head1{
  background-image: url("images/stars_milky.jpg")	!important;
}

.grid-container > div {
  max-height: 600px !important;
  text-align: center;
  padding: 20px 0;
  font-size: 40px;
  border-radius: 5px;
  background-color:black;    			
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
    width: 550px;
    height: 425px;
    border-radius: 5px;
  box-shadow: 5px 2px 19px rgb(27, 124, 189);	
}
.Dimage{
  width: 700px;
    height: 575px;
}
button{
  font-family: 'Major Mono Display', monospace;
  background-color:black;    
  border-radius: 5px;
  box-shadow: 5px 2px 19px rgb(27, 124, 189);	
  color:white;
}

input{
  font-family: 'Major Mono Display', monospace;
  border-radius: 5px;
  box-shadow: 5px 2px 19px rgb(27, 124, 189);	
  color:white;
}
div.logout5{
  background-image: url("images/stars_milky.jpg")	!important;  
}
</style>
<body>
<link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</style>
</head>
<body>

<div class="grid-container">
  <div class="head1"  style="color: white; "><b>cAMAGRu</b></div>

  <div class="main2">
    <div class="camera"><video id="video">Video stream not available.</video></div>
  </div>
  <div class="logout5">
    <a href="index.php?logout='1'" style="color: white; font-size: 20px">sign out</a>
  </div> 

  <div target="_" class="image1"></div>
		<div target="_" class="image2"></div>
		<div target="_" class="image3"></div>
		<div target="_" class="image4"></div>
		<div target="_" class="image5"></div>
    <div class="space">
    <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
  <button id="startbutton">Take photo</button><br><br>
  <a href="#" id="fileSelect">SelecT FileS to DownloaD</a> 
  <div id="fileList"></div>
    <input type="button" id = "get_file" style="display:none; width:90%; height:50px; font-family: 'Major Mono Display', monospace;" value= "choose file to download">
    <input type="file" id="my_file" style="display:none;">        
  
    </div>
    <div  class="button1" style="color:white; height:70px" > <button id="putWar">put photo</button></div>
		<div  class="button2" style="color:white;height:70px"> <button id="putPony">put photo</button></div>
		<div  class="button3" style="color:white;height:70px"> <button id="putBlackWar">put photo</button></div>
		<div  class="button4" style="color:white;height:70px"> <button id="putStitch">put photo</button></div>
		<div  class="button5" style="color:white;height:70px"> <button id="putWeed">put photo</button></div>

  <div class="right"><canvas id="canvas"></canvas></div>
  <div  class="right1"><canvas id="canvas1"></canvas></div>
  <div  class="right2"><canvas id="canvas2"></canvas></div>
  <div  class="right3"><canvas id="canvas3"></canvas></div>
  <div  class="right4"><canvas id="canvas4"></canvas></div>
  <div class="footer" style="color: white; font-size: 20px;">sGusacHe @2019</div>
</div>
</div>
</body>
</html>
<script>
window.URL = window.URL || window.webkitURL;

const fileSelect = document.getElementById("fileSelect"),
    fileElem = document.getElementById("fileElem"),
    fileList = document.getElementById("fileList");

fileSelect.addEventListener("click", function (e) {
  if (fileElem) {
    fileElem.click();
  }
  e.preventDefault(); // prevent navigation to "#"
}, false);

function handleFiles(files) {
  if (!files.length) {
    fileList.innerHTML = "<p>No files selected!</p>";
  } else {
    fileList.innerHTML = "";
    const list = document.createElement("ul");
    fileList.appendChild(list);
    for (let i = 0; i < files.length; i++) {
      const li = document.createElement("li");
      list.appendChild(li);
      
      const img = document.createElement("img");
      img.src = window.URL.createObjectURL(files[i]);
      img.height = 60;
      img.onload = function() {
        window.URL.revokeObjectURL(this.src);
      }
      li.appendChild(img);
      const info = document.createElement("span");
      info.innerHTML = files[i].name + ": " + files[i].size + " bytes";
      li.appendChild(info);
    }
  }
}


(function() {

var width = 320;    // We will scale the photo width to this
var height = 0;     // This will be computed based on the input stream
var streaming = false;
var video = null;
var canvas = null;
var photo = null;
var startbutton = null;
var counter = 0;
var file;
var reader = new FileReader();
//DOWNLOAD FILE BUtTON
document.getElementById('get_file').onclick = function() {
 file = document.getElementById('my_file').click();
 var img = new Image();
 img.src = file
 };

//DOWNLOAD FILE BUTTON

function startup() {
  video = document.getElementById('video');
  canvas = document.getElementById('canvas');
  canvas1 = document.getElementById('canvas1');
  canvas2 = document.getElementById('canvas2');
  canvas3 = document.getElementById('canvas3');
  canvas4 = document.getElementById('canvas4');
  
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
  if(counter >= 5 ){
    counter = 0;
  }
  if (width && height && counter==0) {
    canvas.width = width;
    canvas.height = height;
		context.save();
    context.drawImage(video, 0, 0, width, height);
    context.drawImage(img1,0,0,320,240);        
    var data = canvas.toDataURL('image/png');
  } 
  if(counter == 1){
    var context1 = canvas1.getContext('2d');
    canvas1.width = width;
    canvas1.height = height;
		context1.save();
    context1.drawImage(video, 0, 0, width, height);
      context1.drawImage(img1,0,0,320,240);    
    var data = canvas1.toDataURL('image/png');
  }
  if(counter == 2){
    var context2 = canvas2.getContext('2d');
    canvas2.width = width;
    canvas2.height = height;
		context2.save();
    context2.drawImage(video, 0, 0, width, height);
    context2.drawImage(img1,0,0,320,240);    
    var data = canvas2.toDataURL('image/png');
  }
  if(counter == 3){
    var context3 = canvas3.getContext('2d');
    canvas3.width = width;
    canvas3.height = height;
		context3.save();
    context3.drawImage(video, 0, 0, width, height);
    context3.drawImage(img1,0,0,320,240);    
    var data = canvas3.toDataURL('image/png');
  }
  if(counter == 4){
    var context4 = canvas4.getContext('2d');
    canvas4.width = width;
    canvas4.height = height;
		context4.save();
    context4.drawImage(video, 0, 0, width, height);
    context4.drawImage(img1,0,0,320,240);    
    var data = canvas4.toDataURL('image/png');
  }
  counter++;
}

function   takeputBlackWar(){
  var img1 = document.createElement("img");
  img1.src = "images/blackandwhite.png";
  var context = canvas.getContext('2d');  
  if(counter >= 5 ){
    counter = 0;
  }
  if (width && height && counter==0) {
    canvas.width = width;
    canvas.height = height;
		context.save();
    context.drawImage(video, 0, 0, width, height);
    context.drawImage(img1,0,0,img1.width/5,img1.height/5);    
    var data = canvas.toDataURL('image/png');
  } 
  if(counter == 1){
    var context1 = canvas1.getContext('2d');
    canvas1.width = width;
    canvas1.height = height;
		context1.save();
    context1.drawImage(video, 0, 0, width, height);
    context1.drawImage(img1,0,0,img1.width/5,img1.height/5);
    var data = canvas1.toDataURL('image/png');
  }
  if(counter == 2){
    var context2 = canvas2.getContext('2d');
    canvas2.width = width;
    canvas2.height = height;
		context2.save();
    context2.drawImage(video, 0, 0, width, height);
    context2.drawImage(img1,0,0,img1.width/5,img1.height/5);
    
    var data = canvas2.toDataURL('image/png');
  }
  if(counter == 3){
    var context3 = canvas3.getContext('2d');
    canvas3.width = width;
    canvas3.height = height;
		context3.save();
    context3.drawImage(video, 0, 0, width, height);
    context3.drawImage(img1,0,0,img1.width/5,img1.height/5);
    
    var data = canvas3.toDataURL('image/png');
  }
  if(counter == 4){
    var context4 = canvas4.getContext('2d');
    canvas4.width = width;
    canvas4.height = height;
		context4.save();
    context4.drawImage(video, 0, 0, width, height);
    context4.drawImage(img1,0,0,img1.width/5,img1.height/5);    
    var data = canvas4.toDataURL('image/png');
  }
  counter++;
}

function takeputPony() {
  var img1 = document.createElement("img");
  img1.src = "images/pony.png";
  var context = canvas.getContext('2d');  
  if(counter >= 5 ){
    counter = 0;
  }
  if (width && height && counter==0) {
    canvas.width = width;
    canvas.height = height;
		context.save();
    context.drawImage(video, 0, 0, width, height);
    context.drawImage(img1,0,0,img1.width/3,img1.height/3);    
    var data = canvas.toDataURL('image/png');
  } 
  if(counter == 1){
    var context1 = canvas1.getContext('2d');
    canvas1.width = width;
    canvas1.height = height;
		context1.save();
    context1.drawImage(video, 0, 0, width, height);
    context1.drawImage(img1,0,0,img1.width/3,img1.height/3);
    var data = canvas1.toDataURL('image/png');
  }
  if(counter == 2){
    var context2 = canvas2.getContext('2d');
    canvas2.width = width;
    canvas2.height = height;
		context2.save();
    context2.drawImage(video, 0, 0, width, height);
    context2.drawImage(img1,0,0,img1.width/3,img1.height/3);
    
    var data = canvas2.toDataURL('image/png');
  }
  if(counter == 3){
    var context3 = canvas3.getContext('2d');
    canvas3.width = width;
    canvas3.height = height;
		context3.save();
    context3.drawImage(video, 0, 0, width, height);
    context3.drawImage(img1,0,0,img1.width/3,img1.height/3);
    
    var data = canvas3.toDataURL('image/png');
  }
  if(counter == 4){
    var context4 = canvas4.getContext('2d');
    canvas4.width = width;
    canvas4.height = height;
		context4.save();
    context4.drawImage(video, 0, 0, width, height);
    context4.drawImage(img1,0,0,img1.width/3,img1.height/3);    
    var data = canvas4.toDataURL('image/png');
  }
  counter++;
}

function takeputStitch() {
  var img1 = document.createElement("img");
  img1.src = "images/Lstitch.png";
  var context = canvas.getContext('2d');  
  if(counter >= 5 ){
    counter = 0;
  }
  if (width && height && counter==0) {
    canvas.width = width;
    canvas.height = height;
		context.save();
    context.drawImage(video, 0, 0, width, height);
    context.drawImage(img1,0,0,img1.width/3,img1.height/3);    
    var data = canvas.toDataURL('image/png');
  } 
  if(counter == 1){
    var context1 = canvas1.getContext('2d');
    canvas1.width = width;
    canvas1.height = height;
		context1.save();
    context1.drawImage(video, 0, 0, width, height);
    context1.drawImage(img1,0,0,img1.width/3,img1.height/3);
    var data = canvas1.toDataURL('image/png');
  }
  if(counter == 2){
    var context2 = canvas2.getContext('2d');
    canvas2.width = width;
    canvas2.height = height;
		context2.save();
    context2.drawImage(video, 0, 0, width, height);
    context2.drawImage(img1,0,0,img1.width/3,img1.height/3);
    
    var data = canvas2.toDataURL('image/png');
  }
  if(counter == 3){
    var context3 = canvas3.getContext('2d');
    canvas3.width = width;
    canvas3.height = height;
		context3.save();
    context3.drawImage(video, 0, 0, width, height);
    context3.drawImage(img1,0,0,img1.width/3,img1.height/3);
    
    var data = canvas3.toDataURL('image/png');
  }
  if(counter == 4){
    var context4 = canvas4.getContext('2d');
    canvas4.width = width;
    canvas4.height = height;
		context4.save();
    context4.drawImage(video, 0, 0, width, height);
    context4.drawImage(img1,0,0,img1.width/3,img1.height/3);    
    var data = canvas4.toDataURL('image/png');
  }
  counter++;
}

function takepicture() {

  var img1 = document.createElement("img");
  var context = canvas.getContext('2d');
  if(counter == 5 ){
    counter = 0;
  }
  if (width && height && counter==0) {
    canvas.width = width;
    canvas.height = height;
		context.save();
    context.drawImage(video, 0, 0, width, height);
    var data = canvas.toDataURL('image/png');
  } 
  if(counter == 1){
    var context1 = canvas1.getContext('2d');
    canvas1.width = width;
    canvas1.height = height;
		context1.save();
    context1.drawImage(video, 0, 0, width, height);
    var data = canvas1.toDataURL('image/png');
  }
  if(counter == 2){
    var context2 = canvas2.getContext('2d');
    canvas2.width = width;
    canvas2.height = height;
		context2.save();
    context2.drawImage(video, 0, 0, width, height);
    var data = canvas2.toDataURL('image/png');
  }
  if(counter == 3){
    var context3 = canvas3.getContext('2d');
    canvas3.width = width;
    canvas3.height = height;
		context3.save();
    context3.drawImage(video, 0, 0, width, height);
    var data = canvas3.toDataURL('image/png');
  }
  if(counter == 4){
    var context4 = canvas4.getContext('2d');
    canvas4.width = width;
    canvas4.height = height;
		context4.save();
    context4.drawImage(video, 0, 0, width, height);
    var data = canvas4.toDataURL('image/png');
  }
  counter++;
}

function takeputWar() {
  var img1 = document.createElement("img");
  img1.src = "images/galaxyWor.png";
  var context = canvas.getContext('2d');  
  if(counter >= 5 ){
    counter = 0;
  }
  if (width && height && counter==0) {
    canvas.width = width;
    canvas.height = height;
		context.save();
    context.drawImage(video, 0, 0, width, height);
    context.drawImage(img1,0,0,img1.width/5,img1.height/5);    
    var data = canvas.toDataURL('image/png');
  } 
  if(counter == 1){
    var context1 = canvas1.getContext('2d');
    canvas1.width = width;
    canvas1.height = height;
		context1.save();
    context1.drawImage(video, 0, 0, width, height);
    context1.drawImage(img1,0,0,img1.width/5,img1.height/5);
    var data = canvas1.toDataURL('image/png');
  }
  if(counter == 2){
    var context2 = canvas2.getContext('2d');
    canvas2.width = width;
    canvas2.height = height;
		context2.save();
    context2.drawImage(video, 0, 0, width, height);
    context2.drawImage(img1,0,0,img1.width/5,img1.height/5);
    
    var data = canvas2.toDataURL('image/png');
  }
  if(counter == 3){
    var context3 = canvas3.getContext('2d');
    canvas3.width = width;
    canvas3.height = height;
		context3.save();
    context3.drawImage(video, 0, 0, width, height);
    context3.drawImage(img1,0,0,img1.width/5,img1.height/5);
    
    var data = canvas3.toDataURL('image/png');
  }
  if(counter == 4){
    var context4 = canvas4.getContext('2d');
    canvas4.width = width;
    canvas4.height = height;
		context4.save();
    context4.drawImage(video, 0, 0, width, height);
    context4.drawImage(img1,0,0,img1.width/5,img1.height/5);    
    var data = canvas4.toDataURL('image/png');
  }
  counter++;
}
window.addEventListener('load', startup, false);
})();

</script>


