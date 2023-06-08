
<?php 
$cookie_name = "counter";
$cookie_value = 0;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
  $('#reload').click(function() {
    reloadContent();
  });

  function reloadContent() {
    $.ajax({
     
      cache: false,
      success: function(data) {
        $('#imagemap').html(data);
        console.log('Content reloaded successfully.');
      },
      error: function() {
        console.log('Error reloading content.');
      }
    });
  }
});
    </script>
    <script>

        $(window).on('beforeunload', function(){
  $(window).scrollTop(0);
});
         window.addEventListener('load', function() {
            // Check if the URL contains an anchor
            if (window.location.hash) {
                // Get the target element ID from the URL anchor
                var targetElementId = window.location.hash.substring(1);
                var targetElement = document.getElementByClass(home);
                
                // Scroll to the target element if it exists
                if (targetElement) {
                    targetElement.scrollIntoView();
                }
            }
        });
   function toggle(ele) {
    var cont1 = document.getElementById('dis');
        var cont = document.getElementById('chatting');
        var cont2 = document.getElementById('imagemap');
        cont1.style.display='block';
        $(document).scrollTop(650);
       cont.style.display='block';
       cont2.style.display='block';
       
    }
    
  </script>

</head>
<body>

    <div class="background"></div>
<div class="hole">
    <div class="home" id="src">
        <p class="titleb">Introducing DIAG</p>
        <p class="slogan" >Every time you consider getting a checkup, Diag has the solution you desire.</p>
        <div class="row">
            <p class="para" style="height:100px; text-align:justify;">If you are feeling poorly, it aids in your understanding of what might be wrong. Simply describe your symptoms and respond to inquiries to determine potential medical causes.</p>

        </div >
        <div class="try1">
        <button class="learn-more" onclick="toggle(this)">
  <span class="circle" aria-hidden="true">
  <span class="icon arrow"></span>
  </span>
  <span class="button-text">Try Diag?</span>
</button>
</div>
    </div>
<div class="chat" id="dis">

<div class="image-container" id="imagemap">
<img src="head.png" alt="Image with map" id="clickablehead"/><img src="chest.png" alt="Image with map" id="clickablecheast" /><img src="stomach.png" alt="Image with map" id="clickablestomach" /><img src="leg.png" alt="Image with map" id="clickableleg" /></div>
 
