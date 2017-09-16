<?php
session_start();
function  write ($filename,$word,$error_report="No Set Error Msg"){
	$WriteFile=fopen($filename,"w") or die($error_report);
	fwrite($WriteFile,$word);
	fclose($WriteFile);
	file_put_contents("server.log",microtime(1)."  ".$filename." << '".$word."'\r\n",FILE_APPEND);	
}
function  read ($filename,$error_report="No Set Error Msg"){
	$WriteFile=fopen($filename,"r") or die($error_report);
	$word=fread($WriteFile,filesize($filename));
	fclose($WriteFile);
	file_put_contents("server.log",microtime(1)."  ".$filename." >> '".$word."'\r\n",FILE_APPEND);		
	return $word;
}
function  jumpurl($url)
{
	file_put_contents("server.log",microtime(1)."  Redirect  >> '".$url."'\r\n",FILE_APPEND);			
	header('location:'.$url);
	exit;
}
if (!file_exists("USERDATA")){
	mkdir("USERDATA");
	mkdir("USERDATA/Blog");
	mkdir("USERDATA/N");
	mkdir("CHATDATA/");
	mkdir("USERDATA/admin/");
	mkdir("CLOUD");
	mkdir("CLOUD/admin/");
	mkdir("USERDATA/SSIDFALL/");
	mkdir("USERDATA/DELETE/");
	mkdir("USERDATA/SSIDFALLED/");
	mkdir("USERDATA/ssid");
	write("USERDATA/Blog/blog.config","1");
	write("USERDATA/Blog/1.blogdata","Hello World!");
	write("USERDATA/Blog/1.username",'admin');
	write("USERDATA/admin/password.json",'21232f297a57a5a743894a0e4a801fc3');
	write("USERDATA/admin/admin",'yes');
	write("USERDATA/N/n.config",'1');
	write("USERDATA/N/1.config",'admin');
	write("USERDATA/deputy.admin",'admin');
	write("USERDATA/DELETE/admin",'no');
	write("USERDATA/Blog/0.t",'help');
	write("USERDATA/SSIDFALLED/password.json",'userlockedbyadmin');
	write("USERDATA/SSIDFALLED/admin",'no');
	write("USERDATA/DELETE/password.json",'userlockedbyadmin');
	write("USERDATA/DELETE/userlock",'USERLOCKED');
	write("USERDATA/SSIDFALL/userlock",'USERLOCKED');
	write("USERDATA/Blog/1.l",'UNLOCK');
	write("USERDATA/admin/ssid",'ssid');
	write("USERDATA/ssid/ssid",'admin');
	write("USERDATA/Blog/1.t",'帮助');
	write("USERDATA/Blog/1.cn",'0');
	write("CHATDATA/chat",'0');
	echo "安装成功，请刷新页面.";
	jumpurl('./');
	exit;
}
if ($_GET["mode"]!="chat/data" && $_GET["mode"]!='cloud/download' && $_GET["mode"]!='cloud/share'){
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />       	<body style="background-image: url(starsky.jpg);">';
	echo '<div id="13" align=center style="font-size:150%;font-family: 標楷體,DFKai-sb,BiauKai,'."AR PL".' UKai TW'.";".'"><style> a{ text-decoration:none} </style> ';
	echo '<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>        <link href="//cdn.bootcss.com/Buttons/2.0.0/css/buttons.css" rel="stylesheet">';
	echo '<link href="//cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">';
	echo '<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" media="screen" />        <meta name="viewport" content="width=device-width, initial-scale=1">        <style type="text/css">        body {color:rgb(30,144,255)}        </style>';
}
function  make_password ($length){
	$chars=array ('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');
	$keys=array_rand($chars,$length);
	$password1='';
	for ($i=0;
	$i<$length;
	$i++){
		$password1.=$chars[$keys[$i]];
	}
	return $password1;
}
function  shorturl ($url,$long){
	$shortedurl=make_password ($long);
	while (file_exists("USERDATA/".$shortedurl)){
		$shortedurl=make_password ($long);
	}
	write("USERDATA/".$shortedurl,$url);
	if (file_exists("USERDATA/shorturl.config")){
		$n=read("USERDATA/shorturl.config");
		write("USERDATA/shorturl.config",$n+1);
	}else {
		write("USERDATA/shorturl.config","1");
		$n=0;
	}
	$n1=$n+1;
	write("USERDATA/shorturl.".$n1,$shortedurl);
	return $shortedurl;
}
if ($_GET["mode"]==""){
	if ($_SESSION["ssid"]==""){
		jumpurl('./?mode=LoginOrReg');
		exit ;
	}else {
		jumpurl('./?mode=logged');
		exit ;
	}
}
if ($_GET["mode"]=="reg"){
	echo "<title>注册</title>";
	echo '<form action="./?mode=regreport" method="post">				<span class="input input--juro">        <span class="input__label-content input__label-content--juro">用户名</span>				<input class="button button-glow button-border button-rounded button-primary" type="text" name="name" id="input-28" /><br>        <span class="input__label-content input__label-content--juro">-密码-</span>							<input class="button button-glow button-border button-rounded button-primary"  type="password" name="password" id="input-29" /><br>        <button class="button button-pill button-primary">注册！</button>';
	echo "<br><a class='button button-glow button-border button-rounded button-primary' href='./'>主页<a>";
}
if ($_GET["mode"]=="regreport"){
	if (file_exists ("USERDATA/".$_POST["name"]."/")){
		echo "用户名不可用";
		echo '<meta http-equiv="refresh" content="1; URL=./?mode=reg"> ';
	}else {
		mkdir("CLOUD/".$_POST["name"]."/");
		mkdir("USERDATA/".$_POST["name"]."/");
		write ("USERDATA/".$_POST["name"]."/password.json",md5($_POST["password"]));
		write ("USERDATA/".$_POST["name"]."/ssid",make_password (12));
		$_SESSION["ssid"]=read ("USERDATA/".$_POST["name"]."/ssid");
		write ("USERDATA/ssid/".$_SESSION["ssid"],$_POST["name"]);
		write ("USERDATA/".$_POST["name"]."/userlock","USERUNLOCK");
		write ("USERDATA/".$_POST["name"]."/admin","no");
		$id=read ("USERDATA/N/n.config","r");
		$id1=$id+1;
		write ("USERDATA/N/".$id1.".config",$_POST["name"]);
		Write ("USERDATA/N/n.config",$id1);
		jumpurl('./?mode=logged');
		exit ;
	}
}
if ($_GET["mode"]=="login"){
	echo "<title>登录</title>";
	echo '<form action="./?mode=loginreport" method="post">        用户名: <input class="button button-glow button-border button-rounded button-primary" type="text" name="name"><br>        -密码-: <input class="button button-glow button-border button-rounded button-primary" type="password" name="password"><br>        <button class="button button-pill button-primary">登录</button>';
	echo "<br><a class='button button-glow button-border button-rounded button-primary' href='./'>主页<a>";
}
if ($_GET["mode"]=="loginreport"){
	if (file_exists("USERDATA/".$_POST["name"]."/")){
		$password=read ("USERDATA/".$_POST["name"]."/password.json");
		if ($password=="DELETE"){
			echo '此用户已被删除<meta http-equiv="refresh" content="5; URL=./?mode=login">';
		}else {
			if ($password==md5($_POST["password"])){
				$lastloginssid=read ("USERDATA/".$_POST["name"]."/ssid");
				write ("USERDATA/ssid/".$lastloginssid,"ssidfalled");
				$newssid=make_password (12);
				write ("USERDATA/".$_POST["name"]."/ssid",$newssid);
				$_SESSION["ssid"]=$newssid;
				write ("USERDATA/ssid/".$_SESSION["ssid"],$_POST["name"]);
				write ("USERDATA/".$_POST["name"]."/userlock","USERUNLOCK");
				jumpurl('./?mode=logged');
				exit ;
			}else {
				echo '密码错误<meta http-equiv="refresh" content="1; URL=./?mode=login">';
			}
		}
	}else {
		echo '用户不存在<meta http-equiv="refresh" content="1; URL=./?mode=login">';
	}
}
if ($_GET["mode"]!="login"&&$_GET["mode"]!="reg"&&$_GET["mode"]!="LoginOrReg")
{
	$username=read ("USERDATA/ssid/".$_SESSION["ssid"],'<title>请登录或注册</title><a class="button button-glow button-border button-rounded button-primary" href="./?mode=reg">注册</a> 或 <a class="button button-glow button-border button-rounded button-primary" href="./?mode=login">登录 </a>');
}
if ($_SESSION["ssid"]!="" && $username!="ssidfalled"){
	$usernodeleteverity=read ("USERDATA/".$username."/password.json");
	if ($usernodeleteverity!="DELETE"){
		$admin=read ("USERDATA/".$username."/admin");
		if ($_GET["mode"]=="logged"){
			if ($username!="falled" && $username!=""){
				echo "<title>欢迎回来，".$username."</title>";
				echo "欢迎 ";
				if ($admin=="yes"){
					echo "管理员--".$username;
				}else {
					echo "用户--".$username;
				}
				echo "<br>";
				$bid=read("USERDATA/Blog/blog.config");
				$id="0";
				while ($bid>"0"){
					$fusername=read("USERDATA/Blog/".$bid.".username");
					$tname=read("USERDATA/Blog/".$bid.".t");
					if ($tname!="DELETE"){
						$bl=read("USERDATA/Blog/".$bid.".l");
						if ($bl=="UNLOCK"){
							$tn=read("USERDATA/Blog/".$bid.".blogdata");
							echo "-------------<br><a class='button button-glow button-border button-rounded button-primary' href='./?mode=blogpage&id=".$bid."'><big>".$tname."</big><br>----<br></a><br>".chunk_split($tn,100)."<br>-------------<br>   by-".$fusername."<br><br>";
							$bid=$bid-1;
							$id=$id+1;
						}else {
							$bid=$bid-1;
						}
					}else {
						$bid=$bid-1;
					}
				}
				if ($id==0){
					echo "===========<br>没有文章可以展示<br>===========<br>";
				}
				echo "-你可以-<br>";
				if ($admin=="yes"){
					echo "<a class='button button-glow button-border button-rounded button-primary'  href=./?mode=admin/center>管理员-控制中心</a><br><br>";
					echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href=./?mode=cloud>管理员-云盘</a><br><br>";
				}
				echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href=./?mode=shorturl>短链接</a><br><br>";
				echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href=./?mode=chat>聊天室</a><br><br>";
				echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href=./?mode=user/blogcenter>博客系统</a><br><br>";
				echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href=./?mode=userpage>个人管理</a><br><br>";
				echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href=./?mode=logout>登出</a><br><br>";
			}
		}
		if ($_GET["mode"]=="user/blogcenter"){
			echo "<title>博客系统</title>";
			echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./?mode=write/blog'>写博客</a><br>";
			echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./?mode=user/blogcontrol'>博客管理</a><br>";
			echo "-------------<br>";
			$bid=read("USERDATA/Blog/blog.config");
			$id="0";
			while ($bid>"0"){
				$fusername=read("USERDATA/Blog/".$bid.".username");
				$tname=read("USERDATA/Blog/".$bid.".t");
				if ($tname!="DELETE"){
					$bl=read("USERDATA/Blog/".$bid.".l");
					if ($fusername==$username){
						$tn=read("USERDATA/Blog/".$bid.".blogdata");
						echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./?mode=blogpage&id=".$bid."'><big>".$tname."</big></a><br>".chunk_split($tn,60)."<br>   by-".$fusername."<br>";
						echo "-------------<br>";
						$bid=$bid-1;
						$id=$id+1;
					}else {
						$bid=$bid+1;
					}
				}else {
					$bid=$bid-1;
				}
			}
			if ($id==0){
				echo "这里没有任何可显示文章<br>-------------";
			}
			echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./'>主页</a>";
		}
		if ($_GET["mode"]=="write/blog"){
			echo "<title>写博客</title>";
			echo '标题<br /><form action="./?mode=report/blog" method="post">
			<input class="button button-glow button-border button-rounded button-primary" type="text" name="t">
			<br>内容<br>        
			<textarea class="button button-glow button-border button-rounded button-primary" name="BLOG" rows="3000" cols="80"></textarea><br>        
			<input class="button button-glow button-border button-rounded button-primary" type="submit"><br><br>
			<br>
			<a class="button button-glow button-border button-rounded button-primary" href="./">主页</a>';
		}
		if ($_GET["mode"]=="report/blog"){
			$id=read("USERDATA/Blog/blog.config");
			$id1=$id+1;
			write("USERDATA/Blog/".$id1.".blogdata",$_POST["BLOG"]);
			write("USERDATA/Blog/blog.config",$id1);
			write("USERDATA/Blog/".$id1.".username",$username);
			write("USERDATA/Blog/".$id1.".t",$_POST["t"]);
			write("USERDATA/Blog/".$id1.".l","UNLOCK");
			write("USERDATA/Blog/".$id1.".cn","0");
			echo "Writing Complete";
			jumpurl('./?mode=user/blogcenter');
			exit ;
		}
		if ($_GET["mode"]=="blogpage"){
			$bloglock=read("USERDATA/Blog/".$_GET["id"].".l");
			if ($bloglock=="UNLOCK"){
				$t=read("USERDATA/Blog/".$_GET["id"].".t");
				$b=read("USERDATA/Blog/".$_GET["id"].".blogdata");
				$a=read("USERDATA/Blog/".$_GET["id"].".username");
				echo "<title>文章-".$t."</title>";
				echo "<big>".$t."</big><br>".chunk_split($b,50)."<br>作者-".$a."<br><br>";
				if ($a==$username){
					echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./?mode=user/modifyblog&id=".$_GET["id"]."&lock=1&h=blogpage'>锁定这篇文章</a><br><br>";
				}else {
					if ($admin=="yes"){
						echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./?mode=user/modifyblog&id=".$_GET["id"]."&lock=3&h=blogpage'>管理员权限锁定这篇文章</a><br><br>";
					}
				}
				echo "评论:<br><br>";
				$cid=read("USERDATA/Blog/".$_GET["id"].".cn");
				if ($cid!="0"){
					while ($cid>0){
						$cd=read("USERDATA/Blog/".$_GET["id"].".cnd".$cid);
						$cu=read("USERDATA/Blog/".$_GET["id"].".cnu".$cid);
						echo "---------<br>".$cd."<br>---------<br>by-".$cu."<br><br>";
						$cid=$cid-1;
					}
				}else {
					echo "没有任何评论<br><br>";
				}
				echo '你的评论 <br />
				<form action="./?mode=blog/commentreport&id='.$_GET["id"].'" method="post">        <textarea class="button button-glow button-border button-rounded button-primary" name="comment" rows="5" cols="15"></textarea><br>        <input class="button button-glow button-border button-rounded button-primary" type="submit">';
				echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./'>主页</a>";
			}else {
				if ($admin!="yes"){
					if ($bloglock!="ADMINLOCK"){
						$a=read("USERDATA/Blog/".$_GET["id"].".username");
						if ($username!=$a){
							echo "<title>错误</title>";
							echo "被锁定或删除";
							echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./'>主页</a>";
						}else {
							echo "<title>文章-".$t."-已锁定</title>";
							$t=read("USERDATA/Blog/".$_GET["id"].".t");
							$b=read("USERDATA/Blog/".$_GET["id"].".blogdata");
							$a=read($ga,"USERDATA/Blog/".$_GET["id"].".username");
							echo "<big>".$t."</big><br>".$b."<br>    作者-".$a."<br><br>";
							echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./?mode=user/modifyblog&id=".$_GET["id"]."&lock=0&h=blogpage'>解锁</a><br>";
							echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./'>主页</a>";
						}
					}else {
						$a=read("USERDATA/Blog/".$_GET["id"].".username");
						if ($username!=$a){
							echo "<title>错误</title>";
							echo "被锁定或删除";
							echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./'>主页</a>";
						}else {
							echo "<title>错误</title>";
							echo "这篇文章被管理员锁定";
							echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./'>主页</a>";
						}
					}
				}else {
					echo "<title>文章-".$t."-已锁定</title>";
					$t=read("USERDATA/Blog/".$_GET["id"].".t");
					$b=read("USERDATA/Blog/".$_GET["id"].".blogdata");
					$a=read("USERDATA/Blog/".$_GET["id"].".username");
					echo "<big>".$t."</big><br>".$b."<br>    作者-".$a."<br><br>";
					echo "<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./?mode=user/modifyblog&id=".$_GET["id"]."&lock=0&h=blogpage'>解锁</a><br>";
					echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./'>主页</a>";
				}
			}
		}
		if ($_GET["mode"]=="blog/commentreport"){
			$cid=read("USERDATA/Blog/".$_GET["id"].".cn");
			write("USERDATA/Blog/".$_GET["id"].".cn",$cid+1);
			$cid=$cid+1;
			write("USERDATA/Blog/".$_GET["id"].".cnd".$cid,$_POST["comment"]);
			write("USERDATA/Blog/".$_GET["id"].".cnu".$cid,$username);
			jumpurl('./?mode=blogpage&id='.$_GET["id"]);
			exit ;
		}
		if ($_GET["mode"]=="user/modifyblog"){
			$bloglock=read("USERDATA/Blog/".$_GET["id"].".l");
			$bloguser=read("USERDATA/Blog/".$_GET["id"].".username");
			if ($username==$bloguser || $admin=="yes"){
				if ($_GET["lock"]=="3" && $admin="yes"){
					write("USERDATA/Blog/".$_GET["id"].".l","ADMINLOCK");
					jumpurl('./?mode=blogpage&id='.$_GET["id"].'');
					exit ;
				}
				if ($_GET["delete"]=="0"){
					$t=read("USERDATA/Blog/".$_GET["id"].".t");
					$b=read("USERDATA/Blog/".$_GET["id"].".blogdata");
					echo "<title>修改文章</title>";
					echo '修改你的文章<br />
						  <form action="./?mode=user/blogmodifyreport&id='.$_GET["id"].'" method="post">        <textarea class="button button-glow button-border button-rounded button-primary" type="text" name="t">'.$t.'</textarea><br>        <textarea name="BLOG" rows="20" cols="50">'.$b.'</textarea><br>        <input class="button button-glow button-border button-rounded button-primary" type="submit">        ';
					echo "<br><br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./'>主页</a>";
				}
				if ($_GET["delete"]=="1"){
		
					$bloguser=read($getbloguser,filesize("USERDATA/Blog/".$_GET["id"].".username"));
					if ($username==$bloguser || $admin=="yes"){
						write("USERDATA/Blog/".$_GET["id"].".t","DELETE");
						write("USERDATA/Blog/".$_GET["id"].".blogdata","DELETE");
						write("USERDATA/Blog/".$_GET["id"].".username","DELETE");
						write("USERDATA/Blog/".$_GET["id"].".l","LOCKED");
						echo "ok";
						jumpurl('./?mode=user/blogcontrol');
						exit ;
					}
				}
				if ($_GET["lock"]=="1"){
					if ($bloglock=="UNLOCK"){
						write("USERDATA/Blog/".$_GET["id"].".l","LOCKED");
						jumpurl('./?mode='.$_GET["h"]."&id=".$_GET["id"]);
						exit ;
					}else {
						if ($bloglock=="LOCKED"){
							jumpurl('./?mode='.$_GET["h"]."&id=".$_GET["id"]);
							exit ;
						}else {
							if ($admin=="yes"){
								echo "通过后台管理!";
							}
						}
					}
				}
				if ($_GET["lock"]=="0"){
					if ($bloglock=="LOCKED"){
						write("USERDATA/Blog/".$_GET["id"].".l","UNLOCK");
						jumpurl('./?mode='.$_GET["h"]."&id=".$_GET["id"]);
						exit ;
					}else {
						if ($admin=="yes"){
							write("USERDATA/Blog/".$_GET["id"].".l","UNLOCK");
							jumpurl('./?mode='.$_GET["h"]."&id=".$_GET["id"]);
							exit ;
						}else {
							write ("userwaring",$username);
							echo "能来到这里，说明你想。。。呵呵(录入统计)";
						}
					}
				}
			}else {
				echo "<title>警告</title>";
				echo "你只可以修改自己的文章,".$username."!";
				echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./'>主页</a>";
			}
		}
		if ($_GET["mode"]=="user/blogcontrol"){
			echo "<title>博客管理</title>";
			$id="1";
			$bid=read("USERDATA/Blog/blog.config");
			while ($bid>"0"){
				$fusername=read("USERDATA/Blog/".$bid.".username");
				if ($fusername==$username){
					$tname=read("USERDATA/Blog/".$bid.".t");
					echo $tname."----><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./?mode=user/modifyblog&id=".$bid."&delete=0'>修改</a>--<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./?mode=user/modifyblog&id=".$bid."&delete=1'>删除</a>";
					$lock=read("USERDATA/Blog/".$bid.".l");
					if ($lock=="UNLOCK"){
						echo "--<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./?mode=user/modifyblog&id=".$bid."&lock=1&h=user/blogcontrol'>锁定</a><br>";
					}else {
						echo "--<a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./?mode=user/modifyblog&id=".$bid."&lock=0&h=user/blogcontrol'>解锁</a><br>";
					}
					$bid=$bid-1;
					$id=$id+1;
				}else {
					$bid=$bid-1;
				}
			}
			if ($id=="1"){
				echo "你没有文章";
			}
			echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./'>主页</a>";
		}
		if ($_GET["mode"]=="user/blogmodifyreport"){
			$bloguser=read("USERDATA/Blog/".$_GET["id"].".username");
			if ($username==$bloguser){
				write("USERDATA/Blog/".$_GET["id"].".t",$_POST["t"]);
				write("USERDATA/Blog/".$_GET["id"].".blogdata",$_POST["BLOG"]);
				echo "ok";
				jumpurl('./?mode=user/blogcontrol');
				exit ;
			}else {
				echo "<title>警告</title>";
				echo "你只可以修改你自己的文章,".$username."!";
				echo "<br><a class='button button-glow button-border button-rounded button-primary' class='button button-glow button-border button-rounded button-primary' href='./'>主页</a>";
			}
		}
		if ($_GET["mode"]=="chat"){
			if ($_GET["channel"]!=""){
				$roomid="=+>频道名称:".$_GET["channel"]."<+=";
			}else {
				$roomid="";
			}
			echo "<title>聊天室".$roomid."</title>";
			echo '<script type="text/javascript">$(function(){$("#btn").bind("click",{btn:$("#btn")},function(evdata){     $.ajax({             type:"POST",             dataType:"json",             url:"./?mode=chat/data",timeout:10000,data:{time:"3",channel:"'.$_GET["channel"].'"},          success:function(data,textStatus){            console.log(evdata);            if(data.success=="1"){                   document.getElementById("msg").innerHTML=data.text;              evdata.data.btn.click();            }                 if(data.success=="0"){                   $("#msg").append("");                   evdata.data.btn.click();            }          },          error:function(XMLHttpRequest,textStatus,errorThrown){          console.log(textStatus);          if(textStatus=="parsererror"){          document.getElementById("msg").innerHTML="超时";          evdata.data.btn.click();          }          }          });          });          });        </script>    ';
			echo $roomid."<br>";
			echo '<div id="msg"><input class="button button-glow button-border button-rounded button-primary" id="btn" type="button" value="显示消息" /></div><br>        <IFRAME SRC="./?mode=chat/send&channel='.$_GET["channel"].'" width="300" height="120" frameborder="no" border="0" MARGINWIDTH="0" MARGINHEIGHT="0" SCROLLING="no"></IFRAME><br>';
			echo '<br><IFRAME SRC="./?mode=chat/clear&channel='.$_GET["channel"].'" width="200" height="80" frameborder="no" border="0" MARGINWIDTH="0" MARGINHEIGHT="0" SCROLLING="no"></IFRAME><br>--------------------<br><IFRAME SRC="./?mode=chat/sendpicture&channel='.$_GET["channel"].'" width="200" height="100" frameborder="no" border="0" MARGINWIDTH="0" MARGINHEIGHT="0" SCROLLING="no"></IFRAME><br>--------------------';
			echo '<br><a class="button button-glow button-border button-rounded button-primary" href="./?mode=chat/createchannel">创建频道</a><br><a class="button button-glow button-border button-rounded button-primary" href="./?mode=chat/intochannel">进入频道</a><br>--------------------<br>';
			echo '<br><IFRAME SRC="./?mode=ping" width="200" height="50" frameborder="no" border="0" MARGINWIDTH="0" MARGINHEIGHT="0" SCROLLING="no"></IFRAME>';
			echo "<br><a class='button button-glow button-border button-rounded button-primary' href='./'>主页</a>";
		}
		if ($_GET["mode"]=="chat/data"){
			//if(empty($_POST['time'])) exit();     
			set_time_limit(0);
			//无限请求超时时间     
			$i=0;
			$num=read("CHATDATA/chat".$_POST["channel"]);
			$daa="";
			$a=1;
			if ($num!="0"){
				$num=$num+1;
				while ($num>$a){
					$omsg=read("CHATDATA/".$_POST["channel"].".".$a);
					$user=read("CHATDATA/".$_POST["channel"].".".$a.".username");
					$s="./^((ht|f)tps?):\/\/([\w\-]+(\.[\w\-]+)*\/)*[\w\-]+(\.[\w\-]+)*\/?(\?([\w\-\.,@?^=%&:\/~\+#]*)+)?/";
					if (preg_match($s,$omsg)){
						$omsg="<a href='./?mode=shortedurl&code=".shorturl ($omsg,5)."'>".$omsg."</a>";
					}
					$daa=$daa.$user.":".$omsg."<br><br>";
					$a=$a+1;
				}
				sleep(0.85);
				$arr=array ('success'=>"1",'text'=>$daa);
				echo json_encode($arr);
			}else {
				sleep(2);
				$arr=array ('success'=>"1",'text'=>"无消息");
				echo json_encode($arr);
			}
		}
		if ($_GET["mode"]=='chat/send'){
			if ($_GET["clear"]=="1"){
				write("CHATDATA/chat".$_GET['channel'],"0");
				jumpurl('./?mode=chat/clear'."&channel=".$_GET["channel"]);
				exit ;
			}else {
				echo '<form action="./?mode=chat/report&channel='.$_GET["channel"].'" method="post">
				<input class="button button-glow button-border button-rounded button-primary" type="text" name="t"><br>      
				<input class="button button-glow button-border button-rounded button-primary" value="发送" type="submit">';
			}
		}
		if ($_GET["mode"]=="chat/clear"){
			echo "<a class='button button-glow button-border button-rounded button-primary' href='./?mode=chat/send&channel=".$_GET["channel"]."&clear=1'>清空信息</a>";
		}
		if ($_GET["mode"]=="chat/report"){
			$num=read("CHATDATA/chat".$_GET['channel']);
			$num=$num+1;
			write("CHATDATA/chat".$_GET['channel'],$num);
			if ($_GET["sendmode"]==""){
				write("CHATDATA/".$_GET["channel"].".".$num,$_POST["t"]);
				write("CHATDATA/".$_GET["channel"].".".$num.".username",$username);
				jumpurl('./?mode=chat/send'."&channel=".$_GET["channel"]);
				exit ;
			}
			if ($_GET["sendmode"]=="p"){
				write("CHATDATA/".$_GET["channel"].".".$num,"<img src='CLOUD/".$username."./".$_GET["file"]."'>");
				write("CHATDATA/".$_GET["channel"].".".$num.".username",$username);
				jumpurl('./?mode=chat/sendpicture'."&channel=".$_GET["channel"]);
				exit ;
			}
		}
		if ($_GET["mode"]=="chat/createchannel"){
			echo "<title>创建频道</title>";
			echo '频道名称:<form action="./?mode=chat/channelreport" method="post">    <input class="button button-glow button-border button-rounded button-primary" type="text" name="channel"><br>    <input class="button button-glow button-border button-rounded button-primary" type="submit"><br>    <a class="button button-glow button-border button-rounded button-primary" href="./?mode=chat">聊天室</a>    ';
		}
		if ($_GET["mode"]=="chat/channelreport"){
			if ($_GET["into"]!="1"){
				if (file_exists("CHATDATA/chat".$_POST['channel'])){
					echo "<title>错误</title>";
					echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=chat/createchannel">频道已存在</a>';
				}else {
					write("CHATDATA/chat".$_POST['channel'],"0");
					jumpurl('./?mode=chat'."&channel=".$_POST["channel"]);
					exit ;
				}
			}else {
				if (file_exists("CHATDATA/chat".$_POST["channel"])){
					jumpurl('./?mode=chat'."&channel=".$_POST["channel"]);
					exit ;
				}else {
					echo "<title>错误</title>";
					echo "<a class='button button-glow button-border button-rounded button-primary' href='./?mode=chat'>频道不存在</a>";
				}
			}
		}
		if ($_GET["mode"]=="chat/intochannel"){
			echo "<title>进入频道</title>";
			echo '频道名称:<form action="./?mode=chat/channelreport&into=1" method="post">          <input type="text" name="channel"><br>          <input class="button button-glow button-border button-rounded button-primary" type="submit"><br>          <a class="button button-glow button-border button-rounded button-primary" href="./?mode=chat">聊天室</a>          ';
		}
		if ($_GET["mode"]=="ping"){
			$ping=0;
			if ($_GET["ping"]!="end"){
				$ping_start=microtime(1);
				write("USERDATA/".$username."/ping",$ping_start);
				jumpurl('./?mode=ping&ping=end');
				exit;
			}else {
				$ping_start=read("USERDATA/".$username."/ping");
				$ping_end=microtime(1);
				$ping=$ping_end-$ping_start;
				$ping=$ping*1000;
				$ping=round($ping,2);
				if ($ping>=1000){
					$ping=$ping/1000;
					$ping=round($ping,2);
					$ping=$ping."秒";
				}else {
					$ping=$ping."毫秒";
				}
				echo "延迟:".$ping;
				echo '<meta http-equiv="refresh" content="5; URL=./?mode=ping"> ';
			}
		}
		if ($_GET["mode"]=="cloud" && $admin=="yes"){
			echo "<title>云盘</title>";
			setlocale(LC_ALL,'zh_CN.GBK');
			$dir='CLOUD/'.$username."/".$_GET["dir"]."/";
			$files1=scandir($dir);
			$number=count($files1);
			$h=1;
			while ($number>$h){
				if (is_dir("CLOUD/".$username."/".$_GET["dir"]."/".basename($files1[$h]))){
					if (basename($files1[$h]=="..")){
						echo "<a class='button button-glow button-border button-rounded button-primary' href='./?mode=cloud&dir=".$_GET["dir"]."/../'>返回</a><br>";
						$h=$h+1;
					}else {
						echo "目录--<a class='button button-glow button-rounded button-border button-highlight' href='./?mode=cloud&dir=".$_GET["dir"]."/".basename($files1[$h])."'>".basename($files1[$h])."</a>--<a class='button button-glow button-border button-rounded button-primary' href='./?mode=cloud/control&name=".basename($files1[$h])."&cloudmode=rename&dir=".$_GET["dir"]."'>重新命名</a>--<a class='button button-glow button-border button-rounded button-primary' href='./?mode=cloud/control&cloudmode=deletedir&name=".basename($files1[$h])."&dir=".$_GET["dir"]."'>删除</a><br>";
						$h=$h+1;
					}
				}else {
					$size=filesize("CLOUD/".$username."/".$_GET["dir"]."/".basename($files1[$h]))/1024;
					$size=round($size,2);
					$rawsize=round($size,2);
					if ($size<"1024"){
						$size=$size."KB";
					}
					if ($size>"1024"){
						$size=$size/1024;
						$size=round($size,2);
						$size=$size."MB";
					}
					if (!filesize("CLOUD/".$username."/".$_GET["dir"]."/".basename($files1[$h]))){
						$size="错误";
					}
					echo basename($files1[$h])."-".$size."--<a class='button button-glow button-border button-rounded button-primary' href='./?mode=cloud/control&cloudmode=delete&name=".basename($files1[$h])."&dir=".$_GET["dir"]."'>删除</a>--<a class='button button-glow button-border button-rounded button-primary' href='./?mode=cloud/download&filename=".basename($files1[$h])."&dir=".$_GET["dir"]."'>下载</a>--<a class='button button-glow button-border button-rounded button-primary' href='./?mode=cloud/control&name=".basename($files1[$h])."&cloudmode=rename&dir=".$_GET["dir"]."'>重新命名</a>--<a class='button button-glow button-border button-rounded button-primary' href='./?mode=cloud/control&cloudmode=share&name=".basename($files1[$h])."&dir=".$_GET["dir"]."'>分享</a>";
					if ($rawsize<"1000"){
						echo "--<a class='button button-glow button-border button-rounded button-primary' href='./?mode=cloud/control&cloudmode=show&name=".basename($files1[$h])."&dir=".$_GET["dir"]."'>以纯文本形式查看</a><br>";
					}else {
						echo "<br>";
					}
					$h=$h+1;
				}
			}
			if ($h=="2"){
				echo "这里没有任何文件";
			}
			echo '            <br><a class="button button-glow button-border button-rounded button-primary" href="./?mode=cloud/control&dir='.$_GET["dir"].'&cloudmode=cnd">创建新目录</a>            <form id="form" action="./?mode=cloud/upload&dir='.$_GET["dir"]."/".'" method="post"            enctype="multipart/form-data">            <br>            <label id="realBtn">            <input class="button button-glow button-border button-rounded button-primary" type="file" name="file" style="left:-9999em;position:absolute;" id="file" />            <span  class="button button-glow button-border button-rounded button-primary"><div id="1">选择文件</div></span><br>            </label>            <input class="button button-glow button-border button-rounded button-primary" type="submit" name="submit" value="上传" />            <br>            </form>            <a class="button button-glow button-border button-rounded button-primary" href="./?mode=cloud">主目录</a><br><br>            <a class="button button-glow button-border button-rounded button-primary" href="./">主页</a>            ';
		}
		if ($_GET["mode"]=="cloud/control" && $admin=="yes"){
			if ($_GET["cloudmode"]=="delete"){
				unlink("CLOUD/".$username."/".$_GET["dir"]."/".$_GET["name"]);
				echo "CLOUD/".$username."/".$_GET["dir"]."/".$_GET["name"];
				jumpurl('./?mode=cloud&dir='.$_GET["dir"]);
				exit ;
			}
			if ($_GET["cloudmode"]=="rename"){
				echo "<title>重新命名</title>";
				echo '新名字<form action="./?mode=cloud/control&cloudmode=renameend&name='.$_GET["name"].'&dir='.$_GET["dir"].'" method="post">      <input type="text" name="newname" /><br />      <input type="submit" name="submit" class="button button-glow button-border button-rounded button-primary" value="重新命名" />      </form><br>      <a class="button button-glow button-border button-rounded button-primary" href="./?mode=cloud">Cloud</a>      ';
			}
			if ($_GET["cloudmode"]=="renameend"){
				rename ("CLOUD/".$username."/".$_GET["dir"]."/".$_GET["name"],"CLOUD/".$username."/".$_GET["dir"]."/".$_POST["newname"]);
				jumpurl('./?mode=cloud&dir='.$_GET["dir"]);
				exit ;
			}
			if ($_GET["cloudmode"]=="show"){
				echo "<title>纯文本查看</title>";
				if (!readfile("CLOUD/".$username."/".$_GET["dir"]."/".$_GET["name"])){
					echo "错误";
				}
				echo "<br><br><br><a class='button button-glow button-border button-rounded button-primary' href='./?mode=cloud'>云主页</a>";
			}
			if ($_GET["cloudmode"]=="deletedir"){
				function  dir_is_empty ($dir){
					if ($handle=opendir($dir)){
						while ($item=readdir($handle)){
							if ($item!="." && $item!="..")return false;
						}
					}
					return true;
				}
				if (dir_is_empty ("CLOUD/".$username."/".$_GET["dir"]."/".$_GET["name"])){
					rmdir("CLOUD/".$username."/".$_GET["dir"]."/".$_GET["name"]);
					jumpurl('./?mode=cloud&dir='.$_GET["dir"]);
					exit ;
				}else {
					echo "<title>错误</title>";
					echo "要删除此目录，请先删除目录下所有-文件/目录-";
					echo '<meta http-equiv="refresh" content="1; URL=./?mode=cloud&dir='.$_GET["dir"].'">';
				}
			}
			if ($_GET["cloudmode"]=="cnd"){
				echo "<title>创建目录</title>";
				echo '目录名<form action="./?mode=cloud/control&cloudmode=cndend&name='.$_GET["name"].'&dir='.$_GET["dir"].'" method="post">          <input type="text" name="name" /><br />          <input class="button button-glow button-border button-rounded button-primary" type="submit" name="submit" value="创建" />          </form><br>!目录名请不要以空格结尾<br>          <a class="button button-glow button-border button-rounded button-primary" href="./?mode=cloud">云主页</a>          ';
			}
			if ($_GET["cloudmode"]=="cndend"){
				mkdir("CLOUD/".$username."/".$_GET["dir"]."/".$_POST["name"]);
				jumpurl('./?mode=cloud&dir='.$_GET["dir"]);
				exit ;
			}
			if ($_GET["cloudmode"]=="share"){
				echo "<title>外链分享</title>";
				if (file_exists("USERDATA/".$username."/share")){
					$hid=read("USERDATA/".$username."/share");
					write("USERDATA/".$username."/share",$hid+1);
				}else {
					write("USERDATA/".$username."/share","1");
					$hid=1;
				}
				write("USERDATA/".$username."/share-".$hid,"CLOUD/".$username."/".$_GET["dir"]."/".$_GET["name"]);
				$link1="./?mode=cloud/share&name=".$_GET["name"]."&user=".$username."&id=".$hid;
				$link=$link1;
				echo "外链:<a class='button button-glow button-border button-rounded button-highlight' href='".$link."'>".$link."</a>";
				echo '<br><a class="button button-glow button-border button-rounded button-primary" href="./?mode=cloud">云主页</a>';
			}
		}
		if ($_GET["mode"]=="cloud/download" && $admin=="yes"){
			if (file_exists("CLOUD/".$username."/".$_GET["dir"]."/".$_GET["filename"])){
				header("Content-Type: application/force-download");
				header("Content-Disposition: attachment; filename=".$_GET["filename"]);
				readfile("CLOUD/".$username."/".$_GET["dir"]."/".$_GET["filename"]);
			}else {
				echo "<title>错误</title>";
				echo "<div align=center>";
				echo "文件不存在";
				echo "</div>";
				echo '<meta http-equiv="refresh" content="1; URL=./?mode=cloud&dir='.$_GET['dir'].'">';
			}
		}
		if ($_GET["mode"]=="cloud/upload" && $admin=="yes"){
			if ($_FILES["file"]["error"]>0){
				if ($_FILES["file"]["error"]!="4"){
					echo "Return Code: ".$_FILES["file"]["error"]."<br />";
				}else {
					jumpurl('./?mode=cloud&dir='.$_GET["dir"]);
					exit ;
				}
			}else {
				echo "Upload: ".$_FILES["file"]["name"]."<br />";
				echo "Type: ".$_FILES["file"]["type"]."<br />";
				echo "Size: ".($_FILES["file"]["size"]/1024)." Kb<br />";
				echo "Temp file: ".$_FILES["file"]["tmp_name"]."<br />";
				move_uploaded_file($_FILES["file"]["tmp_name"],"CLOUD/".$username."/".$_GET["dir"]."/".$_FILES["file"]["name"]);
				echo "Stored in: "."CLOUD/".$_FILES["file"]["name"];
				jumpurl('./?mode=cloud&dir='.$_GET["dir"]);
				exit ;
			}
		}
		if ($_GET["mode"]=="logout"){
			session_destroy();
			jumpurl("./?mode=logged");
		}
		if ($_GET["mode"]=="chat/sendpicture"){
			echo '<form action="./?mode=chat/cloud&channel='.$_GET["channel"].'" method="post"      enctype="multipart/form-data">      <label id="realBtn">      <input class="button button-glow button-border button-rounded button-primary" type="file" name="file" style="left:-9999em;position:absolute;" id="file" />      <span  class="button button-glow button-border button-rounded button-primary"><div id="1">选择图片</div></span><br>      </label>      <input class="button button-glow button-border button-rounded button-primary" type="submit" name="submit" value="发送" />      <br>      </form><br>';
		}
		if ($_GET["mode"]=="chat/cloud"){
			move_uploaded_file($_FILES["file"]["tmp_name"],"CLOUD/".$username."/".$_FILES["file"]["name"]);
			echo "Stored in: "."CLOUD/p/".$_FILES["file"]["name"];
			jumpurl('./?mode=chat/report&sendmode=p&file='.$_FILES["file"]["name"]).'&channel='.$_GET["channel"];
			exit ;
		}
		if ($_GET["mode"]=="admin/center" && $admin=="yes"){
			echo "<title>管理中心</title>";
			echo "欢迎来到管理中心,".$username."!<br><br>";
			echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=admin/usermanagement">用户管理</a><br><br>';
			echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=admin/blogcontrol">博客管理</a><br><br>';
			echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=admin/shorturl">短链接管理</a><br><br>';
			echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=update">升级</a><br><br>';
			echo "<br><a class='button button-glow button-border button-rounded button-primary' href='./?mode=logged'>主页</a>";
		}
		if ($_GET["mode"]=="admin/usermanagement" && $admin=="yes"){
			echo "<title>用户管理</title>";
			$id=read("USERDATA/N/n.config");
			while ($id!="0"){
				$username1=read("USERDATA/N/".$id.".config");
				if ($username1!="DELETE"){
					$admindeputy=read("USERDATA/deputy.admin");
					if ($username!=$admindeputy){
						if ($username=="admin"){
							$username1=read("USERDATA/N/".$id.".config");
							$admi=read("USERDATA/".$username1."/admin");
							$id=$id-1;
							if ($username1!=$admindeputy){
								if ($username1!="admin"){
									if ($admi=="yes"){
										$id=$id+1;
										echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>---------><a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/usermanagementreport&username='.$username1.'&delete=1">解除管理员权限</a>--<a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/usermanagementreport&username='.$username1.'&nid='.$id.'&delete=2">删除用户</a>--<a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/changepasswordreport&username='.$username1.'">修改密码</a><br>';
										$id=$id-1;
									}else {
										$id=$id+1;
										echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>---------><a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/usermanagementreport&username='.$username1.'&delete=0">设为管理员</a>--<a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/usermanagementreport&username='.$username1.'&nid='.$id.'&delete=2">删除用户</a>--<a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/changepasswordreport&username='.$username1.'">修改密码</a><br>';
										$id=$id-1;
									}
								}else {
									$id=$id+1;
									echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>--<a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/changepasswordreport&username='.$username1.'">修改密码</a><br>';
									$id=$id-1;
								}
							}else {
								$id=$id+1;
								echo $username1."<br>";
								if ($username1==$username){
									echo '--<a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/changepasswordreport&username='.$username1.'">修改密码</a><br>';
								}
								$id=$id-1;
							}
						}else {
							$username1=read("USERDATA/N/".$id.".config");
							$admi=read("USERDATA/".$username1."/admin");
							$id=$id-1;
							if ($admi=="yes"){
								$id=$id+1;
								echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>--------->权限不够';
								if ($username1==$username){
									echo '--<a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/changepasswordreport&username='.$username1.'" >修改密码</a><br>';
								}
								$id=$id-1;
							}else {
								$id=$id+1;
								echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>--------->权限不够--<a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/usermanagementreport&username='.$username1.'&nid='.$id.'&delete=2">删除用户</a>--<a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/changepasswordreport&username='.$username1.'">修改密码</a><br>';
								$id=$id-1;
							}
						}
					}else {
						$username1=read("USERDATA/N/".$id.".config");
						$admi=read("USERDATA/".$username1."/admin");
						$id=$id-1;
						if ($username1!=$admindeputy){
							if ($username1!="admin"){
								if ($admi=="yes"){
									$id=$id+1;
									echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>---------><a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/usermanagementreport&username='.$username1.'&delete=1">解除管理员权限</a>--<a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/usermanagementreport&username='.$username1.'&nid='.$id.'&delete=2">删除用户</a>--<a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/changepasswordreport&username='.$username1.'">修改密码</a><br>';
									$id=$id-1;
								}else {
									$id=$id+1;
									echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>---------><a class="button button-border button-glow button-rounded button-border button-highlight" href="./?mode=admin/usermanagementreport&username='.$username1.'&delete=0">设为管理员</a>--<a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/usermanagementreport&username='.$username1.'&nid='.$id.'&delete=2">删除用户</a>--<a class="button button-glow button-rounded button-border button-highlight" href="./?mode=admin/changepasswordreport&username='.$username1.'">修改密码</a><br>';
									$id=$id-1;
								}
							}else {
								$id=$id+1;
								echo $username1."<br>";
								$id=$id-1;
							}
						}else {
							$id=$id+1;
							echo '<span class="button button-glow button-rounded button-raised button-primary">'.$username1.'</span>--<a class="button button-border button-glow button-rounded button-border button-highlight" href="./?mode=admin/changepasswordreport&username='.$username1.'">修改密码</a><br>';
							$id=$id-1;
						}
					}
				}else {
					echo $id."--用户已被删除<br>";
					$id=$id-1;
				}
			}
			echo "<br><br><a class='button button-glow button-border button-rounded button-primary' href='./?mode=admin/center'>管理中心</a>";
		}
		if ($_GET["mode"]=="admin/usermanagementreport"){
			$admindeputy=read("USERDATA/deputy.admin");
			if ($username!=$admindeputy){
				if ($_GET['username']!="admin"){
					if ($_GET["delete"]=="0"){
						write("USERDATA/".$_GET["username"]."/admin","yes");
						echo "用户-".$_GET['username']."----成为管理员<br>";
						jumpurl('./?mode=admin/usermanagement');
						exit ;
					}
					if ($_GET["delete"]=="1"){
						write("USERDATA/".$_GET["username"]."/admin","no");
						echo "管理员".$_GET['username']."----被解除了管理员权限<br>";
						jumpurl('./?mode=admin/usermanagement');
						exit ;
					}
					if ($_GET["delete"]=="2"){
						write("USERDATA/".$_GET["username"]."/password.json","DELETE");
						write("USERDATA/".$_GET["username"]."/ssid","DELETE");
						write("USERDATA/".$_GET["username"]."/admin","DELETE");
						write("USERDATA/N/".$_GET["nid"].".config","DELETE");
						echo "用户已删除";
						jumpurl('./?mode=admin/usermanagement');
						exit ;
					}
				}else {
					echo "<title>错误</title>";
					echo "管理员-admin除了密码不能被改变<br>";
					echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=admin/center">控制中心</a><br>';
				}
			}else {
				if ($_GET["username"]!="admin"){
					if ($_GET["delete"]=="0"){
						write("USERDATA/".$_GET["username"]."/admin","yes");
						echo "用户-".$_GET['username']."----成为了管理员<br>";
						jumpurl('./?mode=admin/usermanagement');
						exit ;
					}
					if ($_GET["delete"]=="1"){
						write("USERDATA/".$_GET["username"]."/admin","no");
						echo "管理员-".$_GET['username']."----被解除了管理员权限<br>";
						jumpurl('./?mode=admin/usermanagement');
						exit ;
					}
					if ($_GET["delete"]=="2"){
						write("USERDATA/".$_GET["username"]."/password.json","DELETE");
						write("USERDATA/".$_GET["username"]."/ssid","DELETE");
						write("USERDATA/".$_GET["username"]."/admin","DELETE");
						write("USERDATA/N/".$_GET["nid"].".config","DELETE");
						echo "用户已删除";
						jumpurl('./?mode=admin/usermanagement');
						exit ;
					}
				}else {
					echo "<title>错误</title>";
					echo "管理员-admin除了密码不能被改变<br>";
					echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=admin/center">控制中心</a><br>';
				}
			}
		}
		if ($_GET["mode"]=="admin/changepasswordreport" && $admin=='yes'){
			echo '<form action="./?mode=admin/changepasswordreporting&username='.$_GET["username"].'" method="post">新密码:<input class="button button-glow button-border button-rounded button-primary" type="password" name="password"><br><input class="button button-glow button-border button-rounded button-primary" type="submit"></form>';
			echo '<br><a class="button button-glow button-border button-rounded button-primary" href="./?mode=admin/center">控制中心</a>';
		}
		if ($_GET["mode"]=="update" && $admin=="yes"){
			echo "<title>升级</title>";
			echo '<form id="form" action="./?mode=updatereport" method="post"  enctype="multipart/form-data">            <input class="button button-glow button-border button-rounded button-primary" type="file" name="file" id="file" />            
				  <input class="button button-glow button-border button-rounded button-primary" type="submit" name="submit" value="升级" />';
			echo "<br><br><a class='button button-glow button-border button-rounded button-primary' href='./?mode=admin/center'>管理中心</a>";
		}
		if ($_GET["mode"]=="updatereport" && $admin=="yes"){
			move_uploaded_file($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]);
			echo "<title>升级完毕</title>";
			echo "升级完毕。";
			echo '<br><a class="button button-glow button-border button-rounded button-primary" href="./?mode=admin/center">管理中心</a><br>';
		}
		if ($_GET["mode"]=="admin/changepasswordreporting" && $admin=="yes"){
			$admindeputy=read("USERDATA/deputy.admin");
			if ($username!=$admindeputy){
				if ($username!="admin"){
					if ($username==$_GET["username"]){
						write("USERDATA/".$_GET["username"]."/password.json",md5($_POST["password"]));
						echo "<title>密码已修改</title>";
						echo "密码已修改<br>";
						echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=admin/usermanagement">管理中心</a><br>';
					}else {
						$admin1=read("USERDATA/".$_GET['username']."/admin");
						if ($admin1!="yes"){
							write("USERDATA/".$_GET["username"]."/password.json",md5($_POST["password"]));
							echo "<title>密码已修改</title>";
							echo "密码已修改<br>";
							echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=admin/usermanagement">管理中心</a><br>';
						}else {
							echo "<title>错误</title>";
							echo "管理员的密码只可以被他自己，站长，以及副站长修改<br>";
							echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=admin/usermanagement">管理中心</a><br>';
						}
					}
				}else {
					write("USERDATA/".$_GET["username"]."/password.json",md5($_POST["password"]));
					echo "<title>密码已修改</title>";
					echo "密码已修改<br>";
					echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=admin/usermanagement">管理中心</a><br>';
				}
			}else {
				if ($_GET["username"]!=$_GET["username"]){
					if ($_GET["username"]!="admin"){
						write("USERDATA/".$_GET["username"]."/password.json",md5($_POST["password"]));						
						echo "<title>密码已修改</title>";
						echo "密码已修改<br>";
						echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=admin/usermanagement">管理中心</a><br>';
					}else {
						echo "<title>错误</title>";
						echo "站长的密码只可被他自己修改<br>";
						echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=admin/usermanagement">管理中心</a><br>';
					}
				}else {
					echo "<title>密码已修改</title>";
					write("USERDATA/".$_GET["username"]."/password.json",md5($_POST["password"]));					
					echo "密码已修改<br>";
					echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=admin/usermanagement">管理中心</a><br>';
				}
			}
		}
		if ($_GET["mode"]=="admin/blogcontrol" && $admin=="yes"){
			echo "<title>博客管理</title>";
			$id="1";
			$bid=read("USERDATA/Blog/blog.config");
			while ($bid>"0"){
				$fusername=read("USERDATA/Blog/".$bid.".username");
				$tname=read("USERDATA/Blog/".$bid.".t");
				if ($tname!="DELETE"){
					echo "<a class='button button-glow button-border button-rounded button-primary' href='./?mode=blogpage&id=".$bid."'>".$tname."</a>----><a class='button button-glow button-border button-rounded button-highlight' href='./?mode=admin/modifyblog&ssid=".$_SESSION["ssid"]."&id=".$bid."'>修改</a>--<a class='button button-glow button-border button-rounded button-highlight' href='./?mode=admin/modifyblog&ssid=".$_SESSION["ssid"]."&id=".$bid."&delete=1'>删除</a>";
					$lock=read("USERDATA/Blog/".$bid.".l");
					if ($lock=="UNLOCK"){
						echo "--<a class='button button-glow button-border button-rounded button-highlight' href='./?mode=admin/modifyblog&ssid=".$_SESSION["ssid"]."&id=".$bid."&lock=1'>锁定文章</a><br>";
					}else {
						echo "--<a class='button button-glow button-border button-rounded button-highlight' href='./?mode=admin/modifyblog&ssid=".$_SESSION["ssid"]."&id=".$bid."&lock=0'>解锁文章</a><br>";
					}
					$bid=$bid-1;
					$id=$id+1;
				}else {
					echo $bid."."."文章被删除<br>";
					$bid=$bid-1;
					$id=$id+1;
				}
			}
			if ($id=="1"){
				echo "没有任何博客";
			}
			echo "<br><a class='button button-glow button-border button-rounded button-primary' href='./?mode=admin/center&ssid=".$_SESSION["ssid"]."'>控制中心</a>";
		}
		if ($_GET["mode"]=="admin/modifyblog" && $admin=="yes"){
			if ($_GET["delete"]==""){
				$t=read("USERDATA/Blog/".$_GET["id"].".t");
				$b=read("USERDATA/Blog/".$_GET["id"].".blogdata");
				echo "<title>修改文章</title>";
				echo '        修改你的文章<br />        <form action="./?mode=user/blogmodifyreport&id='.$_GET["id"].'" method="post">        <textarea class="button button-glow button-border button-rounded button-primary" type="text" name="t">'.$t.'</textarea><br>        <textarea name="BLOG" rows="20" cols="50">'.$b.'</textarea><br>        <input class="button button-glow button-border button-rounded button-highlight" type="submit">        ';
				echo "<br><br><a class='button button-glow button-border button-rounded button-primary' href='./?mode=admin/center&ssid=".$_SESSION["ssid"]."'>控制中心</a>";
			}
			if ($_GET["delete"]=="1"){
				write("USERDATA/Blog/".$_GET["id"].".t","DELETE");
				write("USERDATA/Blog/".$_GET["id"].".blogdata","DELETE");
				write("USERDATA/Blog/".$_GET["id"].".username","DELETE");
				echo "ok";
				jumpurl('./?mode=admin/blogcontrol');
				exit ;
			}
			if ($_GET["lock"]=="1"){
				write("USERDATA/Blog/".$_GET["id"].".l","ADMINLOCK");
				jumpurl('./?mode=admin/blogcontrol');
				exit ;
			}
			if ($_GET["lock"]=="0"){
				write("USERDATA/Blog/".$_GET["id"].".l","UNLOCK");
				jumpurl('./?mode=admin/blogcontrol');
				exit ;
			}
		}
		if ($_GET["mode"]=="admin/blogmodify"){
			write("USERDATA/Blog/".$_GET["id"].".t",$_POST["t"]);
			write("USERDATA/Blog/".$_GET["id"].".blogdata",$_POST["BLOG"]);
			echo "ok";
			jumpurl('./?mode=admin/blogcontrol');
			exit ;
		}
		if ($_GET["mode"]=="shorturl"){
			echo '<title>缩短链接</title>原链接：<form action="./?mode=finishshortedurl" method="post">    <input class="button button-glow button-border button-rounded button-primary" type="text" name="url"><br>    <input class="button button-glow button-border button-rounded button-primary" vaule="提交" type="submit">';
			echo "<br><br><a class='button button-glow button-border button-rounded button-primary' href='./'>主页</a>";
		}
		if ($_GET["mode"]=="finishshortedurl"){
			$link=shorturl ($_POST["url"],5);
			echo "短链接:<a class='button button-glow button-border button-rounded button-highlight' href='./?mode=shortedurl&code=".$link."'>".$_SERVER['HTTP_HOST']."/?mode=shortedurl&code=".$link."</a>";
			echo "<br><a class='button button-glow button-border button-rounded button-primary' href='./'>主页</a>";
		}
		if ($_GET["mode"]=="admin/shorturl" && $admin=="yes"){
			echo "<title>短链接管理</title>";
			$n=read("USERDATA/shorturl.config","没有短链接!<br><a  class='button button-glow button-border button-rounded button-primary' href='./?mode=admin/center'>控制中心</a>");
			while ($n>0){
				$wwn=read("USERDATA/shorturl.".$n);
				$ln=read("USERDATA/".$wwn);
				if ($ln!="短链接被删除"){
					echo "<a href='./?mode=shortedurl&code=".$wwn."' class='button button-glow button-border button-rounded button-highlight'>".$wwn."--->".$ln."</a>-------<a class='button button-glow button-border button-rounded button-primary' href='./?mode=admin/shorturlcontrol&controlmode=delete&code=".$wwn."'>删除</a>---<a class='button button-glow button-border button-rounded button-primary' href='./?mode=admin/shorturlcontrol&controlmode=change&code=".$wwn."'>修改</a><br>";
				}else {
					echo $wwn."-->".$ln."<br>";
				}
				$n=$n-1;
			}
			echo "<br><a  class='button button-glow button-border button-rounded button-primary' href='./?mode=admin/center'>控制中心</a>";
		}
		if ($_GET["mode"]=="admin/shorturlcontrol" && $admin=="yes"){
			if ($_GET["controlmode"]=="delete"){
				write("USERDATA/".$_GET["code"],'短链接被删除');
				jumpurl('./?mode=admin/shorturl');
				exit ;
			}
			if ($_GET["controlmode"]=="change"){
				echo '<title>新目标链接</title>新目标链接：<form action="./?mode=admin/shorturlcontrol&code='.$_GET["code"].'&controlmode=report" method="post">      <input class="button button-glow button-border button-rounded button-primary" type="text" name="url"><br>      <input  class="button button-glow button-border button-rounded button-primary" vaule="提交" type="submit"><br>      ';
				echo "<br><a  class='button button-glow button-border button-rounded button-primary' href='./?mode=admin/shorturl'>取消</a>";
			}
			if ($_GET["controlmode"]=="report"){
				write("USERDATA/".$_GET["code"],$_POST["url"]);
				jumpurl('./?mode=admin/shorturl');
				exit ;
			}
		}
		if ($_GET["mode"]=="userpage"){
			echo "<title>个人中心</title>个人中心<br>";
			echo "<a  class='button button-glow button-border button-rounded button-primary' href='./?mode=user/changepassword'>修改密码</a><br>";
			echo "<br><a  class='button button-glow button-border button-rounded button-primary' href='./?mode=logged'>主页</a>";
		}
		if ($_GET["mode"]=="user/changepassword"){
			echo '<title>修改密码</title><form action="./?mode=user/changepasswordreport"method="post">新密码:<input class="button button-glow button-border button-rounded button-primary" type="password" name="password"><br><input class="button button-glow button-border button-rounded button-primary" type="submit"></form>';
			echo '<br><a class="button button-glow button-border button-rounded button-primary" href="./?mode=userpage">个人中心</a>';
		}
		if ($_GET["mode"]=="user/changepasswordreport"){
			write("USERDATA/".$username."/password.json",md5($_POST["password"]));
			echo "<title>密码修改成功</title>密码修改成功";
			echo '<br><a class="button button-glow button-border button-rounded button-primary" href="./?mode=userpage">个人中心</a>';
		}
	}else {
		echo "你登录的用户已被删除";
		session_destroy();
	}
}else {
	if ($_GET["mode"]!="" && $_GET["mode"]!="reg" && $_GET["mode"]!="regreport" && $_GET["mode"]!="login" && $_GET["mode"]!="loginreport"){
		if ($_GET["mode"]!="cloud/share" && $_GET["mode"]!="base64" && $_GET["mode"]!="shortedurl"){
			echo "<title>请登录或注册</title>";
			echo '<a class="button button-glow button-border button-rounded button-primary" href="./?mode=reg">注册</a> 或 <a class="button button-glow button-border button-rounded button-primary" href="./?mode=login">登录 </a>';
		}
	}
}
if ($_GET["mode"]=="base64"){
	$url=base64_decode($_GET["code"]);
	$preg='|^http://|';
	$preg2='|^https://|';
	if (!preg_match($preg,$url)&&!preg_match($preg2,$url)){
		$url='http://'.$url;
	}
	jumpurl(''.$url);
	exit ;
}
if ($_GET["mode"]=="cloud/share"){
	$d=read("USERDATA/".$_GET["user"]."/share-".$_GET["id"]);
	header("Content-Type: application/force-download");
	header("Content-Disposition: attachment; filename=".$_GET["name"]);
	readfile($d);
}
if ($_GET["mode"]=="shortedurl"){
	$url=read("USERDATA/".$_GET["code"],"短链接不存在");
	$preg='|^http://|';
	$preg2='|^https://|';
	if (!preg_match($preg,$url)&&!preg_match($preg2,$url)){
		$url='http://'.$url;
	}
	jumpurl(''.$url);
	exit ;
}
if ($_GET["mode"]!="chat/data" && $_GET["mode"]!="cloud/download" && $_GET["mode"]!="cloud/share"){
	echo '</div></body>';
}
?>