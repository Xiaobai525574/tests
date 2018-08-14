<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-2" style="margin-bottom:0px;padding:0px;padding-top:10px;">
				<div id="catsmenu" style="margin-top: 0px;"></div>
			</div>
			<div class="col-xs-10" id="datacontent">
<?php } ?>
				<div class="box itembox" style="margin-bottom:0px;border-bottom:1px solid #CCCCCC;">
					<div class="col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a></li>
							<?php if($this->tpl_var['catid']){ ?>
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-docs">词条管理</a></li>
							<li class="active"><?php echo $this->tpl_var['categories'][$this->tpl_var['catid']]['catname']; ?></li>
							<?php } else { ?>
							<li class="active">词条管理</li>
							<?php } ?>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;overflow:visible">
					<h4 class="title" style="padding:10px;">
                        <?php if($this->tpl_var['catid']){ ?><?php echo $this->tpl_var['categories'][$this->tpl_var['catid']]['catname']; ?><?php } else { ?>所有内容<?php } ?>
						<span class="pull-right">
							<a class="btn btn-primary" href="index.php?docs-master-docs-add&catid=<?php echo $this->tpl_var['catid']; ?>&page=<?php echo $this->tpl_var['page']; ?>">添加词条</a>
						</span>
					</h4>
					<form action="index.php?docs-master-docs" method="post" class="form-inline">
						<table class="table">
					        <tr>
								<td style="border-top:0px;">
									内容ID：
								</td>
								<td style="border-top:0px;">
									<input name="search[docid]" class="form-control" size="15" type="text" class="number" value="<?php echo $this->tpl_var['search']['docid']; ?>"/>
								</td>
								<td style="border-top:0px;">
									录入时间：
								</td>
								<td style="border-top:0px;">
									<input class="form-control datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" type="text" name="search[stime]" size="10" id="stime" value="<?php echo $this->tpl_var['search']['stime']; ?>"/> - <input class="form-control datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" size="10" type="text" name="search[etime]" id="etime" value="<?php echo $this->tpl_var['search']['etime']; ?>"/>
								</td>
								<td style="border-top:0px;">
									关键字：
								</td>
								<td style="border-top:0px;">
									<input class="form-control" name="search[keyword]" size="15" type="text" value="<?php echo $this->tpl_var['search']['keyword']; ?>"/>
								</td>
							</tr>
							<tr>
								<td>
									完善情况：
								</td>
								<td>
									<select class="form-control" name="search[docneedmore]">
										<option value="0">不限</option>
										<option value="-1"<?php if($this->tpl_var['search']['docneedmore'] == -1){ ?> selected<?php } ?>>已完善</option>
										<option value="1"<?php if($this->tpl_var['search']['docneedmore'] == 1){ ?> selected<?php } ?>>待完善</option>
									</select>
								</td>
								<td>
									是否推荐：
								</td>
								<td>
									<select class="form-control" name="search[docistop]">
										<option value="0">不限</option>
										<option value="-1"<?php if($this->tpl_var['search']['docistop'] == -1){ ?> selected<?php } ?>>未推荐</option>
										<option value="1"<?php if($this->tpl_var['search']['docistop'] == 1){ ?> selected<?php } ?>>推荐</option>
									</select>
								</td>
								<td>
									是否锁定：
								</td>
								<td>
									<select class="form-control" name="search[docsyslock]">
										<option value="0">不限</option>
										<option value="-1"<?php if($this->tpl_var['search']['docsyslock'] == -1){ ?> selected<?php } ?>>未锁定</option>
										<option value="1"<?php if($this->tpl_var['search']['docsyslock'] == 1){ ?> selected<?php } ?>>锁定</option>
									</select>
								</td>
							</tr>
					        <tr>
								<td>
									分类：
								</td>
								<td colspan="4">
							  		<select msg="您必须选择一个分类" class="autocombox form-control" name="search[doccatid]" refUrl="index.php?docs-master-category-ajax-getchildcategory&catid={value}">
						            	<option value="">选择一级分类</option>
						            	<?php $cid = 0;
 foreach($this->tpl_var['parentcat'] as $key => $cat){ 
 $cid++; ?>
						            	<option value="<?php echo $cat['catid']; ?>"><?php echo $cat['catname']; ?></option>
						            	<?php } ?>
						            </select>
					        	</td>
								<td>
									<button class="btn btn-primary" type="submit">提交</button>
								</td>
							</tr>
						</table>
						<div class="input">
							<input type="hidden" value="1" name="search[argsmodel]" />
						</div>
					</form>
					<form action="index.php?docs-master-docs-lite" method="post">
						<fieldset>
							<table class="table table-hover table-bordered">
								<thead>
									<tr class="info">
					                    <th width="36"><input type="checkbox" class="checkall" target="delids"/></th>
					                    <th width="60">权重</th>
					                    <th width="40">ID</th>
					                    <th width="80">缩略图</th>
								        <th>标题</th>
										<th width="80">状态</th>
								        <th width="80">分类</th>
								        <th width="80">发布时间</th>
								        <th width="140">操作</th>
					                </tr>
					            </thead>
					            <tbody>
					            	<?php $did = 0;
 foreach($this->tpl_var['docs']['data'] as $key => $doc){ 
 $did++; ?>
					            	<tr>
					                    <td><input type="checkbox" name="delids[<?php echo $doc['docid']; ?>]" value="1"></td>
					                    <td><input class="form-control" type="text" name="ids[<?php echo $doc['docid']; ?>]" value="<?php echo $doc['docsequence']; ?>" style="width:36px;padding:2px 5px;"/></td>
					                    <td><?php echo $doc['docid']; ?></td>
					                    <td class="picture"><img src="<?php if($doc['docthumb']){ ?><?php echo $doc['docthumb']; ?><?php } else { ?>app/core/styles/images/noupload.gif<?php } ?>" alt="" style="width:48px;"/></td>
					                    <td>
                                             <?php echo $doc['doctitle']; ?>
					                    </td>
										<td style="text-align: center">
                                            <?php if($doc['docistop']){ ?><em title="推荐词条" class="glyphicon glyphicon-thumbs-up"></em><?php } ?>
											<?php if($doc['docneedmore']){ ?><em title="待完善" class="glyphicon glyphicon-exclamation-sign"></em><?php } ?>
                                            <?php if($doc['docsyslock']){ ?><em title="已锁定" class="glyphicon glyphicon-lock"></em><?php } ?>
										</td>
					                    <td>
					                    	<a href="index.php?docs-master-docs&catid=<?php echo $doc['doccatid']; ?>" target=""><?php echo $this->tpl_var['categories'][$doc['doccatid']]['catname']; ?></a>
					                    </td>
					                    <td>
					                    	<?php echo date('y-m-d',$doc['docinputtime']); ?>
					                    </td>
					                    <td class="actions">
					                    	<div class="btn-group">
												<a class="btn" href="index.php?docs-master-docs-history&docid=<?php echo $doc['docid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="版本"><em class="glyphicon glyphicon-list"></em></a>
												<a class="btn" href="index.php?docs-master-docs-edit&docid=<?php echo $doc['docid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="修改"><em class="glyphicon glyphicon-edit"></em></a>
												<a class="btn confirm" href="index.php?docs-master-docs-del&docid=<?php echo $doc['docid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="删除"><em class="glyphicon glyphicon-remove"></em></a>
					                    	</div>
					                    </td>
					                </tr>
					                <?php } ?>
					        	</tbody>
					        </table>
					        <div class="control-group">
					            <div class="controls">
						            <label class="radio-inline">
						                <input type="radio" name="action" value="sequence" checked/>排序
						            </label>
						            <label class="radio-inline">
						                <input type="radio" name="action" value="more"/>设为待完善
						            </label>
									<label class="radio-inline">
										<input type="radio" name="action" value="unmore"/>设为已完善
									</label>
									<label class="radio-inline">
										<input type="radio" name="action" value="top"/>设为推荐
									</label>
									<label class="radio-inline">
										<input type="radio" name="action" value="untop"/>取消推荐
									</label>
									<label class="radio-inline">
										<input type="radio" name="action" value="lock"/>锁定
									</label>
									<label class="radio-inline">
										<input type="radio" name="action" value="unlock"/>解锁
									</label>
						            <label class="radio-inline">
						                <input type="radio" name="action" value="move" />移动
						            </label>
						            <label class="radio-inline">
						                <input type="radio" name="action" value="delete" />删除
						            </label>
						            <?php $sid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $sid++; ?>
						            <input type="hidden"-name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
						            <?php } ?>
						            <label class="radio-inline">
						            	<button class="btn btn-primary" type="submit">提交</button>
						            </label>
						            <input type="hidden" name="modifycontentsequence" value="1"/>
						            <input type="hidden" name="catid" value="<?php echo $this->tpl_var['catid']; ?>"/>
						            <input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
						        </div>
					        </div>
							<ul class="pagination pull-right">
								<?php echo $this->tpl_var['docs']['pages']; ?>
							</ul>
						</fieldset>
					</form>
				</div>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<script src="index.php?docs-master-docs-catsmenu&catid=<?php echo $this->tpl_var['catid']; ?>"></script>
<script>
    $('#catsmenu').treeview({
        levels: <?php echo $this->tpl_var['catlevel']; ?>,
        expandIcon: 'glyphicon glyphicon-chevron-right',
        collapseIcon: 'glyphicon glyphicon-chevron-down',
        selectedColor: "#000000",
        selectedBackColor: "#FFFFFF",
        enableLinks: true,
        data: treeData
    });
</script>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>