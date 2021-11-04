<?php
require 'Carbon.php';
use Carbon\Carbon;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	 <title> UCC Computer Science Student </title>
   <meta http-equiv="content-type">

   <link id="csslink" rel="stylesheet" href="styleSheets/light.css">

  </head>


<!--Navigation Bar-->
  <div class="nav">
        <table>
          <tr>
            <td>
              <a href="cms-3.php?cont=1"><img src="icons/home.svg"/> HOME</a>
              <div class="time">
                <?php  echo updateTime('content/home.md');  ?>

              </div>
            </td>
          </tr>
          <tr>
            <td>
              <a href="cms-3.php?cont=2"><img src="icons/personal.svg"/> Personal</a>
              <div class="time">
                <?php  echo updateTime('content/personal.md');?>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <a href="cms-3.php?cont=3"><img src="icons/ucc.svg"/> UCC</a>
              <div class="time">
                <?php echo updateTime('content/ucc.md');?>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <a href="cms-3.php?cont=4"><img src="icons/contact.svg"/> Contact</a>
              <div class="time">
                <?php echo updateTime('content/contact.md'); ?>
              </div>
            </td>
          </tr>
        </table>

<!--Theme Buttons-->
          <button class="button" onclick="switchTheme('styleSheets/light.css')">
            <img src="icons/light.svg"/> Light Theme
          </button>
          <br>
          <button class="button" onclick="switchTheme('styleSheets/dark.css')">
            <img src="icons/dark.svg"/> Dark Theme
          </button>
          <button class="button" onclick="switchTheme('styleSheets/large_fonts.css')">
            <img src="icons/large_fonts.svg"/> Large Fonts
          </button>
             <p class="time">
             <?php echo date('l jS \of F Y h:i:s A'); ?>
            </p>

    </div>
  <div  class="cont">
    <p>
    <div id="cont">
    <?php
       //get cont function
        $filename;
        function getCont($filename) {
          if (is_file($filename)){
            include('Parsedown.php');
            $contents = file_get_contents($filename);
            $Parsedown = new Parsedown();
            echo $Parsedown->text($contents);
          }
          else{
          echo "Error. Content file cannot be retrieved. ";

          }
        }

        //get cont
        if(isset($_GET['cont'])){
          switch ($_GET['cont']) {
              case "1":
              echo getCont('content/home.md');

                break;
              case "2":
              echo getCont('content/personal.md');

                break;
              case "3":
              echo getCont('content/ucc.md');

                break;
              case "4":
              echo getCont('content/contact.md');

                break;
              default:
              echo "Invalid parameter. No such content!";

             }
            }
        else{
              echo getCont('content/home.md');

        }



        //updated time function
        function updateTime($filename){

                  $ts = filemtime($filename);  // create the time stamp
                  $carb = Carbon::createFromTimestamp($ts); // create the Carbon object
                  echo  '<p>Updated ' .$carb->diffForHumans().'</p>';// generate the text phrase
       }
    ?>


   </div>
 </p>
  </div>
<!--Message-->
  <div class="message">
   <p>Message:  </p>
   <a id="msg">
  <?php

  //get message function
    function getMessage($filename){
      if (is_file($filename)){
        echo 'This page is '.$filename.'.';
        }
      else{
        echo "Error. Content file cannot be retrieved. ";
      }
    }

//get message
   if(isset($_GET['cont'])){
       switch ($_GET['cont']) {
         case "1":
         echo getMessage('content/home.md');
           break;
         case "2":
         echo getMessage('content/personal.md');
           break;
         case "3":
         echo getMessage('content/ucc.md');
           break;
         case "4":
         echo getMessage('content/contact.md');
         break;
           default:
           echo "Invalid parameter. No such content!";
          }
         }
     else{
           echo getMessage('content/home.md');
     }
  ?>

   </a>

  </div>

  <script>

    function switchTheme(newcss){
      document.getElementById('csslink').href = newcss;
      document.getElementById('msg').innerHTML ='<p>Theme is changed to ' + newcss+'</p>';

    }
    // function loadContent(url) {
    //   var xhttp = new XMLHttpRequest();
    //   xhttp.onreadystatechange = function() {
    //     if (xhttp.readyState == 4 ) {
    //       if(xhttp.status == 200) {
    //       document.getElementById("content").innerHTML = xhttp.responseText;
    //       }
    //       else{
    //         alert('sorry');
    //       }
    //     }
    //   };
    //   xhttp.open("GET", url, true);
    //   xhttp.send();
    // }

  </script>

 </body>
</html>
