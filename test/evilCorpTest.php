<?php
require_once '../php-evilCorp.php';
use PHPUnit\Framework\TestCase;

class evilCorpTest extends TestCase{

    public function testPhysicalProductConstruct(){
        $product = new PhysicalProduct('Fridge',500, 40, 'Best Fridge');
        $this->assertInstanceOf(PhysicalProduct::class, $product);
        $this->assertInstanceOf(Product::class, $product);

        $name = $product->name;
        $this->assertSame('Fridge', $name);
    }


}


?>