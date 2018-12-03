<?php

namespace App\Implementations;

use App\Interfaces\CounterInterface;

class Counter2 implements CounterInterface
{
	protected $counter = 0;

	public function __construct()
	{
		$this->counter = 100;
	}

	public function increment()
	{
		return ++$this->counter;
	}

	public function decrement()
	{
		return --$this->counter;
	}

	public function getValue()
	{
		return $this->counter;
	}
}
