<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="box itembox" style="margin-bottom:0px;">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li><a href="index.php">首页</a></li>
						<li><a href="index.php?course">课程</a></li>
						<?php $cbid = 0;
 foreach($this->tpl_var['catbread'] as $key => $cb){ 
 $cbid++; ?>
						<li><a href="index.php?course-app-category&catid=<?php echo $cb['catid']; ?>"><?php echo $cb['catname']; ?></a></li>
						<?php } ?>
						<li class="active"><?php echo $this->tpl_var['cat']['catname']; ?></li>
					</ol>
				</div>
			</div>
		</div>
		<div class="main" id="datacontent">
<?php } ?>
			<div class="col-xs-8" style="padding-left:0px;position:relative;">
				<div class="box itembox" style="height:auto;width:800px;top:0px;z-index:99">
					<h4 class="title" style="line-height:2.5em;">
						<?php echo $this->tpl_var['content']['coursetitle']; ?>
					</h4>
					<?php if($this->tpl_var['content']['course_files'] || $this->tpl_var['content']['course_oggfile'] || $this->tpl_var['content']['course_webmfile']){ ?>
					<div style="margin-top:10px;" controls="true" width="100%" height="450" id="movieplatform">
					</div>
					<?php } else { ?>
					<embed src="<?php echo $this->tpl_var['content']['course_youtu']; ?>" allowFullScreen="true" quality="high" width="100%" height="450" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>
					<?php } ?>
					<blockquote style="margin-top:10px;" class="text-info"><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['content']['coursedescribe'])); ?></blockquote>
				</div>
			</div>
			<div class="col-xs-4 pull-right" style="padding-right:0px;">
				<div class="box itembox" style="padding-top:10px;">
					<h4 class="title"><?php echo $this->tpl_var['course']['cstitle']; ?></h4>
					<div>
						<?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['course']['csdescribe'])); ?>
					</div>
				</div>
				<?php $cid = 0;
 foreach($this->tpl_var['contents']['data'] as $key => $content){ 
 $cid++; ?>
				<div class="box" style="padding-top:10px;">
					<div class="col-xs-3">
						<a target="datacontent" href="index.php?course-app-course&page=<?php echo $this->tpl_var['page']; ?>&csid=<?php echo $this->tpl_var['course']['csid']; ?>&contentid=<?php echo $content['courseid']; ?>" class="ajax">
							<img src="<?php echo $content['coursethumb']; ?>" alt="" width="100%">
						</a>
					</div>
					<div class="col-xs-9">
						<a target="datacontent" href="index.php?course-app-course&page=<?php echo $this->tpl_var['page']; ?>&csid=<?php echo $this->tpl_var['course']['csid']; ?>&contentid=<?php echo $content['courseid']; ?>" class="ajax">
							<h4 class="title" style="margin-top:0px;">
							<?php if($this->tpl_var['content']['courseid'] == $content['courseid']){ ?>
							<span style="color:green;"><em class="glyphicon glyphicon-play-circle"></em></span>
							<?php } ?>
							<?php if($this->tpl_var['cdata']['lock'][$content['courseid']]){ ?>
							<span style="color:red;"><em class="glyphicon glyphicon-lock"></em></span>
							<?php } ?>
							<?php echo $content['coursetitle']; ?>
							<?php if($this->tpl_var['logs'][$content['courseid']] && $this->tpl_var['logs'][$content['courseid']]['logstatus'] == 1){ ?>
							<span class="pull-right" style="color:green;">已学完</span>
							<?php } elseif($this->tpl_var['logs'][$content['courseid']] && $this->tpl_var['logs'][$content['courseid']]['logstatus'] == 0){ ?>
							<span class="pull-right" style="color:green;">上次学习<?php echo intval($this->tpl_var['logs'][$content['courseid']]['logprogress'] / 60); ?>分<?php echo $this->tpl_var['logs'][$content['courseid']]['logprogress'] % 60; ?>秒</span>
							<?php } else { ?>
							<span class="pull-right" style="color:green;">未学习</span>
							<?php } ?>
							</h4>
						</a>
						<p style="font-size:13px;"><?php echo $this->G->make('strings')->subString(strip_tags(html_entity_decode($this->ev->stripSlashes($content['coursedescribe']))),90); ?></p>
					</div>
				</div>
				<?php } ?>
				<ul class="pagination pull-right"><?php echo $this->tpl_var['contents']['pages']; ?></ul>
			</div>
			<?php if($this->tpl_var['content']['course_files'] || $this->tpl_var['content']['course_oggfile'] || $this->tpl_var['content']['course_webmfile']){ ?>
			<script type="text/javascript">
                var cksetting = {
                    container: '#movieplatform',
                    variable: "ckplayeritem",
                    live:false,
					<?php if($this->tpl_var['logs'][$this->tpl_var['content']['courseid']]['logprogress']){ ?>
					seek:<?php echo $this->tpl_var['logs'][$this->tpl_var['content']['courseid']]['logprogress']; ?>,
					<?php } ?>
                    video:'<?php echo $this->tpl_var['content']['course_files']; ?><?php echo $this->tpl_var['content']['course_oggfile']; ?><?php echo $this->tpl_var['content']['course_webmfile']; ?>'
                };
                var ckplayeritem = new ckplayer(cksetting);
                //ckplayeritem.videoSeek = function(){return false;}
                ckplayeritem.addListener('ended',function(){
                    $.get('index.php?course-app-course-endstatus&courseid=<?php echo $this->tpl_var['content']['courseid']; ?>&'+Math.random());
                });
				ckplayeritem.addListener('time',function(time){
                    ckplayeritem.currenttime = time;
                });
				clearInterval($.recordVideo);
				$.recordVideo = setInterval(function(){
					$.get('index.php?course-app-course-recordtime&courseid=<?php echo $this->tpl_var['content']['courseid']; ?>&time='+ckplayeritem.currenttime+'&'+Math.random());
				},20000);
			</script>
			<?php } ?>
			<div class="modal fade" id="submodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Note</h4>
						</div>
						<div class="modal-body">
							<form id="notepform" method="post" action="index.php?course-app-course-setcourse">
								<textarea name="note" class="jckeditor"><?php echo $this->tpl_var['cnote']['clsnote']; ?></textarea>
								<input type="hidden" name="cnoteid" value="<?php echo $this->tpl_var['cnote']['clsid']; ?>"/>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" onclick="javascript:$('#notepform').submit();" class="btn btn-primary">Save</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Hide</button>
						</div>
					</div>
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