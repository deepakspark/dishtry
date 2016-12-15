<?php
session_start();
 if(isset($_SESSION['auth'])){
         if(!$_SESSION['auth'])
         {
             header("Location: http://".$_SERVER['HTTP_HOST']);
         }
     }
 else{
     header("Location: http://".$_SERVER['HTTP_HOST']);
 }

    if(isset($_COOKIE['n'])){
        
    }
    else{
       setcookie('n' , 1 , time()+10*365*24*60*60 , '/');
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
          
          
          <p class="heading">Restaurants</p> 
          
          <div class="container">   
              <?php     
                    $dom = simplexml_load_file('area/'.$_COOKIE['city'].'/'.$_COOKIE['area'].'.xml');
                    foreach($dom->xpath("/reses/res") as $reso)
                    {
                        echo(' 
                              <div class="row" onclick="'.$reso['id'].'()">
                                  <div class="col-xs-10">
                                    <p style="font-size:16px">'.$reso['name'].'</p>
                                  </div>
                                  <div class="col-xs-2">
                                    <img src="img/arrow.png" width="11px">
                                  </div>
                             </div>
                        ');
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
             <?php
                    $dom1 = simplexml_load_file('area/'.$_COOKIE['city'].'/'.$_COOKIE['area'].'.xml');
                    foreach($dom1->xpath("/reses/res") as $reso)
                    {
                        echo(' 
                              function '.$reso['id'].'(){
                              document.cookie = "presna='.$reso['name'].'; expires=Thu, 29 Dec 2022 12:00:00 UTC; path=/";
                              document.cookie = "presco='.$reso['id'].'; expires=Thu, 29 Dec 2022 12:00:00 UTC; path=/";
                              document.location.href = "category.php";
                                
                              }
                        ');
                    }
              ?>
            
            function go1(){
                document.location.href = "cart.php";
            }
            
            function go2(){
                document.location.href = "home.php";
            }
            
            function go3(){
                document.location.href = "account.php";
            }
            
            
            
            $("body").ready(function(){$("body").hide().fadeIn("slow");});
        </script>
      </body>
</html>