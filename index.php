<?php
if (!file_exists("USERDATA"))
{
  mkdir("USERDATA");
    mkdir("USERDATA/Blog");
    mkdir("USERDATA/N");
    mkdir("CHATDATA");
    mkdir("USERDATA/admin/");
    mkdir("CLOUD");
    mkdir("CLOUD/admin/");
    mkdir("USERDATA/SSIDFALL/");
    mkdir("USERDATA/DELETE/");
    mkdir("USERDATA/SSIDFALLED/");
    mkdir("USERDATA/ssid");
    $cnd= fopen("USERDATA/Blog/blog.config","w");
    fwrite($cnd,"1");
    fclose($cnd);
    $cnd1= fopen("USERDATA/Blog/1.blogdata","w");
    fwrite($cnd1,'CLICK "Write Blog" to Write your first blog');
    fclose($cnd1);
    $cnd2= fopen("USERDATA/Blog/1.username","w");
    fwrite($cnd2,'admin');
    fclose($cnd2);
    $cnd5= fopen("USERDATA/admin/password.json","w");
    fwrite($cnd5,'21232f297a57a5a743894a0e4a801fc3');
    fclose($cnd5);
    $cnd6= fopen("USERDATA/admin/admin","w");
    fwrite($cnd6,'yes');
    fclose($cnd6);
    $cnd7= fopen("USERDATA/N/n.config","w");
    fwrite($cnd7,'1');
    fclose($cnd7);
    $cnd8= fopen("USERDATA/N/1.config","w");
    fwrite($cnd8,'admin');
    fclose($cnd8);
    $cnd9= fopen("USERDATA/deputy.admin","w");
    fwrite($cnd9,'admin');
    fclose($cnd9);
    $cnd10= fopen("USERDATA/DELETE/admin","w");
    fwrite($cnd10,'no');
    fclose($cnd10);
    $cnd11= fopen("USERDATA/Blog/0.t","w");
    fwrite($cnd11,'help');
    fclose($cnd11);
    $cnd12= fopen("USERDATA/SSIDFALLED/password.json","w");
    fwrite($cnd12,'userlockedbyadmin');
    fclose($cnd12);
    $cnd12= fopen("USERDATA/SSIDFALLED/admin","w");
    fwrite($cnd12,'no');
    fclose($cnd12);
    $cnd13= fopen("USERDATA/DELETE/password.json","w");
    fwrite($cnd13,'userlockedbyadmin');
    fclose($cnd13);
    $cnd14= fopen("USERDATA/DELETE/userlock","w");
    fwrite($cnd14,'USERLOCKED');
    fclose($cnd14);
    $cnd15= fopen("USERDATA/SSIDFALL/userlock","w");
    fwrite($cnd15,'USERLOCKED');
    fclose($cnd15);
    $cnd16= fopen("USERDATA/Blog/1.l","w");
    fwrite($cnd16,'UNLOCK');
    fclose($cnd16);
    $cnd17= fopen("USERDATA/admin/ssid","w");
    fwrite($cnd17,'ssid');
    fclose($cnd17);
    $cnd18= fopen("USERDATA/ssid/ssid","w");
    fwrite($cnd18,'admin');
    fclose($cnd18);
    $cnd19= fopen("USERDATA/Blog/1.t","w");
    fwrite($cnd19,'帮助');
    fclose($cnd19);
    $cnd20= fopen("USERDATA/Blog/1.cn","w");
    fwrite($cnd20,'0');
    fclose($cnd20);
    $cnd21= fopen("CHATDATA/chat.","w");
    fwrite($cnd21,'0');
    fclose($cnd21);
    echo "安装成功，请刷新页面.";
    header('location:/');
    exit;
}
if ($_GET["mode"]!="chat/data"&&$_GET["mode"]!='cloud/download'&&$_GET["mode"]!='cloud/share')
{
  echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
      	<body style="background-image: url(starsky.jpg);">
';
 
  echo '<div id="13" align=center style="font-size:150%;font-family: 標楷體,DFKai-sb,BiauKai,'."AR PL".' UKai TW'.";".'"><style> a{ text-decoration:none} </style> ';
  echo '<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
        <link href="//cdn.bootcss.com/Buttons/2.0.0/css/buttons.css" rel="stylesheet">';
  echo '<link href="//cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">';
  echo '<link href="//cdn.bootcss.com/bootstrap/4.0.0-alpha.6/css/bootstrap.css" rel="stylesheet">
        <script src="//cdn.bootcss.com/bootstrap/4.0.0-alpha.6/js/bootstrap.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" media="screen" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
        body {color:rgb(30,144,255)}
        </style>';
}
  function make_password($length) 
{
	$chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 
	'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's', 
	't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D', 
	'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O', 
	'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z', 
	'0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
	$keys = array_rand($chars, $length); 
	$password1 = '';
	for($i = 0; $i < $length; $i++) 
	{
		$password1 .= $chars[$keys[$i]];
	}
	return $password1;
}
  function shorturl($url,$long)
  {
    $shortedurl=make_password($long);
    while (file_exists("USERDATA/".$shortedurl))
    {
      $shortedurl=make_password($long);
    }
    $writeurl = fopen("USERDATA/".$shortedurl, "w");
	  fwrite($writeurl,$url);
	  fclose($writeurl);
    if(file_exists("USERDATA/shorturl.config"))
    {
      $gn=fopen("USERDATA/shorturl.config","r") or die("短链接不存在");
      $n=fread($gn,filesize("USERDATA/shorturl.config"));
      $writeurl1 = fopen("USERDATA/shorturl.config", "w");
	    fwrite($writeurl1,$n+1);
	    fclose($writeurl1);
    }
    else
    {
      $writeurl1 = fopen("USERDATA/shorturl.config", "w");
	    fwrite($writeurl1,"1");
	    fclose($writeurl1);
      $n=0; 
    }
    $n1=$n+1;
    $writeurl = fopen("USERDATA/shorturl.".$n1, "w");
	  fwrite($writeurl,$shortedurl);
	  fclose($writeurl);
    return $shortedurl;
  }
  function do_post_request($url, $data, $optional_headers = null)
  {
     $params = array('http' => array(
                  'method' => 'POST',
                  'content' => $data
               ));
     if ($optional_headers !== null) {
        $params['http']['header'] = $optional_headers;
     }
     $ctx = stream_context_create($params);
     $fp = @fopen($url, 'rb', false, $ctx);
     if (!$fp) {
        throw new Exception("Problem with $url, $php_errormsg");
     }
     $response = @stream_get_contents($fp);
     if ($response === false) {
        throw new Exception("Problem reading data from $url, $php_errormsg");
     }
     return $response;
  }

