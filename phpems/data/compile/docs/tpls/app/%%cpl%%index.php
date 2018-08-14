<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main" style="overflow:hidden;">
			<div class="col-xs-10 box" style="padding:0px;width:79%;padding: 20px 10px 10px 10px;">
                <?php $did = 0;
 foreach($this->tpl_var['docs']['top']['data'] as $key => $doc){ 
 $did++; ?>
				<div class="col-xs-3">
					<a href="index.php?docs-app-docs&docid=<?php echo $doc['docid']; ?>" class="thumbnail">
						<img src="<?php echo $doc['docthumb']; ?>" alt="" width="100%">
					</a>
					<h5 class="text-center"><?php echo $this->G->make('strings')->subString($doc['doctitle'],36); ?></h5>
				</div>
                <?php } ?>
			</div>
			<div class="col-xs-2 box itembox pull-right" style="width:20%;overflow:hidden;padding: 20px 20px 30px 20px;">
				<h4 class="text-center" style="line-height: 2em">共有词条 <?php echo $this->tpl_var['number']['all']; ?> 个</h4>
				<h4 class="text-center" style="line-height: 2em">待完善词条 <?php echo $this->tpl_var['number']['more']; ?> 个</h4>
				<h5>&nbsp;</h5>
				<p><a class="btn btn-primary btn-block" href="index.php?docs-app-category-needmore">协助完善词条</a></p>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-6 box itembox" style="min-height:200px;">
				<h4 class="title">最新词条</h4>
				<ul class="list-unstyled">
                    <?php $did = 0;
 foreach($this->tpl_var['docs']['new']['data'] as $key => $doc){ 
 $did++; ?>
					<li><a href="index.php?docs-app-docs&docid=<?php echo $doc['docid']; ?>" title="<?php echo $doc['doctitle']; ?>"><?php echo $doc['doctitle']; ?></a></li>
                    <?php } ?>
				</ul>
			</div>
			<div class="col-xs-6 box itembox" style="min-height:200px;">
				<h4 class="title"><a href="index.php?docs-app-category-needmore">待完善词条</a></h4>
				<ul class="list-unstyled">
                    <?php $did = 0;
 foreach($this->tpl_var['docs']['more']['data'] as $key => $doc){ 
 $did++; ?>
					<li><a href="index.php?docs-app-docs&docid=<?php echo $doc['docid']; ?>" title="<?php echo $doc['doctitle']; ?>"><?php echo $doc['doctitle']; ?></a></li>
                    <?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<?php $cid = 0;
 foreach($this->tpl_var['categories'][0] as $key => $cat){ 
 $cid++; ?>
			<div class="col-xs-3 box itembox" style="min-height:200px;">
				<h4 class="title"><a href="index.php?docs-app-category&catid=1"><?php echo $cat['catname']; ?></a></h4>
				<ul class="list-unstyled">
					<?php $ccid = 0;
 foreach($this->tpl_var['categories'][$cat['catid']] as $key => $ccat){ 
 $ccid++; ?>
					<li><a href="index.php?docs-app-category&catid=<?php echo $ccat['catid']; ?>" title="<?php echo $ccat['catname']; ?>"><?php echo $ccat['catname']; ?></a></li>
					<?php } ?>
				</ul>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>