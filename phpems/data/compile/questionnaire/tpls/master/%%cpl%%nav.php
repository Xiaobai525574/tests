<div class="container-fluid box" style="margin:0px auto;padding-top:10px;overflow:visible">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-10">
				<h2 style="color:#337AB7;"><a href="index.php"><img src="app/core/styles/img/logo2.png" style="height:60px;margin-top:-10px;"/>&nbsp;transcosmos管理平台</a></h2>
			</div>
			<div class="col-xs-2" style="padding-top:22px;">
				<ul class="list-unstyled list-inline">
					<?php if($this->tpl_var['_user']['userid']){ ?>
					<li>
						<div class="btn-group">
							<button type="button" class="btn btn-info"><em class="glyphicon glyphicon-user"></em> <?php echo $this->tpl_var['_user']['username']; ?></button>
							<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="index.php?user-center"><em class="glyphicon glyphicon-user"></em> 用户中心</a></li>
								<?php if($this->tpl_var['_user']['teacher_subjects']){ ?><li><a href="index.php?exam-teach"><em class="glyphicon glyphicon-book"></em> 教师管理</a></li><?php } ?>
								<?php if($this->tpl_var['_user']['groupid'] == 1){ ?><li><a href="index.php?core-master"><em class="glyphicon glyphicon-dashboard"></em> 后台管理</a></li><?php } ?>
								<li><a class="ajax" href="index.php?user-app-logout"><em class="glyphicon glyphicon-log-out"></em> 退出</a></li>
							</ul>
						</div>
					</li>
					<?php } else { ?>
					<li><a href="javascript:;" onclick="javascript:$.loginbox.show();" class="btn btn-default"> 登 录 </a></li>
					<li><a href="index.php?user-app-register" class="btn btn-default"> 注 册 </a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid navbar" style="margin-top:0px;margin-bottom:0px;padding-top:10px;background-color:#337AB7;">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-12">
				<ul class="list-unstyled list-inline">
					<li class="menu col-xs-1">
						<a href="index.php?core-master">全局</a>
					</li>
					<?php if($this->tpl_var['apps']['user']['appsetting']['managemodel']){ ?>
					<?php $aid = 0;
 foreach($this->tpl_var['apps'] as $key => $app){ 
 $aid++; ?>
					<?php if($app['appstatus'] && $app['appid'] != 'core' && in_array($app['appid'],$this->tpl_var['_user']['manager_apps'])){ ?>
					<li class="menu col-xs-1<?php if($this->tpl_var['_app'] == $app['appid']){ ?> active<?php } ?>">
						<a href="index.php?<?php echo $app['appid']; ?>-master"><?php echo $app['appname']; ?></a>
					</li>
					<?php } ?>
					<?php } ?>
					<?php } else { ?>
					<?php $aid = 0;
 foreach($this->tpl_var['apps'] as $key => $app){ 
 $aid++; ?>
					<?php if($app['appstatus'] && $app['appid'] != 'core'){ ?>
					<li class="menu col-xs-1<?php if($this->tpl_var['_app'] == $app['appid']){ ?> active<?php } ?>">
						<a href="index.php?<?php echo $app['appid']; ?>-master"><?php echo $app['appname']; ?></a>
					</li>
					<?php } ?>
					<?php } ?>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>