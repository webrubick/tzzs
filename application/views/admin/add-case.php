<?php $this->load->view('admin/common/page-top'); ?>

<?php $this->load->view('admin/common/page-header'); ?>

        <style>
        #case-img-container, #case-preview-container { position: relative; max-width: 400px; }
        #case-img-container, #case-preview-container, #case-img-container ul, #case-img-container ul > li { display: inline-block; }
        #case-img-container ul > li { vertical-align: top; margin-right: 10px; position: relative; }
        
        #add-case-from img, #add-case-from .add-more { width: 120px; }
        #add-case-from .add-more { height: 120px; line-height: 155px; text-align: center; 
                    border: 1px solid #ccc; box-shadow: 0 1px 11px rgba(0, 0, 0, 0.27); border-radius: 5px; }
        #add-case-from .add-more img { width: 50px; }
        #add-case-from .del { width: 20px; height: 20px; background: #fff; position: absolute; top: 0; right: 0; z-index: 1; }
        #add-case-from .add-more a, #add-case-from .del a, #add-case-from .del img { width: 100%; height: 100%; }
        
        #case-preview-container b { font-weight: normal; color: red; font-size: .75em; }
        </style>
                <h2>添加案例</h2>
                
                <div class="top-sep line-sep"></div>
                
                <form id="add-case-from" onsubmit="return false;">
                    <div class="item top-sep">
                        <label>标题：</label>
                        <input type="text" name="title">
                    </div>
                    
                    <div class="item top-sep">
                        <label>装饰图：</label>
                        <div id="case-img-container">
                            <ul>
                                <li>
                                    <div>
                                        <img src="public/img/home-gallery-1.jpg" />
                                        <div class="del">
                                        <a href="javascript:;" onclick="delCaseImage()"><img src="public/img/case-img-del.png" /></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="add-more">
                                    <a href="javascript:;" onclick="addCaseImage()"><img src="public/img/case-img-add.png" /></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="item top-sep">
                        <label>预览图：</label>
                        <div id="case-preview-container">
                            <div class="add-more">
                            <a href="javascript:;" onclick="addCasePreview()"><img src="public/img/case-img-add.png" /></a>
                            </div>
                            <b>*如果不上传预览图，默认使用第一张装饰图作为预览图</b>
                        </div>
                    </div>
                    
                    <div class="item top-sep">
                        <button type="submit" onclick="return submitAddCase();">完成</button>
                    </div>
                </form>
                

<?php $this->load->view('admin/common/page-footer'); ?>

        <script type="text/javascript">
        var inputTitle = $('#add-case-from input[name="title"]');
        function submitAddCase() {
            if (inputTitle.val() == '') {
                showToast('请输入标题');
                inputTitle.focus();
                return false;
            }
            
            return true;
        }
        
        function addCaseImage() {
            
        }
        
        function delCaseImage() {
            
        }
        
        function addCasePreview() {
            
        }
        </script>
<?php $this->load->view('admin/common/page-btm'); ?>

