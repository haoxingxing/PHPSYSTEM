<?php
require "libraries.php";
if (empty($_SESSION["accounts"]))
{
    $_SESSION["accounts"]=new accounts();
}
echo $_SESSION["user"]->username;
if (!empty($_GET["name"]) && empty($_SESSION["user"]->username))
{
    if ($_SESSION["accounts"]->login($_GET["name"],$_GET["pwd"]))
    {
        jumpurl("./");
    }
    else
    {
        session_unset("WhyLoginFalled");
    }
}
else
{
    if (empty($_SESSION["user"]->username))
    {
        echo "Not Logged in";
    }
    else
    {
        jumpurl("./");
    }
}