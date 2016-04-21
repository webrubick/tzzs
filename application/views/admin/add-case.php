<?php $this->load->view('admin/common/page-top'); ?>

<?php $this->load->view('admin/common/page-header'); ?>

        <style>
        #case-img-container, #case-preview-container { position: relative; max-width: 400px; }
        #case-img-container, #case-preview-container, #case-img-container ul, #case-img-container ul > li { display: inline-block; }
        #case-img-container ul > li { vertical-align: top; margin-right: 10px; position: relative; }
        
        #add-case-from img, #add-case-from .add-more { width: 120px; }
        #add-case-from .add-more { position: relative;
                    height: 120px; line-height: 155px; text-align: center; 
                    border: 1px solid #ccc; box-shadow: 0 1px 11px rgba(0, 0, 0, 0.27); border-radius: 5px; }
        #add-case-from .add-more img { width: 50px; }
        #add-case-from .del { width: 20px; height: 20px; background: #fff; position: absolute; top: 0; right: 0; z-index: 1; cursor: pointer; }
        #add-case-from .add-more a, #add-case-from .del a, #add-case-from .del img { width: 100%; height: 100%; }
        
        #case-preview-container b { font-weight: normal; color: red; font-size: .75em; }
        #case-preview-container .preview { position: relative; width: 120px; }
        
        #add-case-from input[type="file"] {
    		display: inline-block; position: absolute; top: 0; left: 0;
    		width: 100%; height: 100%; overflow: hidden; font-size: 300px;
    		opacity: 0; filter:alpha(opacity=0);
    		cursor: pointer;
    	}   
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
                                    <div class="add-more">
                                    <img src="public/img/case-img-add.png" />
                                    <input type="file" name="case_subs" multiple>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="item top-sep">
                        <label>预览图：</label>
                        <div id="case-preview-container">
                            <div class="add-more">
                            <img src="public/img/case-img-add.png" />
                            <input type="file" name="case_preview">
                            </div>
                            
                            <div class="preview" style="display: none; ">
                                <img class="preview-img" />
                                <div class="del">
                                <a href="javascript:;" onclick="delCasePreImage()"><img src="public/img/case-img-del.png" /></a>
                                </div>
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
        
        var inputCaseSubsList = $('#case-img-container ul');
        var inputCaseInputLi = inputCaseSubsList.find('li');
        var inputCaseSubs = inputCaseInputLi.find('input[type="file"]');
        var caseSubs = $.extend({}, ZXXFILE, {
            fileInput: inputCaseSubs.get(0),
            url: '<?php echo base_url('admin/case_subs/ajax'); ?>',
            url1: '<?php echo base_url('admin/case_subs/ajax?flag=1'); ?>',
            url2: '<?php echo base_url('admin/case_subs/ajax'); ?>',
            filter: function(files) {
                var arrFiles = [];
                for (var i = 0, file; file = files[i]; i++) {
                    if (file.type.indexOf("image") == 0 || (!file.type && /\.(?:jpg|png|gif|jpeg)$/.test(file.name) /* for IE10 */ )) {
                        arrFiles.push(file);
                    } else {
                        alert('文件"' + file.name + '"不是图片。');
                    }
                }
                return arrFiles;
			},
			onAppendSelect: function(filteredFiles) {
                var i = 0;
                var funAppendImage = function() {
                    var file = filteredFiles[i];
                    if (!file) { return ; } // end
                    var reader = new FileReader();
    				reader.onload = function(e) {
    				    var li = $('<li class="case-subs-li"></li>')
    				                .html('<div><img src="' + e.target.result + '"/>\n'
				                        + '<div class="del" onclick="delCaseSubsImage(this)"><img src="public/img/case-img-del.png" /></div>\n'
				                        + '</div>');
    				    inputCaseInputLi.before(li);
    				    i++;
                        funAppendImage();
    				};
    				reader.readAsDataURL(file);
                };
                funAppendImage();
            },
            onDelete: function(deletedFile) {
                var target = inputCaseSubsList.find('li').eq(deletedFile.index);
                target.remove();
            },
            onComplete: function() {
                casePreview.upload();
            },
            dealResponse: function(xhr) {
                caseSubs.url = caseSubs.url2;
                return false; 
            }
        });
        caseSubs.init();
        
        function delCaseSubsImage(obj) {
            var target = $(obj);
            var li = target;
            while(1) {
                li = li.parent();
                if (li.is('li')) {
                    break;
                }
            }
            caseSubs.deleteFile(li.index());
        }
        
        var inputCasePreviewAddMore = $('#case-preview-container .add-more');
        var inputCasePreview = $('#case-preview-container input[type="file"]');
        var inputCasePreviewView = $('#case-preview-container .preview');
        var inputCasePreviewImg = inputCasePreviewView.find('img.preview-img');
        var casePreview = $.extend({}, ZXXFILE, {
            fileInput: inputCasePreview.get(0),
            url: '<?php echo base_url('admin/case_preview/ajax'); ?>',
            filter: function(files) {
                var arrFiles = [];
                for (var i = 0, file; file = files[i]; i++) {
                    if (file.type.indexOf("image") == 0 || (!file.type && /\.(?:jpg|png|gif|jpeg)$/.test(file.name) /* for IE10 */ )) {
                        arrFiles.push(file);
                    } else {
                        alert('文件"' + file.name + '"不是图片。');
                    }
                }
                return arrFiles;
			},
            deal: function(lastFiles, files) {	//处理旧的和新输入的文件
        		return files;
        	},
            onSelect: function(filteredFiles) {
                if (filteredFiles.length > 1) {
					casePreview.deleteFile(0);
					casePreview.__funDealFiles();
					return ;
				}
				var file = filteredFiles[0];
				if (!file) { return; }
                var reader = new FileReader();
				reader.onload = function(e) {
					inputCasePreviewAddMore.hide();
                    inputCasePreviewView.show();
					inputCasePreviewImg.attr('src', e.target.result);
				};
				reader.readAsDataURL(file);	
            },
            onDelete: function(deletedFile) {
                inputCasePreviewAddMore.show();
                inputCasePreviewView.hide();
                inputCasePreviewImg.removeAttr('src');
            },
            onComplete: function() {
                simplePost('<?php echo base_url('admin/add_case/ajax'); ?>', 'title=' + $.urlencode(inputTitle.val()), {
                    ok : function() {
                        hideProgress(postIsProgressing);
                        showToast('添加成功', {
                            onClose: function() {
                                (top || window).location.reload();
                            }
                        });
                    }
                });
            }
        });
        casePreview.init();
        function delCasePreImage() {
            casePreview.deleteFile(0);
        }
        
        var postIsProgressing;
        function submitAddCase() {
            if (inputTitle.val() == '') {
                showToast('请输入标题');
                inputTitle.focus();
                return false;
            }
            
            if (!caseSubs || caseSubs.filteredFiles.length < 1) {
                showToast('请选择案例图片');
                return false;
            }
            
            postIsProgressing = showProgress('正在上传...');
            caseSubs.url = caseSubs.url1;
            caseSubs.upload();
            return true;
        }
        </script>

<?php $this->load->view('admin/common/page-btm'); ?>
