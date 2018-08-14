<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<?php $cid = 0;
 foreach($this->tpl_var['catids'] as $key => $cat){ 
 $cid++; ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main box itembox">
			<h4 class="title"><a href="index.php?course-app-category&catid=<?php echo $cat['catid']; ?>"><?php echo $cat['catname']; ?></a></h4>
			<div class="col-xs-3" style="padding:0px;">
				<a href="index.php?course-app-category&catid=<?php echo $cat['catid']; ?>" class="">
					<img src="<?php echo $cat['catimg']; ?>" alt="" width="287">
				</a>
			</div>
			<div class="col-xs-9" style="padding-left:0px;">
				<?php $cid = 0;
 foreach($this->tpl_var['contents'][$cat['catid']]['data'] as $key => $content){ 
 $cid++; ?>
				<div class="col-xs-3">
					<a href="index.php?course-app-course&csid=<?php echo $content['csid']; ?>" class="thumbnail">
						<img src="<?php echo $content['csthumb']; ?>" alt="" width="180">
					</a>
					<h5 class="text-center"><?php echo $content['cstitle']; ?></h5>
				</div>
				<?php if($cid % 4 == 0){ ?>
				<div class="col-xs-12"><hr /></div>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>