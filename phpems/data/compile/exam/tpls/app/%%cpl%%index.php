<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main box itembox">
			<h4 class="title" style="padding:10px;">我的考场<a href="index.php?exam-app-basics-open" class="btn btn-primary pull-right"><em class="glyphicon glyphicon-plus-sign"></em> 开通新考场</a></h4>
			<div class="col-xs-12" style="padding-left:0px;">
				<?php $bid = 0;
 foreach($this->tpl_var['basics'] as $key => $basic){ 
 $bid++; ?>
				<div class="col-xs-3" style="width:20%">
					<a href="index.php?<?php echo $this->tpl_var['_app']; ?>-app-index-setCurrentBasic&basicid=<?php echo $basic['basicid']; ?>" class="thumbnail ajax">
						<img src="<?php if($basic['basicthumb']){ ?><?php echo $basic['basicthumb']; ?><?php } else { ?>app/core/styles/img/item.jpg<?php } ?>" alt="" width="100%">
					</a>
					<h5 class="text-center"><?php echo $basic['basic']; ?></h5>
				</div>
				<?php if($bid % 5 == 0){ ?>
				<div class="col-xs-12"><hr /></div>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid hide">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-4 box itembox">
				<h4 class="title">公告</h4>
				<ul class="list-unstyled">
					<li><a href="">购物指南</a></li>
					<li><a href="">购物指南</a></li>
					<li><a href="">购物指南</a></li>
					<li><a href="">购物指南</a></li>
					<li><a href="">购物指南</a></li>
				</ul>
			</div>
			<div class="col-xs-4 box itembox split">
				<h4 class="title">新闻</h4>
				<ul class="list-unstyled">
					<li><a href="">购物指南</a></li>
					<li><a href="">购物指南</a></li>
					<li><a href="">购物指南</a></li>
					<li><a href="">购物指南</a></li>
					<li><a href="">购物指南</a></li>
				</ul>
			</div>
			<div class="col-xs-4 box itembox">
				<h4 class="title">帮助</h4>
				<ul class="list-unstyled">
					<li><a href="">购物指南</a></li>
					<li><a href="">购物指南</a></li>
					<li><a href="">购物指南</a></li>
					<li><a href="">购物指南</a></li>
					<li><a href="">购物指南</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>