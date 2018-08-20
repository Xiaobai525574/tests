<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-2" style="padding-top:10px;margin-bottom:0px;">
				<?php $this->_compileInclude('menu'); ?>
			</div>
			<div class="col-xs-10" id="datacontent">
<?php } ?>
				<div class="box itembox" style="margin-bottom:0px;border-bottom:1px solid #CCCCCC;">
					<div class="col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a></li>
							<li class="active">分类管理</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						分类管理
						<span class="dropdown pull-right">
							<a class="btn btn-primary" href="#" data-toggle="dropdown">添加分类 <strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-category-add&parent=<?php echo $this->tpl_var['parent']; ?>">添加分类</a></li>
								<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-category&parent=<?php echo $this->tpl_var['categories'][$this->tpl_var['parent']]['catparent']; ?>">上级分类</a></li>
		                    </ul>
						</span>
					</h4>
					<h4><?php if($this->tpl_var['parent']){ ?><?php echo $this->tpl_var['categories'][$this->tpl_var['parent']]['catname']; ?><?php } else { ?>一级分类<?php } ?></h4>
					<form action="index.php?<?php echo $this->tpl_var['_app']; ?>-master-category-lite" method="post">
						<fieldset>
							<table class="table table-hover table-bordered">
								<thead>
									<tr class="info">
										<th width="80">排序</th>
										<th width="80">ID</th>
										<th width="80">缩略图</th>
										<th>分类名称</th>
										<th width="180">操作</th>
									</tr>
								</thead>
								<tbody>
									<?php $cid = 0;
 foreach($this->tpl_var['categorys']['data'] as $key => $category){ 
 $cid++; ?>
									<tr>
										<td><input type="text" class="form-control" name="ids[<?php echo $category['catid']; ?>]" value="<?php echo $category['catlite']; ?>" style="width:48px;padding:2px 5px;"/></td>
										<td><?php echo $category['catid']; ?></td>
										<td><img src="<?php if($category['catimg']){ ?><?php echo $category['catimg']; ?><?php } else { ?>app/core/styles/images/noupload.gif<?php } ?>" alt="" style="width:48px;"/></td>
										<td><span><?php echo $category['catname']; ?></span></td>
										<td>
											<div class="btn-group">
												<a class="btn" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-category-add&parent=<?php echo $category['catid']; ?><?php echo $this->tpl_var['u']; ?>"><em class="glyphicon glyphicon-plus"></em></a>
												<a class="btn" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-category&parent=<?php echo $category['catid']; ?><?php echo $this->tpl_var['u']; ?>"><em class="glyphicon glyphicon-list"></em></a>
												<a class="btn" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-category-edit&page=<?php echo $this->tpl_var['page']; ?>&catid=<?php echo $category['catid']; ?><?php echo $this->tpl_var['u']; ?>"><em class="glyphicon glyphicon-edit"></em></a>
												<a class="btn confirm" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-category-del&catid=<?php echo $category['catid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>"><em class="glyphicon glyphicon-remove"></em></a>
											</div>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<div class="control-group">
					            <div class="controls">
						            <?php $sid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $sid++; ?>
						            <input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
						            <?php } ?>
						            <label class="radio-inline">
						            	<button class="btn btn-primary" type="submit">更改排序</button>
						            </label>
						            <input type="hidden" name="modifycategorysequence" value="1"/>
						            <input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
						        </div>
					        </div>
							<ul class="pagination pull-right">
								<?php echo $this->tpl_var['categorys']['pages']; ?>
							</ul>
						</fieldset>
					</form>
				</div>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>