<?php


class doc_docs
{
    public $G;

    public function __construct(&$G)
    {
        $this->G = $G;
    }

    public function _init()
    {
        $this->pdosql = $this->G->make('pdosql');
        $this->db = $this->G->make('pepdo');
    }

    public function getDocNumber($args)
    {
        $data = array('count(*) as number','user',$args);
        $sql = $this->pdosql->makeSelect($data);
        $r = $this->db->fetch($sql);
        return $r['number'];
    }
    public function getCourseNumber($args)
    {
        $data = array('count(*) as number','course',$args);
        $sql = $this->pdosql->makeSelect($data);
        $r = $this->db->fetch($sql);
        return $r['number'];
    }

    public function getCourseList($args,$page,$number = 20,$order = 'courseid desc')
    {
        $data = array(
            'select' => false,
            'table' => 'course',
            'query' => $args,
            'orderby' => $order
        );
        $r = $this->db->listElements($page,$number,$data);
        return $r;
    }
    public function getDocList($args,$page,$number = 20,$order = 'userid desc')
    {
        $data = array(
            'select' => false,
            'table' => 'user',
            'query' => $args,
            'orderby' => $order
        );
        $r = $this->db->listElements($page,$number,$data);
        return $r;
    }

    public function delDoc($id)
    {
        $this->db->delElement(array('table' => 'questionnaire','query' => array(array('AND',"questionnaireid = :questionnaireid",'questionnaireid',$id))));
        $this->db->delElement(array('table' => 'user','query' => array(array('AND',"userid = :userid",'userid',$id))));
        $this->db->delElement(array('table' => 'course','query' => array(array('AND',"courseid = :courseid",'courseid',$id))));
        return true;
    }

    public function modifyDoc($id,$args)
    {
        $data = array(
            'table' => 'questionnaire',
            'value' => $args,
            'query' => array(array('AND',"questionnaireid = :questionnaireid",'questionnaireid',$id))
        );
        return $this->db->updateElement($data);
    }

    public function addDoc($args)
    {
        return $this->db->insertElement(array('table' => 'questionnaire','query' => $args));
    }

    public function getDocById($userid)
    {
        $data = array(false,'user',array(array('AND',"userid = :userid",'userid',$userid)));
        $sql = $this->pdosql->makeSelect($data);
        $r = $this->db->fetch($sql);
        return $r;
    }
    public function getCourseId($courseid)
    {
        $data = array(false,'course',array(array('AND',"courseid = :courseid",'courseid',$courseid)));
        $sql = $this->pdosql->makeSelect($data);
        $r = $this->db->fetch($sql);
        return $r;
    }

    public function getDocHistroyById($id)
    {
        $data = array(false,'questionnaire',array(array('AND',"questionnaireid = :questionnaireid",'questionnaireid',$id)));
        $sql = $this->pdosql->makeSelect($data);
        return $this->db->fetch($sql);
    }

    public function getDocHistoryByArgs($args)
    {
        $data = array(false,'questionnaire',$args);
        $sql = $this->pdosql->makeSelect($data);
        return $this->db->fetch($sql);
    }

    public function getDocHistoryListByDocid($id,$page,$number = 20,$order = 'questionnaireid DESC')
    {
        $data = array(
            'select' => false,
            'table' => 'questionnaire',
            'query' => array(array("AND","questionnaireid = :questionnaireid","questionnaireid",$id)),
            'orderby' => $order
        );
        $r = $this->db->listElements($page,$number,$data);
        return $r;
    }

    public function getDocHistoryListByArgs($args,$page,$number = 20,$order = 'questionnaireid DESC')
    {
        $data = array(
            'select' => false,
            'table' => 'questionnaire',
            'query' => $args,
            'orderby' => $order
        );
        $r = $this->db->listElements($page,$number,$data);
        return $r;
    }

    public function delDocHistory($id)
    {
        $this->db->delElement(array('table' => 'questionnaire','query' => array(array('AND',"questionnaireid = :questionnaireid",'questionnaireid',$id))));
        return true;
    }


    public function addDocHistory($args)
    {
        return $this->db->insertElement(array('table' => 'questionnaire','query' => $args));
    }
}

?>
