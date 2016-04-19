	
	<?php if (isset($pagearr) && $pagearr['pagenum'] > 0) : ?>
	<section id="case-listing-pager">
		<ul>
		<?php $currentpage = $pagearr['currentpage']; ?>
		<?php $totalnum = $pagearr['totalnum']; ?>
		<?php $numlinks = 8; ?>
		<?php $num_page_links = 6; ?>
		<?php $pagenum = $pagearr['pagenum']; ?>
		
		<?php if ($pagenum <= $numlinks) : // 直接打印 ?>
		
    		<?php for ($i = 1; $i <= $pagenum; $i++) { ?> 
    			<?php if ($i == $currentpage) : ?>
    		<li class="checked"><span><?php print_r($i); ?></span></li>
    			<?php else: ?>
    		<li><a href="javascript: gotopage(<?php print_r($i); ?>);"><?php print_r($i); ?></a></li>
    			<?php endif; ?>
    		<?php } ?>
		
		<?php else : // 需要进行一些处理，类似1 ··· 2 3 4 ··· 10 ?>
		    
		    <?php if ($currentpage > 1) : // 大于一就有上一页 ?>
		    
    		<li><a href="javascript: gotopage(<?php print_r($currentpage - 1); ?>);">上一页</a></li>
    		
    		<?php endif; ?>
    		
    		<?php if ($currentpage <= 3) : // 前面最多4个，当前页大于3时只显示1 ?>
    		
    		    <?php for ($i = 1; $i <= 4; $i++) { ?> 
        			<?php if ($i == $currentpage) : ?>
    		<li class="checked"><span><?php print_r($i); ?></span></li>
        			<?php else: ?>
    		<li><a href="javascript: gotopage(<?php print_r($i); ?>);"><?php print_r($i); ?></a></li>
        			<?php endif; ?>
        		<?php } ?>
    		    
    		<li><span>···</span></li>
    		<li><a href="javascript: gotopage(<?php print_r($pagenum); ?>);"><?php print_r($pagenum); ?></a></li>
    		
    		<?php elseif ($currentpage > $pagenum - 3) : // 最后几个时 ?>
    		
    		<li><a href="javascript: gotopage(1);">1</a></li>
    		<li><span>···</span></li>
    		
    		    <?php for ($i = $pagenum - 4 + 1; $i <= $pagenum; $i++) { ?> 
        			<?php if ($i == $currentpage) : ?>
    		<li class="checked"><span><?php print_r($i); ?></span></li>
        			<?php else: ?>
    		<li><a href="javascript: gotopage(<?php print_r($i); ?>);"><?php print_r($i); ?></a></li>
        			<?php endif; ?>
        		<?php } ?>
    		
    		<?php else : // 最后几个时 ?>
    		
    		<li><a href="javascript: gotopage(1);">1</a></li>
    		<li><span>···</span></li>
    		
    		    <?php for ($i = $currentpage - 1; $i <= $currentpage + 1; $i++) { ?> 
        			<?php if ($i == $currentpage) : ?>
    		<li class="checked"><span><?php print_r($i); ?></span></li>
        			<?php else: ?>
    		<li><a href="javascript: gotopage(<?php print_r($i); ?>);"><?php print_r($i); ?></a></li>
        			<?php endif; ?>
        		<?php } ?>
    		
    		<li><span>···</span></li>
    		<li><a href="javascript: gotopage(<?php print_r($pagenum); ?>);"><?php print_r($pagenum); ?></a></li>
    		
    		<?php endif; ?>
    		
    		<?php if ($currentpage < $pagenum) : // 小于总数就有下一页 ?>
		    
    		<li><a href="javascript: gotopage(<?php print_r($currentpage + 1); ?>);">下一页</a></li>
    		
    		<?php endif; ?>
    		
		    
		<?php endif ; ?>

		<form id="listing-pager-form" action="admin/dx_case">
			<input type="hidden" name="currentpage" value="<?php print_r($currentpage); ?>">
		</form>
	</section>

	<script type="text/javascript">
	var listingPagerForm;
	var inputCurrentPage;
	function gotopage (num) {
	    if (!listingPagerForm) {
	        listingPagerForm = $('#listing-pager-form');
	        inputCurrentPage = listingPagerForm.find('input[name="currentpage"]');
	    }
		inputCurrentPage.val(num);
		listingPagerForm.submit();
	}
	</script>
	<?php endif; ?>
	