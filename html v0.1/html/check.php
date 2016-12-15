<?php
session_start();
function redirect(){
    //  ********** DELETING THE USELESS COOKIES ******
    if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
        }
    }
// ********** REDIRECTING TO ACCOUNT PAGE *******
    header("Location: http://".$_SERVER['HTTP_HOST']."/acc.html");
}
//*************************************************************************
//    *************************************************************
//        ***************************************************
if(isset($_COOKIE['user']) && isset($_COOKIE['pass']))
{   $oldmask = umask(0);
    $file_name = "users/" . $_COOKIE['user'] . ".txt";
    if(file_exists($file_name))
    {
        $_file = fopen($file_name , 'r');
        $_pass = fgets($_file);
        
        if($_COOKIE['pass'] == $_pass)
        {
            $_SESSION['auth'] = true;
            
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
                                 redirect();
                                }
    }
                                else{
                                 redirect();
                                }
    
}

else{
    redirect();
}
?>