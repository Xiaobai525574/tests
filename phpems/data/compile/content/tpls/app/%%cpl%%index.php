<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main" style="height:445px;overflow:hidden;">
			<div class="col-xs-2 box itembox" style="width:22%;height:445px;overflow:hidden;">
				<?php $cid = 0;
 foreach($this->tpl_var['coursecats'] as $key => $cat){ 
 $cid++; ?>
				<h4 class="title"><?php echo $cat['catname']; ?></h4>
				<?php if($this->tpl_var['topcourse'][$cat['catid']]){ ?>
				<ul class="list-unstyled list-inline">
					<?php $crid = 0;
 foreach($this->tpl_var['topcourse'][$cat['catid']]['data'] as $key => $course){ 
 $crid++; ?>
					<li><a href="index.php?course-app-course&csid=<?php echo $course['csid']; ?>"><?php echo $course['cstitle']; ?></a></li>
					<?php } ?>
				</ul>
				<?php } ?>
				<?php if($cid > 6){ ?>
				<?php break;; ?>
				<?php } ?>
				<?php } ?>
			</div>
			<div class="col-xs-10 box split" style="padding:0px;width:78%;">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators" style="left:90%;bottom:0px;">
						<?php $cid = 0;
 foreach($this->tpl_var['contents'][2]['data'] as $key => $content){ 
 $cid++; ?>
						<li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>"<?php if($cid == 1){ ?> class="active"<?php } ?>></li>
						<?php } ?>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php $cid = 0;
 foreach($this->tpl_var['contents'][2]['data'] as $key => $content){ 
 $cid++; ?>
						<div class="item<?php if($cid == 1){ ?> active<?php } ?>">
							<a href="index.php?content-app-content&contentid=<?php echo $content['contentid']; ?>">
								<img src="<?php echo $content['contentthumb']; ?>" alt="" style="width:100%;">
							</a>
							<div class="carousel-caption">
								<!--<?php echo $content['contenttitle']; ?>-->
							</div>
						</div>
						<?php } ?>
					</div>
					<!-- Controls
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
					</a>
					-->
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main box itembox">
			<h4 class="title">视频课程</h4>
			<div class="col-xs-3" style="padding:0px;">
				<a href="index.php?course-app" class="">
					<img src="app/core/styles/img/item2.jpg" alt="" width="287">
				</a>
			</div>
			<div class="col-xs-9" style="padding-left:0px;">
				<?php $cid = 0;
 foreach($this->tpl_var['courses']['data'] as $key => $course){ 
 $cid++; ?>
				<div class="col-xs-3">
					<a href="index.php?course-app-course&csid=<?php echo $course['csid']; ?>" class="thumbnail">
						<img src="<?php echo $course['csthumb']; ?>" alt="" width="180">
					</a>
					<h5 class="text-center"><?php echo $course['cstitle']; ?></h5>
				</div>
				<?php if($hid == 4){ ?>
				<div class="col-xs-12"><hr /></div>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid hide">
	<div class="row-fluid">
		<div class="main"><img src="app/core/styles/img/ad.jpg"/></div>
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main box itembox">
			<h4 class="title">热门考场</h4>
			<div class="col-xs-3" style="padding:0px;">
				<a href="index.php?exam-app" class="">
					<img src="app/core/styles/img/item3.jpg" alt="" width="287">
				</a>
			</div>
			<div class="col-xs-9" style="padding-left:0px;">
				<?php $bid = 0;
 foreach($this->tpl_var['basics']['basic'] as $key => $basic){ 
 $bid++; ?>
				<div class="col-xs-3">
					<a href="index.php?exam-app-index-setCurrentBasic&basicid=<?php echo $basic['basicid']; ?>" class="thumbnail ajax">
						<img src="<?php echo $basic['basicthumb']; ?>" alt="" width="180">
					</a>
					<h5 class="text-center"><?php echo $basic['basic']; ?></h5>
				</div>
				<?php if($hid == 4){ ?>
				<div class="col-xs-12"><hr /></div>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid hide">
	<div class="row-fluid">
		<div class="main"><img src="app/core/styles/img/ad2.png"/></div>
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-4 box itembox" style="min-height:320px;">
				<h4 class="title"><a href="index.php?content-app-category&catid=1"><?php echo $this->tpl_var['rcats'][1]['catname']; ?></a></h4>
				<ul class="list-unstyled">
					<?php $cid = 0;
 foreach($this->tpl_var['contents'][1]['data'] as $key => $content){ 
 $cid++; ?>
					<li><a href="index.php?content-app-content&contentid=<?php echo $content['contentid']; ?>" title="<?php echo $content['contenttitle']; ?>"><?php echo $content['contenttitle']; ?></a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="col-xs-4 box itembox split" style="min-height:320px;">
				<h4 class="title"><a href="index.php?content-app-category&catid=3"><?php echo $this->tpl_var['rcats'][3]['catname']; ?></a></h4>
				<ul class="list-unstyled">
					<?php $cid = 0;
 foreach($this->tpl_var['contents'][3]['data'] as $key => $content){ 
 $cid++; ?>
					<li><a href="index.php?content-app-content&contentid=<?php echo $content['contentid']; ?>" title="<?php echo $content['contenttitle']; ?>"><?php echo $content['contenttitle']; ?></a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="col-xs-4 box itembox" style="min-height:320px;">
				<h4 class="title"><a href="index.php?content-app-category&catid=4"><?php echo $this->tpl_var['rcats'][4]['catname']; ?></a></h4>
				<ul class="list-unstyled">
					<?php $cid = 0;
 foreach($this->tpl_var['contents'][4]['data'] as $key => $content){ 
 $cid++; ?>
					<li><a href="index.php?content-app-content&contentid=<?php echo $content['contentid']; ?>" title="<?php echo $content['contenttitle']; ?>"><?php echo $content['contenttitle']; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>