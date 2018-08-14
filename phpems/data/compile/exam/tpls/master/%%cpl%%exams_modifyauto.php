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
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-exams&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">试卷管理</a></li>
							<li class="active">随机组卷修改</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						随机组卷修改
						<a class="btn btn-primary pull-right" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-exams&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">试卷管理</a>
					</h4>
				    <form action="index.php?exam-master-exams-modify" method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-sm-2" for="content">试卷名称：</label>
					  		<div class="col-sm-4">
					  			<input class="form-control" type="text" name="args[exam]" value="<?php echo $this->tpl_var['exam']['exam']; ?>" needle="needle" msg="您必须为该试卷输入一个名称"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">评卷方式</label>
							<div class="col-sm-9">
								<label class="radio-inline">
									<input name="args[examdecide]" type="radio" value="1"<?php if($this->tpl_var['exam']['examdecide']){ ?> checked<?php } ?>/>教师评卷
								</label>
								<label class="radio-inline">
									<input name="args[examdecide]" type="radio" value="0"<?php if(!$this->tpl_var['exam']['examdecide']){ ?> checked<?php } ?>/>学生自评
								</label>
								<span class="help-block">教师评卷时有主观题则需要教师在后台评分后才能显示分数，无主观题自动显示分数。</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">考试科目：</label>
						  	<div class="col-sm-9">
							  	<label class="radio"><?php echo $this->tpl_var['subjects'][$this->tpl_var['exam']['examsubject']]['subject']; ?></label>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="content">考试时间：</label>
					  		<div class="col-sm-9 form-inline">
					  			<input class="form-control" type="text" name="args[examsetting][examtime]" value="<?php echo $this->tpl_var['exam']['examsetting']['examtime']; ?>" size="4" needle="needle" class="inline"/> 分钟
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="content">来源：</label>
					  		<div class="col-sm-4">
					  			<input class="form-control" type="text" name="args[examsetting][comfrom]" value="<?php echo $this->tpl_var['exam']['examsetting']['comfrom']; ?>" size="4"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="content">试卷总分：</label>
					  		<div class="col-sm-4">
					  			<input class="form-control" type="text" name="args[examsetting][score]" value="<?php echo $this->tpl_var['exam']['examsetting']['score']; ?>" size="4" needle="needle" msg="你要为本考卷设置总分" datatype="number"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="content">及格线：</label>
					  		<div class="col-sm-4">
					  			<input class="form-control" type="text" name="args[examsetting][passscore]" value="<?php echo $this->tpl_var['exam']['examsetting']['passscore']; ?>" size="4" needle="needle" msg="你要为本考卷设置一个及格分数线" datatype="number"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">题型排序</label>
							<div class="col-sm-9">
								<div class="sortable btn-group">
									<?php if($this->tpl_var['exam']['examsetting']['questypelite']){ ?>
									<?php $eqid = 0;
 foreach($this->tpl_var['exam']['examsetting']['questypelite'] as $key => $qlid){ 
 $eqid++; ?>
									<a class="btn btn-primary questpanel panel_<?php echo $key; ?>"><?php echo $this->tpl_var['questypes'][$key]['questype']; ?><input type="hidden" name="args[examsetting][questypelite][<?php echo $key; ?>]" value="1" class="questypepanelinput" id="panel_<?php echo $key; ?>"/></a>
									<?php } ?>
									<?php } else { ?>
									<?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
									<a class="btn btn-primary questpanel panel_<?php echo $questype['questid']; ?>"><?php echo $questype['questype']; ?><input type="hidden" name="args[examsetting][questypelite][<?php echo $questype['questid']; ?>]" value="1" class="questypepanelinput" id="panel_<?php echo $questype['questid']; ?>"/></a>
									<?php } ?>
									<?php } ?>
								</div>
								<span class="help-block">拖拽进行题型排序</span>
							</div>
						</div>
					    <div class="form-group">
					        <label class="control-label col-sm-2">题量配比模式：</label>
				          	<div class="col-sm-9">
								<label class="radio-inline">
					          		<input type="radio" autocomplete="off" class="input-text" name="args[examsetting][scalemodel]" value="1" onchange="javascript:$('#modeplane').html($('#sptype').html());$('#modeplane').find('.selfmodal').on('click',modalAjax);"<?php if($this->tpl_var['exam']['examsetting']['scalemodel']){ ?> checked<?php } ?>/> 开启
					          	</label>
					          	<label class="radio-inline">
					          		<input type="radio" autocomplete="off" class="input-text" name="args[examsetting][scalemodel]" value="0" onchange="javascript:$('#modeplane').html($('#normaltype').html());"<?php if(!$this->tpl_var['exam']['examsetting']['scalemodel']){ ?> checked<?php } ?>/> 关闭
					          	</label>
					       </div>
					    </div>
					    <div id="modeplane">
					    </div>
						<div class="form-group">
							<label class="control-label col-sm-2"></label>
							<div class="col-sm-9">
								<button class="btn btn-primary" type="submit">提交</button>
								<input type="hidden" name="submitsetting" value="1"/>
							  	<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>" />
							  	<input name="args[examsubject]" type="hidden" value="<?php echo $this->tpl_var['exam']['examsubject']; ?>">
							  	<input name="examid" type="hidden" value="<?php echo $this->tpl_var['exam']['examid']; ?>">
							    <?php $aid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $aid++; ?>
									<input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
								<?php } ?>
							</div>
						</div>
					</form>
					<div id="sptype" class="hide">
					    <div class="form-group">
					        <label class="control-label col-sm-2">题量配比：</label>
				          	<div class="col-sm-9">
					          	<label class="radio inline">题量配比模式关闭时，此设置不生效。题量配比操作繁琐，请尽量熟悉后再行操作。题量配比会受考场中考试范围制约，请谨慎配置。</label>
					       </div>
					    </div>
					    <?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
						<div class="form-group questpanel panel_<?php echo $questype['questid']; ?>">
							<label class="control-label col-sm-2" for="content"><?php echo $questype['questype']; ?>：</label>
							<div class="col-sm-9 form-inline">
								<span class="info">共&nbsp;</span>
								<input id="iselectallnumber_<?php echo $key; ?>" type="text" class="form-control" needle="needle" name="args[examsetting][questype][<?php echo $key; ?>][number]" value="<?php echo intval($this->tpl_var['exam']['examsetting']['questype'][$key]['number']); ?>" size="2" msg="您必须填写总题数"/>
								<span class="info">&nbsp;题，每题&nbsp;</span><input class="form-control" needle="needle" type="text" name="args[examsetting][questype][<?php echo $key; ?>][score]" value="<?php echo floatval($this->tpl_var['exam']['examsetting']['questype'][$key]['score']); ?>" size="2" msg="您必须填写每题的分值"/>
								<span class="info">&nbsp;分，描述&nbsp;</span><input class="form-control" type="text" name="args[examsetting][questype][<?php echo $key; ?>][describe]" value="<?php echo $this->tpl_var['exam']['examsetting']['questype'][$key]['describe']; ?>" size="12"/>
								<a href="javascript:;" onclick="javascript:currentP = 'examscale_<?php echo $questype['questid']; ?>';$('#tablecontent').find(':checkbox').attr('checked',false);$('#modal').modal();" class="btn btn-primary">配题</a>
								<a href="javascript:;" onclick="javascript:$('#examscale_<?php echo $questype['questid']; ?>').val('');" class="btn btn-danger">重置</a>
								<a class="btn btn-info selfmodal" href="javascript:;" data-target="#modal2" url="index.php?exam-master-exams-showsetting&setting={examscale_<?php echo $questype['questid']; ?>}&useframe=1" valuefrom="examscale_<?php echo $questype['questid']; ?>">检查</a>
							</div>
						</div>
						<div class="form-group questpanel panel_<?php echo $questype['questid']; ?>">
							<label class="control-label col-sm-2" for="content">配比率：</label>
							<div class="col-sm-9">
								<textarea class="form-control" id="examscale_<?php echo $questype['questid']; ?>" rows="7" cols="4" name="args[examsetting][examscale][<?php echo $questype['questid']; ?>]"><?php echo $this->tpl_var['exam']['examsetting']['examscale'][$questype['questid']]; ?></textarea>
							</div>
						</div>
						<?php } ?>
					</div>
					<div id="normaltype" class="hide">
						<?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
						<div class="form-group questpanel panel_<?php echo $questype['questid']; ?>">
							<label class="control-label col-sm-2" for="content"><?php echo $questype['questype']; ?>：</label>
							<div class="col-sm-9 form-inline">
								<span class="info">共&nbsp;</span>
								<input id="iselectallnumber_<?php echo $key; ?>" type="text" class="form-control" needle="needle" name="args[examsetting][questype][<?php echo $key; ?>][number]" value="<?php echo intval($this->tpl_var['exam']['examsetting']['questype'][$key]['number']); ?>" size="1" msg="您必须填写总题数"/>
								<span class="info">&nbsp;题，每题&nbsp;</span><input class="form-control" needle="needle" type="text" name="args[examsetting][questype][<?php echo $key; ?>][score]" value="<?php echo floatval($this->tpl_var['exam']['examsetting']['questype'][$key]['score']); ?>" size="1" msg="您必须填写每题的分值"/>
								<span class="info">&nbsp;分，描述&nbsp;</span><input class="form-control" type="text" name="args[examsetting][questype][<?php echo $key; ?>][describe]" value="<?php echo $this->tpl_var['exam']['examsetting']['questype'][$key]['describe']; ?>" size="8"/>
								<span class="info">&nbsp;易&nbsp;</span><input class="form-control" type="text" name="args[examsetting][questype][<?php echo $key; ?>][easynumber]" value="<?php echo intval($this->tpl_var['exam']['examsetting']['questype'][$key]['easynumber']); ?>" size="1" msg="您需要填写简单题的数量，最小为0"/>
			  					<span class="info">&nbsp;中&nbsp;</span><input class="form-control" type="text" needle="needle" name="args[examsetting][questype][<?php echo $key; ?>][middlenumber]" value="<?php echo intval($this->tpl_var['exam']['examsetting']['questype'][$key]['middlenumber']); ?>" size="1" msg="您需要填写中等难度题的数量，最小为0"/>
			  					<span class="info">&nbsp;难&nbsp;</span><input class="form-control" type="text" needle="needle" name="args[examsetting][questype][<?php echo $key; ?>][hardnumber]" value="<?php echo intval($this->tpl_var['exam']['examsetting']['questype'][$key]['hardnumber']); ?>" size="1" datatype="number" msg="您需要填写难题的数量，最小为0"/>
							</div>
						</div>
						<?php } ?>
					</div>
					<script>
			    		<?php if($this->tpl_var['exam']['examsetting']['scalemodel']){ ?>
			    		$('#modeplane').html($('#sptype').html());
			    		<?php } else { ?>
			    		$('#modeplane').html($('#normaltype').html());
			    		<?php } ?>
			    	</script>
				</div>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<div id="modal2" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" class="close" type="button" data-dismiss="modal">×</button>
				<h4 id="myModalLabel">
					配置详情
				</h4>
			</div>
			<div class="modal-body" id="modal-body"></div>
			<div class="modal-footer">
				 <button aria-hidden="true" class="btn btn-primary" data-dismiss="modal">完成</button>
			</div>
		</div>
	</div>
