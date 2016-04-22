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
        
        <?php echo meta('keywords', $website['com_keywords']); ?>
	    <?php echo meta('description', $website['com_description']); ?>
	    <link rel="shortcut icon" href="public/favicon.ico">
        
        <link href="public/css/normalize.css" rel="stylesheet" type="text/css">
        <link href="public/css/common.css" rel="stylesheet" type="text/css">
        
        <?php /*extra head, string array print_r($extra_head);*/ ?>
    
        <?php if (isset($extra_head)) { foreach($extra_head as $line) { ?><?php echo $line;?>
        <?php } } ?>
        
    </head>
    
    <body>