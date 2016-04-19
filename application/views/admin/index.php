<?php $this->load->view('admin/common/page-top'); ?>

<?php $this->load->view('admin/common/page-header'); ?>

                <form id="" method="POST" action="admin/website_info/ajax" onsubmit="return false;">
                    <div class="item top-sep">
                        <label>联系地址：</label>
                        <input type="text" name="contact" value="<?php print_r($website['contact']);?>">
                    </div>
                    <div class="item top-sep">
                        <label>联系电话：</label>
                        <input type="text" name="com_address" value="<?php print_r($website['com_address']);?>">
                    </div>
                    <div class="item top-sep">
                        <button type="submit" onclick="return updateWebsiteInfo();">提交</button>
                    </div>
                </form>
                    
                    <div class="top-sep line-sep"></div>
                 
                <form method="POST" action="admin/website_info/ajax" onsubmit="return false;">   
                    <div class="item top-sep">
                        <label>公司介绍：</label>
                        <textarea name="com_description"><?php print_r($website['com_description']);?></textarea>
                    </div>
                    <div class="item top-sep">
                        <button type="submit" onclick="return change_pass();">提交</button>
                    </div>
                </form>
                    
                    <div class="top-sep line-sep"></div>
                 
                <form method="POST" action="admin/website_info/ajax" onsubmit="return false;">
                    <div class="item top-sep">
                        <label>服务理念：</label>
                        <input type="text" name="com_service_aim" value="<?php print_r($website['com_service_aim']);?>">
                    </div>
                    <div class="item top-sep">
                        <label>理念描述：</label>
                        <textarea name="com_service_aim_desc"><?php print_r($website['com_service_aim_desc']);?></textarea>
                    </div>
                    <div class="item top-sep">
                        <button type="submit" onclick="return change_pass();">提交</button>
                    </div>
                </form>
                    
                    <div class="top-sep line-sep"></div>
                
                <form method="POST" action="admin/website_info/ajax" onsubmit="return false;">
                    <div class="item top-sep">
                        <label>公司愿景：</label>
                        <textarea name="com_desire"><?php print_r($website['com_desire']);?></textarea>
                    </div>
                    
                    <div class="item top-sep">
                        <button type="submit" onclick="return updateWebsiteInfo('com_desire');">提交</button>
                    </div>
                </form>

<?php $this->load->view('admin/common/page-footer'); ?>
    
        <script type="text/javascript">
        function updateWebsiteInfo() {
            console.log($('input[name="contact"]').val());
            return false;
        }
        </script>
    
<?php $this->load->view('admin/common/page-btm'); ?>