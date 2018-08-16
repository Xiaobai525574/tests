{x2;if:!$userhash}
{x2;include:header}
<body>
{x2;include:nav}
<div class="container-fluid">
    <div class="row-fluid">
        <div class="main">
            <div class="col-xs-2" style="padding-top:10px;margin-bottom:0px;">
                {x2;include:menu}
            </div>
            <div class="col-xs-10" id="datacontent">
                {x2;endif}
                <div class="box itembox" style="margin-bottom:0px;border-bottom:1px solid #CCCCCC;">
                    <div class="col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.php?{x2;$_app}-master">{x2;$apps[$_app]['appname']}</a></li>
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
                        {x2;tree:$courses['data'],course,cid}
                        <tr>
                            <td>{x2;v:course['questionnaireid']}</td>
                            <td>{x2;v:course['userid']}</td>
                            <td>{x2;v:course['subjectid']}</td>
                            <td>{x2;v:course['subs']}</td>
                            <td>{x2;v:course['suggestions']}</td>
                            <td>{x2;v:course['expect_subject']}</td>
                            <td>{x2;v:course['other']}</td>
                            <td>{x2;v:course['reason']}</td>

                        </tr>
                        {x2;endtree}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {x2;if:!$userhash}
    </div>
</div>
</div>
{x2;include:footer}
</body>
</html>
{x2;endif}



