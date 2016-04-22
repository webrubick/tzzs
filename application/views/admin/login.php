
<?php $this->load->view('admin/common/page-top'); ?>

    <style>
    body {
        position: relative; min-height: 250px; text-align: center; 
    }
    #login-form {
        width: 100%;
        position: absolute; top: 50%; margin-top: -80px; 
    }
    #login-form label {
        display: inline-block; width: 4em; text-align: right;
    }
    #login-form input {
        width: 250px;
    }
    #login-form .container {
        margin: 0 auto; position: relative;
        width: 400px; height: 160px;
        background: #fff;
        box-shadow: 0 1px 11px rgba(0, 0, 0, 0.27);
        border-radius: 2px;
        padding: 10px 15px;
    }
    #login-form .item {
        margin-top: 10px;
    }
    #login-form button {
        padding: 5px; background: #00bcd4; border: 1px solid #ccc; color: #fff;
        width: 320px; 
    }
    </style>
    
    <div style="display: block; width: 100%; height: 50%; position: absolute; top: 0; left: 0; background: #00bcd4; z-index: 0;"></div>
    
    <form id="login-form" method="POST" onsubmit="return false;">
        <div class="container">
            <div class="item">
                <label>用户名：</label>
                <input type="text" name="user_name" value="admin">
            </div>
            <div class="item">
                <label>密码：</label>
                <input type="password" name="password">
            </div>
            
            <div class="item">
                <button type="submit" onclick="return login();">登录</button>
            </div>
        </div>
    </form>
    
    <?php echo script_tag('public/js/core.min.js'); ?>
    <?php echo script_tag('public/js/md5.js'); ?>
    <?php echo script_tag('public/js/admin.js'); ?>
    
    <script type="text/javascript">
    var inputUserName = $("#login-form input[name='user_name']");
    var inputPwd = $("#login-form input[name='password']");
    function login() {
        if (inputUserName.val() == '') {
            showToast('请输入用户名');
            inputUserName.focus();
            return false;
        }
        if (inputPwd.val() == '') {
            showToast('请输入密码');
            inputPwd.focus();
            return false;
        }
        var resultData = 'user_name=' + $.urlencode(inputUserName.val()) + '&password=' + $.urlencode(hex_md5(inputPwd.val()));
        console.log(resultData);
        simplePost('<?php echo base_url('/admin/login/ajax'); ?>', resultData);
        return true;
    }
    </script>
        
<?php $this->load->view('admin/common/page-btm'); ?>