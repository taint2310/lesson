<?php
/**
 * This is a class Controller
 */
class Controller

{	
	protected static $_instance;

	protected $_config;

	protected $_view;

	protected $_model;

	protected $_helper;
	
    public function __construct()
    {	
        self::$_instance =& $this;

        // load all class config, view, model ad helper
        require_once PATH.'/core/Config.php';
        $this->_config = new Config;
        $this->_config->load('config');

        require_once PATH . '/core/View.php';
        $this->_view = new View;

        require_once PATH . '/core/Model.php';
        $this->_model = new Model();

        require_once PATH . '/core/Helper.php';
        $this->_helper = new Helper;
    }

    public function load_template_before($view,$data = array())
	{
		$this->_view->load_template_before($view, $data);
	}

	public function load_template_after($view,$data = array())
	{
		$this->_view->load_template_after($view, $data);
	}

	public function __destruct()
	{
		$this->_view->show();
	}

	public static function get_instance()
    {	
        return self::$_instance;
    }
}