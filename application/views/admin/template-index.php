
<?php $this->load->view('admin/template-top'); ?>

    <style>
    body { position: relative; text-align: center; }
    .main {
        margin: 0 auto; position: relative;
        max-width: 850px; height: 100%;
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
    </style>
    
    <section class="main">
        <header class="top-btm">
            <h2>
                鼎鑫设计装饰管理后台
            </h2>
        </header>
        
        <div class="top-sep line-sep"></div>
        
        <section class="content top-sep">
            <aside id="sidebar">
            	<nav id="main-nav">
            		<a href="admin" class="ico-nav">网站信息</a>
            		<a href="admin/edit_password" class="ico-nav" >修改密码</a>
            		<a href="admin/dx_case" class="ico-nav" >管理案例</a>
            	</nav>
            </aside><aside id="content">
                <?php $this->load->view($content_view); ?>
            </aside>
        </section>
        
        <div class="top-sep line-sep"></div>
        
        <footer class="top-btm top-sep">
            &copy; 鼎鑫设计装饰
        </footer>
    </section>
    
    <?php echo script_tag('public/js/core.min.js'); ?>
    <?php echo script_tag('public/js/admin.js'); ?>
    
<?php if (isset($extra_script)) : ?>
    <?php foreach($extra_script as $script): ?>
    <?php echo script_tag($script); ?>
    <?php endforeach; ?>
<?php endif; ?>
        
<?php $this->load->view('admin/template-bottom'); ?>