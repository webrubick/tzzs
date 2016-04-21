<?php $this->load->view('admin/common/page-top'); ?>

<?php $this->load->view('admin/common/page-header'); ?>

                <style>
                form .item textarea { min-height: 200px; }
                input[type="text"], textarea { font-size: 14px; }
                </style>

                <form method="POST" action="admin/website_info/ajax" onsubmit="return false;">
                    <div class="item top-sep">
                        <label>关键词：</label>
                        <textarea name="com_keywords"><?php print_r($website['com_keywords']); ?></textarea>
                    </div>
                    <div class="item top-sep">
                        <button type="submit" onclick="return updateWebsiteInfo0();">提交</button>
                    </div>
                </form>
                    
                    <div class="top-sep line-sep"></div>

                <form method="POST" action="admin/website_info/ajax" onsubmit="return false;">
                    <div class="item top-sep">
                        <label>联系地址：</label>
                        <input type="text" name="contact" value="<?php print_r($website['contact']);?>">
                    </div>
                    <div class="item top-sep">
                        <label>联系电话：</label>
                        <input type="text" name="com_address" value="<?php print_r($website['com_address']);?>">
                    </div>
                    <div class="item top-sep">
                        <button type="submit" onclick="return updateWebsiteInfo1();">提交</button>
                    </div>
                </form>
                    
                    <div class="top-sep line-sep"></div>
                 
                <form method="POST" action="admin/website_info/ajax" onsubmit="return false;">
                    <div class="item top-sep">
                        <label>公司全称：</label>
                        <input type="text" name="com_name" value="<?php print_r($website['com_name']);?>">
                    </div>  
                    <div class="item top-sep">
                        <label>公司介绍：</label>
                        <textarea name="com_description"><?php print_r($website['com_description']);?></textarea>
                    </div>
                    <div class="item top-sep">
                        <button type="submit" onclick="return updateWebsiteInfo2();">提交</button>
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
                        <button type="submit" onclick="return updateWebsiteInfo3();">提交</button>
                    </div>
                </form>
                    
                    <div class="top-sep line-sep"></div>
                
                <form method="POST" action="admin/website_info/ajax" onsubmit="return false;">
                    <div class="item top-sep">
                        <label>公司愿景：</label>
                        <textarea name="com_desire"><?php print_r($website['com_desire']);?></textarea>
                    </div>
                    
                    <div class="item top-sep">
                        <button type="submit" onclick="return updateWebsiteInfo4();">提交</button>
                    </div>
                </form>

<?php $this->load->view('admin/common/page-footer'); ?>
    
        <script type="text/javascript">
        var inputKeywords = $('[name="com_keywords"]');
        function updateWebsiteInfo0() {
            if (inputKeywords.val() == '') {
                showToast('请填写网站关键词');
                inputKeywords.focus();
                return false;
            }
            var resultData = 'com_keywords=' + $.urlencode(inputKeywords.val());
            simplePost('<?php echo base_url('/admin/website_info/ajax'); ?>', resultData, {
                ok : function() {
                    showToast('更新成功');
                }
            });
            return true;
        }
        
        var inputAddr = $('input[name="com_address"]');
        var inputContact = $('input[name="contact"]');
        function updateWebsiteInfo1() {
            if (inputAddr.val() == '') {
                showToast('请填写联系地址');
                inputAddr.focus();
                return false;
            }
            if (inputContact.val() == '') {
                showToast('请填写联系电话');
                inputContact.focus();
                return false;
            }
            var resultData = 'com_address=' + $.urlencode(inputAddr.val()) + '&contact=' + $.urlencode(inputContact.val());
            simplePost('<?php echo base_url('/admin/website_info/ajax'); ?>', resultData, {
                ok : function() {
                    showToast('更新成功');
                }
            });
            return true;
        }
        
        var inputComName = $('input[name="com_name"]');
        var inputComDesc = $('[name="com_description"]');
        function updateWebsiteInfo2() {
            if (inputComName.val() == '') {
                showToast('请填写公司全称');
                inputComName.focus();
                return false;
            }
            if (inputComDesc.val() == '') {
                showToast('请填写公司介绍');
                inputComDesc.focus();
                return false;
            }
            var resultData = 'com_name=' + $.urlencode(inputComName.val()) + '&com_description=' + $.urlencode(inputComDesc.val());
            simplePost('<?php echo base_url('/admin/website_info/ajax'); ?>', resultData, {
                ok : function() {
                    showToast('更新成功');
                }
            });
            return true;
        }
        
        var inputComSrv = $('input[name="com_service_aim"]');
        var inputComSrvDesc = $('[name="com_service_aim_desc"]');
        function updateWebsiteInfo3() {
            if (inputComSrv.val() == '') {
                showToast('请填写公司服务理念');
                inputComSrv.focus();
                return false;
            }
            if (inputComSrvDesc.val() == '') {
                showToast('请填写公司服务理念描述');
                inputComSrvDesc.focus();
                return false;
            }
            var resultData = 'com_service_aim=' + $.urlencode(inputComSrv.val()) + '&com_service_aim_desc=' + $.urlencode(inputComSrvDesc.val());
            simplePost('<?php echo base_url('/admin/website_info/ajax'); ?>', resultData, {
                ok : function() {
                    showToast('更新成功');
                }
            });
            return true;
        }
        
        var inputComDesire = $('[name="com_desire"]');
        function updateWebsiteInfo4() {
            if (inputComDesire.val() == '') {
                showToast('请填写公司愿景');
                inputComDesire.focus();
                return false;
            }
            var resultData = 'com_desire=' + $.urlencode(inputComDesire.val());
            simplePost('<?php echo base_url('/admin/website_info/ajax'); ?>', resultData, {
                ok : function() {
                    showToast('更新成功');
                }
            });
            return true;
        }
        
        </script>
    
<?php $this->load->view('admin/common/page-btm'); ?>