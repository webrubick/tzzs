		
		<section>
            <div class="fixed-bg bg-cover" style="background-image: url('<?php print_r($website['website_home_bg']); ?>')"></div>
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
            
<?php $this->load->view('templates/template-brand'); ?>
            
        </header>