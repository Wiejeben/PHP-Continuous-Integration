<?php

class GumballMachine {
	private $gumballs;

	// Get the most of gumballs still in the machine
	public function getGumballs()
	{
		return $this->gumballs;
	}

	// Set the amount of gymballs in the machine
	public function setGumballs($amount)
	{
		$this->gumballs = $amount;
	}

	public function turnWheel()
	{
		$this->setGumballs($this->getGumballs() -1);
	}
}