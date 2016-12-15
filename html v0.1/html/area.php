<?php session_start();?>
<!DOCTYPE html>
<html lang="en-us">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>DishTry | Khana Khaya Kya!</title>
        <link href="img/favIcon.PNG" rel="icon" type="image/PNG">
          
        <!--************** Latest compiled and minified CSS *******************-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
          
        <!-- ************ Optional theme ****************-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
          
        <!-- ************ My CSS ****************-->  
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <style>
            body{
                margin: 0;
                padding: 0;
                font-family: 'Roboto' , sans-serif;
            }
            
            html, body { 
                margin: 0; 
                padding: 0; 
                width: 100%; 
                height: 100%;
                text-align: center;
                align-content: center;
            }
            
            .upperBar{
                background: rgb(233,21,63);
                width: 100%;
                height: 1%;
            }
            
            .heading{
                text-align: center;
                font-size: 20px;
                
            }
            
            .copy{
                display: inline-block;
                position: absolute;
                bottom: 0px;
                left: 31.5%;
                width:37%;
            }
            
        </style>
      </head>
    <!--****************************** BODY STARTS ****************************************-->
      <body>
         <div class="upperBar"></div>
         <br>
         <span class="heading"><p>Please Select Your Area</p></span>
          <br><br>
          <select class="form-control" id="area">
              <option value="dummy">Your Area</option>
              <?php
                if(isset($_COOKIE["city"]))
                {      $oldmask = umask(0);
                    $dom = simplexml_load_file("city/".$_COOKIE["city"].".xml");
                    foreach($dom->xpath("/areas/area") as $area)
                    {
                        echo('<option value="'.$area['srvalue'].'">'.$area['usrvalue'].'</option>');
                    }
                }
                else{
                    header("Location: http://".$_SERVER['HTTP_HOST']);
                }
              ?>
          </select>
          <br>
          <button class="btn btn-info" onclick="proceed()">Proceed</button>
          <br>
          <div id="error"></div>
          <span class="copy">&copy; 2016 DishTry Inc.</span>
         
             
          
        <!--****************************** jQuery ************************-->  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!--************* Latest compiled and minified JavaScript*********** -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--***************************** My JavaScript************************-->    
        <script>
          $("body").ready(function(){$("body").hide().fadeIn("slow");});
            
          function go(){
            document.location.href = "create.php/?form=filled";
          }    
            
          function proceed(){
              if(document.getElementById("area").value != "dummy"){
                  var area = document.getElementById("area").value;
                  document.cookie = "area="+area+"; expires=Thu, 29 Dec 2022 12:00:00 UTC; path=/";
                  $(".btn-info").hide();
                  document.getElementById("error").innerHTML = "<center><img src='img/loader.gif' width='40px'></center>";
                  $(".error").hide().fadeIn("slow");
                  setTimeout(function(){go();},1500);
               }
              else{
                 document.getElementById("error").innerHTML = "Please Select Your Area!";
                 }
          }
            
        </script>
      </body>
</html>