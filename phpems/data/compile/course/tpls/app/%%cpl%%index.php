<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main box itembox">
			<h4 class="title" style="padding:10px;">
				我的课程
				<a href="index.php?course-app-index-lists" class="btn btn-primary pull-right">
					<em class="glyphicon glyphicon-plus-sign"></em> 开通新课程
				</a>
			</h4>
			<div class="col-xs-12" style="padding-left:0px;">
                <?php $cid = 0;
 foreach($this->tpl_var['contents']['data'] as $key => $content){ 
 $cid++; ?>
				<div class="col-xs-3" style="width:20%">
					<a href="index.php?course-app-course&csid=<?php echo $content['csid']; ?>" class="thumbnail">
						<img src="<?php if($content['csthumb']){ ?><?php echo $content['csthumb']; ?><?php } else { ?>app/core/styles/img/item.jpg<?php } ?>" alt="" width="100%">
					</a>
					<h5 class="text-center"><?php echo $content['cstitle']; ?></h5>
				</div>
                <?php } ?>
				<ul class="pagination pagination-right"><?php echo $this->tpl_var['contents']['pages']; ?></ul>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>