<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-2" style="margin-top:10px;">
				<ul class="list-group">
					<?php $cid = 0;
 foreach($this->tpl_var['catbrother'] as $key => $cat){ 
 $cid++; ?>
					<li class="list-group-item<?php if($this->tpl_var['cat']['catid'] == $cat['catid']){ ?> active<?php } ?>">
						<?php if($this->tpl_var['cat']['catid'] == $cat['catid']){ ?>
						<?php echo $cat['catname']; ?>
						<?php } else { ?>
						<a href="index.php?docs-app-category-needmore&catid=<?php echo $cat['catid']; ?>"><?php echo $cat['catname']; ?></a>
						<?php } ?>
					</li>
					<?php } ?>
					<?php if($this->tpl_var['cat']['catparent']){ ?>
					<li class="list-group-item">
						<a href="index.php?docs-app-category-needmore&catid=<?php echo $this->tpl_var['cat']['catparent']; ?>">返回</a>
					</li>
					<?php } ?>
				</ul>
			</div>
			<div class="col-xs-10">
				<div class="box itembox" style="margin-bottom:0px;">
					<div class="col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php">首页</a></li>
							<li><a href="index.php?docs">文档</a></li>
						  	<?php $cbid = 0;
 foreach($this->tpl_var['catbread'] as $key => $cb){ 
 $cbid++; ?>
							<li><a href="index.php?docs-app-category-needmore&catid=<?php echo $cb['catid']; ?>"><?php echo $cb['catname']; ?></a></li>
							<?php } ?>
							<?php if($this->tpl_var['cat']){ ?>
							<li href="index.php?docs-app-category-needmore&catid=<?php echo $this->tpl_var['cat']['catid']; ?>"><?php echo $this->tpl_var['cat']['catname']; ?></li>
							<?php } ?>
							<li class="active">待完善词条</li>
						</ol>
					</div>
				</div>
				<?php $did = 0;
 foreach($this->tpl_var['docs']['data'] as $key => $doc){ 
 $did++; ?>
				<div class="box itembox" style="padding-top:20px;">
					<div class="col-xs-3">
						<a href="index.php?docs-app-docs&docid=<?php echo $doc['docid']; ?>" class="thumbnail pull-left">
							<img src="<?php echo $doc['docthumb']; ?>" alt="" width="100%">
						</a>
					</div>
					<div class="col-xs-9">
						<a href="index.php?docs-app-docs&docid=<?php echo $doc['docid']; ?>"><h4 class="title"><?php echo $doc['doctitle']; ?></h4></a>
						<p><?php echo $doc['docdescribe']; ?></p>
						<hr/>
						<p>
							<span class="pull-right">
								<a href=""><span class="glyphicon glyphicon-time"></span> <span><?php echo date('Y-m-d H:i:s',$doc['docinputtime']); ?></span></a>&nbsp;&nbsp;
							</span>
						</p>
					</div>
				</div>
				<?php } ?>
				<ul class="pagination pull-right">
					<?php echo $this->tpl_var['docs']['pages']; ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>