<?php
session_start();
 if( isset($_SESSION['auth']) && isset($_COOKIE['n']) ){
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
                  <center><img src="img/cart.PNG" width="30px" class="active"></center>
                  </div>
                  
                  <div id="home" class="options" onclick="go2()">
                  <center><img src="img/home.PNG" width="30px"></center>
                  </div>
                  
                  <div id="account" class="options" onclick="go3()">
                  <center><img src="img/account.PNG" width="30px"></center>
                  </div>
          </div>
          
          
          <p class="heading">Cart</p> 
          
          <div class="container">
              
              <!--************************************* HEADING OF THE TABLE *************************************-->
              <div class="row"> 
              <div class="col-xs-2">
                  <p>Q</p>
                </div>
                  <div class="col-xs-8">
                      <p>Item</p>
                </div>
                  <div class="col-xs-2">
                      <p>Cost</p>
                </div>
              </div>
              <!--************************************* HEADING OF THE TABLE *************************************-->
              
              <?php
              
              for($a = 1; $a<$_COOKIE['n'] ; $a++){
                  
                  if($_COOKIE['ic'.$a] != 'none'){
                  
                          $input_id = $_COOKIE['ic'.$a].'no';
                          $dish_id = $_COOKIE['ic'.$a];
                          $dish_name = $_COOKIE['i'.$a];
                          $dish_cost = $_COOKIE['ico'.$a];
                          $dish_cost_id = $_COOKIE['ic'.$a].'co';

                      echo('
                          <div class="row" style="margin-top:10px;">
                              <div class="col-xs-1">
                                  <input type="text" id="'.$input_id.'" value="1" style="width:20px;border:0px solid transparent; border-bottom: 1px solid rgb(218,218,218);">
                              </div>
                              <div class="col-xs-9">
                                  <span id="'.$dish_id.'" style="padding:0;">'.$dish_name.'</span>
                              </div>
                              <div class="col-xs-1" style="padding:0;">
                                  <span id="'.$dish_cost_id.'" style="padding:0;">'.$dish_cost.'</span>
                              </div>
                          </div>
                      ');
                  }
              }
                ?>
          </div>
          <br>
          <div class="jumbotron">
              <div class="container">
                  
                  <div class="row">
                    <div class="col-xs-12"><input type="text" class="form-control" id="exactadd" placeholder="Your Exact Address Goes Here!"></div>  
                  </div>
                  
                  <div class="row" style="margin-top:10px;">
                    <div class="col-xs-12"><input type="text" class="form-control" id="comments" placeholder="Any other thoughts!"></div>  
                  </div>
                  
                  <div class="row" style="margin-top:10px;">
                    <div class="col-xs-3"><p>Area:</p></div>
                    <div class="col-xs-9"><p style="font-size:16px;"><?php echo($_COOKIE['area']);?></p></div>   
                  </div>
                  <div class="row">
                    <div class="col-xs-3"><p>City:</p></div>
                    <div class="col-xs-9"><p style="font-size:16px;"><?php echo($_COOKIE['city']);?></p></div>   
                  </div>
                  
              </div>
          </div>
          <p>Delivery Type: Cash On Delivery</p>
          <button class="btn btn-info" onclick="sumUp()" style="margin-bottom:10px;" value="">Show the Cost!</button>
          <div style="background-color:rgb(238,238,238);" id="">
              <p id="final_cost"></p>
              <p id="final_cost_delivery"></p> 
              <p id="final_cost_tax"></p> 
              <p id="final_cost_total"></p> 
           </div>
          <button class="btn btn-info" onclick="checkOut()" id="checkout_button" style="margin-bottom:10px;" value="">Checkout!</button>
              
          
        <!--****************************** jQuery ************************-->  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!--****************************** jQuery.cookie ************************-->  
        <script src="/jquery.cookie.js"></script> 
        <!--************* Latest compiled and minified JavaScript*********** -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--***************************** My JavaScript************************-->    
        <script>
			$('.checkout_button').fadeOut(0);
            
            function go1(){
                document.location.href = "cart.php";
            }
            
            function go2(){
                document.location.href = "home.php";
            }
            
            function go3(){
                document.location.href = "account.php";
            }
            
            
            
            
            function sumUp(){
                     
                var gt = 0; 
                    
                for( var a = 1 ; a < $.cookie("n") ; a++ ){
                    
                if($.cookie('ic'+a) != "none"){
                var dish_cost_id = $.cookie("ic"+a)+"co";
                var dish_input_id = $.cookie("ic"+a)+"no";
                if(isNaN(parseFloat(document.getElementById(dish_input_id).value)))
                { var amount = 0 * parseFloat($.cookie('ico'+a));}
                else
                {var amount = parseFloat(document.getElementById(dish_input_id).value) * parseFloat($.cookie('ico'+a));}
                gt = gt + amount;   
                }   
                    
                }
                
                document.getElementById("final_cost").innerHTML = "Cost: "+gt+" Ru";
                $('.final_cost').fadeIn("fast");
                
                document.getElementById("final_cost_delivery").innerHTML = "Delivery: "+(0.03*gt)+" Ru";
                $('.final_cost_delivery').fadeIn("fast");
                
                document.getElementById("final_cost_tax").innerHTML = "Tax: "+(0.10*gt)+" Ru";
                $('.final_cost_tax').fadeIn("fast");
                
                document.getElementById("final_cost_total").innerHTML = "Total: "+(gt + (0.10*gt) + (0.03*gt))+" Ru";
                $('.final_cost_total').fadeIn("fast");
   
               $('.checkout_button').fadeIn("slow");   
            }
            
                function checkOut(){
					sumUp();
                    // STORING EXACT ADDRESS AND COMMENTS AND SAVING THE ORDER ON DRIVE WILL BE DONE LATER. THIS IS JUST A FAKE CHECKOUT!
                    document.location.href = "checkout.php?out=done";
                }

            
            $('.final_cost').hide();
            $('.final_cost_delivery').hide();
            $('.final_cost_tax').hide();
            $('.final_cost_total').hide();
            
        </script>
      </body>
</html>
