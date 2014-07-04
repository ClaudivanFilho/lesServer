<?php

class IngredienteTest extends TestCase {

    public static $ingrediente1 = [
        'nome'        => 'Pão',
    ];

    public function setUp() {
        parent::setUp();
        $ing = new Ingrediente(IngredienteTest::$ingrediente1);
        $ing->save();
    }

    public function testCriarIngrediente() {
        $this->assertEquals(1, Ingrediente::count());
    }
}
