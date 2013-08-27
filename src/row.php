<?php namespace Elegant;

use Elegant\Helper as Helper;

class Row {

	protected $model = null;

	function __construct(Model $model, $rowObject)
	{
		$this->model = $model;
		$this->model->data = $rowObject;
	}

	// Accessor
	function __get($field)
	{
		return $this->model->$field;
	}

	function __set($field, $value)
	{
		$this->model->$field = $value;
	}

	function save()
	{
		$this->model->save();
	}

	function destroy()
	{
		$this->model->destroy();
	}

}