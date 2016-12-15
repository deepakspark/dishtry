<?php
session_start();
    if(isset($_GET['form']))
    {   $oldmask = umask(0);
        if(!file_exists("users/".$_COOKIE["user"].".txt")){
            $user = fopen("users/".$_COOKIE["user"].".txt" , "w");
            fwrite($user , $_COOKIE["pass"] );
            fclose($user);
            $add = fopen("users/".$_COOKIE["user"].".add.txt" , "w");
            fwrite($add , $_COOKIE["city"]."|".$_COOKIE["area"]);
            fclose($add);
            $order = fopen("users/".$_COOKIE["user"].".orders.txt" , "w");
            fclose($order);
            $_SESSION["auth"] = true;
            
            $_SESSION['user'] = $_COOKIE['user'];
            $_SESSION['pass'] = $_COOKIE['pass'];
            
            $oldmask = umask(0);
            $add = fopen('users/'.$_COOKIE['user'].'.add.txt' , 'r');
            $yu = fgets($add);
            $i = strpos($yu , '|');
            $city = substr($yu , 0 , $i );
            $i++;
            $area = substr($yu , $i);
            
            $_SESSION['city'] = $city;
            $_SESSION['area'] = $area;
            setcookie('city' , $city , time()+10*365*24*60*60 , '/');
            setcookie('area' , $area , time()+10*365*24*60*60 , '/');
            
            header("Location: http://".$_SERVER['HTTP_HOST']."/load.html");
        }
        else{
            echo('
                <html>
                <head></head>
                <body>
                <center><h1>ACCOUNT ALREADY EXISTS!</h1></center>
                <script>
                 setTimeout(function(){document.location.href="create.html"},2000);
                </script>
                </body>
                </html>
            ');
        }
    }
    
    else{
        header("Location: http://".$_SERVER['HTTP_HOST']);
    }
?>