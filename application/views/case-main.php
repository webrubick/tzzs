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
                    <ul class="case-gallery">
                        <li>
                            <div class="common-amin" style="background-image: url('public/img/home-gallery-1.jpg')"/>
                        </li><li>
                            <div class="common-amin" style="background-image: url('public/img/home-gallery-1.jpg')"/>
                        </li><li>
                            <div class="common-amin" style="background-image: url('public/img/home-gallery-1.jpg')"/>
                        </li><li>
                            <div class="common-amin" style="background-image: url('public/img/home-gallery-1.jpg')"/>
                        </li><li>
                            <div class="common-amin" style="background-image: url('public/img/home-gallery-1.jpg')"/>
                        </li>
                    </ul>
                </main>
            </section>
        
    <?php $this->load->view('common/page-footer'); ?>

        </section>
        
        <?php echo script_tag('public/js/core.min.js'); ?>
        <?php echo script_tag('public/js/rb-script.js'); ?>
        
<?php $this->load->view('common/page-bottom'); ?>