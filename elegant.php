<?php
class Elegant {

	function __construct()
	{
		require_once 'src/helper.php';
		require_once 'src/row.php';
		require_once 'src/result.php';
		require_once 'src/querybuilder.php';
		require_once 'src/model.php';
		// require_once 'relationship.php';

		$mod_path = APPPATH . 'models/';
		if(file_exists($mod_path)) $this->_read_model_dir($mod_path);
	}

	// Open model directories recursively and load the models inside
	private function _read_model_dir($dirpath)
	{
		$ci =& get_instance();

		$handle = opendir($dirpath);
		if(!$handle) return;

		while (false !== ($filename = readdir($handle)))
		{
			if($filename == "." or $filename == "..") continue;

			$filepath = $dirpath.$filename;
			if(is_dir($filepath))
				$this->_read_model_dir($filepath);

			elseif(strpos(strtolower($filename), '.php') !== false)
			{
				$name = strtolower($filepath);
				require_once $name;
			}

			else continue;
		}

		closedir($handle);
	}

}