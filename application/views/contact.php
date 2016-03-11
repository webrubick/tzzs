<?php $extra_head = array();
$extra_head[] = title_tag($website['website_name']);
$extra_head[] = exlink_tag('public/css/index.css');
$extra_head[] = script_tag('http://api.map.baidu.com/api?key=&v=1.1&services=true');
?>

<?php $this->load->view('common/page-top', array('extra_head' => $extra_head)); ?>

<?php $this->load->view('common/page-header', array('extra_header' => array())); ?>
        
        <style type="text/css">
            html,body{margin:0;padding:0;}
            .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
            .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
            .dituContent-wrap img, #dituContent img {
                display: inline;
                width: auto !important;
                max-width: auto !important;
            }
        </style>
        
        <!-- main content -->
        <section class="content-wrap">
            <section class="sub-page content text-normal">
                <main class="sub-page fixed-width-small tc-normal" style="padding-left: 10px">
                    <h3 class="subtitle hover">
                        中国 · 泰兴鼎鑫设计装饰
                    </h3>
                    <img src="public/img/subtitle-sep.jpg" style="margin-top: 5px"/>
                    
                    
                    <p/>
                    <div class="subtitle"> 	
                        <small>泰兴鼎鑫设计装饰总部</small>
                    </div>
                    <p/>
                    
                    <div class="highlight" style="font-size: 14px; line-height: 2em;">
                        地址：<?php print_r($website['com_address']); ?>
                        <br/>
                        邮编：<?php print_r($website['com_postcode']); ?>
                        <br/>
                        电话（总机）：<a href="tel:<?php print_r($website['contact']); ?>"><?php print_r($website['contact']); ?></a> 
                        <br/>
                        客户热线：<a href="tel:<?php print_r($website['contact']); ?>"><?php print_r($website['contact']); ?></a> 
                        <br/>
                        业务合作：<a href="tel:<?php print_r($website['contact']); ?>"><?php print_r($website['contact']); ?></a> 
                        <br/>
                        传真：-
                    </div>
                    
                    <div class="subtitle"></div>
                    <div class="dituContent-wrap fixed-width-small center-in-wrap">
                        <div style="width: 100%; height: 400px; border:#ccc solid 1px;" id="dituContent"></div>
                    </div>
                </main>
            </section>
        
    <?php $this->load->view('common/page-footer.php'); ?>

        </section>
        
        <?php echo script_tag('public/js/core.min.js'); ?>
        <?php echo script_tag('public/js/rb-script.js'); ?>
        
        <script type="text/javascript">
        //创建和初始化地图函数：
        function initMap(){
            createMap();//创建地图
            setMapEvent();//设置地图事件
            addMapControl();//向地图添加控件
            addMarker();//向地图中添加marker
        }
        
        //创建地图函数：
        function createMap(){
            var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
            var point = new BMap.Point(120.058599,32.177584);//定义一个中心点坐标
            map.centerAndZoom(point,13);//设定地图的中心点和坐标并将地图显示在地图容器中
            window.map = map;//将map变量存储在全局
        }
        
        //地图事件设置函数：
        function setMapEvent(){
            map.disableDragging();//禁用地图拖拽事件
            map.disableScrollWheelZoom();//禁用地图滚轮放大缩小，默认禁用(可不写)
            map.disableDoubleClickZoom();//禁用鼠标双击放大
            map.disableKeyboard();//禁用键盘上下左右键移动地图，默认禁用(可不写)
        }
        
        //地图控件添加函数：
        function addMapControl(){
            //向地图中添加缩放控件
    	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_ZOOM});
    	map.addControl(ctrl_nav);
            //向地图中添加缩略图控件
    	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
    	map.addControl(ctrl_ove);
            //向地图中添加比例尺控件
    	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
    	map.addControl(ctrl_sca);
        }
        
        //标注点数组
        var markerArr = [{title:"我们在这里",content:"我的备注",point:"120.05903|32.183452",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
    		 ];
        //创建marker
        function addMarker(){
            for(var i=0;i<markerArr.length;i++){
                var json = markerArr[i];
                var p0 = json.point.split("|")[0];
                var p1 = json.point.split("|")[1];
                var point = new BMap.Point(p0,p1);
    			var iconImg = createIcon(json.icon);
                var marker = new BMap.Marker(point,{icon:iconImg});
    			var iw = createInfoWindow(i);
    			var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
    			marker.setLabel(label);
                map.addOverlay(marker);
                label.setStyle({
                            borderColor:"#808080",
                            color:"#333",
                            cursor:"pointer"
                });
    			
    			(function(){
    				var index = i;
    				var _iw = createInfoWindow(i);
    				var _marker = marker;
    				_marker.addEventListener("click",function(){
    				    this.openInfoWindow(_iw);
    			    });
    			    _iw.addEventListener("open",function(){
    				    _marker.getLabel().hide();
    			    })
    			    _iw.addEventListener("close",function(){
    				    _marker.getLabel().show();
    			    })
    				label.addEventListener("click",function(){
    				    _marker.openInfoWindow(_iw);
    			    })
    				if(!!json.isOpen){
    					label.hide();
    					_marker.openInfoWindow(_iw);
    				}
    			})()
            }
        }
        //创建InfoWindow
        function createInfoWindow(i){
            var json = markerArr[i];
            var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
            return iw;
        }
        //创建一个Icon
        function createIcon(json){
            var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
            return icon;
        }
        
        initMap();//创建和初始化地图
    </script>
        
<?php $this->load->view('common/page-bottom'); ?>