<?php

class TagTest extends TestCase {

    public static $tag1 = [
        'nome'        => 'rapido',
    ];

    public function setUp() {
        parent::setUp();
        $tag = new Tag(TagTest::$tag1);
        $tag->save();
    }

    public function testCriarTag() {
        $this->assertEquals(1, Tag::count());
    }
}
