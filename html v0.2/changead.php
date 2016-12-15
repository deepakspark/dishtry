<?php
session_start();
 if( isset($_SESSION['auth']) && isset($_GET['city']) && isset($_GET['area']) ){
         if(!$_SESSION['auth'])
         {
             header("Location: http://".$_SERVER['HTTP_HOST']);
         }
     }
 else{
     header("Location: http://".$_SERVER['HTTP_HOST']);
 }
    
			$add = fopen("users/".$_COOKIE["user"].".add.txt" , "w");
            fwrite($add , $_GET['city']."|".$_GET['area']);
            fclose($add);
            
            $_SESSION['city'] = $_GET['city'];
            $_SESSION['area'] = $_GET['area'];
            setcookie('city' , $_GET['city'] , time()+10*365*24*60*60 , '/');
            setcookie('area' , $_GET['area'] , time()+10*365*24*60*60 , '/');
				
			echo('
				<html>
                <head></head>
                <body>
                <center><h1>CITY AND AREA CHANGED!</h1></center>
                <script>
                 setTimeout(function(){document.location.href="check.php"},2000);
                </script>
                </body>
                </html>	
			');	
		    
?>
