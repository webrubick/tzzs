		<section>
            <div class="fixed-bg bg-cover" style="background-image: url('public/img/home-gallery-1.jpg')"></div>
            <div class="fixed-layer"></div>
        </section>

        <header class="tc-inverse">
            <div class="navbar text-center">
                <ul class="navbar-nav">
                <?php if ($index_tab == 'index') : ?>
                    <li class="active">
                        <a href="javascript:;">首&nbsp;&nbsp;&nbsp;&nbsp;页</a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="/">首&nbsp;&nbsp;&nbsp;&nbsp;页</a>
                    </li>
                <?php endif ; ?>
                    
                <?php if ($index_tab == 'about') : ?>
                    <li class="active">
                        <a href="javascript:;">关于鼎鑫</a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="dx_about">关于鼎鑫</a>
                    </li>
                <?php endif ; ?>
                
                <?php if ($index_tab == 'case') : ?>
                    <li class="active">
                        <a href="javascript:;">装修案例</a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="dx_case">装修案例</a>
                    </li>
                <?php endif ; ?>
                
                <?php if ($index_tab == 'contact') : ?>
                    <li class="active">
                        <a href="javascript:;">联系我们</a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="dx_contact">联系我们</a>
                    </li>
                <?php endif ; ?>
                
                </ul>
                
                <div class="about-pop">
                    
                </div>
            </div>
            <section class="brand text-center">
                <div class="brand-area">
                    <a href="javascript:;">
    	                <div class="brand_logo">
    	                    <span class="fa fa-star-o"></span>
    	                    <span class="fa fa-star-o"></span>
    	                    <span class="fa fa-star-o"></span>
    	                    <span class="fa fa-star-o"></span>
    	                </div>
    	                <div class="brand_name">
    	                	<big>鼎&nbsp;&nbsp;鑫&nbsp;&nbsp;</big>设&nbsp;&nbsp;计&nbsp;&nbsp;<big>装&nbsp;&nbsp;饰</big>
    	                </div>
    	                <div class="brand_slogan">DingXin Design & Decorate | <span class="copyright-year"></span></div>
    	            </a>
                </div>
                <span class="hint-aspiration">
                    <ul>
                    	<li>品</li>
                    	<li>质</li>
                    	<li>设</li>
                    	<li>计</li>
                    	&nbsp;&nbsp;
                    	<li>服</li>
                    	<li>务</li>
                    	<li>至</li>
                    	<li>上</li>
                    </ul>
                	<!-- 品质设计&nbsp;&nbsp;服务至上 -->
                </span>
            </section>
        </header>