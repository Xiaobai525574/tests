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
				<div class="box itembox" style="margin-bottom:0px;border-bottom:1px solid #CCCCCC;">
					<div class="col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php">首页</a></li>
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-app">用户中心</a></li>
							<li class="active">学习进度</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;">
					<h4 class="title">学习进度</h4>
					<table class="table table-hover table-bordered">
						<thead>
						<tr class="info">
							<th>ID</th>
							<th>课程</th>
							<th>课程状态</th>
							<th>考试</th>
							<th>考试状态</th>
							<th>开始学习时间</th>
							<th>完成学习时间</th>
							<th>学习状态</th>
						</tr>
						</thead>
						<tbody>
                        <?php $pid = 0;
 foreach($this->tpl_var['progresses']['data'] as $key => $progress){ 
 $pid++; ?>
						<tr>
							<td><?php echo $progress['prsid']; ?></td>
							<td><?php echo $this->tpl_var['courses'][$progress['prscourseid']]['cstitle']; ?></td>
							<td><?php echo $this->tpl_var['status'][$progress['prscoursestatus']]; ?></td>
							<td><?php echo $this->tpl_var['basics'][$progress['prsexamid']]['basic']; ?></td>
							<td><?php echo $this->tpl_var['status'][$progress['prsexamstatus']]; ?></td>
							<td><?php echo date('Y-m-d',$progress['prstime']); ?></td>
							<td><?php if($progress['prsendtime']){ ?><?php echo date('Y-m-d',$progress['prsendtime']); ?><?php } else { ?>-<?php } ?></td>
							<td><?php echo $this->tpl_var['status'][$progress['prstatus']]; ?></td>
						</tr>
                        <?php } ?>
						</tbody>
					</table>
					<ul class="pagination pagination-right"><?php echo $this->tpl_var['progresses']['pages']; ?></ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>