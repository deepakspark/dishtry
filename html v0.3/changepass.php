<?php
session_start();
 if( isset($_SESSION['auth']) && isset($_GET['new']) && isset($_GET['old'])){
         if(!$_SESSION['auth'])
         {
             header("Location: http://".$_SERVER['HTTP_HOST']);
         }
     }
 else{
     header("Location: http://".$_SERVER['HTTP_HOST']);
 }
 
 $oldmask = umask(0);
 $file = fopen( 'users/'.$_COOKIE["user"].'.txt' , 'r');
 $pass_ser = fgets($file);
 fclose($file);
 $pass_ent = $_GET['old'];
 
	if($pass_ent == $pass_ser)
	{
		$new_file = fopen( 'users/'.$_COOKIE["user"].'.txt' , 'w');
		fwrite($new_file , $_GET['new']);
		fclose($new_file);
		$_SESSION['pass'] = $_GET['new'];
		setcookie('pass' , $_GET['new'] , time()+10*365*24*60*60 , '/');
		
		echo('
                <html>
                <head></head>
                <body>
                <center><h1>PASSWORD CHANGED!</h1></center>
                <script>
                 setTimeout(function(){document.location.href="check.php"},2000);
                </script>
                </body>
                </html>
            ');
            
		}
		
	else{
		echo('
                <html>
                <head></head>
                <body>
                <center><h1>WRONG PASSWORD!</h1></center>
                <script>
                 setTimeout(function(){document.location.href="changepassword.php"},2000);
                </script>
                </body>
                </html>
            ');
			
		}
?>
