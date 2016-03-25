<?php $extra_head = array();
$extra_head[] = title_tag($website['website_name']);
$extra_head[] = exlink_tag('public/css/index.css');
$extra_head[] = exlink_tag('public/css/case.css');
?>

<?php $this->load->view('common/page-top', array('extra_head' => $extra_head)); ?>

<?php $this->load->view('common/page-header', array('extra_header' => array())); ?>
        
        <!-- main content -->
        <section class="content-wrap">
            <section class="sub-page content text-center">
                <main class="sub-page fixed-width tc-normal">
<?php if (isset($dx_cases) && !empty($dx_cases)) :?>
                    <ul class="case-gallery">
    <?php $ite_flag = FALSE; ?>
    <?php foreach ($dx_cases as $dx_case) : ?>
        <?php if ($ite_flag) : ?>

                        </li><li>
        <?php else : ?>
                        
                        <li>
        <?php $ite_flag = TRUE ; ?>
        <?php endif ; ?>

                            <div class="common-amin" style="background-image: url('public/img/preview.jpg')">
                                <span><?php print_r($dx_case['title']); ?></span>
                            </div>
    <?php endforeach; ?>
    
                        </li>
                    </ul>

<?php else: ?>
                    
                    <img src="public/img/case-404.png" />
                    
                    <p class="case-404 no-indent">
                        我们还没有更新案例哦，一起期待吧~~
                    </p>
                    
                    <p>
                        &nbsp;
                    </p>
                    
<?php endif; ?>
                    
                </main>
            </section>
        
    <?php $this->load->view('common/page-footer'); ?>

        </section>
        
        <?php echo script_tag('public/js/core.min.js'); ?>
        <?php echo script_tag('public/js/rb-script.js'); ?>
        
<?php $this->load->view('common/page-bottom'); ?>