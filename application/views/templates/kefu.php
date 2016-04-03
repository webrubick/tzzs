<!--代码部分begin-->
<style>
#cs-float {
    font-size: 12px; background:#29a7e2; position: fixed; top: 250px; right: 0px; _position: absolute/* IE 6 */;
    z-index: 1500; border-radius:6px 0px 0 6px;
}
#cs-float, #cs-float * { box-sizing: border-box; }
#cs-float * { vertical-align: top; }
#cs-float a { color: #fff; text-decoration: none; }
#cs-float .floatL, #cs-float .floatR { display: inline-block; }
#cs-float .floatL { width: 40px; position: relative; z-index:1; padding: 20px 10px; cursor: pointer; text-align:center; }
#cs-float .floatL a { font-size: 20px; display: block; }
#cs-float .floatR { width: 150px; padding: 10px 5px 10px 0px; text-align:center; }
#cs-float .floatR .cn { background:#F7F7F7; border-radius:6px; margin-top:4px; }
#cs-float .cn .titZx { font-size: 14px; color: #333; font-weight: 600; line-height:24px; padding:5px; }
#cs-float .cn ul {padding:0px; line-height: 2em; }
#cs-float .cn ul li { line-height: 38px; height:38px; border-bottom: solid 1px #E6E4E4; overflow: hidden; }
#cs-float .cn ul li.bot { border: none;}
#cs-float .cn ul li span { color: #777;}
#cs-float .cn ul li a {color: #777;}
#cs-float .cn ul li img { vertical-align: middle; }
</style>
<div id="cs-float">
    <div class="floatL">
        <a id="aFloatTools_Show" class="btnOpen" title="查看在线客服" style="display:block" href="javascript:void(0);">在线客服 &lt;</a>
        <a id="aFloatTools_Hide" class="btnCtn" title="关闭在线客服" style="display:none" href="javascript:void(0);">在线客服 &gt;</a>
    </div>
    <div id="divFloatToolsView" class="floatR" style="display: none;">
        <div class="cn">
            <h3 class="titZx">在线客服</h3>
            <ul>
                <li>
                    <span>客服1</span>
                    <a href="http://wpa.qq.com/msgrd?v=3&uin=574879667&site=dx-sj.com&menu=yes" target="_blank">
					<img border="0" src="http://wpa.qq.com/pa?p=2:574879667:41" alt="我是，请给我发消息" title="我是，请给我发消息"/>
					</a>
				</li>
				<li>
                    <span>客服2</span>
                    <a href="http://wpa.qq.com/msgrd?v=3&uin=574879667&site=dx-sj.com&menu=yes" target="_blank">
					<img border="0" src="http://wpa.qq.com/pa?p=2:574879667:41" alt="我是，请给我发消息" title="我是，请给我发消息"/>
					</a>
				</li>
                <li class="bot"><span>电话：<?php print_r($website['contact']); ?></span> </li>
            </ul>
        </div>
    </div>
</div>
<script>
    $('#cs-float .floatL').click(function() {
        var aFloatTools_Show = $('#aFloatTools_Show');
        if (aFloatTools_Show.is(':visible')) {
    		$('#aFloatTools_Show').hide();
    		$('#aFloatTools_Hide').show();
	        $('#divFloatToolsView').show();
        } else {
    		$('#aFloatTools_Show').show();
    		$('#aFloatTools_Hide').hide();
            $('#divFloatToolsView').hide();
        }
    });
</script>
<!--代码部分end-->




