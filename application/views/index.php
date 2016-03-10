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
            <main class="sub-page fixed-width text-left">
                <section class="home-block text-normal">
                    <h3 class="subtitle">
                        泰兴鼎鑫设计装饰有限公司
                    </h3>
                    <p>
                    <span class="highlight">泰兴鼎鑫设计装饰有限公司</span>，是一家专业从事家装、工装设计、施工、后期软装配饰于一体的大型装饰企业，
                    “建筑装修装饰工程专业承包二级施工资质”企业。
                    高标准、严要求、优化设计、精心施工、管理规范、后期服务及优良的企业形象是金蚂蚁人的追求目标；坚持以现代、时尚、亲和的定位塑造品牌形象，
                    致力于为消费者提供高品质的设计、施工、产品和服务。本公司管理科学、工作严谨、质量上乘、客户满意度及转介绍率高，用心服务好客户，
                    高品质做好工程质量，是三泰及周边地区有最高影响力、市场占有率的精品装饰公司。
                    </p>
                    
                    <h3 class="subtitle">
                        我们的理念：<span class="hover">品质设计 服务至上</span>
                    </h3>
                    <p>
                    我们秉承“虔诚为客户服务”的理念，以“完美源于细节，口碑来自真诚”为宗旨，引领行业的持久创新发展。
                    创百年品牌，致力“成为最受尊敬的卓越的装饰品牌运营商”的企业愿景，成为推动金蚂蚁健康、快速发展的内在驱动力。
                    我们将为您提供最专业、最真诚的完美贴心服务。
                    </p>
                </section>
                
                <section class="home-block text-center">
                    <div class="home-block-title-wrap">
                        <div>
                            <h2 class="home-block-title">OFFICE ENV</h2>
                            <h3 class="home-block-subtitle">办 公 环 境</h3>
                        </div>
                    </div>
                    <div class="home-block-content home-block-canvas">
                        <ul>
                            <li class="team-info text-left tc-inverse">
                                我们拥有舒适的办公环境，秉承“虔诚为客户服务”的理念，以“完美源于细节，口碑来自真诚”为宗旨，引领行业的持久创新发展。
                                我们将为您提供最专业、最真诚的完美贴心服务。
                                致力“成为最受尊敬的卓越的装饰品牌运营商”的企业愿景，成为推动金蚂蚁健康、快速发展的内在驱动力。
                            </li><li class="team-overview" style="position:relative">
                                <div class="team-img-window" style="background-image: url('public/img/home-gallery-1.jpg')"></div>
                                
                                <ul style="width: 100%; position: absolute; top: 0px">
                                    <li style="background: #fff; position: relative; width: 10px; height: 100%; left: -25%; margin-left: 10px; margin-right: 0px">
                                    </li><li style="background: #fff; position: relative; width: 10px; height: 100%; left: 0%; margin-left: -10px; margin-right: 0px">
                                    </li><li style="background: #fff; position: relative; width: 10px; height: 100%; left: 25%; margin-left: -10px; margin-right: 0px">
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </section>
            </main>
        </section>
        
<?php $this->load->view('common/page-footer'); ?>
        
        <?php echo script_tag('public/js/core.min.js'); ?>
        <?php echo script_tag('public/js/rb-script.js'); ?>
        
<?php $this->load->view('common/page-bottom'); ?>