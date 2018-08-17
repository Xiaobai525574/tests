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
        $action = $this->ev->url(3);
        if(!method_exists($this,$action))
            $action = "index";
        $this->$action();
        exit;
    }

    private function history()
    {
        $userid = $this->ev->get('userid');
        $courseid = $this->ev->get('courseid');
        $page = $this->ev->get('page');
        $doc = $this->comment->getDocById($userid,false);
        $course = $this->comment->getCourseId($courseid,false);
        $args = array();
        $args[] = array("AND","questionnaireid = :questionnaireid","questionnaireid",$userid);
        $args[] = array("AND","questionnaireid = :questionnaireid","questionnaireid",$courseid);
        $histories = $this->comment->getDocHistoryListByArgs($args,$page);
        $this->tpl->assign('comment',$doc);
        $this->tpl->assign('comment',$course);
        $this->tpl->assign('histories', $histories);
        $this->tpl->display('comment');
    }

    private function viewhistory()
    {
        $dhid = $this->ev->get('questionnaireid');
        $history = $this->doc->getDocHistroyById($dhid);
        $doc = $this->doc->getDocById($history['userid']);
        $doc['content'] = $history;
        $this->tpl->assign('doc',$doc);
        $this->tpl->display('comment');
    }

    private function index()
    {
        $courseid = $this->ev->get('$courseid');
        $docid = $this->ev->get('$userid');
        $doc = $this->comment->getDocById($docid);
        $course = $this->comment->getCourseId($courseid);
        $this->tpl->assign('comment',$course);
        $this->tpl->assign('comment',$doc);
        $template = 'course_default';
        $this->tpl->display($template);
    }
}


?>
