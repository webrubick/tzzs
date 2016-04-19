
        </aside>
        </section>
        
        <div class="top-sep line-sep"></div>
        
        <footer class="top-btm top-sep">
            &copy; <?php print_r($website['website_name']); ?>
        </footer>
    </section>
    
    <?php echo script_tag('public/js/core.min.js'); ?>
    <?php echo script_tag('public/js/admin.js'); ?>
    
    <script type="text/javascript">
	function updateContentMinHeightByResize() {
	    var contentContainer = $('section.content');
        var contentView = contentContainer.find('#content');
        var footerView = $('footer');
        
        var topSpacing = contentView.offset().top;
        var contentContainerBtm = contentContainer.offset().top + contentContainer.height();
        var footerBtm = footerView.offset().top + footerView.height();
        var minHeight = Math.max(0, $(window).height() - topSpacing - (footerBtm - contentContainerBtm));
    	contentView.css({
    	    'min-height' : minHeight
    	});
	}
	
    updateContentMinHeightByResize();
    $(window).resize(function() {
        updateContentMinHeightByResize();
	});
    </script>
