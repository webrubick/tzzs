
function simplePost(postUrl, postData, callbackFuncs) {
	$.ajax({
		type: "POST",
		url: postUrl,
		dataType: "json",
		data: postData,
		success: function(data){
			if (callbackFuncs && callbackFuncs.success) {
				callbackFuncs.success(data);
			}
			if (data.code == 200) {
				if (callbackFuncs && callbackFuncs.ok) {
					callbackFuncs.ok(data);
				} else {
					(top || window).location.href = data.data;
				}
			} else {
			    if (callbackFuncs && callbackFuncs.notok) {
			        callbackFuncs.notok(data);
			    }
			    showToast(data.msg);
			}
		},
		beforeSend:function(){
		},
		error:function(XMLHttpRequest, textStatus, errorThrown){
			if (callbackFuncs && callbackFuncs.error) {
				callbackFuncs.error(XMLHttpRequest, textStatus, errorThrown);
			}
			showToast("出错了：" + textStatus);
		}
	});
}


/*
 * <Admin Common> JavaScript Document 
 * Requires : jQuery v1.8.2
 * Copyright © 2014 VIP.com. All rights reserved.
 */
	var ui = {
		/** 
		 * TabBox
		 */
		TabBox: function(target){
						
			var obj, tab, thisTab, tabItem, thisItem, index;
			
			obj = $(target);
			tab = obj.find('.tabs');
			tabItem = obj.find('.tab-item');
									
			tab.on('click', 'a', function() {
								
				thisTab = $(this);
				index = thisTab.index();
				thisTab.addClass('curr').siblings().removeClass('curr');
				tabItem.removeClass('curr').hide().eq(index).addClass('curr').show();
			});
		},

	
		/**
		 * Dialog
		 * @method: 
			 -> close()
		 */
		Dialog: function(param){
			
			// Parameters
			self = this;
			self.width = param.width;                          // 类型为int
			self.height = param.height;                        // 类型为int
			self.title = param.title;                          // 标题
			self.textContent = param.textContent;              // 文字內容
			self.isAlert = param.isAlert;                      // 是否提示框
			self.elem = param.elem;                            // 添加的DOM元素ID
			self.closeButton = param.closeButton;              // 关闭按钮，默认为true
			self.shadow = param.shadow;                        // 阴影层，默认为true
			self.autoClose = param.autoClose;                  // 自动关闭
			self.closeDuration = param.closeDuration;          // 延迟时间
			self.closeCallBacks = param.closeCallBacks;        // 自动关闭时执行的回调函数
			
			// Close Dialog Function
			self.close = function() {
				
				if (param.elem) {
				
					var _elem = document.getElementById(param.elem);
					_elem.style.display = "none";
					document.body.appendChild(_elem);
				}
				if(ds)  ds.parentNode.removeChild(ds);    // 判断是否有阴影
				d.parentNode.removeChild(d);              // 删除对话框
			}

			/* Init Dialog Element */		
			var _width, _height, _title, _textContent, _isAlert, _closeButton, _shadow;
			
			if (self.width)    _width = self.width;
			if (self.height)    _height = self.height;
			
			if (self.title)    _title = "<span class='admin-ui-dialog-head-title'>" + self.title + "</span>";
			else               _title = "";
			
			if (self.textContent)    _textContent = "<div class='admin-ui-dialog-body-textContent'>" + self.textContent + "</div>";
			else                     _textContent = "";
							
			if (self.isAlert != false) _isAlert = true;

			_closeButton = "<span class='admin-ui-dialog-head-closeButton'></span>";
						
			/* Create Dialog */
			var htm1, d;
						
			htm1 = "<div class='admin-ui-dialog-head'>" + _title + _closeButton + "</div><div class='admin-ui-dialog-body'>" + _textContent + "</div>",
			
			d = document.createElement("div");
			
			if (_isAlert)    d.className = 'admin-ui-dialog';
			else             d.className = 'admin-ui-dialog alert';
			
			d.innerHTML = htm1;
			d.style.display = "block";
			d.style.width = _width + "px";
			d.style.height = _height + "px";
			document.body.appendChild(d);
						
			/* Create Dialog Shadow */
			if(self.shadow != false){
				
				var htm2 = "<div class='admin-ui-dialog-shadow'></div>",
				    ds = document.createElement("div");
				
				ds.className = 'admin-ui-dialog-shadow';
				ds.innerHTML = htm2;
				document.body.appendChild(ds);
			}
						
			var dialog = document.getElementsByClassName('admin-ui-dialog')[0] || document.getElementsByClassName('admin-ui-dialog-alert')[0],    // 获取对话框
				dialogTop = 0,
				dialogLeft = 0,
				viewPortWidth = document.documentElement.clientWidth,
				viewPortHeight = document.documentElement.clientHeight,		
				scrollTop = document.documentElement.scrollTop,
				scrollLeft = document.documentElement.scrollLeft;
				
			console.log(viewPortHeight);
				
				
			// Show Close Button
			if (self.closeButton != false) {
			
				var cBtn = dialog.getElementsByClassName('admin-ui-dialog-head-closeButton')[0];
				
				if (cBtn.addEventListener) {
					
					cBtn.addEventListener("click", self.close);
				
				} else if (cBtn.attachEvent) {
				
					cBtn.attachEvent("onclick", self.close);
				}
				cBtn.style.display = "block";
			}
			
			// Append Element
			if (self.elem) {
			
				var _elem = document.getElementById(self.elem);
				dialog.getElementsByClassName('admin-ui-dialog-body')[0].appendChild(_elem);
				_elem.style.display = "block";
			}

			var dialogWidth = dialog.offsetWidth,		
				dialogHeight = dialog.offsetHeight;

			// Set Left
			if (dialogWidth <= viewPortWidth) {
			
				dialogLeft = (viewPortWidth - dialogWidth)/2 + scrollLeft;
				dialog.style.left = dialogLeft + "px";
			
			} else {
			
				dialog.style.left = "0px";
			}
			
			// Set Top
			if (dialogHeight <= viewPortHeight) {			
							
				dialogTop = (viewPortHeight - dialogHeight)/2 + scrollTop;
				dialog.style.top = dialogTop + "px";
			
			} else {
			
				dialog.style.top = "0px";
			}
			
			// Auto Close
			if (self.autoClose === true) {
				
				var _closeFn = self.close,
					_closeDuration = self.closeDuration,
					_closeCallBacks = self.closeCallBacks;
				
				if (!_closeDuration)    _closeDuration = 3000;
														
				setTimeout(function() {
					
					_closeFn();						
					_closeCallBacks();
					
				}, _closeDuration);
			}
		},
		
		/**
		 * Overlay - 遮罩层
		 * @method: 
			 -> open()
			 -> close()
		 */
		Overlay: {
			
			open: function() {
				
				$("body").append("<div id='overlay'></div>");
			},
			
			close: function() {
				
				$("#overlay").remove();
			}
		}
	}; 

