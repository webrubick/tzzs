		<footer class="text-center">
            <span class="home-vline"></span>
            <main class="fixed-width tc-inverse">
                <table class="com-info">
    	           	<tr>
    	           		<td style="width: 50%">
    	           		    <img class="footer-logo" src="public/img/logo_200x225.png"/>
    	           		    <br/>
    	           		    <span>© <span class="copyright-year"></span> <a href="/"><?php print_r($website['website_name']); ?></a></span>
    					</td>
    	           		<td class="text-left" style="width: 50%">
    	           		    地址：<?php print_r($website['com_address']); ?>
    	           		    &nbsp;&nbsp;&nbsp;&nbsp;
    	           		    邮编：<?php print_r($website['com_postcode']); ?>
                            <br/>
                            电话：<a href="tel:<?php print_r($website['contact']); ?>"><?php print_r($website['contact']); ?></a> 
                            <br/>
    	           		    <a href="<?php print_r($website['beian_url']); ?>"><?php print_r($website['beian_no']); ?></a>
    	           		</td>
    	           	</tr>
               	</table>
            </main>
        </footer>