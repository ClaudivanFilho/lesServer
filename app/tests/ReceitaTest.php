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

    public static $receita2 = [
        'nome'        => 'Suco Maracujá',
        'nota'        => '9',
        'numPessoas'  => '1',
        'categoria'   => 'LANCHE',
        'tempo'       => '0.5',
        'infoNutri'   => '0 calorias',
        'modoPreparo' => 'botar um ovo no pão'
    ];

    public static $receita3 = [
        'nome'        => 'Suco de Gengibre',
        'nota'        => '9',
        'numPessoas'  => '1',
        'categoria'   => 'LANCHE',
        'tempo'       => '0.5',
        'infoNutri'   => '0 calorias',
        'modoPreparo' => 'botar um ovo no pão'
    ];

    public static $receita4 = [
        'nome'        => 'Lasanha',
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

    public function testHasManyThroung() {
        $rec = Receita::first();
        $ing = new Ingrediente(IngredienteTest::$ingrediente1);
        $ing->save();

        $ing2 = new Ingrediente(['nome' => 'ovo']);
        $ing2->save();

        $ir = new ReceitaIngrediente();
        $ir->receita()->associate($rec);
        $ir->ingrediente()->associate($ing);
        $ir->medida     = 'UND';
        $ir->quantidade = '1';
        $ir->save();

        $ir2 = new ReceitaIngrediente();
        $ir2->receita()->associate($rec);
        $ir2->ingrediente()->associate($ing2);
        $ir2->medida     = 'UND';
        $ir2->quantidade = '1';
        $ir2->save();

        $this->assertEquals(2, $rec->ingredientes->count());
        $this->assertEquals(2, $rec->ings()->count());
    }

    public function testIngsLigadosAreceita() {
        $rec = Receita::first();
        $rec2 = new Receita(ReceitaTest::$receita2);
        $rec2->save();

        $ing = new Ingrediente(IngredienteTest::$ingrediente1);
        $ing->save();

        $ir = new ReceitaIngrediente();
        $ir->receita()->associate($rec);
        $ir->ingrediente()->associate($ing);
        $ir->medida     = 'UND';
        $ir->quantidade = '1';
        $ir->save();

        $ir2 = new ReceitaIngrediente();
        $ir2->receita()->associate($rec2);
        $ir2->ingrediente()->associate($ing);
        $ir2->medida     = 'UND';
        $ir2->quantidade = '1';
        $ir2->save();

        $this->assertEquals(2, $ing->receitas->count());
        $this->assertEquals(2, $ing->recs()->count());
    }

}
