<?php 
if(strlen($_SERVER['REQUEST_URI']) > 384 || strpos($_SERVER['REQUEST_URI'], "eval(") || strpos($_SERVER['REQUEST_URI'], "base64")) {
	@header("HTTP/1.1 414 Request-URI Too Long");
	@header("Status: 414 Request-URI Too Long");
	@header("Connection: Close");
	@exit;
}
$url = $_GET['url'];
if( !empty($url) ) {
    $title = __('加载中','i_thmem');
    if ($url == base64_encode(base64_decode($url))) 
        $b =  base64_decode($url); 
    else
	    $b = $url;
} else {
    $title = __('参数缺失，正在返回首页...','i_thmem');
    $b = '//'.$_SERVER['HTTP_HOST'];
}
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes"> 
<meta name="robots" content="noindex,follow">
<title><?php echo $title ?></title>
<meta http-equiv="refresh" content="1;url=<?php echo $b; ?>">
<style>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>css加载动画</title>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  width: 100%;
  height: 100%;
}

body {
  background: #0b0b14;
  font-family: 'Inconsolata', monospace;
  overflow: hidden;
}

.arc {
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  border-top: 2px solid #ffea29;
  border-left: 1px solid transparent;
  border-right: 1px solid transparent;
  animation: rt 2s infinite linear;
}
.arc::before {
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 70px;
  height: 70px;
  border-radius: 50%;
  border-top: 2px solid #8d29ff;
  border-left: 1px solid transparent;
  border-right: 1px solid transparent;
  animation: rt 4s infinite linear reverse;
  content: "";
}
.arc::after {
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 0;
  height: 0;
  border-radius: 50%;
  border-top: initial;
  border-left: initial;
  border-right: initial;
  animation: cw 1s infinite;
  content: "";
  background: snow;
}

h1 {
  position: absolute;
  height: 40px;
  margin: auto;
  top: 200px;
  left: 0;
  right: 0;
  bottom: 0;
  text-transform: uppercase;
  text-align: center;
  letter-spacing: 0.1em;
  font-size: 14px;
  font-weight: lighter;
  color: white;
}
h1 span {
  display: none;
}
h1::after {
  animation: txt 5s infinite;
  content: "";
}

@keyframes rt {
  100% {
    transform: rotate(360deg);
  }
}
@keyframes cw {
  0% {
    width: 0;
    height: 0;
  }
  75% {
    width: 40px;
    height: 40px;
  }
  100% {
    width: 0;
    height: 0;
  }
}
@keyframes txt {
  0% {
    content: "LOADING.";
  }
  50% {
    content: "LOADING..";
  }
  100% {
    content: "LOADING...";
  }
}
</style>
</head>
<body>

<div class="arc"></div>

<h1><span>LOADING</span></h1>


</body>
</html>