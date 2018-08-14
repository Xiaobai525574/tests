<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-2" style="padding:0px 0px;">
				<div class="box itembox list-group" style="width: 200px;padding:0px;top:0px;" data-spy="affix" data-offset-top="150" id="lemma"></div>
			</div>
			<div class="col-xs-10" style="padding:0px 0px 20px 10px;">
				<div class="box itembox" style="margin-bottom:0px;">
					<div class="col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php">首页</a></li>
							<li class="active"><a href="index.php?docs-app-category&catid=<?php echo $this->tpl_var['cat']['catid']; ?>"><?php echo $this->tpl_var['cat']['catname']; ?></a></li>

						</ol>
					</div>
				</div>
				<div class="box itembox">
					<div class="col-xs-12">
						<h2 class="text-left"><?php echo $this->tpl_var['doc']['doctitle']; ?>
							<span class="pull-right">
								<a class="btn btn-primary" href="index.php?docs-app-docs-history&docid=<?php echo $this->tpl_var['doc']['docid']; ?>">历史版本</a>
								<?php if($this->tpl_var['_user']['userid']){ ?>
								<a class="btn btn-danger" href="index.php?docs-app-mydoc-edit&docid=<?php echo $this->tpl_var['doc']['docid']; ?>">编辑词条</a>
								<?php } else { ?>
								<a class="btn btn-danger" href="javascript:;" onclick="javascript:$.loginbox.show();">编辑词条</a>
								<?php } ?>
							</span>
						</h2>
					</div>
					<div class="col-xs-12" id="content">
						<?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['doc']['content']['dhcontent'])); ?>
					</div>
					<div class="col-xs-12">
						<hr/>
						<p>
							<span class="pull-right">
								<em>创建时间：<?php echo date('Y-m-d H:i:s',$this->tpl_var['doc']['docinputtime']); ?></em>&nbsp;&nbsp;
								<em>本版最后修改时间：<?php echo date('Y-m-d H:i:s',$this->tpl_var['doc']['content']['dhtime']); ?></em>
							</span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(function(){
		$('#content .wikititle').each(function(){
			var _this = $(this);
			_this.attr('id',Math.random().toString().substr(2))
			if(_this[0].tagName.toUpperCase() == 'H1')
			{
			    $('#lemma').append($('<a href="#'+_this.attr('id')+'" class="list-group-item active">'+_this.html()+'</a>'));
			}
			else
			{
				$('#lemma').append($('<a href="#'+_this.attr('id')+'" class="list-group-item">'+_this.html()+'</a>'));
			}
		});
	});
</script>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>