<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<style type="text/css">
	/*
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
*/
/* reset */
html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,dl,dt,dd,ol,nav ul,nav li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}
article, aside, details, figcaption, figure,footer, header, hgroup, menu, nav, section {display: block;}
ol,ul{list-style:none;margin:0;padding:0;}
blockquote,q{quotes:none;}
blockquote:before,blockquote:after,q:before,q:after{content:'';content:none;}
table{border-collapse:collapse;border-spacing:0;}
/* start editing from here */
a{text-decoration:none;}
.txt-rt{text-align:right;}/* text align right */
.txt-lt{text-align:left;}/* text align left */
.txt-center{text-align:center;}/* text align center */
.float-rt{float:right;}/* float right */
.float-lt{float:left;}/* float left */
.clear{clear:both;}/* clear float */
.pos-relative{position:relative;}/* Position Relative */
.pos-absolute{position:absolute;}/* Position Absolute */
.vertical-base{	vertical-align:baseline;}/* vertical align baseline */
.vertical-top{	vertical-align:top;}/* vertical align top */
.underline{	padding-bottom:5px;	border-bottom: 1px solid #eee; margin:0 0 20px 0;}/* Add 5px bottom padding and a underline */
nav.vertical ul li{	display:block;}/* vertical menu */
nav.horizontal ul li{	display: inline-block;}/* horizontal menu */
img{max-width:100%;}
/*end reset*/
body{
	font-family:Arial, Helvetica, sans-serif;
	background:url(../bg2.png);
}
.wrap{
	width:1000px;
	margin:0 auto;	
}
.main{
	text-align:center;
	background: rgba(255, 255, 255, 0.04);
	color:#FFF;
	font-weight:bold;
	margin-top:160px;
	border:1px solid rgba(102, 102, 102, 0.31);
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border-radius:5px;
}
.main h3{
	font-size:16px;
	text-align:left;
	padding:30px 30px;
}
.main h1{
	font-size:60px;
	margin-top:15px;
	color:#1CD3CB;
	text-transform:uppercase;
	font-family: 'Fenix', serif;
}
.main p{
	font-size:20px;
	margin-top:15px;
	line-height:1.6em;
}
.main  span.error{
	color:#48C8D3;
	font-size:18px;
}
.main p span{
	font-size:14px;
	color:#24817A;
}
.search{
	border: 1px solid rgba(173, 173, 173, 0);
	margin-left:320px;
	margin-top:20px;
	width:390px;
	position:relative;
    background:rgba(156, 156, 156, 0.12);
    box-shadow: inset 0px -1px 5px rgba(94, 94, 94, 0.19);
    border-radius:5px;
    -webkit-border-radius:5px;
	-moz-border-radius:5px;
}
form input[type="text"]{
	border:none;
	outline:none;
	width:289px;
	padding:8px;
	font-size:12px;
    background:rgba(255, 255, 255, 0);
   color:#A2A2A2;
}
form input[type="submit"]{
	border:none;
	background:none;
	cursor:pointer;
	padding:10px 20px;
	font-size:13px;
	color:#EEE;
	box-shadow: inset 1px -2px 8px rgba(0, 0, 0, 0.33);
    margin: 0;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    background:#174242;
}
form input[type="submit"]:hover{
	box-shadow: inset 0px 0px 4px #222;
	color:#FFF;
}
.icons{
	padding-bottom:20px;
	text-align:right;
}
.icons p{
	padding-right:130px;
	color:#D5CECE;
	font-size:13px;
	cursor:pointer;
}
.icons p:hover{
	text-decoration:underline;
}
.icons ul{
	padding-right:20px;
}
.icons li {
	display:inline-block;
	padding-top:10px;
}
.icons li a{
	margin:2px;
}
.footer{
	text-align:right;
	padding-top:10px;
}
.footer p{
	font-size:12px;
	color:#076161;
}
.footer p a{
	font-size:13px;
	color:#076161;
}
.footer p a:hover{
	color:#0C7C7C;
}
</style>
<!DOCTYPE HTML>
<html>
<head>
<title>Error Occurred</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Fenix' rel='stylesheet' type='text/css'>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div class="wrap">
	 <div class="main">
		<h3>RifeConnect</h3>
		<h1>@yield('error_heading')</h1>
		<p>There's a lot of reasons why this page is <span class="error">@yield('error_code')</span>.<br>
			<span>Don't waste your time enjoying the look of it. If you wouldn't mind, please send us a message.</span></p>
			<a class="btn btn-success" href="/">Go Home</a>
			<br><br><br>
   </div>
	<div class="footer">
		<p> &copy; All rights Reseverd | RifeConnect</p>
    </div>
  </div>
</body>
</html>

