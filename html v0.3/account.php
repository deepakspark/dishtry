<?php
session_start();
 if( isset($_SESSION['auth']) ){
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
                  <center><img src="img/cart.PNG" width="40px" ></center>
                  </div>
                  
                  <div id="home" class="options" onclick="go2()">
                  <center><img src="img/home.PNG" width="40px"></center>
                  </div>
                  
                  <div id="account" class="options" onclick="go3()">
                  <center><img src="img/account.PNG" width="40px" class="active"></center>
                  </div>
          </div>
          
          
          <p class="heading">Account</p> 
   
          <p><span style="text-align:left;">User:</span> <?php echo($_COOKIE['user']); ?></p>
          <p><span style="text-align:left;">City:</span> <?php echo($_COOKIE['city']); ?></p>
          <p><span style="text-align:left;">Area:</span> <?php echo($_COOKIE['area']); ?></p>
			  
			
       
          
              <div class="container"> 
				    <div class="row" onclick="changepassword()" style="border-bottom:1px solid rgb(218,218,218);margin-top:10px;border-top:1px solid rgb(218,218,218);padding-top:10px;">
                          <div class="col-xs-10">
                            <p style="font-size:20px">Change Password</p>
                          </div>
                          <div class="col-xs-2">
                            <img src="img/arrow.png" width="15px">
                          </div>
                    </div>
                    <div class="row" onclick="changeadd()" style="border-bottom:1px solid rgb(218,218,218);margin-top:10px;">
                          <div class="col-xs-10">
                            <p style="font-size:20px">Change City and Area</p>
                          </div>
                          <div class="col-xs-2">
                            <img src="img/arrow.png" width="15px">
                          </div>
                    </div>
                    <div class="row" onclick="" style="border-bottom:1px solid rgb(218,218,218);margin-top:10px;">
                          <div class="col-xs-10">
                            <p style="font-size:20px">Term and Conditions</p>
                          </div>
                          <div class="col-xs-2">
                            <img src="img/arrow.png" width="15px">
                          </div>
                     </div>
                     <div class="row" onclick="" style="border-bottom:1px solid rgb(218,218,218);margin-top:10px;">
                          <div class="col-xs-10">
                            <p style="font-size:20px">About Us</p>
                          </div>
                          <div class="col-xs-2">
                            <img src="img/arrow.png" width="15px">
                          </div>
                     </div>
                     <div class="row" onclick="signOut()" style="border-bottom:1px solid rgb(218,218,218);margin-top:10px;">
                          <div class="col-xs-10">
                            <p style="font-size:20px">Sign Out<p>
                          </div>
                          <div class="col-xs-2">
                            <img src="img/arrow.png" width="15px">
                          </div>
                     </div>
               </div>
       
          
          
          
          
          
          
          
          
        <!--****************************** jQuery ************************-->  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!--****************************** jQuery.cookie ************************-->  
        <script src="/jquery.cookie.js"></script> 
        <!--************* Latest compiled and minified JavaScript*********** -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--***************************** My JavaScript************************-->    
        <script>
            
            function go1(){
                document.location.href = "cart.php";
            }
            
            function go2(){
                document.location.href = "home.php";
            }
            
            function go3(){
                document.location.href = "account.php";
            }
            
            function signOut(){
                document.location.href = "signout.php";
            }
            
            function changepassword(){
				document.location.href = "changepassword.php";
				}
				
			function changeadd(){
				document.location.href = "changecity.php";
				}
            
            $("body").ready(function(){$("body").hide().fadeIn("slow");});
          
            
        </script>
      </body>
</html>
