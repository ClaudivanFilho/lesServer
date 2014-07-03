<?php

class BDTest extends TestCase {

	public function testDatabase()
	{
		$this->assertEquals(0, User::count());
	}

}