function showToast(msg, callbacks){
	new ui.Dialog({
		width:300,
		textContent : msg,
		textContentAlign : "center",
		closeButton : false,
		shadow : true,
		autoClose : true,
		closeDuration : 1000,
		closeCallBacks: function() {
		    if (callbacks && callbacks.onClose) {
		        callbacks.onClose();
		    }
			return false;
		}
	});
}

function showProgress (msg) {
	return new ui.Dialog({
		width:300,
		textContent : msg || '正在加载...',
		textContentAlign : "center",
		closeButton : false,
		shadow : true,
		autoClose : false,
		closeDuration : 1000,
		closeCallBacks: function() {
			return false;
		}
	});
}

function hideProgress (dialog) {
	if (dialog && dialog.close) {
		dialog.close();
	}
}

/**
 * small helper function to urlencode strings
 */
if (!$.urlencode) {
	$.urlencode = encodeURIComponent;
}


/*
 * zxxFile.js 基于HTML5 文件上传的核心脚本 http://www.zhangxinxu.com/wordpress/?p=1923
 * by zhangxinxu 2011-09-12
*/
var ZXXFILE = {
	fileInput: null,				//html file控件
	url: "",						//ajax地址
	filteredFiles: [],					//过滤后的文件数组
	filter: function(files) {		// 选择文件组的过滤方法，如果返回的是空数组，则onSelect或者onAppendSelect
		return files;	
	},
	deal: function(lastFiles, files) {	//处理旧的和新输入的文件
		return (lastFiles || []).concat(files);
	},
	
	onSelect: function(filteredFiles) {},		//文件选择后
	onAppendSelect: function(filteredFiles) {},
	onDelete: function(deletedFile) {},		//文件删除后
	
	onProgress: function(file, loaded, total) {},		//文件上传进度
	dealResponse: function(xhr) { return false; },		//处理结果，如果返回的值==true，就不进行onSuccess或onFailed
	onSuccess: function(file, data) {},		//文件上传成功时
	onFailure: function(file, msg) {},		//文件上传失败时,
	onComplete: function() {},		//文件全部上传完毕时
	
	//删除对应的文件
	deleteFile: function(key) {
		var arrFile = [];
		for (var i = 0, file; file = this.filteredFiles[i]; i++) {
			if (file.index != key) {
				arrFile.push(file);
			} else {
				this.onDelete(file);
			}
		}
		this.filteredFiles = arrFile;
		this.__funReIndexFiles();
		return this;
	},
	
	//文件上传
	upload: function() {
		var self = this;	
		if (location.host.indexOf("sitepointstatic") >= 0) {
			//非站点服务器上运行
			return;	
		}
		var uploadCount = (self.filteredFiles || []).length;
		var uploadIndex = 0;
		function __upload(file) {
		    var xhr = new XMLHttpRequest();
		    if (xhr.upload) {
				// 上传中
				xhr.upload.addEventListener("progress", function(e) {
					self.onProgress(file, e.loaded, e.total);
				}, false);
				// 文件上传成功或是失败
				xhr.onreadystatechange = function(e) {
					if (xhr.readyState == 4) {
						if (self.dealResponse(xhr)) {
							next();
							return ;
						}
						if (xhr.status == 200) {
							// ***************************
							// 这边是我自己的处理
							// ***************************
							var myJsonResult = $.parseJSON(xhr.responseText);
							if (myJsonResult.code == 200) {
								self.onSuccess(file, myJsonResult.data);
							} else {
								self.onFailure(file, myJsonResult.msg);	
							}
						} else {
							self.onFailure(file, xhr.responseText);
						}
						next();
					}
				};
				// 开始上传
				xhr.open("POST", self.url, true);
				xhr.setRequestHeader("X_FILENAME", $.urlencode(file.name));
				xhr.send(file);
			}	
		}
		function next() {
		    var file = self.filteredFiles[uploadIndex];
		    if (!file) {
		        self.onComplete();
		        return;
		    }
		    __upload(file);
		    uploadIndex++;
		}
		next();
	},
	
	//获取选择文件，file控件或拖放
	__funGetFiles: function(e) {
		// 获取文件列表对象
		var files = e.target.files || e.dataTransfer.files;
		if (!files || (files['length'] && files.length < 1)) {
		    return this;
		}
		files = this.filter(files);
		if (!files || (files['length'] && files.length < 1)) {
		    return this;
		}
	    //继续添加文件
	    this.onAppendSelect(files);
		this.filteredFiles = this.deal(this.filteredFiles, files);
		this.__funDealFiles();
		return this;
	},
	
	__funDealFiles: function() {
		this.__funReIndexFiles();
		//执行选择回调
		this.onSelect(this.filteredFiles);
		return this;
	},
	
	__funReIndexFiles: function() {
	    for (var i = 0, file; file = this.filteredFiles[i]; i++) {
			//增加唯一索引值
			file.index = i;
		}
	},
	
	init: function() {
		var self = this;
		//文件选择控件选择
		if (this.fileInput) {
			this.fileInput.addEventListener("change", function(e) { self.__funGetFiles(e); }, false);	
		}
	}
};


