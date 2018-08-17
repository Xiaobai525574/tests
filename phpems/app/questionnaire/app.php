<?php
/**
 * Created by PhpStorm.
 * User: baiencai
 * Date: 2018/8/15
 * Time: 16:08
 */

class app
{
    public $G;

    public function __construct(&$G)
    {
        $this->G = $G;
        $this->ev = $this->G->make('ev');
        $this->tpl = $this->G->make('tpl');

        $this->session = $this->G->make('session');
        $this->questionnaire = $this->G->make('questionnaire');
        $this->user = $this->G->make('user','user');
        $this->comment = $this->G->make('comment','questionnaire');
        $this->_user = $_user = $this->session->getSessionUser();
        $group = $this->user->getGroupById($_user['sessiongroupid']);
        /*登录验证*/
        if($group['groupid'] != 1)
        {
            if($this->ev->get('userhash'))
            exit(json_encode(array(
                    'statusCode' => 300,
                    "message" => "请您重新登录",
                    "callbackType" => 'forward',
                    "forwardUrl" => "index.php?core-master-login"
                )));
        else
            header("location:index.php?core-master-login");
            exit();
        }

        $this->question = $this->G->make('question', 'questionnaire');
        $this->comment = $this->G->make('comment', 'questionnaire');


        $this->tpl->assign('_user',$this->user->getUserById($this->_user['sessionuserid']));

        $this->category = $this->G->make('category');
        $rcats = $this->category->getCategoriesByArgs(array(array("AND","catparent = '0'")));
        $this->tpl->assign('rcats',$rcats);
    }
}

?>