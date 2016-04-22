    <style>
    body { position: relative; text-align: center; }
    .main {
        margin: 0 auto; position: relative;
        max-width: 850px; min-width: 850px; height: 100%;
    }
    .top-btm {
       background: #00bcd4; color: #fff; height: 100px; line-height: 100px;  
    }
    .content { position: relative; text-align: left; }
    .top-sep { margin-top: 10px; }
    .btm-sep { margin-bottom: 10px; }
    .line-sep { height: 1px; background: #00bcd4; }
    aside { display: inline-block; vertical-align: top; }
    /* Aside
    ----------------------------------*/
    #sidebar{ width:100px; background-color:#00bcd4; color: #fff; }
    
    /* Main Navigation
    ----------------------------------*/
    #main-nav { width: 100px; }
    #main-nav a{display:block; height:60px; line-height:60px; font-weight: bold; letter-spacing:1px; text-align:center; text-decoration:none; }
    #main-nav a:hover{background-color:#FF3366;}
    
    #content { margin-left: 5px; width: 720px; }
    
    form .item { }
    form .item > * { vertical-align: top; }
    form .item label { display: inline-block; width: 6em; text-align: right; }
    form .item input[type="text"], form .item input[type="password"], textarea {
        width: 400px;
    }
    form .item textarea { min-height: 120px; }
    button, a.button { display: inline-block; text-align: center; padding: 5px; background: #00bcd4; border: 1px solid #ccc; color: #fff; width: 150px; }
    form .item button, form .item a.button { margin-left: 6em; }
    
    .logout { display: inline-block; position: absolute; bottom: 0; right: 0; height: 2em; line-height: 2; margin-right: 10px; }
    .logout:hover { text-decoration: underline; } 
    </style>
    
    <section class="main">
        <header class="top-btm" style="position: relative;">
            <h2>
                <?php print_r($website['website_name']); ?>管理后台
            </h2>
            
            <a class="logout" href="admin/logout">退出</a>
        </header>
        
        <div class="top-sep line-sep"></div>
        
        <section class="content top-sep">
            <aside id="sidebar">
            	<nav id="main-nav">
            		<a href="admin/dx_case" class="ico-nav" >管理案例</a>
            		<a href="admin/website_info" class="ico-nav">网站信息</a>
            		<a href="admin/edit_password" class="ico-nav" >修改密码</a>
            	</nav>
            </aside><aside id="content">
