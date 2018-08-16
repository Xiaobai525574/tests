<?php

class question_questionnaire
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
		$this->ev = $this->G->make('ev');
	}

	public function getQuestionList($args,$page,$number = 20,$order = 'createtime DESC')
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

    public function xiao()
    {
    }

}

?>
