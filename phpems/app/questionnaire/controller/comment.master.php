<?php
/*
 * Created on 2016-5-19
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class action extends app
{
    public function display()
    {
        $this->_user = $this->session->getSessionUser();

        $action = $this->ev->url(3);
        if(!method_exists($this,$action))
            $action = "index";
        $this->$action();
        exit;
    }

    private function edit()
    {
        $userid = $this->ev->get('userid');
        $courseid = $this->ev->get('courseid');
        $args = array();
        $args[] = array("AND","questionnaireid = :questionnaireid","questionnaireid",$this->_user['questionnaireid']);
        $history = $this->comment->getDocHistoryByArgs($args);
        if($this->ev->get('submit'))
        {
            $args = $this->ev->get('args');

                $this->comment->modifyDocHistory($history['questionnaireid'],$args);

        }
        else
        {
            if($history)
            {
                $doc = $this->comment->getDocById($userid,false);
                $course = $this->comment->getCourseById($courseid,false);
                $doc['content'] = $history;
                $course['content'] = $history;
            }
            else
            {
                $doc = $this->comment->getDocById($userid);
                $course =$this->comment->getDocById($courseid);
                $doc['content'] = '';
            }
            $this->tpl->assign('history',$history);
            $this->tpl->assign('comment',$doc);
            $this->tpl->assign('comment',$course);
            $this->tpl->display('comment');
        }
    }

    private function index()
    {
        $courseid = $this->ev->get('$courseid');
        $docid = $this->ev->get('$userid');
        $doc = $this->comment->getDocById($docid);
        $course = $this->comment->getCourseId($courseid);
        $this->tpl->assign('comment',$course);
        $this->tpl->assign('comment',$doc);
        $this->tpl->display('comment');
    }
}


?>
