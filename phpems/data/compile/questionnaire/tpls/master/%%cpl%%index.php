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
                            <li class="active">用户反馈</li>
                        </ol>
                    </div>
                </div>
                <div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
                    <h4 class="title" style="padding:10px;">
                        用户反馈
                    </h4>
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr class="info">
                            <th>questionnaireID</th>
                            <th>用户ID</th>
                            <th>课程ID</th>
                            <th>课程感想</th>
                            <th>课程遇到的问题或建议</th>
                            <th>期望的课程内容</th>
                            <th>其他</th>
                            <th>未出席原因</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $cid = 0;
 foreach($this->tpl_var['courses']['data'] as $key => $course){ 
 $cid++; ?>
                        <tr>
                            <td><?php echo $course['questionnaireid']; ?></td>
                            <td><?php echo $course['userid']; ?></td>
                            <td><?php echo $course['subjectid']; ?></td>
                            <td><?php echo $course['subs']; ?></td>
                            <td><?php echo $course['suggestions']; ?></td>
                            <td><?php echo $course['expect_subject']; ?></td>
                            <td><?php echo $course['other']; ?></td>
                            <td><?php echo $course['reason']; ?></td>

                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
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



