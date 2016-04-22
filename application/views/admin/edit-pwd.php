<?php $this->load->view('admin/common/page-top'); ?>

<?php $this->load->view('admin/common/page-header'); ?>

                <form id="edit-pwd-form" method="POST" onsubmit="return false;">
                    <div class="item top-sep">
                        <label>新密码：</label>
                        <input type="text" name="password">
                    </div>
                    <div class="item top-sep">
                        <label>再次确认：</label>
                        <input type="text" name="confirm_password">
                    </div>
                    <div class="item top-sep">
                        <button type="submit" onclick="return change_pass();">提交</button>
                    </div>
                </form>

<?php $this->load->view('admin/common/page-footer'); ?>

        <?php echo script_tag('public/js/md5.js'); ?>
    
        <script type="text/javascript">
        var inputPwd = $("#edit-pwd-form input[name='password']");
        var inputPwd2 = $("#edit-pwd-form input[name='confirm_password']");
        function change_pass() {
            if (inputPwd.val() == '') {
                showToast('请输入密码');
                inputPwd.focus();
                return false;
            }
            if (inputPwd2.val() == '') {
                showToast('请再输入一次密码');
                inputPwd2.focus();
                return false;
            }
            
            if (inputPwd.val() != inputPwd2.val()) {
                showToast('两次密码不一致');
                inputPwd2.focus();
                return false;
            }
            
            var resultData = 'password=' + $.urlencode(hex_md5(inputPwd.val()));
            simplePost('<?php echo base_url('/admin/edit_password/ajax'); ?>', resultData);
            return true;
        }
        </script>
<?php $this->load->view('admin/common/page-btm'); ?>

