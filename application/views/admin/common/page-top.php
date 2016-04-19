<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <base href="<?php echo base_url(); ?>" />
        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <meta name="Author" content="YY" />
        <meta name="Copyright" content="YY" />
        <?php echo title_tag($website['website_name'] . '管理后台'); ?>
        
        <link href="public/css/normalize.css" rel="stylesheet" type="text/css">
        <style>
        html, body { height: 100%; }
        * { margin: 0; padding: 0; }
        *, *:before, *:after { box-sizing: border-box; }
        
        a, button { outline: none; }
        a, button, input, .common-amin { transition: all .3s ease; }
        
        a, a[href^="tel:"], a[href^="callto:"] {
            font: inherit; color: inherit; text-decoration: none;
            /*blr: expression(this.onFocus=this.blur());*/ /*去除超链接点击后的虚边框，貌似无效*/
            outline: none; /*FF, IE9以上可以避免返回历史记录时出现虚线框*/
        }
        
        ul, li { list-style-type:none; }
        
        body {
            background: #fff; color: #9c9c9c;
            /*font-family: "Microsoft YaHei";*/
            font-family: "Microsoft Yahei", Helvetica, Arial, Verdana, sans-serif;
            font-size: 16px; line-height: 1.4;
        }
        
        input[type="text"], input[type="password"], textarea {
            border: 1px solid #ddd; outline: none; border-radius: 2px;
            font-size: 1em;
            padding: .5em;
        }
        input[type="text"]:focus, input[type="password"]:focus, textarea:focus {
            border: 1px solid #00bcd4;
        }
        
        tc-main { color: #9c9c9c; }
        tc-inverse { color: #00bcd4; }
        /* Dialog
        ----------------------------------*/
        .admin-ui-dialog {
        	display:none; 
        	position:fixed; /** TODO xxx changed xxx**/ 
        	z-index:1001; 
        	min-width:300px; 
        	background-color:#fff; 
        	border:4px rgba(0, 0, 0, 0.1) solid; 
        	-moz-background-clip:content; 
        	-webkit-background-clip:content; 
        	background-clip:content-box;
        }
        
        .admin-ui-dialog-head {
        	line-height:40px; 
        	padding:0 8px 0 16px;
        }
        .admin-ui-dialog-head-title {
        	color:#000; 
        	font-size:14px; 
        	font-weight:bold;
        }
        .admin-ui-dialog-head-closeButton {
        	float:right; 
        	display:none; 
        	width:24px; height:24px; margin-top:8px; 
        	background:url(../../img/admin/pop_delete.png) no-repeat center; 
        	cursor:pointer;
        }
        .admin-ui-dialog-body {
        	padding:10px 20px; 
        	overflow:hidden;
        }
        .admin-ui-dialog-body .admin-ui-dialog-body-textContent {
        	line-height:24px;
        }
        
        .admin-ui-dialog.alert .admin-ui-dialog-body .admin-ui-dialog-body-textContent {
        	font-size:14px; font-weight:bold; text-align:center;
        }
        
        .admin-ui-dialog-shadow {
        	position:fixed; 
        	z-index:1000; 
        	top:0; bottom:0; left:0; right:0; 
        	background-color:#000; 
        	-moz-opacity:0.3; 
        	opacity:0.3; 
        	filter:alpha(opacity=30);
        }
        </style>
        
        <?php /*extra head, string array print_r($extra_head);*/ ?>
    
        <?php if (isset($extra_head)) { foreach($extra_head as $line) { ?><?php echo $line;?>
        <?php } } ?>
        
    </head>
    
    <body>
