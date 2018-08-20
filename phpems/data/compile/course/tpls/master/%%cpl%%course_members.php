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
							<li><a href="index.php?course-master-course">课程管理</a></li>
							<li class="active">成员列表</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						【<?php echo $this->tpl_var['course']['cstitle']; ?>】成员列表
						<span class="dropdown pull-right">
							<a class="btn btn-primary" href="#" data-toggle="dropdown">增加人员 <strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-course-addmember&courseid=<?php echo $this->tpl_var['courseid']; ?>">根据条件增加</a></li>
								<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-course-selectmember&courseid=<?php echo $this->tpl_var['courseid']; ?>">用户列表选择</a></li>
		                    </ul>
						</span>
					</h4>
			        <form action="index.php?course-master-course-members&courseid=<?php echo $this->tpl_var['courseid']; ?>" method="post" class="form-inline">
						<table class="table">
							<tr>
								<td style="border-top:0px;">
									用户ID：
								</td>
								<td style="border-top:0px;">
									<input name="search[userid]" class="form-control" size="25" type="text" class="number" value="<?php echo $this->tpl_var['search']['userid']; ?>"/>
								</td>
								<td style="border-top:0px;">
									用户名：
								</td>
								<td style="border-top:0px;">
									<input class="form-control" name="search[username]" size="25" type="text" value="<?php echo $this->tpl_var['search']['username']; ?>"/>
								</td>
								<td style="border-top:0px;">
									<button class="btn btn-primary" type="submit">搜索</button>
									<input type="hidden" value="1" name="search[argsmodel]" />
								</td>
							</tr>
						</table>
					</form>
			        <table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
			                    <th>ID</th>
						        <th>用户名</th>
						        <th>姓名</th>
						        <th>开通时间</th>
						        <th>注册IP</th>
						        <th>积分点数</th>
						        <th>角色</th>
						        <th>到期时间</th>
						        <th>操作</th>
			                </tr>
			            </thead>
			            <tbody>
			            	<?php $uid = 0;
 foreach($this->tpl_var['members']['data'] as $key => $user){ 
 $uid++; ?>
			            	<tr>
			                    <td><?php echo $user['userid']; ?></td>
			                    <td><?php echo $user['username']; ?></td>
			                    <td><?php echo $user['usertruename']; ?></td>
								<td><?php echo date('Y-m-d',$user['octime']); ?></td><td><?php echo $user['userregip']; ?></td>
								<td><?php echo $user['usercoin']; ?></td><td><?php echo $this->tpl_var['groups'][$user['usergroupid']]['groupname']; ?></td>
								<td><?php echo date('Y-m-d',$user['ocendtime']); ?></td>
								<td>
								  	<div class="btn-group">
			                    		<a class="btn confirm" href="index.php?course-master-course-delopen&ocid=<?php echo $user['ocid']; ?><?php echo $this->tpl_var['u']; ?>" title="取消开通"><em class="glyphicon glyphicon-remove"></em></a>
									</div>
								</td>
			                </tr>
			                <?php } ?>
			        	</tbody>
			        </table>
			        <ul class="pagination pull-right">
			            <?php echo $this->tpl_var['members']['pages']; ?>
			        </ul>
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