<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid" id="datacontent">
	<div class="row-fluid">
		<div class="main">
			<div class="box itembox" style="margin-bottom:0px;">
				<div class="col-xs-12">
					<ol class="breadcrumb">
					  <li><a href="index.php">首页</a></li>
					  <li><a href="index.php?exam-app">考试</a></li>
					  <li><a href="index.php?exam-app-basics"><?php echo $this->tpl_var['data']['currentbasic']['basic']; ?></a></li>
					  <li class="active"><?php echo $this->tpl_var['data']['currentbasic']['basic']; ?></li>
					</ol>
				</div>
			</div>
			<div class="box itembox">
				<h4 class="title">正式考试</h4>
				<div class="alert alert-info">
					<strong>提示：</strong>
					<p>本考场开启时间 <?php if($this->tpl_var['data']['currentbasic']['basicexam']['opentime']['start'] && $this->tpl_var['data']['currentbasic']['basicexam']['opentime']['end']){ ?><?php echo date('Y-m-d H:i:s',$this->tpl_var['data']['currentbasic']['basicexam']['opentime']['start']); ?> - <?php echo date('Y-m-d H:i:s',$this->tpl_var['data']['currentbasic']['basicexam']['opentime']['end']); ?><?php } else { ?>不限<?php } ?> ； 考试次数 <?php if($this->tpl_var['data']['currentbasic']['basicexam']['examnumber']){ ?><?php echo $this->tpl_var['data']['currentbasic']['basicexam']['examnumber']; ?><?php } else { ?>不限<?php } ?> ； 抽卷规则 <?php if($this->tpl_var['data']['currentbasic']['basicexam']['selectrule']){ ?>系统随机抽卷<?php } else { ?>用户手选试卷<?php } ?>。</p>

	            	<ul class="list-unstyled">
	                	<li><b>1、</b>点击考试名称按钮进入答题界面，考试开始计时。</li>
	                	<li><b>2、</b>在随机考试过程中，您可以通过顶部的考试时间来掌握自己的做题时间。</li>
	                	<li><b>3、</b>提交试卷后，可以通过“查看答案和解析”功能进行总结学习。</li>
	                	<li><b>4、</b>系统自动记录模拟考试的考试记录，学员考试结束后可以进入“答题记录”功能进行查看。</li>
	                </ul>
                </div>
                <div class="col-xs-12" style="padding-left:0px;">
                <?php if($this->tpl_var['data']['currentbasic']['basicexam']['opentime']['start'] && $this->tpl_var['data']['currentbasic']['basicexam']['opentime']['end']){ ?>
                	<?php if($this->tpl_var['data']['currentbasic']['basicexam']['opentime']['start'] <= TIME && $this->tpl_var['data']['currentbasic']['basicexam']['opentime']['end'] >= TIME){ ?>
                		<?php if($this->tpl_var['sessionvars']){ ?>
	                	<div class="box itembox" style="padding-top:20px;">
							<div class="col-xs-3">
								<a href="index.php?exam-app-recover" class="thumbnail pull-left ajax">
									<img src="app/core/styles/img/item.jpg" alt="" width="100%">
								</a>
							</div>
							<div class="col-xs-9">
								<a href="index.php?exam-app-recover" class="ajax"><h4 class="title">意外续考</h4></a>
								<p>系统检测到您曾经在<?php echo date('Y-m-d H:i:s',$this->tpl_var['sessionvars']['examsessionstarttime']); ?>开启了一场未完成的考试，试卷名称为《<?php echo $this->tpl_var['sessionvars']['examsession']; ?>》，点击继续考试可以进行续考。</p>
								<hr/>
								<p>
									<span class="pull-right">
										<a href="index.php?exam-app-recover" class="btn btn-primary ajax">继续考试</a>&nbsp;&nbsp;
										<a href="index.php?exam-app-recover-clearexamsession" class="btn btn-danger confirm" msg="放弃考试会删除此次考试会话并不能恢复，确认要放弃吗？">放弃考试</a>
									</span>
								</p>
							</div>
						</div>
	                	<?php } else { ?>

                		<?php if($this->tpl_var['data']['currentbasic']['basicexam']['selectrule']){ ?>
	                		<?php if($this->tpl_var['data']['currentbasic']['basicexam']['examnumber'] > 0 && $this->tpl_var['number']['all'] >= $this->tpl_var['data']['currentbasic']['basicexam']['examnumber']){ ?>
							<div class="text-center"><a class="btn" href="javascript:;">您的考试次数已经用完</a></div>
							<?php } else { ?>
							<div class="text-center"><a action-before="clearStorage" class="ajax btn btn-primary" href="index.php?exam-app-exam-selectquestions&examid=<?php echo $exam['examid']; ?>" action-before="clearStorage">开始考试</a></div>
							<?php } ?>
                		<?php } else { ?>
                			<?php $eid = 0;
 foreach($this->tpl_var['exams']['data'] as $key => $exam){ 
 $eid++; ?>
							<div class="col-xs-3" style="width:20%">
								<?php if($this->tpl_var['data']['currentbasic']['basicexam']['examnumber'] > 0 && $this->tpl_var['number']['child'][$exam['examid']] >= $this->tpl_var['data']['currentbasic']['basicexam']['examnumber']){ ?>
									<a href="javascript:;" class="thumbnail" style="position:relative;">
									<img src="app/core/styles/img/finish.png" style="position:absolute;right:4px;top:4px;">
								<?php } else { ?>
									<a action-before="clearStorage" href="index.php?exam-app-exam-selectquestions&examid=<?php echo $exam['examid']; ?>" class="thumbnail ajax" style="position:relative;">
								<?php } ?>
									<img src="app/core/styles/img/item.jpg" alt="" width="100%">
								</a>
								<h5 class="text-center">
									<?php echo $exam['exam']; ?>
								</h5>
							</div>
							<?php if($eid % 5 == 0){ ?>
							<div class="col-xs-12"><hr /></div>
							<?php } ?>
							<?php } ?>
							<ul class="pagination pull-right"><?php echo $this->tpl_var['exams']['pages']; ?></ul>
                		<?php } ?>

                		<?php } ?>
                	<?php } else { ?>
                		<p class="alert">本考场开放考试时间为：<?php echo date('Y-m-d H:i:s',$this->tpl_var['data']['currentbasic']['basicexam']['opentime']['start']); ?> - <?php echo date('Y-m-d H:i:s',$this->tpl_var['data']['currentbasic']['basicexam']['opentime']['end']); ?>，目前不是考试时间，请在规定时间内前来考试哦。</p>
                	<?php } ?>
                <?php } else { ?>
                	<?php if($this->tpl_var['sessionvars']){ ?>
                	<div class="box itembox" style="padding-top:20px;">
						<div class="col-xs-3">
							<a href="index.php?exam-app-recover" class="thumbnail pull-left ajax">
								<img src="app/core/styles/img/item.jpg" alt="" width="100%">
							</a>
						</div>
						<div class="col-xs-9">
							<a href="index.php?exam-app-recover" class="ajax"><h4 class="title">意外续考</h4></a>
							<p>系统检测到您曾经在<?php echo date('Y-m-d H:i:s',$this->tpl_var['sessionvars']['examsessionstarttime']); ?>开启了一场未完成的考试，试卷名称为《<?php echo $this->tpl_var['sessionvars']['examsession']; ?>》，点击继续考试可以进行续考。</p>
							<hr/>
							<p>
								<span class="pull-right">
									<a href="index.php?exam-app-recover" class="btn btn-primary ajax">继续考试</a>&nbsp;&nbsp;
									<a href="index.php?exam-app-recover-clearexamsession" class="btn btn-danger confirm" msg="放弃考试会删除此次考试会话并不能恢复，确认要放弃吗？">放弃考试</a>
								</span>
							</p>
						</div>
					</div>
                	<?php } else { ?>
                	<?php if($this->tpl_var['data']['currentbasic']['basicexam']['selectrule']){ ?>
                		<?php if($this->tpl_var['data']['currentbasic']['basicexam']['examnumber'] > 0 && $this->tpl_var['number']['all'] >= $this->tpl_var['data']['currentbasic']['basicexam']['examnumber']){ ?>
						<div class="text-center"><a class="btn" href="javascript:;">您的考试次数已经用完</a></div>
						<?php } else { ?>
						<div class="text-center"><a class="ajax btn btn-primary" action-before="clearStorage" href="index.php?exam-app-exam-selectquestions&examid=<?php echo $exam['examid']; ?>" action-before="clearStorage">开始考试</a></div>
						<?php } ?>
            		<?php } else { ?>
            			<?php $eid = 0;
 foreach($this->tpl_var['exams']['data'] as $key => $exam){ 
 $eid++; ?>
						<div class="col-xs-3" style="width:20%">
							<?php if($this->tpl_var['data']['currentbasic']['basicexam']['examnumber'] > 0 && $this->tpl_var['number']['child'][$exam['examid']] >= $this->tpl_var['data']['currentbasic']['basicexam']['examnumber']){ ?>
								<a href="javascript:;" class="thumbnail" style="position:relative;">
								<img src="app/core/styles/img/finish.png" style="position:absolute;right:4px;top:4px;">
							<?php } else { ?>
								<a action-before="clearStorage" href="index.php?exam-app-exam-selectquestions&examid=<?php echo $exam['examid']; ?>" class="thumbnail ajax" style="position:relative;">
							<?php } ?>
								<img src="app/core/styles/img/item.jpg" alt="" width="100%">
							</a>
							<h5 class="text-center">
								<?php echo $exam['exam']; ?>
							</h5>
						</div>
						<?php if($eid % 5 == 0){ ?>
						<div class="col-xs-12"><hr /></div>
						<?php } ?>
						<?php } ?>
						<ul class="pagination pull-right"><?php echo $this->tpl_var['exams']['pages']; ?></ul>
            		<?php } ?>
            		<?php } ?>
                <?php } ?>
                </div>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>