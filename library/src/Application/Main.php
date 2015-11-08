<?php 

namespace Application;

class Main 
{
    /**
     * @var array
     */
	protected $data;

    /**
     * @param array $data
     */
	public function __construct(array $data)
	{
		$this->setData($data);
	}

    /**
     * @param array $data
     */
	public function setData(array $data)
	{
		$this->data = $data;
	}

    /**
     * Your implementation
     *
     * @todo create your implementation
     */
	public function myFunction()
	{
		//... your implementation
	}
}