if ($_GET["mode"]=="reg")
{
  echo "<title>注册</title>";
  echo '<form action="/?mode=regreport" method="post">
				<span class="input input--juro">
        <span class="input__label-content input__label-content--juro">用户名</span>
				<input class="button button-glow button-border button-rounded button-primary" type="text" name="name" id="input-28" /><br>
        <span class="input__label-content input__label-content--juro">-密码-</span>			
				<input class="button button-glow button-border button-rounded button-primary"  type="password" name="password" id="input-29" /><br>
        <button class="button button-pill button-primary">注册！</button>';
  echo "<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>";
}
if ($_GET["mode"]=="regreport")
{
  if (file_exists ("USERDATA/".$_POST["name"]."/")) 
  {
	  echo "用户名不可用";
	  echo '<meta http-equiv="refresh" content="1; URL=/?mode=reg"> ';
  }
  else
  {
  	mkdir("CLOUD/".$_POST["name"]."/");
    mkdir("USERDATA/".$_POST["name"]."/");
	  $myfile = fopen("USERDATA/".$_POST["name"]."/password.json", "w") or die("<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
	  fwrite($myfile,md5($_POST["password"]));
	  fclose($myfile);
	  $myfile1 = fopen("USERDATA/".$_POST["name"]."/ssid", "w") or die("<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
	  fwrite($myfile1,make_password(12));
	  fclose($myfile1);
	  $myfile4 = fopen("USERDATA/".$_POST["name"]."/ssid", "r") or die('<br>1<a class="button button-glow button-border button-rounded button-primary" href='/'>主页<a>');
	  $ssid1=fread($myfile4,filesize("USERDATA/".$_POST["name"]."/ssid"));
	  $myfile3 = fopen("USERDATA/ssid/".$ssid1, "w") or die("<br>d<a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
	  fwrite($myfile3,$_POST["name"]);
	  fclose($myfile3);
	  $myfile5 = fopen("USERDATA/".$_POST["name"]."/userlock", "w") or die("<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
	  fwrite($myfile5,"USERUNLOCK");
	  fclose($myfile5);
	  $myfile6 = fopen("USERDATA/".$_POST["name"]."/admin", "w") or die("<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
	  fwrite($myfile6,"no");
	  fclose($myfile6);
	  $c1 = fopen("USERDATA/N/n.config", "r") or die("<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
	  $id=fread($c1,filesize("USERDATA/N/n.config"));
	  fclose($c1);
	  $id1=$id+1;
	  $myfile67 = fopen("USERDATA/N/".$id1.".config", "w") or die("<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
	  fwrite($myfile67,$_POST["name"]);
	  fclose($myfile67);
	  $myfile7 = fopen("USERDATA/N/n.config", "w") or die("<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
	  fwrite($myfile7,$id1);
	  fclose($myfile7);
    header('location:/?mode=logged&ssid='.$ssid1);
    exit;
  }
}
if ($_GET["mode"]=="login")
{
  echo "<title>登录</title>";
  echo '<form action="/?mode=loginreport" method="post">
        用户名: <input class="button button-glow button-border button-rounded button-primary" type="text" name="name"><br>
        -密码-: <input class="button button-glow button-border button-rounded button-primary" type="password" name="password"><br>
        <button class="button button-pill button-primary">登录</button>';
  echo "<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>";
}
if ($_GET["mode"]=="loginreport")
{
  if (file_exists("USERDATA/".$_POST["name"]."/"))
  {
    $myfile = fopen("USERDATA/".$_POST["name"]."/password.json", "r") or die('找不到用户<a class="button button-glow button-border button-rounded button-primary" href="/?mode=reg">注册</a><br><a class="button button-glow button-border button-rounded button-primary" href='/'>主页<a>');
    $password=fread($myfile,filesize("USERDATA/".$_POST["name"]."/password.json"));
    fclose($myfile);
    if ($password==md5($_POST["password"])) 
    {
  	  $getssid = fopen("USERDATA/".$_POST["name"]."/ssid", "r") or die("ERROR3");
      $ssid1=fread($getssid,filesize("USERDATA/".$_POST["name"]."/ssid"));
  	  $myfile13 = fopen("USERDATA/ssid/".$ssid1, "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
	    fwrite($myfile13,"ssidfalled");
	    fclose($myfile13);
	    $myfile1 = fopen("USERDATA/".$_POST["name"]."/ssid", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
	    fwrite($myfile1,make_password(12));
  	  fclose($myfile1);
  	  $myfile3 = fopen("USERDATA/".$_POST["name"]."/ssid", "r") or die('');
	    $ssid1=fread($myfile3,filesize("USERDATA/".$_POST["name"]."/ssid"));
  	  $myfile4 = fopen("USERDATA/ssid/".$ssid1, "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
	    fwrite($myfile4,$_POST["name"]);
	    fclose($myfile4);
	    $myfile5 = fopen("USERDATA/".$_POST["name"]."/userlock", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
	    fwrite($myfile5,"USERUNLOCK");
	    fclose($myfile5);
	    header('location:/?mode=logged&ssid='.$ssid1);
	    exit; 
    }
    else
    {
      echo '密码错误<meta http-equiv="refresh" content="1; URL=/?mode=login">';
    }
  }
  else
  {
      echo '用户不存在<meta http-equiv="refresh" content="1; URL=/?mode=login">';
  }
}
$getname=fopen("USERDATA/ssid/".$_GET["ssid"],"r");
$username=fread($getname,filesize("USERDATA/ssid/".$_GET["ssid"]));
fclose($getname);
if ($_GET["mode"]=="")
{ 
  if ($_GET["ssid"]=="")
  {
	  header('location:/?mode=LoginOrReg');
	  exit;     
  }
  else
  {
      header('location:/?mode=logged&ssid='.$_GET["ssid"]);
  }    
} 
if ($_GET["ssid"]!=""&&$username!="ssidfalled")
{
  $ssid1=$_GET["ssid"];
  $getname=fopen("USERDATA/ssid/".$_GET["ssid"],"r") or die ("找不到用户{非法访问}<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
  $username=fread($getname,filesize("USERDATA/ssid/".$_GET["ssid"]));
  fclose($getname);
  $getadmin = fopen("USERDATA/".$username."/admin", "r") or die("ERROR4<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
  $admin=fread($getadmin,filesize("USERDATA/".$username."/admin"));
  fclose($getadmin);
  if ($_GET["mode"]=="logged")
  {
    if ($username!="falled"&&$username!="")
    {
      echo "<title>欢迎回来，".$username."</title>";
      echo "欢迎 ";
      if ($admin=="yes")
      {
        echo "管理员--".$username;
      }
      else
      {
        echo "用户--".$username;
      }
      echo "<br>";
      $getbid = fopen("USERDATA/Blog/blog.config", "r") or die("ERRORr3<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
      $bid=fread($getbid,filesize("USERDATA/Blog/blog.config"));
      $id="0";
      while($bid>"0")
      {
        $f = fopen("USERDATA/Blog/".$bid.".username", "r") or die("Unable to open filge!<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
        $fusername=fread($f,filesize("USERDATA/Blog/".$bid.".username"));
        fclose($f);
        $t = fopen("USERDATA/Blog/".$bid.".t", "r") or die("Unable to open fil8e!<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
        $tname=fread($t,filesize("USERDATA/Blog/".$bid.".t"));
        fclose($t);
        if ($tname!="DELETE")
        {
          $gbl = fopen("USERDATA/Blog/".$bid.".l", "r") or die("Unable to open fil8e!<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
          $bl=fread($gbl,filesize("USERDATA/Blog/".$bid.".l"));
          fclose($gbl);
          if ($bl=="UNLOCK")
          {   
            $n = fopen("USERDATA/Blog/".$bid.".blogdata", "r") or die("Unable to open fil8e!<br><a class='button button-glow button-border button-rounded button-primary' href='/'>主页<a>");
            $tn=fread($n,filesize("USERDATA/Blog/".$bid.".blogdata"));
            fclose($n);
            echo "-------------<br><a class='button button-glow button-border button-rounded button-primary' href='/?mode=blogpage&id=".$bid."&ssid=".$ssid1."'><big>".$tname."</big><br>----<br></a><br>".chunk_split($tn,100)."<br>-------------<br>   by-".$fusername."<br><br>";
            $bid=$bid-1;
            $id=$id+1;
          }
          else
          {
            $bid=$bid-1;
          }
        }
        else
        {
          $bid=$bid-1;
        }
      }
      if ($id==0)
      {
        echo "===========<br>没有文章可以展示<br>===========<br>";
      }
    echo "-你可以-<br>";
    if ($admin=="yes")
    {
      echo "<a class='button button-glow button-border button-rounded button-primary'  href=/?mode=admin/center&ssid=".$ssid1.">管理员-控制中心</a><br><br>";
      echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href=/?mode=cloud&ssid=".$ssid1.">管理员-云盘</a><br><br>";
    }
    echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href=/?mode=shorturl&ssid=".$ssid1.">短链接</a><br><br>";
    echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href=/?mode=chat&ssid=".$ssid1.">聊天室</a><br><br>";
    echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href=/?mode=user/blogcenter&ssid=".$ssid1.">博客系统</a><br><br>";
    echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href=/?mode=logout&ssid=".$ssid1.">登出</a><br><br>";
    }
  }
  if ($_GET["mode"]=="user/blogcenter")
  {
    echo "<title>博客系统</title>";
    echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."&mode=write/blog'>写博客</a><br>";
    echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."&mode=user/blogcontrol'>博客管理</a><br>";
    echo "-------------<br>";
    $getbid = fopen("USERDATA/Blog/blog.config", "r") or die("ERRORr3<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页<a>");
    $bid=fread($getbid,filesize("USERDATA/Blog/blog.config"));
    $id="0";
    while($bid>"0")
    {
      $f = fopen("USERDATA/Blog/".$bid.".username", "r") or die("Unable to open filge!<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页<a>");
      $fusername=fread($f,filesize("USERDATA/Blog/".$bid.".username"));
      fclose($f);
      $t = fopen("USERDATA/Blog/".$bid.".t", "r") or die("Unable to open fil8e!<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页<a>");
      $tname=fread($t,filesize("USERDATA/Blog/".$bid.".t"));
      fclose($t);
      if ($tname!="DELETE")
      {
        $gbl = fopen("USERDATA/Blog/".$bid.".l", "r") or die("Unable to open fil8e!<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页<a>");
        $bl=fread($gbl,filesize("USERDATA/Blog/".$bid.".l"));
        fclose($gbl);
        if ($fusername==$username)
        {   
          $n = fopen("USERDATA/Blog/".$bid.".blogdata", "r") or die("Unable to open fil8e! <br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页<a>");
          $tn=fread($n,filesize("USERDATA/Blog/".$bid.".blogdata"));
          fclose($n);
          echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?mode=blogpage&id=".$bid."&ssid=".$ssid1."'><big>".$tname."</big></a><br>".chunk_split($tn,60)."<br>   by-".$fusername."<br>";
          echo "-------------<br>";
          $bid=$bid-1;
          $id=$id+1;
        }
        else
        {
          $bid=$bid+1;
        }
      }
      else
      {
        $bid=$bid-1;
      }
    }
    if ($id==0)
    {
      echo "这里没有任何可显示文章<br>-------------";
    }
  echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>";
  }
  if ($_GET["mode"]=="write/blog")
  {
    echo "<title>写博客</title>";
        echo 
        '
        标题<br />
        <form action="/?ssid='.$ssid1.'&mode=report/blog" method="post">
        <input class="button button-glow button-border button-rounded button-primary" type="text" name="t"><br>内容<br>
        <textarea class="button button-glow button-border button-rounded button-primary" name="BLOG" rows="3000" cols="80"></textarea><br>
        <input class="button button-glow button-border button-rounded button-primary" type="submit"><br><br>
        <br><a class="button button-glow button-border button-rounded button-primary" href="/?ssid='.$ssid1.'">主页</a>';
  }
  if ($_GET["mode"]=="report/blog")
  {
    $c1 = fopen("USERDATA/Blog/blog.config", "r") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
    $id=fread($c1,filesize("USERDATA/Blog/blog.config"));
    fclose($c1);
    $id1=$id+1;
    $c = fopen("USERDATA/Blog/".$id1.".blogdata", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
    fwrite($c,$_POST["BLOG"]);
    fclose($c);
    $a = fopen("USERDATA/Blog/blog.config", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
    fwrite($a,$id1);
    fclose($a);
    $f = fopen("USERDATA/Blog/".$id1.".username", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
    fwrite($f,$username);
    fclose($f);
    $t = fopen("USERDATA/Blog/".$id1.".t", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
    fwrite($t,$_POST["t"]);
    fclose($t);
    $l = fopen("USERDATA/Blog/".$id1.".l", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
    fwrite($l,"UNLOCK");
    fclose($l);
    $c1 = fopen("USERDATA/Blog/".$id1.".cn", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
    fwrite($c1,"0");
    fclose($c1);
    echo "Writing Complete";
    header('location:/?mode=user/blogcenter&ssid='.$ssid1);
    exit;
  }
  if ($_GET["mode"]=="blogpage")
  {
    $getbloglock = fopen("USERDATA/Blog/".$_GET["id"].".l", "r") or die("Error<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>");
    $bloglock=fread($getbloglock,filesize("USERDATA/Blog/".$_GET["id"].".l"));
    if ($bloglock=="UNLOCK")
    {
      $gt = fopen("USERDATA/Blog/".$_GET["id"].".t", "r") or die("Blog does not exist");
      $t=fread($gt,filesize("USERDATA/Blog/".$_GET["id"].".t"));
      $gb = fopen("USERDATA/Blog/".$_GET["id"].".blogdata", "r") or die("Blog does not exist");
      $b=fread($gb,filesize("USERDATA/Blog/".$_GET["id"].".blogdata"));
      $ga = fopen("USERDATA/Blog/".$_GET["id"].".username", "r") or die("Blog does not exist");
      $a=fread($ga,filesize("USERDATA/Blog/".$_GET["id"].".username"));
      echo "<title>文章-".$t."</title>";
      echo "<big>".$t."</big><br>".chunk_split($b,50)."<br>作者-".$a."<br><br>";
      if ($a==$username)
      {
        echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?mode=user/modifyblog&ssid=".$ssid1."&id=".$_GET["id"]."&lock=1&h=blogpage'>锁定这篇文章</a><br><br>";
      }
      else
      {
        if ($admin=="yes")
        {
          echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?mode=user/modifyblog&ssid=".$ssid1."&id=".$_GET["id"]."&lock=3&h=blogpage'>管理员权限锁定这篇文章</a><br><br>";
        }
      }
      echo "评论:<br><br>";
      $gcid = fopen("USERDATA/Blog/".$_GET["id"].".cn", "r") or die("Blog does not exist");
      $cid=fread($gcid,filesize("USERDATA/Blog/".$_GET["id"].".cn"));
      if ($cid!="0")
      {   
        while($cid>0)
        {
          $gcd = fopen("USERDATA/Blog/".$_GET["id"].".cnd".$cid, "r") or die("cd does not exist");
          $cd=fread($gcd,filesize("USERDATA/Blog/".$_GET["id"].".cnd".$cid));
          $gcu = fopen("USERDATA/Blog/".$_GET["id"].".cnu".$cid, "r") or die("cu does not exist");
          $cu=fread($gcu,filesize("USERDATA/Blog/".$_GET["id"].".cnu".$cid));
          echo "---------<br>".$cd."<br>---------<br>by-".$cu."<br><br>";
          $cid=$cid-1;
        }
      }
      else
      {
        echo "没有任何评论<br><br>";
      }
      echo 
      '
        你的评论 <br />
        <form action="/?mode=blog/commentreport&ssid='.$ssid1.'&id='.$_GET["id"].'" method="post">
        <textarea class="button button-glow button-border button-rounded button-primary" name="comment" rows="5" cols="15"></textarea><br>
        <input class="button button-glow button-border button-rounded button-primary" type="submit">';
      echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>";
    }
    else
    {
      if ($admin!="yes")
      {   
        if ($bloglock!="ADMINLOCK")
        {
          $ga = fopen("USERDATA/Blog/".$_GET["id"].".username", "r") or die("Blog does not exist");
          $a=fread($ga,filesize("USERDATA/Blog/".$_GET["id"].".username"));
          if ($username!=$a)
          {
            echo "<title>错误</title>";
            echo "被锁定或删除";
            echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>";
          }
          else
          {
            echo "<title>文章-".$t."-已锁定</title>";
            $gt = fopen("USERDATA/Blog/".$_GET["id"].".t", "r") or die("Blog does not exist");
            $t=fread($gt,filesize("USERDATA/Blog/".$_GET["id"].".t"));
            $gb = fopen("USERDATA/Blog/".$_GET["id"].".blogdata", "r") or die("Blog does not exist");
            $b=fread($gb,filesize("USERDATA/Blog/".$_GET["id"].".blogdata"));
            $ga = fopen("USERDATA/Blog/".$_GET["id"].".username", "r") or die("Blog does not exist");
            $a=fread($ga,filesize("USERDATA/Blog/".$_GET["id"].".username"));
            echo "<big>".$t."</big><br>".$b."<br>    作者-".$a."<br><br>";
            echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?mode=user/modifyblog&ssid=".$ssid1."&id=".$_GET["id"]."&lock=0&h=blogpage'>解锁</a><br>";
            echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>";
          }
        }
        else
        { 
          $ga = fopen("USERDATA/Blog/".$_GET["id"].".username", "r") or die("Blog does not exist");
          $a=fread($ga,filesize("USERDATA/Blog/".$_GET["id"].".username"));
          if ($username!=$a)
          {
            echo "<title>错误</title>";  
            echo "被锁定或删除";
            echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>";
          }
          else
          {
            echo "<title>错误</title>";  
            echo "这篇文章被管理员锁定";
            echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>";
          }
        }
      }
      else
      {
        echo "<title>文章-".$t."-已锁定</title>";
        $gt = fopen("USERDATA/Blog/".$_GET["id"].".t", "r") or die("Blog does not exist");
        $t=fread($gt,filesize("USERDATA/Blog/".$_GET["id"].".t"));
        $gb = fopen("USERDATA/Blog/".$_GET["id"].".blogdata", "r") or die("Blog does not exist");
        $b=fread($gb,filesize("USERDATA/Blog/".$_GET["id"].".blogdata"));
        $ga = fopen("USERDATA/Blog/".$_GET["id"].".username", "r") or die("Blog does not exist");
        $a=fread($ga,filesize("USERDATA/Blog/".$_GET["id"].".username"));
        echo "<big>".$t."</big><br>".$b."<br>    作者-".$a."<br><br>";
        echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?mode=user/modifyblog&ssid=".$ssid1."&id=".$_GET["id"]."&lock=0&h=blogpage'>解锁</a><br>";
        echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>";
      }
    }
  } 
  if ($_GET["mode"]=="blog/commentreport")
  {
    $gcid = fopen("USERDATA/Blog/".$_GET["id"].".cn", "r") or die("Blog does not exist");
    $cid=fread($gcid,filesize("USERDATA/Blog/".$_GET["id"].".cn"));
    $wcn = fopen("USERDATA/Blog/".$_GET["id"].".cn", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
    fwrite($wcn,$cid+1);
    fclose($wcn);
    $cid=$cid+1;
    $wcnn = fopen("USERDATA/Blog/".$_GET["id"].".cnd".$cid, "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
    fwrite($wcnn,$_POST["comment"]);
    fclose($wcnn);
    $wcnu = fopen("USERDATA/Blog/".$_GET["id"].".cnu".$cid, "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
    fwrite($wcnu,$username);
    fclose($wcnu);
    header('location:/?mode=blogpage&ssid='.$ssid1.'&id='.$_GET["id"]);
    exit;
  }
  if ($_GET["mode"]=="user/modifyblog")
  {
    $getbloglock = fopen("USERDATA/Blog/".$_GET["id"].".l", "r") or die("Error<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>");
    $bloglock=fread($getbloglock,filesize("USERDATA/Blog/".$_GET["id"].".l"));
    $getbloguser = fopen("USERDATA/Blog/".$_GET["id"].".username", "r") or die("Can't find the blog");
    $bloguser=fread($getbloguser,filesize("USERDATA/Blog/".$_GET["id"].".username"));
    if ($username==$bloguser||$admin=="yes")
    {
      if ($_GET["lock"]=="3"&&$admin="yes")
      {
        $u1 = fopen("USERDATA/Blog/".$_GET["id"].".l", "w") or die("Unable to open file!");
        fwrite($u1,"ADMINLOCK");
        fclose($u1);
        header('location:/?mode=blogpage&id='.$_GET["id"].'&ssid='.$_GET["ssid"]);
        exit; 
      }
      if ($_GET["delete"]=="0")
      {
        $gt = fopen("USERDATA/Blog/".$_GET["id"].".t", "r") or die("Blog does not exist");
        $t=fread($gt,filesize("USERDATA/Blog/".$_GET["id"].".t"));
        $gb = fopen("USERDATA/Blog/".$_GET["id"].".blogdata", "r") or die("Blog does not exist");
        $b=fread($gb,filesize("USERDATA/Blog/".$_GET["id"].".blogdata"));
        echo "<title>修改文章</title>";  
        echo 
        '
        修改你的文章<br />
        <form action="/?mode=user/blogmodifyreport&ssid='.$ssid1.'&id='.$_GET["id"].'" method="post">
        <textarea class="button button-glow button-border button-rounded button-primary" type="text" name="t">'.$t.'</textarea><br>
        <textarea name="BLOG" rows="20" cols="50">'.$b.'</textarea><br>
        <input class="button button-glow button-border button-rounded button-primary" type="submit">
        ';
        echo "<br><br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>";
      }
      if ($_GET["delete"]=="1")
      {
        $getbloguser = fopen("USERDATA/Blog/".$_GET["id"].".username", "r") or die("Can't find the blog");
        $bloguser=fread($getbloguser,filesize("USERDATA/Blog/".$_GET["id"].".username"));
        if ($username==$bloguser||$admin=="yes")
        {
            $t = fopen("USERDATA/Blog/".$_GET["id"].".t", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
            fwrite($t,"DELETE");
            fclose($t);
            $c = fopen("USERDATA/Blog/".$_GET["id"].".blogdata", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
            fwrite($c,"DELETE");
            fclose($c);
            $u = fopen("USERDATA/Blog/".$_GET["id"].".username", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
            fwrite($u,"DELETE");
            fclose($u);
            $lock = fopen("USERDATA/Blog/".$_GET["id"].".l", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
            fwrite($lock,"LOCKED");
            fclose($lock);
            echo "ok";
            header('location:/?mode=user/blogcontrol&ssid='.$ssid1);
            exit;
        }
      }
      if ($_GET["lock"]=="1")
      {
        if ($bloglock=="UNLOCK")
        {
          $u1 = fopen("USERDATA/Blog/".$_GET["id"].".l", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
          fwrite($u1,"LOCKED");
          fclose($u1);
          header('location:/?mode='.$_GET["h"].'&ssid='.$ssid1."&id=".$_GET["id"]);
          exit;
        }
        else
        {
          if ($bloglock=="LOCKED")
          {
            header('location:/?mode='.$_GET["h"].'&ssid='.$ssid1."&id=".$_GET["id"]);
            exit;
          }
          else
          {
            if ($admin=="yes")
            {
              echo "通过后台管理!";
            }
          }
        }
      }
      if ($_GET["lock"]=="0")
      {
        if ($bloglock=="LOCKED")
        { 
          $u1 = fopen("USERDATA/Blog/".$_GET["id"].".l", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
          fwrite($u1,"UNLOCK");
          fclose($u1);
          header('location:/?mode='.$_GET["h"].'&ssid='.$ssid1."&id=".$_GET["id"]);
          exit;
        }
        else
        {
          if ($admin=="yes")
          {
            $u1 = fopen("USERDATA/Blog/".$_GET["id"].".l", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
            fwrite($u1,"UNLOCK");
            fclose($u1);
            header('location:/?mode='.$_GET["h"].'&ssid='.$ssid1."&id=".$_GET["id"]);
            exit;
          }
          else
          {
            echo "能来到这里，说明你想。。。呵呵(录入统计)";
          }
        }
      }
    }
    else
    {
    echo "<title>警告</title>";
    echo "你只可以修改自己的文章,".$username."!";
    echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>";
    }
  }
  if ($_GET["mode"]=="user/blogcontrol")
  {
    echo "<title>博客管理</title>";
    $id="1";
    $getbid = fopen("USERDATA/Blog/blog.config", "r") or die("Error<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>");
    $bid=fread($getbid,filesize("USERDATA/Blog/blog.config"));
    while($bid>"0")
    {
      $f = fopen("USERDATA/Blog/".$bid.".username", "r") or die("Error<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>");
      $fusername=fread($f,filesize("USERDATA/Blog/".$bid.".username"));
      fclose($f);
      if ($fusername==$username)
      {
        $t = fopen("USERDATA/Blog/".$bid.".t", "r") or die("Unable to open fil8e!");
        $tname=fread($t,filesize("USERDATA/Blog/".$bid.".t"));
        fclose($t);
        echo $tname."----><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?mode=user/modifyblog&ssid=".$ssid1."&id=".$bid."&delete=0'>修改</a>--<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?mode=user/modifyblog&ssid=".$ssid1."&id=".$bid."&delete=1'>删除</a>";
        $getlock = fopen("USERDATA/Blog/".$bid.".l", "r") or die("Error<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>");
        $lock=fread($getlock,filesize("USERDATA/Blog/".$bid.".l"));
        if ($lock=="UNLOCK")
        {
          echo "--<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?mode=user/modifyblog&ssid=".$ssid1."&id=".$bid."&lock=1&h=user/blogcontrol'>锁定</a><br>";
        }
        else
        {
          echo "--<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?mode=user/modifyblog&ssid=".$ssid1."&id=".$bid."&lock=0&h=user/blogcontrol'>解锁</a><br>";
        }
        $bid=$bid-1;
        $id=$id+1;
      }
      else
      {
        $bid=$bid-1;
      }
    }
    if ($id=="1")
    {
      echo "你没有文章";
    }
    echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>";
  }
  if ($_GET["mode"]=="user/blogmodifyreport")
  {
    $getbloguser = fopen("USERDATA/Blog/".$_GET["id"].".username", "r") or die("Can't find the blog");
    $bloguser=fread($getbloguser,filesize("USERDATA/Blog/".$_GET["id"].".username"));
    if ($username==$bloguser)
    {
      $t = fopen("USERDATA/Blog/".$_GET["id"].".t", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
      fwrite($t,$_POST["t"]);
      fclose($t);
      $c = fopen("USERDATA/Blog/".$_GET["id"].".blogdata", "w") or die("Error<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$ssid1."'>主页</a>");
      fwrite($c,$_POST["BLOG"]);
      fclose($c);
      echo "ok";
      header('location:/?mode=user/blogcontrol&ssid='.$ssid1);
      exit;
    }
    else
    {
      echo "<title>警告</title>";
      echo "你只可以修改你自己的文章,".$username."!";
      echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>";
    }
  }
  if ($_GET["mode"]=="chat")
  {
    if ($_GET["channel"]!="")
    {
      $roomid="=+>频道名称:".$_GET["channel"]."<+=";
    }
    else
    {
      $roomid="";
    }
    echo "<title>聊天室".$roomid."</title>";
    echo '
<script type="text/javascript">
$(function()
{
$("#btn").bind("click",{btn:$("#btn")},function(evdata)
{   
  $.ajax({   
          type:"POST",   
          dataType:"json",   
          url:"./?mode=chat/data&ssid='.$_GET["ssid"].'",   
          timeout:10000,     //ajax请求超时时间10秒   
          data:{time:"3",channel:"'.$_GET["channel"].'"},
          success:function(data,textStatus){
            console.log(evdata);
            if(data.success=="1"){     
              document.getElementById("msg").innerHTML=data.text;
              evdata.data.btn.click();
            }     
            if(data.success=="0"){     
              $("#msg").append("");     
              evdata.data.btn.click();
            }
          },
          error:function(XMLHttpRequest,textStatus,errorThrown){
          console.log(textStatus);
          if(textStatus=="parsererror"){
          document.getElementById("msg").innerHTML="超时";
          evdata.data.btn.click();
          }
          }
          });
          });
          });
        </script>
        <script type="text/javascript">
 function SetCwinHeight(){
  var iframeid=document.getElementById("sendchat","ping"); //iframe id
  if (document.getElementById){
   if (iframeid && !window.opera){
    if (iframeid.contentDocument && iframeid.contentDocument.body.offsetHeight){
     iframeid.height = iframeid.contentDocument.body.offsetHeight;
    }else if(iframeid.Document && iframeid.Document.body.scrollHeight){
     iframeid.height = iframeid.Document.body.scrollHeight;
    }
   }
  }
 }
</script>
';
    echo $roomid."<br>";
        echo '<div id="msg"><input class="button button-glow button-border button-rounded button-primary" id="btn" type="button" value="显示消息" /></div><br>
        <IFRAME SRC="/?mode=chat/send&ssid='.$ssid1.'&channel='.$_GET["channel"].'" width="300" height="120" frameborder="no" border="0" MARGINWIDTH="0" MARGINHEIGHT="0" SCROLLING="no"></IFRAME><br>';
        echo '<br><IFRAME SRC="/?mode=chat/clear&ssid='.$ssid1.'&channel='.$_GET["channel"].'" width="200" height="80" frameborder="no" border="0" MARGINWIDTH="0" MARGINHEIGHT="0" SCROLLING="no"></IFRAME><br>--------------------<br><IFRAME SRC="/?mode=chat/sendpicture&ssid='.$ssid1.'&channel='.$_GET["channel"].'" width="200" height="100" frameborder="no" border="0" MARGINWIDTH="0" MARGINHEIGHT="0" SCROLLING="no"></IFRAME><br>--------------------';
        echo '<br><a class="button button-glow button-border button-rounded button-primary" href="/?mode=chat/createchannel&ssid='.$ssid1.'">创建频道</a><br><a class="button button-glow button-border button-rounded button-primary" href="/?mode=chat/intochannel&ssid='.$ssid1.'">进入频道</a><br>--------------------<br>'; 
        echo '<br><IFRAME SRC="/?mode=ping&ssid='.$ssid1.'" width="200" height="50" frameborder="no" border="0" MARGINWIDTH="0" MARGINHEIGHT="0" SCROLLING="no"></IFRAME>';
        echo "<br><a class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>";
  }
  if ($_GET["mode"]=="chat/data")
  {
    if(empty($_POST['time'])) exit();     
    set_time_limit(0);//无限请求超时时间     
    $i=0;     
    $getnum = fopen("CHATDATA/chat.".$_POST["channel"], "r") or die("ERRORr3");
    $num=fread($getnum,filesize("CHATDATA/chat.".$_POST["channel"]));
    $daa="";
    $a=1;
    if ($num!="0")
    {   
      $num=$num+1;
      while($num>$a)
      {   
        $getmsg = fopen("CHATDATA/".$_POST["channel"].".".$a, "r")or die("ERRORr3");
        $omsg=fread($getmsg,filesize("CHATDATA/".$_POST["channel"].".".$a));
        $getuser = fopen("CHATDATA/".$_POST["channel"].".".$a.".username", "r")or die("ERRORr3");
        $user=fread($getuser,filesize("CHATDATA/".$_POST["channel"].".".$a.".username"));
        $daa=$daa.$user.":".$omsg."<br><br>";
        $a=$a+1;
      }
      sleep(1);
      $arr=array('success'=>"1",'text'=>$daa);     
      echo json_encode($arr);     
    }
    else
    {
      sleep(2);
      $arr=array('success'=>"1",'text'=>"无消息");     
      echo json_encode($arr);   
    }
  }
  if ($_GET["mode"]=='chat/send')
  {
    if ($_GET["clear"]=="1")
    {
      $c1 = fopen("CHATDATA/chat.".$_GET['channel'], "w") or die("Unable to open file!");
      fwrite($c1,"0");
      fclose($c1);
      header('location:/?mode=chat/clear&ssid='.$ssid1."&channel=".$_GET["channel"]);
      exit;
    }
    else
    {
      echo '<form action="/?mode=chat/report&ssid='.$ssid1.'&channel='.$_GET["channel"].'" method="post">
      <input class="button button-glow button-border button-rounded button-primary" type="text" name="t"><br>
      <input class="button button-glow button-border button-rounded button-primary" value="发送" type="submit">
      ';
    }
  }
  if ($_GET["mode"]=="chat/clear")
  {
    echo "<a class='button button-glow button-border button-rounded button-primary' href='/?mode=chat/send&ssid=".$ssid1."&channel=".$_GET["channel"]."&clear=1'>清空信息</a>";
  }
  if ($_GET["mode"]=="chat/report")
  {
    $getnum = fopen("CHATDATA/chat.".$_GET['channel'], "r") or die("ERRORr3");
    $num=fread($getnum,filesize("CHATDATA/chat.".$_GET['channel']));
    $num=$num+1;
    $c1 = fopen("CHATDATA/chat.".$_GET['channel'], "w") or die("Unable to open file!");
    fwrite($c1,$num);
    fclose($c1);
    if ($_GET["sendmode"]=="")
    {
      $c13 = fopen("CHATDATA/".$_GET["channel"].".".$num, "w") or die("Unable to open file!");
      fwrite($c13,$_POST["t"]);
      fclose($c13);
      $c313 = fopen("CHATDATA/".$_GET["channel"].".".$num.".username", "w") or die("Unable to open file!");
      fwrite($c313,$username);
      fclose($c313);
      header('location:/?mode=chat/send&ssid='.$ssid1."&channel=".$_GET["channel"]);
      exit;
    }
    if ($_GET["sendmode"]=="p")
    {
      $c13 = fopen("CHATDATA/".$_GET["channel"].".".$num, "w") or die("Unable to open file!");
      fwrite($c13,"<img src='CLOUD/".$username."/".$_GET["file"]."'>");
      fclose($c13);
      $c313 = fopen("CHATDATA/".$_GET["channel"].".".$num.".username", "w") or die("Unable to open file!");
      fwrite($c313,$username);
      fclose($c313);
      header('location:/?mode=chat/sendpicture&ssid='.$ssid1."&channel=".$_GET["channel"]);
      exit;
    } 
  }
  if ($_GET["mode"]=="chat/createchannel")
  {
    echo "<title>创建频道</title>";
    echo '频道名称:<form action="/?mode=chat/channelreport&ssid='.$ssid1.'" method="post">
    <input class="button button-glow button-border button-rounded button-primary" type="text" name="channel"><br>
    <input class="button button-glow button-border button-rounded button-primary" type="submit"><br>
    <a class="button button-glow button-border button-rounded button-primary" href="/?mode=chat&ssid='.$ssid1.'">聊天室</a>
    ';
  }
  if ($_GET["mode"]=="chat/channelreport")
  {
    if ($_GET["into"]!="1")
    {
      if (file_exists("CHATDATA/chat.".$_POST['channel']))
      {
        echo "<title>错误</title>";
        echo '<a class="button button-glow button-border button-rounded button-primary" href="/?mode=chat/createchannel&ssid='.$ssid1.'">频道已存在</a>';
      }
      else
      {
        $c1 = fopen("CHATDATA/chat.".$_POST['channel'], "w") or die("Unable to open file!");
        fwrite($c1,"0");
        fclose($c1);
        header('location:/?mode=chat&ssid='.$ssid1."&channel=".$_POST["channel"]);
        exit;
      }
    }
    else
    {   
      if (file_exists("CHATDATA/chat.".$_POST["channel"]))
      {
        header('location:/?mode=chat&ssid='.$ssid1."&channel=".$_POST["channel"]);
        exit;
      }
      else
      {
        echo "<title>错误</title>";
        echo "<a class='button button-glow button-border button-rounded button-primary' href='/?mode=chat&ssid=".$ssid1."'>频道不存在</a>";
      }
    }
  }
  if ($_GET["mode"]=="chat/intochannel")
  {
    echo "<title>进入频道</title>";
    echo '频道名称:<form action="/?mode=chat/channelreport&ssid='.$ssid1.'&into=1" method="post">
          <input type="text" name="channel"><br>
          <input class="button button-glow button-border button-rounded button-primary" type="submit"><br>
          <a class="button button-glow button-border button-rounded button-primary" href="/?mode=chat&ssid='.$ssid1.'">聊天室</a>
          ';
  }
  if ($_GET["mode"]=="ping")
  {
    $ping=0;
    if ($_GET["ping"]!="end")
    {
      $ping_start=microtime(1);
      $myfile = fopen("USERDATA/".$username."/ping", "w") or die("Unable to open file!");
	    fwrite($myfile,$ping_start);
      fclose($myfile);
      header('location:/?mode=ping&ssid='.$_GET["ssid"].'&ping=end');
      exit;
    }
    else
    {
      $getping = fopen("USERDATA/".$username."/ping", "r") or die("ERROR4");
      $ping_start=fread($getping,filesize("USERDATA/".$username."/ping"));
      $ping_end=microtime(1);
      $ping=$ping_end-$ping_start;
      $ping=$ping*1000;
      $ping=round($ping,2);
      if ($ping>=1000)
      {
        $ping=$ping/1000;
        $ping=round($ping,2);
        $ping=$ping."秒";
      }
      else
      {
        $ping=$ping."毫秒";
      }
      echo "延迟:".$ping;
      echo '<meta http-equiv="refresh" content="3; URL=/?mode=ping&ssid='.$_GET["ssid"].'"> ';
    }
  }
  if ($_GET["mode"]=="cloud"&&$admin=="yes")
  {
    echo "<title>云盘</title>";            
    $dir    = 'CLOUD/'.$username."/".$_GET["dir"]."/";
    $files1 = scandir($dir);
    $number=count($files1);
    $h=1;
    while($number>$h)
    {
      if (is_dir("CLOUD/".$username."/".$_GET["dir"]."/".basename($files1[$h])))
      {
        if (basename($files1[$h]==".."))
        {
          echo "<a class='button button-glow button-border button-rounded button-primary' href='/?mode=cloud&ssid=".$ssid1."&dir=".$_GET["dir"]."/../'>返回</a><br>";
          $h=$h+1;
        }
        else
        {
          echo "目录--<a class='button button-glow button-rounded button-border button-highlight' href='/?mode=cloud&ssid=".$ssid1."&dir=".$_GET["dir"]."/".basename($files1[$h])."'>".basename($files1[$h])."</a>--<a class='button button-glow button-border button-rounded button-primary' href='/?mode=cloud/control&ssid=".$ssid1."&name=".basename($files1[$h])."&cloudmode=rename&dir=".$_GET["dir"]."'>重新命名</a>--<a class='button button-glow button-border button-rounded button-primary' href='/?mode=cloud/control&ssid=".$ssid1."&cloudmode=deletedir&name=".basename($files1[$h])."&dir=".$_GET["dir"]."'>删除</a><br>";
          $h=$h+1;
        }
      }
      else
      {
        $size=filesize("CLOUD/".$username."/".$_GET["dir"]."/".basename($files1[$h]))/1024;
        $size=round($size,2);
        $rawsize=round($size,2);
        if ($size<"1024")
        {
          $size=$size."KB";
        }
        if ($size>"1024")
        {
        $size=$size/1024;
        $size=round($size,2);
        $size=$size."MB";
        }
        if (!filesize("CLOUD/".$username."/".$_GET["dir"]."/".basename($files1[$h])))
        {
          $size="错误";
        }
        echo basename($files1[$h])."-".$size."--<a class='button button-glow button-border button-rounded button-primary' href='/?mode=cloud/control&ssid=".$ssid1."&cloudmode=delete&name=".basename($files1[$h])."&dir=".$_GET["dir"]."'>删除</a>--<a class='button button-glow button-border button-rounded button-primary' href='/?mode=cloud/download&ssid=".$ssid1."&filename=".basename($files1[$h])."&dir=".$_GET["dir"]."'>下载</a>--<a class='button button-glow button-border button-rounded button-primary' href='/?mode=cloud/control&ssid=".$ssid1."&name=".basename($files1[$h])."&cloudmode=rename&dir=".$_GET["dir"]."'>重新命名</a>--<a class='button button-glow button-border button-rounded button-primary' href='/?mode=cloud/control&ssid=".$ssid1."&cloudmode=share&name=".basename($files1[$h])."&dir=".$_GET["dir"]."'>分享</a>";
        if ($rawsize<"1000")
        {
          echo "--<a class='button button-glow button-border button-rounded button-primary' href='/?mode=cloud/control&ssid=".$ssid1."&cloudmode=show&name=".basename($files1[$h])."&dir=".$_GET["dir"]."'>以纯文本形式查看</a><br>";
        }
        else
        {
          echo "<br>";
        }
        $h=$h+1;
      }
    }
    if ($h=="2")
    {
      echo "这里没有任何文件";
    }
    echo   '
            <br><a class="button button-glow button-border button-rounded button-primary" href="/?mode=cloud/control&ssid='.$ssid1.'&dir='.$_GET["dir"].'&cloudmode=cnd">创建新目录</a>
            <form id="form" action="/?mode=cloud/upload&ssid='.$ssid1.'&dir='.$_GET["dir"]."/".'" method="post"
            enctype="multipart/form-data">
            <br>
            <label id="realBtn">
            <input class="button button-glow button-border button-rounded button-primary" type="file" name="file" style="left:-9999em;position:absolute;" id="file" />
            <span  class="button button-glow button-border button-rounded button-primary"><div id="1">选择文件</div></span><br>
            </label>
            <input class="button button-glow button-border button-rounded button-primary" type="submit" name="submit" value="上传" />
            <br>
            </form>
            <a class="button button-glow button-border button-rounded button-primary" href="/?mode=cloud&ssid='.$ssid1.'">主目录</a><br><br>
            <a class="button button-glow button-border button-rounded button-primary" href="/?ssid='.$ssid1.'">主页</a>
            ';
  }
  if ($_GET["mode"]=="cloud/control"&&$admin=="yes")
  {
    if ($_GET["cloudmode"]=="delete")
    {   
      unlink("CLOUD/".$username."/".$_GET["dir"]."/".$_GET["name"]);
      echo "CLOUD/".$username."/".$_GET["dir"]."/".$_GET["name"];
      header('location:/?mode=cloud&ssid='.$ssid1.'&dir='.$_GET["dir"]);
      exit;         
    }
    if($_GET["cloudmode"]=="rename")
    {
      echo "<title>重新命名</title>";            
      echo '新名字<form action="/?mode=cloud/control&ssid='.$ssid1.'&cloudmode=renameend&name='.$_GET["name"].'&dir='.$_GET["dir"].'" method="post">
      <input type="text" name="newname" /><br />
      <input type="submit" name="submit" class="button button-glow button-border button-rounded button-primary" value="重新命名" />
      </form><br>
      <a class="button button-glow button-border button-rounded button-primary" href="/?mode=cloud&ssid='.$ssid1.'">Cloud</a>
      ';
    }
    if ($_GET["cloudmode"]=="renameend")
    {
      rename ("CLOUD/".$username."/".$_GET["dir"]."/".$_GET["name"],"CLOUD/".$username."/".$_GET["dir"]."/".$_POST["newname"]);
      header('location:/?mode=cloud&ssid='.$ssid1.'&dir='.$_GET["dir"]);
      exit;           
    }
    if ($_GET["cloudmode"]=="show")
    {
      echo "<title>纯文本查看</title>";            
      if (!readfile("CLOUD/".$username."/".$_GET["dir"]."/".$_GET["name"]))
      {
        echo "错误";
      }
      echo "<br><br><br><a class='button button-glow button-border button-rounded button-primary' href='/?mode=cloud&ssid=".$ssid1."'>云主页</a>";
    }
    if ($_GET["cloudmode"]=="deletedir")
    {
      function dir_is_empty($dir)
      {
        if($handle = opendir($dir))
        {
          while($item = readdir($handle))
          {
            if ($item != "." && $item != "..")return false;
          }
        }
        return true;
      }
      if (dir_is_empty("CLOUD/".$username."/".$_GET["dir"]."/".$_GET["name"]))
      {
        rmdir("CLOUD/".$username."/".$_GET["dir"]."/".$_GET["name"]);
        header('location:/?mode=cloud&ssid='.$ssid1.'&dir='.$_GET["dir"]);
        exit;   
      }
      else
      {
        echo "<title>错误</title>";            
        echo "要删除此目录，请先删除目录下所有-文件/目录-";
        echo '<meta http-equiv="refresh" content="1; URL=/?mode=cloud&ssid='.$ssid1.'&dir='.$_GET["dir"].'">';
      }
    }
    if ($_GET["cloudmode"]=="cnd")
    {
    echo "<title>创建目录</title>";            
    echo '目录名<form action="/?mode=cloud/control&ssid='.$ssid1.'&cloudmode=cndend&name='.$_GET["name"].'&dir='.$_GET["dir"].'" method="post">
          <input type="text" name="name" /><br />
          <input class="button button-glow button-border button-rounded button-primary" type="submit" name="submit" value="创建" />
          </form><br>!目录名请不要以空格结尾<br>
          <a class="button button-glow button-border button-rounded button-primary" href="/?mode=cloud&ssid='.$ssid1.'">云主页</a>
          ';                                    
    }
    if ($_GET["cloudmode"]=="cndend")
    {
      mkdir("CLOUD/".$username."/".$_GET["dir"]."/".$_POST["name"]);
      header('location:/?mode=cloud&ssid='.$ssid1.'&dir='.$_GET["dir"]);
      exit;   
    }
    if ($_GET["cloudmode"]=="share")
    {
      echo "<title>外链分享</title>";
      if (file_exists("USERDATA/".$username."/share"))
      {
        $ghid = fopen("USERDATA/".$username."/share", "r") or die("Unable to open file!");
        $hid=fread($ghid,filesize("USERDATA/".$username."/share"));
        $myfil1e = fopen("USERDATA/".$username."/share", "w") or die("Unable to open file!");
	      fwrite($myfil1e,$hid+1);
        fclose($myfil1e);
      }
      else
      {
        $myfil1e = fopen("USERDATA/".$username."/share", "w") or die("Unable to open file!");
	      fwrite($myfil1e,"1");
        fclose($myfil1e);
        $hid=1;
      }
      $m1yfil1e = fopen("USERDATA/".$username."/share-".$hid, "w") or die("Unable to open file!");
	    fwrite($m1yfil1e,"CLOUD/".$username."/".$_GET["dir"]."/".$_GET["name"]);
      fclose($m1yfil1e);
      $link1="http://".$_SERVER['HTTP_HOST']."/?mode=cloud/share&name=".$_GET["name"]."&user=".$username."&id=".$hid;
      $link=shorturl($link1,5);
      echo "外链:<a class='button button-glow button-border button-rounded button-highlight' href='/?mode=shortedurl&code=".$link."'>".$_SERVER['HTTP_HOST']."/?mode=shortedurl&code=".$link."</a>";
      echo '<br><a class="button button-glow button-border button-rounded button-primary" href="/?mode=cloud&ssid='.$ssid1.'">云主页</a>';
    }
  }
  if ($_GET["mode"]=="cloud/download"&&$admin=="yes")
  {
    if (file_exists("CLOUD/".$username."/".$_GET["dir"]."/".$_GET["filename"]))
    {   
      header("Content-Type: application/force-download");
      header("Content-Disposition: attachment; filename=".$_GET["filename"]);
      readfile("CLOUD/".$username."/".$_GET["dir"]."/".$_GET["filename"]);
    }
    else
    {
      echo "<title>错误</title>";            
      echo "<div align=center>";
      echo "文件不存在";
      echo "</div>";
      echo '<meta http-equiv="refresh" content="1; URL=/?mode=cloud&ssid='.$ssid1.'&dir='.$_GET['dir'].'">';
    }
  }
  if ($_GET["mode"]=="cloud/upload"&&$admin=="yes")
  {
    if ($_FILES["file"]["error"] > 0)
    {
      if ($_FILES["file"]["error"]!="4")
      {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
      }
      else
      {
        header('location:/?mode=cloud&ssid='.$ssid1.'&dir='.$_GET["dir"]);
        exit;              
      }
    }
    else
    {
      echo "Upload: " . $_FILES["file"]["name"] . "<br />";
      echo "Type: " . $_FILES["file"]["type"] . "<br />";
      echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
      echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
      move_uploaded_file($_FILES["file"]["tmp_name"],"CLOUD/".$username. "/".$_GET["dir"]."/". $_FILES["file"]["name"]);
      echo "Stored in: " . "CLOUD/" . $_FILES["file"]["name"];
      header('location:/?mode=cloud&ssid='.$ssid1.'&dir='.$_GET["dir"]);
      exit;
    }   
  }
  if ($_GET["mode"]=="logout")
  {
    header("location:/?mode=logged");
  }
  if ($_GET["mode"]=="chat/sendpicture")
  {
      echo   '
      <form action="/?mode=chat/cloud&ssid='.$ssid1.'&channel='.$_GET["channel"].'" method="post"
      enctype="multipart/form-data">
      <label id="realBtn">
      <input class="button button-glow button-border button-rounded button-primary" type="file" name="file" style="left:-9999em;position:absolute;" id="file" />
      <span  class="button button-glow button-border button-rounded button-primary"><div id="1">选择图片</div></span><br>
      </label>
      <input class="button button-glow button-border button-rounded button-primary" type="submit" name="submit" value="发送" />
      <br>
      </form><br>';
  }
  if ($_GET["mode"]=="chat/cloud")
  {
    move_uploaded_file($_FILES["file"]["tmp_name"], 
    "CLOUD/".$username. "/" . $_FILES["file"]["name"]);
    echo "Stored in: " . "CLOUD/p/" . $_FILES["file"]["name"];
    header('location:/?mode=chat/report&ssid='.$ssid1.'&sendmode=p&file='.$_FILES["file"]["name"]).'&channel='.$_GET["channel"];
    exit;   
  }
  if ($_GET["mode"]=="admin/center"&&$admin=="yes")
  {
    echo "<title>管理中心</title>";
    echo "欢迎来到管理中心,".$username."!<br><br>";
    echo '<a class="button button-glow button-border button-rounded button-primary" href="/?mode=admin/usermanagement&ssid='.$_GET["ssid"].'">用户管理</a><br><br>';
    echo '<a class="button button-glow button-border button-rounded button-primary" href="/?mode=admin/blogcontrol&ssid='.$_GET["ssid"].'">博客管理</a><br><br>';
    echo '<a class="button button-glow button-border button-rounded button-primary" href="/?mode=admin/shorturl&ssid='.$_GET["ssid"].'">短链接管理</a><br><br>';
    echo '<a class="button button-glow button-border button-rounded button-primary" href="/?mode=update&ssid='.$_GET["ssid"].'">升级</a><br><br>';
    echo "<br><a class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."&mode=logged'>主页</a>";
  }
  if ($_GET["mode"]=="admin/usermanagement"&&$admin=="yes")
  {
    echo "<title>用户管理</title>";
    $c1 = fopen("USERDATA/N/n.config", "r") or die("Unable to open file!1");
    $id=fread($c1,filesize("USERDATA/N/n.config"));
    fclose($c1);
    while ($id!="0")
    {
      $name = fopen("USERDATA/N/".$id.".config", "r") or die("Unable to open file!");
      $username1=fread($name,filesize("USERDATA/N/".$id.".config"));
      if ($username1!="DELETE")
      {
        $get1admin = fopen("USERDATA/deputy.admin", "r") or die("g");
        $admindeputy=fread($get1admin,filesize("USERDATA/deputy.admin"));
        if ($username!=$admindeputy)
        {
          if ($username=="admin")
          {
            $name = fopen("USERDATA/N/".$id.".config", "r") or die("Unable to open file!");
            $username1=fread($name,filesize("USERDATA/N/".$id.".config"));
            $admin1 = fopen("USERDATA/".$username1."/admin", "r") or die("ERROR44");
            $admi=fread($admin1,filesize("USERDATA/".$username1."/admin"));
            $id=$id-1;
            if ($username1!=$admindeputy)
            {
              if ($username1!="admin")
              {
                if ($admi=="yes")
                {
                  $id=$id+1;
                  echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>---------><a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/usermanagementreport&ssid='.$_GET["ssid"].'&username='.$username1.'&delete=1">解除管理员权限</a>--<a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/usermanagementreport&ssid='.$_GET["ssid"].'&username='.$username1.'&nid='.$id.'&delete=2">删除用户</a>--<a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/changepasswordreport&ssid='.$_GET["ssid"].'&username='.$username1.'">修改密码</a><br>';
                  $id=$id-1;
                }
                else
                {
                  $id=$id+1;
                  echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>---------><a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/usermanagementreport&ssid='.$_GET["ssid"].'&username='.$username1.'&delete=0">设为管理员</a>--<a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/usermanagementreport&ssid='.$_GET["ssid"].'&username='.$username1.'&nid='.$id.'&delete=2">删除用户</a>--<a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/changepasswordreport&ssid='.$_GET["ssid"].'&username='.$username1.'">修改密码</a><br>';
                  $id=$id-1;
                }
              }
              else
              {
                $id=$id+1;
                echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>--<a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/changepasswordreport&ssid='.$_GET["ssid"].'&username='.$username1.'">修改密码</a><br>';
                $id=$id-1;
              }
            }
            else
            {
              $id=$id+1;
              echo $username1."<br>";
              if ($username1==$username)
              {
                echo '--<a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/changepasswordreport&ssid='.$_GET["ssid"].'&username='.$username1.'">修改密码</a><br>';
              }
              $id=$id-1;
            }   
          }
          else
          {
            $name = fopen("USERDATA/N/".$id.".config", "r") or die("Unable to open file!");
            $username1=fread($name,filesize("USERDATA/N/".$id.".config"));
            $admin1 = fopen("USERDATA/".$username1."/admin", "r") or die("ERROR45");
            $admi=fread($admin1,filesize("USERDATA/".$username1."/admin"));
            $id=$id-1;
            if ($admi=="yes")
            {
              $id=$id+1;
              echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>--------->权限不够';
              if ($username1==$username)
              {
                echo '--<a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/changepasswordreport&ssid='.$_GET["ssid"].'&username='.$username1.'" >修改密码</a><br>';
              }
              $id=$id-1;
            }
            else
            { 
              $id=$id+1;
              echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>--------->权限不够--<a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/usermanagementreport&ssid='.$_GET["ssid"].'&username='.$username1.'&nid='.$id.'&delete=2">删除用户</a>--<a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/changepasswordreport&ssid='.$_GET["ssid"].'&username='.$username1.'">修改密码</a><br>';
              $id=$id-1;
            }
          }
        }
        else
        {
          $name = fopen("USERDATA/N/".$id.".config", "r") or die("Unable to open file!");
          $username1=fread($name,filesize("USERDATA/N/".$id.".config"));
          $admin1 = fopen("USERDATA/".$username1."/admin", "r") or die("ERROR46");
          $admi=fread($admin1,filesize("USERDATA/".$username1."/admin"));
          $id=$id-1;
          if ($username1!=$admindeputy)
          {
            if ($username1!="admin")
            {
              if ($admi=="yes")
              {
                $id=$id+1;
                echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>---------><a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/usermanagementreport&ssid='.$_GET["ssid"].'&username='.$username1.'&delete=1">解除管理员权限</a>--<a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/usermanagementreport&ssid='.$_GET["ssid"].'&username='.$username1.'&nid='.$id.'&delete=2">删除用户</a>--<a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/changepasswordreport&ssid='.$_GET["ssid"].'&username='.$username1.'">修改密码</a><br>';
                $id=$id-1;
              }
              else
              {
                $id=$id+1;
                echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>---------><a class="button button-border button-glow button-rounded button-border button-highlight" href="/?mode=admin/usermanagementreport&ssid='.$_GET["ssid"].'&username='.$username1.'&delete=0">设为管理员</a>--<a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/usermanagementreport&ssid='.$_GET["ssid"].'&username='.$username1.'&nid='.$id.'&delete=2">删除用户</a>--<a class="button button-glow button-rounded button-border button-highlight" href="/?mode=admin/changepasswordreport&ssid='.$_GET["ssid"].'&username='.$username1.'">修改密码</a><br>';
                $id=$id-1;
              }
            }
            else
            {
              $id=$id+1;
              echo $username1."<br>";
              $id=$id-1;
            }
          }
          else
          {
            $id=$id+1;
            echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>--<a class="button button-border button-glow button-rounded button-border button-highlight" href="/?mode=admin/changepasswordreport&ssid='.$_GET["ssid"].'&username='.$username1.'">修改密码</a><br>';
            $id=$id-1;
          }
        }
      }
      else 
      {   
        echo $id."--用户已被删除<br>";
        $id=$id-1;
      }
    }
    echo "<br><br><a class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."&mode=admin/center'>管理中心</a>";
  }
  if ($_GET["mode"]=="admin/usermanagementreport")
  {
    $get1admin = fopen("USERDATA/deputy.admin", "r") or die("");
    $admindeputy=fread($get1admin,filesize("USERDATA/deputy.admin"));
    if ($username!=$admindeputy)
    {
      if ($_GET['username']!="admin")
      {
        if ($_GET["delete"]=="0")
        {
          $myfile6 = fopen("USERDATA/".$_GET["username"]."/admin", "w") or die("Unable to open file!");
          fwrite($myfile6,"yes");
          fclose($myfile6);
          echo "用户-".$_GET['username']."----成为管理员<br>";
          header('location:/?mode=admin/usermanagement&ssid='.$ssid1);
          exit;
        }
        if ($_GET["delete"]=="1")
        {
          $myfile6 = fopen("USERDATA/".$_GET["username"]."/admin", "w") or die("Unable to open file!");
          fwrite($myfile6,"no");
          fclose($myfile6);
          echo "管理员".$_GET['username']."----被解除了管理员权限<br>";
          header('location:/?mode=admin/usermanagement&ssid='.$ssid1);
          exit;
        }
        if ($_GET["delete"]=="2")
        {
          $myfile6 = fopen("USERDATA/".$_GET["username"]."/password.json", "w") or die("Unable to open file!");
          fwrite($myfile6,"DELETE");
          fclose($myfile6);
          $myfile7 = fopen("USERDATA/".$_GET["username"]."/ssid", "w") or die("Unable to open file!");
          fwrite($myfile7,"DELETE");
          fclose($myfile7);
          $myfile8 = fopen("USERDATA/".$_GET["username"]."/admin", "w") or die("Unable to open file!");
          fwrite($myfile8,"DELETE");
          fclose($myfile8);
          $myfile9 = fopen("USERDATA/N/".$_GET["nid"].".config", "w") or die("Unable to open file!");
          fwrite($myfile9,"DELETE");
          fclose($myfile9);
          echo "用户已删除";
          header('location:/?mode=admin/usermanagement&ssid='.$ssid1);
          exit;
        }
      }
      else
      {
        echo "<title>错误</title>";
        echo "管理员-admin除了密码不能被改变<br>";
        echo '<a class="button button-glow button-border button-rounded button-primary" href="/?ssid='.$_GET["ssid"].'&mode=admin/center">控制中心</a><br>';
      }
    }
    else
    {
      if ($_GET["username"]!="admin")
      {
        if ($_GET["delete"]=="0")
        {
          $myfile6 = fopen("USERDATA/".$_GET["username"]."/admin", "w") or die("Unable to open file!");
          fwrite($myfile6,"yes");
          fclose($myfile6);
          echo "用户-".$_GET['username']."----成为了管理员<br>";
          header('location:/?mode=admin/usermanagement&ssid='.$ssid1);
          exit;
        }
        if ($_GET["delete"]=="1")
        {
          $myfile6 = fopen("USERDATA/".$_GET["username"]."/admin", "w") or die("Unable to open file!");
          fwrite($myfile6,"no");
          fclose($myfile6);
          echo "管理员-".$_GET['username']."----被解除了管理员权限<br>";
          header('location:/?mode=admin/usermanagement&ssid='.$ssid1);
          exit;
        }
        if ($_GET["delete"]=="2")
        {
          $myfile6 = fopen("USERDATA/".$_GET["username"]."/password.json", "w") or die("Unable to open file!");
          fwrite($myfile6,"DELETE");
          fclose($myfile6);
          $myfile7 = fopen("USERDATA/".$_GET["username"]."/ssid", "w") or die("Unable to open file!");
          fwrite($myfile7,"DELETE");
          fclose($myfile7);
          $myfile8 = fopen("USERDATA/".$_GET["username"]."/admin", "w") or die("Unable to open file!");
          fwrite($myfile8,"DELETE");
          fclose($myfile8);                        
          $myfile9 = fopen("USERDATA/N/".$_GET["nid"].".config", "w") or die("Unable to open file!");
          fwrite($myfile9,"DELETE");
          fclose($myfile9);
          header('location:/?mode=admin/usermanagement&ssid='.$ssid1);
          exit;
        }
      }
      else
      {
        echo "<title>错误</title>";
        echo "管理员-admin除了密码不能被改变<br>";
        echo '<a class="button button-glow button-border button-rounded button-primary" href="/?ssid='.$_GET["ssid"].'&mode=admin/center">控制中心</a><br>';
      }
    }
  }
  if ($_GET["mode"]=="admin/changepasswordreport"&&$admin=='yes')
  {
    echo'<form action="/?mode=admin/changepasswordreporting&ssid='.$_GET["ssid"].'&username='.$_GET["username"].'" method="post">新密码:<input class="button button-glow button-border button-rounded button-primary" type="password" name="password"><br><input class="button button-glow button-border button-rounded button-primary" type="submit"></form>';
    echo '<br><a class="button button-glow button-border button-rounded button-primary" href="/?mode=admin/center&ssid='.$_GET["ssid"].'">控制中心</a>';
  }
  if ($_GET["mode"]=="update"&&$admin=="yes")
  {
    echo "<title>升级</title>";
    echo   '
            <form id="form" action="/?mode=updatereport&ssid='.$ssid1.'" method="post"
            enctype="multipart/form-data">
            <input class="button button-glow button-border button-rounded button-primary" type="file" name="file" id="file" />
            <input class="button button-glow button-border button-rounded button-primary" type="submit" name="submit" value="升级" />
            ';
    echo "<br><br><a class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."&mode=admin/center'>管理中心</a>";
  }
  if ($_GET["mode"]=="updatereport"&&$admin=="yes")
  {
    move_uploaded_file($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]);
    echo "<title>升级完毕</title>";
    echo "升级完毕。";
    echo '<br><a class="button button-glow button-border button-rounded button-primary" href="/?mode=admin/center&ssid='.$_GET["ssid"].'">管理中心</a><br>';
  }
  if ($_GET["mode"]=="admin/changepasswordreporting"&&$admin=="yes")
  {
    $get1admin = fopen("USERDATA/deputy.admin", "r") or die("");
    $admindeputy=fread($get1admin,filesize("USERDATA/deputy.admin"));
    if ($username!=$admindeputy)
    {
      if ($username!="admin")
      {
        if ($username==$_GET["username"])
        {
          $myfile1 = fopen("USERDATA/".$_GET["username"]."/password.json", "w") or die("Unable to open file!");
          fwrite($myfile1,md5($_POST["password"]));
          fclose($myfile1);
          echo "<title>密码已修改</title>";
          echo "密码已修改<br>";
          echo '<a class="button button-glow button-border button-rounded button-primary" href="/?mode=admin/usermanagement&ssid='.$_GET["ssid"].'">管理中心</a><br>';
        }
        else
        {    
          $getadmin1 = fopen("USERDATA/".$_GET['username']."/admin", "r") or die("ERROR4");
          $admin1=fread($getadmin1,filesize("USERDATA/".$_GET['username']."/admin"));
          if($admin1!="yes")
          {
            $myfile1 = fopen("USERDATA/".$_GET["username"]."/password.json", "w") or die("Unable to open file!");
            fwrite($myfile1,md5($_POST["password"]));
            fclose($myfile1);
            echo "<title>密码已修改</title>";
            echo "密码已修改<br>";
            echo '<a class="button button-glow button-border button-rounded button-primary" href="/?mode=admin/usermanagement&ssid='.$_GET["ssid"].'">管理中心</a><br>';
          }
          else
          {
            echo "<title>错误</title>";
            echo "管理员的密码只可以被他自己，站长，以及副站长修改<br>";
            echo '<a class="button button-glow button-border button-rounded button-primary" href="/?mode=admin/usermanagement&ssid='.$_GET["ssid"].'">管理中心</a><br>';
          }
        }   
      }
      else
      {
        $myfile1 = fopen("USERDATA/".$_GET["username"]."/password.json", "w") or die("Unable to open file!");
        fwrite($myfile1,md5($_POST["password"]));
        fclose($myfile1);
        echo "<title>密码已修改</title>";
        echo "密码已修改<br>";
        echo '<a class="button button-glow button-border button-rounded button-primary" href="/?mode=admin/usermanagement&ssid='.$_GET["ssid"].'">管理中心</a><br>';
      }   
    }
    else
    {
      if ($_GET["username"]!=$_GET["username"])
      {
        if ($_GET["username"]!="admin")
        {
          $myfile1 = fopen("USERDATA/".$_GET["username"]."/password.json", "w") or die("Unable to open file!");
          fwrite($myfile1,md5($_POST["password"]));
          fclose($myfile1);
          echo "<title>密码已修改</title>";
          echo "密码已修改<br>";
          echo '<a class="button button-glow button-border button-rounded button-primary" href="/?mode=admin/usermanagement&ssid='.$_GET["ssid"].'">管理中心</a><br>';
        }
        else
        {
          echo "<title>错误</title>";
          echo "站长的密码只可被他自己修改<br>";
          echo '<a class="button button-glow button-border button-rounded button-primary" href="/?mode=admin/usermanagement&ssid='.$_GET["ssid"].'">管理中心</a><br>';
        }
      }
      else
      {
        echo "<title>密码已修改</title>";
        $myfile1 = fopen("USERDATA/".$_GET["username"]."/password.json", "w") or die("Unable to open file!");
        fwrite($myfile1,md5($_POST["password"]));
        fclose($myfile1);
        echo "密码已修改<br>";
        echo '<a class="button button-glow button-border button-rounded button-primary" href="/?mode=admin/usermanagement&ssid='.$_GET["ssid"].'">管理中心</a><br>';
      }
    }  
  }
  if ($_GET["mode"]=="admin/blogcontrol"&&$admin=="yes")
  {
    echo "<title>博客管理</title>";
    $id="1";
    $getbid = fopen("USERDATA/Blog/blog.config", "r") or die("ERRORr3");
    $bid=fread($getbid,filesize("USERDATA/Blog/blog.config"));
    while($bid>"0")
    {
      $f = fopen("USERDATA/Blog/".$bid.".username", "r") or die("Unable to open filge!");
      $fusername=fread($f,filesize("USERDATA/Blog/".$bid.".username"));
      fclose($f);
      $t = fopen("USERDATA/Blog/".$bid.".t", "r") or die("Unable to open fil8e!");
      $tname=fread($t,filesize("USERDATA/Blog/".$bid.".t"));
      fclose($t);
      if ($tname!="DELETE")
      {
        echo "<a class='button button-glow button-border button-rounded button-primary' href='/?mode=blogpage&ssid=".$ssid1."&id=".$bid."'>".$tname."</a>----><a class='button button-glow button-border button-rounded button-highlight' href='/?mode=admin/modifyblog&ssid=".$_GET["ssid"]."&id=".$bid."'>修改</a>--<a class='button button-glow button-border button-rounded button-highlight' href='/?mode=admin/modifyblog&ssid=".$_GET["ssid"]."&id=".$bid."&delete=1'>删除</a>";
        $getlock = fopen("USERDATA/Blog/".$bid.".l", "r") or die("ERRORr3");
        $lock=fread($getlock,filesize("USERDATA/Blog/".$bid.".l"));
        if ($lock=="UNLOCK")
        {
          echo "--<a class='button button-glow button-border button-rounded button-highlight' href='/?mode=admin/modifyblog&ssid=".$_GET["ssid"]."&id=".$bid."&lock=1'>锁定文章</a><br>";
        }
        else
        {
          echo "--<a class='button button-glow button-border button-rounded button-highlight' href='/?mode=admin/modifyblog&ssid=".$_GET["ssid"]."&id=".$bid."&lock=0'>解锁文章</a><br>";
        }
        $bid=$bid-1;
        $id=$id+1;
      }
      else
      {
        echo $bid."."."文章被删除<br>";
        $bid=$bid-1;
        $id=$id+1;
      }
    }
    if ($id=="1")
    {
      echo "没有任何博客";
    }
    echo "<br><a class='button button-glow button-border button-rounded button-primary' href='/?mode=admin/center&ssid=".$_GET["ssid"]."'>控制中心</a>";
  }
  if($_GET["mode"]=="admin/modifyblog"&&$admin=="yes")
  {
    if ($_GET["delete"]=="")
    {
        $gt = fopen("USERDATA/Blog/".$_GET["id"].".t", "r") or die("Blog does not exist");
        $t=fread($gt,filesize("USERDATA/Blog/".$_GET["id"].".t"));
        $gb = fopen("USERDATA/Blog/".$_GET["id"].".blogdata", "r") or die("Blog does not exist");
        $b=fread($gb,filesize("USERDATA/Blog/".$_GET["id"].".blogdata"));
        echo "<title>修改文章</title>";  
        echo 
        '
        修改你的文章<br />
        <form action="/?mode=user/blogmodifyreport&ssid='.$ssid1.'&id='.$_GET["id"].'" method="post">
        <textarea class="button button-glow button-border button-rounded button-primary" type="text" name="t">'.$t.'</textarea><br>
        <textarea name="BLOG" rows="20" cols="50">'.$b.'</textarea><br>
        <input class="button button-glow button-border button-rounded button-highlight" type="submit">
        ';
      echo "<br><br><a class='button button-glow button-border button-rounded button-primary' href='/?mode=admin/center&ssid=".$_GET["ssid"]."'>控制中心</a>";
    }
    if ($_GET["delete"]=="1")
    {
      $t = fopen("USERDATA/Blog/".$_GET["id"].".t", "w") or die("Unable to open file!");
      fwrite($t,"DELETE");
      fclose($t);
      $c = fopen("USERDATA/Blog/".$_GET["id"].".blogdata", "w") or die("Unable to open file!");
      fwrite($c,"DELETE");
      fclose($c);
      $u = fopen("USERDATA/Blog/".$_GET["id"].".username", "w") or die("Unable to open file!");
      fwrite($u,"DELETE");
      fclose($u);
      echo "ok";
      header('location:/?mode=admin/blogcontrol&ssid='.$_GET["ssid"]);
      exit;
    }
    if ($_GET["lock"]=="1")
    {
      $u1 = fopen("USERDATA/Blog/".$_GET["id"].".l", "w") or die("Unable to open file!");
      fwrite($u1,"ADMINLOCK");
      fclose($u1);
      header('location:/?mode=admin/blogcontrol&ssid='.$_GET["ssid"]);
      exit;
    }
    if ($_GET["lock"]=="0")
    {
      $u1 = fopen("USERDATA/Blog/".$_GET["id"].".l", "w") or die("Unable to open file!");
      fwrite($u1,"UNLOCK");
      fclose($u1);
      header('location:/?mode=admin/blogcontrol&ssid='.$_GET["ssid"]);
      exit;
    }
  }
  if ($_GET["mode"]=="admin/blogmodify")
  {
    $t = fopen("USERDATA/Blog/".$_GET["id"].".t", "w") or die("Unable to open file!");
    fwrite($t,$_POST["t"]);
    fclose($t);
    $c = fopen("USERDATA/Blog/".$_GET["id"].".blogdata", "w") or die("Unable to open file!");
    fwrite($c,$_POST["BLOG"]);
    fclose($c);
    echo "ok";
    header('location:/?mode=admin/blogcontrol&ssid='.$_GET["ssid"]);
    exit;
  }
  if ($_GET["mode"]=="shorturl")
  {
    echo '<title>缩短链接</title>原链接：<form action="/?mode=finishshortedurl&ssid='.$_GET["ssid"].'" method="post">
    <input class="button button-glow button-border button-rounded button-primary" type="text" name="url"><br>
    <input class="button button-glow button-border button-rounded button-primary" vaule="提交" type="submit">';
    echo "<br><br><a class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>";
  }
  if ($_GET["mode"]=="finishshortedurl")
  {
    $link=shorturl($_POST["url"],5);
    echo "短链接:<a class='button button-glow button-border button-rounded button-highlight' href='/?mode=shortedurl&code=".$link."'>".$_SERVER['HTTP_HOST']."/?mode=shortedurl&code=".$link."</a>";
    echo "<br><a class='button button-glow button-border button-rounded button-primary' href='/?ssid=".$_GET["ssid"]."'>主页</a>";
  }
  if ($_GET["mode"]=="admin/shorturl"&&$admin=="yes")
  {
    echo "<title>短链接管理</title>";
    $gn=fopen("USERDATA/shorturl.config","r") or die("没有短链接!<br><a  class='button button-glow button-border button-rounded button-primary' href='/?mode=admin/center&ssid=".$ssid1."'>控制中心</a>");
    $n=fread($gn,filesize("USERDATA/shorturl.config"));
    while ($n>0)
    {
      $wn=fopen("USERDATA/shorturl.".$n,"r") or die("短链接不存在");
      $wwn=fread($wn,filesize("USERDATA/shorturl.".$n));
      $gwn=fopen("USERDATA/".$wwn,"r") or die("短链接不存在");
      $ln=fread($gwn,filesize("USERDATA/".$wwn));
      if ($ln!="短链接被删除")
      {
        echo "<a href='/?mode=shortedurl&code=".$wwn."' class='button button-glow button-border button-rounded button-highlight'>".$wwn."--->".$ln."</a>-------<a class='button button-glow button-border button-rounded button-primary' href='/?mode=admin/shorturlcontrol&ssid=".$ssid1."&controlmode=delete&code=".$wwn."'>删除</a>---<a class='button button-glow button-border button-rounded button-primary' href='/?mode=admin/shorturlcontrol&ssid=".$ssid1."&controlmode=change&code=".$wwn."'>修改</a><br>";
      }
      else
      {
        echo $wwn."-->".$ln."<br>";
      }
      $n=$n-1;
    }
    echo "<br><a  class='button button-glow button-border button-rounded button-primary' href='/?mode=admin/center&ssid=".$ssid1."'>控制中心</a>";
  }
  if ($_GET["mode"]=="admin/shorturlcontrol"&&$admin=="yes")
  {
    if ($_GET["controlmode"]=="delete")
    {
      $cda= fopen("USERDATA/".$_GET["code"],"w");
      fwrite($cda,'短链接被删除');
      fclose($cda); 
      header('location:/?mode=admin/shorturl&ssid='.$_GET["ssid"]);
      exit;      
    }
    if ($_GET["controlmode"]=="change")
    {
      echo '<title>新目标链接</title>新目标链接：<form action="/?mode=admin/shorturlcontrol&code='.$_GET["code"].'&controlmode=report&ssid='.$_GET["ssid"].'" method="post">
      <input class="button button-glow button-border button-rounded button-primary" type="text" name="url"><br>
      <input  class="button button-glow button-border button-rounded button-primary" vaule="提交" type="submit"><br>
      ';
      echo "<br><a  class='button button-glow button-border button-rounded button-primary' href='/?mode=admin/shorturl&ssid=".$ssid1."'>取消</a>";
    }
    if ($_GET["controlmode"]=="report")
    {
      $cda= fopen("USERDATA/".$_GET["code"],"w");
      fwrite($cda,$_POST["url"]);
      fclose($cda); 
      header('location:/?mode=admin/shorturl&ssid='.$_GET["ssid"]);
      exit;       
    }
  }

}
else
{
  if ($_GET["mode"]!=""&&$_GET["mode"]!="reg"&&$_GET["mode"]!="regreport"&&$_GET["mode"]!="login"&&$_GET["mode"]!="loginreport")
  {
    if ($_GET["mode"]!="cloud/share"&&$_GET["mode"]!="base64"&&$_GET["mode"]!="shortedurl")
    {
      echo "<title>请登录或注册</title>";                        
      echo '<a class="button button-glow button-border button-rounded button-primary" href="/?mode=reg">注册</a> 或 <a class="button button-glow button-border button-rounded button-primary" href="/?mode=login">登录 </a>';
    }
    else
    {
      if ($_GET["mode"]=="base64")
      {
        $url=base64_decode($_GET["code"]);
        $preg='|^http://|';
        $preg2='|^https://|';
        if(!preg_match($preg,$url)&&!preg_match($preg2,$url)) 
        { 
          $url='http://'.$url;
        }
        header('location:'.$url);
        exit;
      }
      if ($_GET["mode"]=="cloud/share")
      {
        $fidr=fopen("USERDATA/".$_GET["user"]."/share-".$_GET["id"],"r");
        $d=fread($fidr,filesize("USERDATA/".$_GET["user"]."/share-".$_GET["id"]));
        header("Content-Type: application/force-download");
        header("Content-Disposition: attachment; filename=".$_GET["name"]);
        readfile($d);
      }
      if ($_GET["mode"]=="shortedurl")
      {
        $gurl=fopen("USERDATA/".$_GET["code"],"r") or die("短链接不存在");
        $url=fread($gurl,filesize("USERDATA/".$_GET["code"]));
        $preg='|^http://|';
        $preg2='|^https://|';
        if(!preg_match($preg,$url)&&!preg_match($preg2,$url)) 
        { 
          $url='http://'.$url;
        }
        header('location:'.$url);
        exit;
      }
    }
  }
}
if ($_GET["mode"]!="chat/data"&&$_GET["mode"]!="cloud/download"&&$_GET["mode"]!="cloud/share")
{
  echo '</div></body>';
}
?>