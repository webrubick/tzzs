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
                    
<?php if (isset($dx_case)) :?>

                    <section class="home-block text-center">
                        <h3 class="title hover">
                            <?php print_r( $dx_case['title'] ); ?>
                        </h3>
                        
                        <div class="case-block-title-wrap">
                            <div>
                                <?php print_r( $dx_case['update_time'] ); ?>
                            </div>
                        </div>
                    </section>
                    
                    <section class="case-content">
                        
<?php $this->load->file(FCPATH . $dx_case['content_path'] . '/content.html'); ?>

                    </section>
                    
<?php else: ?>
                    
                    <img src="public/img/case-404.png" />
                    
                    <p class="case-404 no-indent">
                        您要查看的案例不翼而飞了~~
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