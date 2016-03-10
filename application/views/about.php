<?php $extra_head = array();
$extra_head[] = title_tag($website['website_name']);
$extra_head[] = exlink_tag('public/css/index.css');
?>

<?php $this->load->view('common/page-top', array('extra_head' => $extra_head)); ?>

<?php $this->load->view('common/page-header', array('extra_header' => array())); ?>
        
        <!-- main content -->
        <section class="content-wrap">
            <section class="sub-page content text-normal">
                <main class="sub-page fixed-width tc-normal">
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
                        品质设计
                    </h3>
                    <p>
                    <a class="highlight">泰兴鼎鑫设计装饰有限公司</a>，是一家专业从事家装、工装设计、施工、后期软装配饰于一体的大型装饰企业，
                    “建筑装修装饰工程专业承包二级施工资质”企业。
                    高标准、严要求、优化设计、精心施工、管理规范、后期服务及优良的企业形象是金蚂蚁人的追求目标；坚持以现代、时尚、亲和的定位塑造品牌形象，
                    致力于为消费者提供高品质的设计、施工、产品和服务。本公司管理科学、工作严谨、质量上乘、客户满意度及转介绍率高，用心服务好客户，
                    高品质做好工程质量，是三泰及周边地区有最高影响力、市场占有率的精品装饰公司。
                    </p>
                    <p>
                    泰兴鼎鑫设计装饰有限公司，是一家专业从事家装、工装设计、施工、后期软装配饰于一体的大型装饰企业，
                    “建筑装修装饰工程专业承包二级施工资质”企业。
                    高标准、严要求、优化设计、精心施工、管理规范、后期服务及优良的企业形象是金蚂蚁人的追求目标；坚持以现代、时尚、亲和的定位塑造品牌形象，
                    致力于为消费者提供高品质的设计、施工、产品和服务。本公司管理科学、工作严谨、质量上乘、客户满意度及转介绍率高，用心服务好客户，
                    高品质做好工程质量，是三泰及周边地区有最高影响力、市场占有率的精品装饰公司。
                    </p>
                    
                    <h3 class="subtitle">
                        服务至上
                    </h3>
                    <img class="content-img" src="public/img/home-gallery-1.jpg"/>
                    
                    <h3 class="subtitle">
                        男神代言
                    </h3>
                    <p>
                        泰兴鼎鑫设计装饰有限公司，是一家专业从事家装、工装设计、施工、后期软装配饰于一体的大型装饰企业，
                        “建筑装修装饰工程专业承包二级施工资质”企业。
                    </p>
                    <img class="content-img" src="public/img/test.png"/>
                    <p>
                        泰兴鼎鑫设计装饰有限公司，是一家专业从事家装、工装设计、施工、后期软装配饰于一体的大型装饰企业，
                        “建筑装修装饰工程专业承包二级施工资质”企业。
                    </p>
                    
                    <h3 class="subtitle">
                        愿景
                    </h3>
                    <p>
                        泰兴鼎鑫设计装饰有限公司，是一家专业从事家装、工装设计、施工、后期软装配饰于一体的大型装饰企业，
                        “建筑装修装饰工程专业承包二级施工资质”企业。
                    </p>
                    <img class="content-img" src="public/img/home-gallery-1.jpg"/>
                </main>
            </section>
        
    <?php $this->load->view('common/page-footer'); ?>

        </section>
        
        <?php echo script_tag('public/js/core.min.js'); ?>
        <?php echo script_tag('public/js/rb-script.js'); ?>
        
<?php $this->load->view('common/page-bottom'); ?>