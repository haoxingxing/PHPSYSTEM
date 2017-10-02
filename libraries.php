<?php
session_name("TheStarProjectSession");
session_start();
$debug=true;
function  write ($filename,$word,$error_report="似乎有什么不对劲"){
	$WriteFile=fopen($filename,"w") or die($error_report);
	fwrite($WriteFile,$word);
	fclose($WriteFile);
	if ($GLOBALS['debug']==true)
	{	
		file_put_contents("server.log",$_SERVER['REMOTE_ADDR'].":".$_SERVER['REMOTE_PORT']."  ->  ".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."  ".$_SERVER['REQUEST_METHOD']."  ".microtime(1)."  ".$filename." << '".$word."'\r\n",FILE_APPEND);	
	}
}
function  read ($filename,$error_report="似乎有什么不对劲"){
	$WriteFile=fopen($filename,"r") or die($error_report);
	$word=fread($WriteFile,filesize($filename));
	fclose($WriteFile);
	if ($GLOBALS['debug']==true)
	{	
		file_put_contents("server.log",$_SERVER['REMOTE_ADDR'].":".$_SERVER['REMOTE_PORT']."  ->  ".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."  ".$_SERVER['REQUEST_METHOD']."  ".microtime(1)."  ".$filename." >> '".$word."'\r\n",FILE_APPEND);		
	}
	return $word;
}
function make_dir($name)
{
    mkdir($name);
}
function  jumpurl($url)
{
	if ($GLOBALS['debug']==true)
	{	
		file_put_contents("server.log",$_SERVER['REMOTE_ADDR'].":".$_SERVER['REMOTE_PORT']."  ->  ".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."  ".$_SERVER['REQUEST_METHOD']."  ".microtime(1)."  Redirect >> '".$url."'\r\n",FILE_APPEND);			
	}	
	header('location:'.$url);
	exit;
}
class user {
    var $username;
    var $password_safesave;
    var $is_admin;
    function __construct($username) {
        $this->username=$username;
        $this->password_safesave=read($this->username."/pwd");
        $this->is_admin=read($this->username."/admin");
    }
    
}
class accounts {
    function login($username,$password)
    {
        if (file_exists($username."/pwd"))
        {
            $password_safesave=read($username."/pwd");
            if (password_verify($password,$password_safesave))
            {
                $_SESSION["user"]=new user($username);
                return true;
            }
            else
            {
                $_SESSION["WhyLoginFalled"]="PWDERROR";
                echo $_SESSION['WhyLoginFalled']."<br>";
                return false;
            }
        }
        else
        {
            $_SESSION["WhyLoginFalled"]="User404";
            echo $_SESSION['WhyLoginFalled']."<br>";
            return false;
        }
    }
    function reg($username,$password)
    {
        $password_safesave=password_hash($password,PASSWORD_BCRYPT);
        if (file_exists($username."/pwd"))
        {
            $_SESSION["RegMessage"]="ERROR*UsernameExists";
            echo $_SESSION["RegMessage"];
            return false;
        }
        else
        {
            make_dir($username);
            write($username."/pwd",$password_safesave);
            write($username."/admin","false");
            $_SESSION["RegMessage"]="Success*Please Login";
            echo $_SESSION["RegMessage"];        
            return true;
        }
    }
}
$php_Self = substr($_SERVER['PHP_SELF'],strripos($_SERVER['PHP_SELF'],"/")+1);
if ($php_Self=="libraries.php")
{
    header("HTTP/1.1 403 - Forbidden");
}