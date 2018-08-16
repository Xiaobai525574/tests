<?php

class questionnaire_questionnaire
{
    public $G;

    public function __construct(&$G)
    {
        $this->G = $G;
    }

    public function _init()
    {
        $this->categories = NULL;
        $this->tidycategories = NULL;
        $this->pdosql = $this->G->make('pdosql');
        $this->db = $this->G->make('pepdo');
        $this->pg = $this->G->make('pg');
        $this->ev = $this->G->make('ev');
    }

    public function getCourseList($args,$page,$number = 20,$order = 'questionnaireid ASC,userid DESC')
    {
        $data = array(
            'select' => false,
            'table' => 'comments',
            'query' => $args,
            'orderby' => $order
        );
        $r = $this->db->listElements($page,$number,$data);
        return $r;
    }


}

?>
