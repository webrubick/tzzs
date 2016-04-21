<?php $this->load->view('admin/common/page-top'); ?>

<?php $this->load->view('admin/common/page-header'); ?>

        <style>
        #case-list { table-layout: fixed; border-collapse: collapse; border-spacing: 0; width: 100%; }
        #case-list th { color: #000; text-align: center; background: #f9f9f9; }
        #case-list .col-preview { width: 120px; text-align: center; }
        #case-list .preview { width: 100px; }
        #case-list .col-op { width: 80px; }
        #case-list .col-time { width: 175px; }
        
        table tr>th, table tr>td { border: 1px solid #ddd; padding: 8px; }
        
        #case-listing-pager { text-align: center; }
        #case-listing-pager ul { line-height: 2.5em; }
        
        #case-listing-pager li { position: relative; display: inline-block; }
        
        #case-listing-pager li a, #case-listing-pager li span {
            padding: 0.25em 0.75em; margin-left: .35em;
            border: 1px solid #ccc;
        }
        
        #case-listing-pager li a:hover, #case-listing-pager li.checked span {
            color: #fff; background: #ccbc8b;
        }
        </style>
                <div style="text-align: right; ">
                    <a class="button" href="admin/add_case">添加案例</a>
                </div>
                
                <div class="top-sep line-sep"></div>
                
        <?php if (isset($dx_cases) && !empty($dx_cases)) : ?>
                <table id="case-list" class="top-sep">
                    <tr>
                        <th class="col-preview">预览图</th>
                        <th>标题</th>
                        <th class="col-time">更新时间</th>
                        <th class="col-op">操作</th>
                    </tr>
            <?php foreach($dx_cases as $dx_case) : ?>
                    <tr>
                        <td class="col-preview"><img class="preview" src="<?php print_r($dx_case['content_path'] . $dx_case['preview']) ;?>" /></td>
                        <td><?php print_r($dx_case['title']); ?></td>
                        <td class="col-time"><?php print_r($dx_case['update_time']); ?></td>
                        <td class="col-op">
                            <a href="javascript:;" onclick="return delCase(<?php print_r($dx_case['id']); ?>);">删除</a>
                        </td>
                    </tr>
            <?php endforeach ; ?>
                </table>

<?php $this->load->view('admin/case-list-pager'); ?>
            
        <?php else : ?>
                <p class="top-sep">
                    还没有案例
                </p>
        <?php endif ; ?>

<?php $this->load->view('admin/common/page-footer'); ?>

        <script type="text/javascript">
        function delCase(cid) {
            var r = confirm('确认删除案例？');
    		if (r === true)    simplePost('admin/del_case/ajax', 'cid=' + cid<?php isset($pagearr) ? print_r(" + '&currentpage=" . $pagearr['currentpage'] . "'") : print_r(''); ?>);
    		else               return false;
        }
        </script>
<?php $this->load->view('admin/common/page-btm'); ?>