</div>
<div id="modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" class="close" type="button" data-dismiss="modal">×</button>
				<h4 id="myModalLabel">
					配题
				</h4>
			</div>
			<div class="modal-body">
				<div action="#" method="post" class="form-horizontal">
					<div class="form-group autoloaditem" style="max-height:240px;overflow-y:scroll;" id="tablecontent" autoload="index.php?exam-master-exams-ajax-getsubjectknows&subjectid=<?php echo $this->tpl_var['exam']['examsubject']; ?>">
						<table class="table table-hover table-bordered" style="width:86%;margin:auto;">
							<tr class="info">
								<td colspan="3">请先选择科目</td>
							</tr>
						</table>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="content">题量：</label>
				  		<div class="col-sm-10 form-inline">
				  			<span class="info">共&nbsp;</span>
							<input id="modalallnumber" type="text" class="form-control" needle="needle" value="10" size="1" msg="您必须填写总题数"/>
							<span class="info">&nbsp;易&nbsp;</span><input id="modaleasynumber" class="form-control" type="text" value="3" size="1" msg="您需要填写简单题的数量，最小为0"/>
		  					<span class="info">&nbsp;中&nbsp;</span><input id="modalmidnumber" class="form-control" type="text" needle="needle" value="4" size="1" msg="您需要填写中等难度题的数量，最小为0"/>
		  					<span class="info">&nbsp;难&nbsp;</span><input id="modalhardnumber" class="form-control" type="text" needle="needle" value="3" size="1" datatype="number" msg="您需要填写难题的数量，最小为0"/>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				 <button class="btn btn-primary" type="button" onclick="javascript:confirmRules();">增加规则</button>
				 <button aria-hidden="true" class="btn btn-danger" data-dismiss="modal">放弃</button>
			</div>
		</div>
	</div>
</div>
<script>
$.getJSON('index.php?exam-master-basic-getsubjectquestype&subjectid=<?php echo $this->tpl_var['exam']['examsubject']; ?>&'+Math.random(),function(data){$('.questpanel').hide();$('.questypepanelinput').val('0');for(x in data){$('.panel_'+data[x]).show();$('#panel_'+data[x]).val('1');}});
function confirmRules()
{
	var knows = '';
	$('#tablecontent').find(':checked').each(function(){
		knows = knows + $(this).val() + ',';});
	knows = knows.substring(0,knows.length - 1);
	var allnumber = parseInt($('#modalallnumber').val());
	var easynumber = parseInt($('#modaleasynumber').val());
	var midnumber = parseInt($('#modalmidnumber').val());
	var hardnumber = parseInt($('#modalhardnumber').val());
	var pnumber = '';
	if(easynumber == 0 && midnumber == 0 && hardnumber == 0)
	pnumber = '0';
	else
	pnumber = easynumber + ',' + midnumber + ',' + hardnumber;
	$('#'+currentP).val($('#'+currentP).val()+knows+':'+allnumber+':'+pnumber+'\n');
	$('#modal').modal('hide');
}
</script>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>