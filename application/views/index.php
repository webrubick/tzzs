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
                
 <?php $this->load->view('templates/template-home-case'); ?>
                
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