<script>
//head
  document.getElementById("clickablehead").addEventListener("click", function() {
    var cont1 = document.getElementById('dis');
        var cont = document.getElementById('chatting');
    cont.style.display = 'block';
    var areaData = "head";
    var cont3 = document.getElementById('imagemap');
    cont3.style.display = 'none';
    $.ajax({
                url: 'process.php',
                type: 'POST',
                data: { input: areaData },
                success: function (response) {
                    $('.form').append('<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + response + '</p></div></div>');
                    
                    $('.form').scrollTop($('.form')[0].scrollHeight);
                }
            });
  
  });
  $("#clickablehead").click(function(){
    $(document).scrollTop(650)
           
        });
//chest
document.getElementById("clickablecheast").addEventListener("click", function() {
    var cont1 = document.getElementById('dis');
        var cont = document.getElementById('chatting');
    cont.style.display = 'block';
    var areaData = "chest";
    var cont3 = document.getElementById('imagemap');
    cont3.style.display = 'none';
    $.ajax({
                url: 'process.php',
                type: 'POST',
                data: { input: areaData },
                success: function (response) {
                    $('.form').append('<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + response + '</p></div></div>');
                    
                    $('.form').scrollTop($('.form')[0].scrollHeight);
                }
            });
    
  });
  $("#clickablecheast").click(function(){
            $(document).scrollTop(650)
        });
//stomach
document.getElementById("clickablestomach").addEventListener("click", function() {
    var cont1 = document.getElementById('dis');
        var cont = document.getElementById('chatting');
    cont.style.display = 'block';
    var areaData = "stomach";
    var cont3 = document.getElementById('imagemap');
    cont3.style.display = 'none';
    $.ajax({
                url: 'process.php',
                type: 'POST',
                data: { input: areaData },
                success: function (response) {
                    $('.form').append('<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + response + '</p></div></div>');
                    
                    $('.form').scrollTop($('.form')[0].scrollHeight);
                }
            });
   
  });
  $("#clickablestomach").click(function(){
            $(document).scrollTop(650)
        });
//leg
document.getElementById("clickableleg").addEventListener("click", function() {
    var cont1 = document.getElementById('dis');
        var cont = document.getElementById('chatting');
    cont.style.display = 'block';
    var areaData = "leg";
    var cont3 = document.getElementById('imagemap');
    cont3.style.display = 'none';
    $.ajax({
                url: 'process.php',
                type: 'POST',
                data: { input: areaData },
                success: function (response) {
                    $('.form').append('<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p >' + response + '</p></div></div>');
                    
                    $('.form').scrollTop($('.form')[0].scrollHeight);
                }
            });
  });
  $("#clickableleg").click(function(){
            $(document).scrollTop(650)
        });
</script>
<div id="chatting" class="wrapper" id="cont">
     
        <div class="title" style="font-size:20px;">Diag-Chat</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hello there, how can I help you?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="send a message." required style="color:white;">
                <button id="send-btn">Send</button>
            </div>
        </div>
        
    </div>
</div>
<div  class="about">
    <p class="titec" sytle="font-size:20px">About Us</p>
    <div class="">
    <p class="t">Mission</p>
    <p class="tpara">Promote equitable care, human flourishing, and good health for and in the communities that are most difficult to reach. We create and implement open source digital tools that support health professionals in providing their neighbours and community with quality, equitable care.
    </p>
    <p class="t">Vision</p>
    <p class="tpara">In our ideal world, universal health coverage is a reality, and health is a guaranteed human right — for everyone, everywhere, always. Health workers are supported as they provide care for their communities.
    </p>
</div>
</div>
<div id="con" class="contact">
<p class="t" style="padding-top:40px">Contact Us</p>
<form class="formmail" action="mailer.php" method="POST" >
          
          Name:<br><input class="namesub" type="text" name="subject">
          <br><br>
          Email-ID:<br><input class="namesub" type="text" name="to" required>
          <br><br>
          Query:
          <textarea name="message" class="querytext" rows="10" cols="50" required></textarea>
          <br><br>
          <button type="submit" class="mailph">
  <div class="svg-wrapper-1">
    <div class="svg-wrapper">
      <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 0h24v24H0z" fill="none"></path>
        <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" fill="currentColor"></path>
      </svg>
    </div>
  </div>
  <span>Send</span>
</button>
        </form>
</div>

    <script>

$(document).ready(function () {
    
    $('#data').keypress(function (event) {
        if (event.which === 13) { 
            event.preventDefault();
            var userInput = $(this).val();
            $(this).val('');
            $('.form').append('<div class="user-inbox inbox"><div class="msg-header"><p>' + userInput + '</p></div></div>');
            $('.form').scrollTop($('.form')[0].scrollHeight);
          
            $.ajax({
                url: 'process.php',
                type: 'POST',
                data: { input: userInput },
                success: function (response) {
                    $('.form').append('<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + response + '</p></div></div>');
                    
                    $('.form').scrollTop($('.form')[0].scrollHeight);
                }
            });
        }
    });
});


    </script>
    
</div>
<div class="header">
        <ul class="navi">
        <li id="contact">Contact us</li>
        <li id="about">About us</li>
        <li id="home">Home</li>
        </ul></div>
        <div class="typing-cointainer" id="typing-cointainer">
            <span id="sentence" class="sent1">DIAG <span id="feature-text" class="sent2"></span></span>
            
                </div>
                <script type="text/javascript">
                  const carouselText = [
            { text: "ASK", color: "red" },
            { text: "ANALYSE", color: "orange" },
            { text: "SUGGEST", color: "green" }
            ];
            
            $(document).ready(async function () {
            carousel(carouselText, "#feature-text");
            });
            
            async function typeSentence(sentence, eleRef, delay = 100) {
            const letters = sentence.split("");
            let i = 0;
            while (i < letters.length) {
            await waitForMs(delay);
            $(eleRef).append(letters[i]);
            i++;
            }
            return;
            }
            
            async function deleteSentence(eleRef) {
            const sentence = $(eleRef).html();
            const letters = sentence.split("");
            let i = 0;
            while (letters.length > 0) {
            await waitForMs(100);
            letters.pop();
            $(eleRef).html(letters.join(""));
            }
            }
            
            async function carousel(carouselList, eleRef) {
            var i = 0;
            while (true) {
            updateFontColor(eleRef, carouselList[i].color);
            await typeSentence(carouselList[i].text, eleRef);
            await waitForMs(1500);
            await deleteSentence(eleRef);
            await waitForMs(500);
            i++;
            if (i >= carouselList.length) {
              i = 0;
            }
            }
            }
            
            function updateFontColor(eleRef, color) {
            $(eleRef).css("color", color);
            }
            
            function waitForMs(ms) {
            return new Promise((resolve) => setTimeout(resolve, ms));
            }
                </script>


		<script>
        $("#contact").click(function(){
            $(document).scrollTop(2500)
        });
       
       
        $("#about").click(function(){
            var cont1 = document.getElementById('dis');
            if(cont1.style.display=='block'){
        $(document).scrollTop(1350)}else{$(document).scrollTop(650)}
        });
        $("#home").click(function(){
            $(document).scrollTop(0)
        });
        

    </script>
    


</body>
</html>