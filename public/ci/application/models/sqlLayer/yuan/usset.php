<?php
class Usset extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function database($tid){
		$db="";
		$db['hostname'] = 'localhost';
		$db['username'] = 'asfc_f';
		$db['password'] = 'seo0209';
		$db['database'] = 'asfc';
		$db['dbdriver'] = 'mysql';
		$db['dbprefix'] = 'pu_';
		$db['pconnect'] = TRUE;
		$db['db_debug'] = TRUE;
		$db['cache_on'] = FALSE;
		$db['cachedir'] = '';
		$db['char_set'] = 'utf8';
		$db['dbcollat'] = 'utf8_general_ci';
		$db['swap_pre'] = '';
		$db['autoinit'] = TRUE;
		$db['stricton'] = FALSE;
		return $this->load->database($db,TRUE);
		
	}
}
?>