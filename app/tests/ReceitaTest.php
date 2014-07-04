<?php

class ReceitaTest extends TestCase {

    public static $receita1 = [
        'nome'        => 'Pão Com Ovo',
        'nota'        => '9',
        'numPessoas'  => '1',
        'categoria'   => 'LANCHE',
        'tempo'       => '0.5',
        'infoNutri'   => '0 calorias',
        'modoPreparo' => 'botar um ovo no pão'
    ];

    public function setUp() {
        parent::setUp();
        $rec = new Receita(ReceitaTest::$receita1);
        $rec->save();
    }

    public function testCriarReceita() {
        $this->assertEquals(1, Receita::count());
    }

    public function testCriarReceitaComIngrediente() {
        $rec = Receita::first();
        $ing = new Ingrediente(IngredienteTest::$ingrediente1);
        $ing->save();

        $ir = new ReceitaIngrediente();
        $ir->receita()->associate($rec);
        $ir->ingrediente()->associate($ing);
        $ir->medida = 'UND';
        $ir->quantidade = '1';
        $ir->save();

        $this->assertEquals(1, ReceitaIngrediente::count());
        $this->assertEquals(1, Receita::first()->ingredientes->count());
    }

    public function testCriarReceitaComTags() {
        $rec = Receita::first();
        $tag = new Tag(['nome' => 'rapido']);
        $tag->save();

        $rt = new ReceitaTag();
        $rt->receita()->associate($rec);
        $rt->tag()->associate($tag);
        $rt->save();

        $this->assertEquals(1, ReceitaTag::count());
    }
}
