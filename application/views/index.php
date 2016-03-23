<?php $extra_head = array();
$extra_head[] = title_tag($website['website_name']);
$extra_head[] = exlink_tag('public/css/index.css');
?>

<?php $this->load->view('common/page-top', array('extra_head' => $extra_head)); ?>

<?php $this->load->view('common/page-header', array('extra_header' => array())); ?>
        
        <!-- main content -->
        <section class="content home text-center">
            <span class="home-vline"></span>
            
            <main class="fixed-width tc-normal text-center">
                <section class="home-block">
                    <div class="home-block-title-wrap text-center">
                        <div>
                            <h2 class="home-block-title">DESIGN CASE</h2>
                            <h3 class="home-block-subtitle">设 计 装 饰 案 例</h3>
                        </div>
                    </div>
                    
                    <div class="home-block-content home-block-canvas">
                        <ul>
                            <li class="case-preview text-left">
                                <ul>
                                    <li>
                                        <img src="public/img/home-gallery-1.jpg"/>
                                    </li><li>
                                        <img src="public/img/home-gallery-1.jpg"/>
                                    </li>
                                </ul>
                            </li><li class="case-overview">
                                <div style="background-image: url('public/img/home-gallery-1.jpg')">
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
                
                <section class="home-block">
                    <div class="home-block-title-wrap text-center">
                        <div>
                            <h2 class="home-block-title">DESIGN CASE</h2>
                            <h3 class="home-block-subtitle">设 计 装 饰 案 例</h3>
                        </div>
                    </div>
                    
                    <div class="home-block-content home-block-canvas">
                        <ul>
                            <li class="case-preview text-left">
                                <ul>
                                    <li>
                                        <img src="public/img/home-gallery-1.jpg"/>
                                    </li><li>
                                        <img src="public/img/home-gallery-1.jpg"/>
                                    </li>
                                </ul>
                            </li><li class="case-overview">
                                <div style="background-image: url('public/img/home-gallery-1.jpg')">
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
            </main>
        </section>
        
        <section class="content home text-center tansparent">
            <span class="home-vline"></span>
            <main class="fixed-width tc-inverse text-center">
                
<?php $this->load->view('templates/template-brand-aspiration'); ?>

                <p>&nbsp;</p>
                
            </main>
        </section>
        
        <section class="sub-page content text-center">
            <span class="home-vline"></span>
            
<?php $this->load->view('templates/template-company-info'); ?>
            
        </section>
        
<?php $this->load->view('common/page-footer'); ?>
        
        <?php echo script_tag('public/js/core.min.js'); ?>
        <?php echo script_tag('public/js/rb-script.js'); ?>
        
<?php $this->load->view('common/page-bottom'); ?>