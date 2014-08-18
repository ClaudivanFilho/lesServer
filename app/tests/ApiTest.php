<?php

class ApiTest extends TestCase {

    public function setUp() {
        parent::setUp();
        $rec = new Receita(ReceitaTest::$receita1);
        $rec->save();
        $rec = new Receita(ReceitaTest::$receita2);
        $rec->save();
        $rec = new Receita(ReceitaTest::$receita3);
        $rec->save();
        $rec = new Receita(ReceitaTest::$receita4);
        $rec->save();
    }

    public function testSetUp() {
        $this->assertEquals(4, Receita::count());
    }

    public function testAddIngredienteAReceita() {
        $rec1 = Receita::all()[0];
        $rec2 = Receita::all()[1];
        $rec3 = Receita::all()[2];
        $rec4 = Receita::all()[3];

        $rec1->addIng('Pao', 'UND', '2');
        $rec1->addIng('ovo', 'UND', '2');

        $rec2->addIng('pao', 'UND', '4');
        
        $this->assertEquals(2, Ingrediente::count());
        $this->assertEquals(2, Ingrediente::first()->recs()->count());
    }

    public function testRouteFindReceitaComIngredientes() {
        $rec1 = Receita::all()[0]; // pao com ovo
        $rec2 = Receita::all()[1]; // maracuja
        $rec3 = Receita::all()[2]; // gengibre
        $rec4 = Receita::all()[3];

        $rec1->addIng('Pao', 'UND', '2');
        $rec1->addIng('sal', 'G', '50');
        $rec1->addIng('tomate', 'UND', '2');
        $rec1->addIng('ovo', 'UND', '2');  // receita 1 têm pao,tomate,sal

        $rec2->addIng('pao', 'UND', '4');  // receita 2 têm pão e sal
        $rec2->addIng('sal', 'G', '50');

        $rec3->addIng('pao', 'UND', '4');  // receita 3 têm pão

        $rec4->addIng('ovo', 'UND', '4');

        // procurar pao tomate
        // rec1, rec2, rec3

        $this->client->request('GET', '/api/receitas', ['ingredientes' => 'pao,tomate,sal']);
        $this->assertContains('Com Ovo', $this->client->getResponse()->getContent());
        $jsonResult = json_decode($this->client->getResponse()->getContent());
        $this->assertEquals(3, count($jsonResult));
        $this->assertEquals('Pão Com Ovo', $jsonResult[0]->nome);
        $this->assertEquals('Suco Maracujá', $jsonResult[1]->nome);
        $this->assertEquals('Suco de Gengibre', $jsonResult[2]->nome);
    }

    public function testFornecerIgredienteQueNaoPossuaReceita() {
        $rec1 = Receita::all()[0]; // pao com ovo
        $rec2 = Receita::all()[1]; // maracuja
        $rec3 = Receita::all()[2]; // gengibre
        $rec4 = Receita::all()[3];

        $rec1->addIng('Pao', 'UND', '2');
        $rec1->addIng('sal', 'G', '50');
        $rec1->addIng('tomate', 'UND', '2');
        $rec1->addIng('ovo', 'UND', '2'); // receita 1 têm pao,tomate,sal

        $rec2->addIng('pao', 'UND', '4'); // receita 2 têm pão e sal
        $rec2->addIng('sal', 'G', '50');

        $rec3->addIng('pao', 'UND', '4'); // receita 3 têm pão

        $rec4->addIng('ovo', 'UND', '4');

        $this->client->request('GET', '/api/receitas', ['ingredientes' => 'feijao']);
        $this->assertResponseOk();
        //$this->assertEquals('[]', $this->client->getResponse()->getContent());
    }

    public function testAddTegsToReceita() {
        $rec = Recipe::cria('Suco de laranja');
        Recipe::saveTags(['gostoso', 'nutritivo','rapido'], $rec);
        $this->assertEquals(3, Tag::count());
        $this->assertEquals(3, ReceitaTag::count());
        $this->assertEquals(3, Receita::where('nome','=','Suco de laranja')->first()->tags()->count());
    }

    public function testRestrictReceitas() {
        $rec1 = Receita::all()[0]; // pao com ovo
        $rec2 = Receita::all()[1]; // maracuja
        $rec3 = Receita::all()[2]; // gengibre
        $rec4 = Receita::all()[3];

        $rec1->addIng('Pao', 'UND', '2');
        $rec1->addIng('sal', 'G', '50');
        $rec1->addIng('tomate', 'UND', '2');
        $rec1->addIng('ovo', 'UND', '2');  // receita 1 têm pao,tomate,sal

        $rec2->addIng('pao', 'UND', '4');  // receita 2 têm pão e sal
        $rec2->addIng('sal', 'G', '50');

        $rec3->addIng('pao', 'UND', '4');  // receita 3 têm pão

        $rec4->addIng('ovo', 'UND', '4');

        // procurar pao tomate
        // rec1, rec2, rec3

        $this->client->request('GET', '/api/receitasrestritas',
                               ['ingredientes' => 'Pao,sal']);
        //$this->assertContains('Com Ovo', $this->client->getResponse()->getContent());
        $jsonResult = json_decode($this->client->getResponse()->getContent());
        $this->assertTrue(true);
        $this->assertEquals(1, count($jsonResult));
        $this->assertEquals('Suco Maracujá', $jsonResult[0]->nome);

        $this->client->request('GET', '/api/receitasrestritas',
                               ['ingredientes' => 'sal']);
        //$this->assertContains('Com Ovo', $this->client->getResponse()->getContent());
        $jsonResult = json_decode($this->client->getResponse()->getContent());
        $this->assertTrue(true);
        $this->assertEquals(0, count($jsonResult));
    }
}
