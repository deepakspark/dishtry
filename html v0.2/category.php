<?php
session_start();
 if(isset($_SESSION['auth']) && isset($_COOKIE['presna']) && isset($_COOKIE['presco'])){
         if(!$_SESSION['auth'])
         {
             header("Location: http://".$_SERVER['HTTP_HOST']);
         }
     }
 else{
     header("Location: http://".$_SERVER['HTTP_HOST']);
 }
?>
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
            
            .options{
                display: inline-block;
                width: 30%;
            }
            
            .menuBar{
                margin-top: 1%;
                border-bottom: 1px solid #d9d9d9;
            }
            
            .active{
                border-bottom: 3px solid red;
                padding-bottom:1px;
            }
            
            .heading{
                font-size: 25px;
                border-bottom: 1px solid #d0cbcb;
            }
            
            
        </style>
      </head>
    <!--****************************** BODY STARTS ****************************************-->
      <body>
       
          <div class="upperBar"></div>
          
          <div class="menuBar">
                  <div id="cart" class="options" onclick="go1()">
                  <center><img src="img/cart.PNG" width="30px" ></center>
                  </div>
                  
                  <div id="home" class="options" onclick="go2()">
                  <center><img src="img/home.PNG" width="30px" class="active"></center>
                  </div>
                  
                  <div id="account" class="options" onclick="go3()">
                  <center><img src="img/account.PNG" width="30px"></center>
                  </div>
          </div>
          
          <p class="heading"><?php echo($_COOKIE['presna']);?></p>
          
          
          <div class="container">
              <?php
                    $oldmask = umask(0);
                    $dom = simplexml_load_file('res/'.$_COOKIE['presco'].'.cat.xml');
                    foreach($dom->xpath("/cats/cat") as $catego){
                        
                        echo('<div class="row" onclick="'.$catego['srvalue'].'()">
                                  <div class="col-xs-10">
                                      <p>'.$catego['usrvalue'].'</p>
                                  </div>
                                  <div class="col-xs-2">
                                      <img src="img/arrow.png" width="11px">
                                  </div>
                              </div>');
                    }
              ?>
          </div> 
          
        <!--****************************** jQuery ************************-->  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!--****************************** jQuery.cookie ************************-->  
        <script src="/jquery.cookie.js"></script> 
        <!--************* Latest compiled and minified JavaScript*********** -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--***************************** My JavaScript************************-->    
        <script>
            
            $("body").ready(function(){$("body").hide().fadeIn("slow");});
            
          function go1(){
                document.location.href = "cart.php";
            }
            
            function go2(){
                document.location.href = "home.php";
            }
            
            function go3(){
                document.location.href = "account.php";
            }
            
            
            <?php
                    $oldmask = umask(0);
                    $dom1 = simplexml_load_file('res/'.$_COOKIE['presco'].'.cat.xml');
                    foreach($dom1->xpath("/cats/cat") as $categor){
                        echo('
                            function '.$categor['srvalue'].'(){
                            document.cookie = "pcatna='.$categor['usrvalue'].'; expires=Thu, 29 Dec 2022 12:00:00 UTC; path=/";
                            document.cookie = "pcatco='.$categor['srvalue'].'; expires=Thu, 29 Dec 2022 12:00:00 UTC; path=/";
                            document.location.href =  "dish.php";}
                        ');                     
                    }
            ?>
        </script>
      </body>
</html>