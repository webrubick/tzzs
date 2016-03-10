<?php $extra_head = array();
$extra_head[] = title_tag($website['website_name']);
$extra_head[] = exlink_tag('public/css/index.css');
?>

<?php $this->load->view('common/page-top.php', array('extra_head' => $extra_head)); ?>

<?php $this->load->view('common/page-header.php', array('extra_header' => array())); ?>
        
        <!-- main content -->
        <section class="content-wrap">
            <section class="sub-page content text-normal">
                <main class="sub-page fixed-width tc-normal">
                    1
                </main>
            </section>
        
    <?php $this->load->view('common/page-footer.php'); ?>

        </section>
        
        <?php echo script_tag('public/js/core.min.js'); ?>
        <?php echo script_tag('public/js/rb-script.js'); ?>
        
<?php $this->load->view('common/page-bottom.php'); ?>