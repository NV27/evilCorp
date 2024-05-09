<html lang="english">
<head>
<title>Evil Corp</title>
</head>
<body>
<h1>Evil Corp</h1>
<br>
</body>
</html>

<?php
class PhysicalProduct{

    public string $name;
    public int $price;
    public float $weight;
    public string $description;

    public function __construct(string $name, float $price, float $weight, string $description){
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->description = $description;
    }

    public function getDisplay(){

        $display = "<ul>
                        <li>$this->name</li>
                        <li>£$this->price</li>
                        <li>$this->weight kg</li>
                        <li>$this->description</li>
                    </ul>";

        echo $display;
    }

    public function getShippingPrice() : float{

        if ($this->price > 100) {
            echo 'Shipping: £0';
            echo '<hr>';
            return 0;
        }
        else if ($this->weight < 10){
            echo 'Shipping: £5.99';
            echo '<hr>';
            return 5.99;
        }
        else{
            echo 'Shipping: £10.99';
            echo '<hr>';
            return 10.99;
        }
    }

}

class VirtualProduct{
    public string $name;
    public float $price;
    public float $fileSize;
    public string $fileType;
    public string $description;

    public function __construct(string $name, float $price, float $fileSize, string $fileType, string $description){
        $this->name = $name;
        $this->price = $price;
        $this->fileSize = $fileSize;
        $this->fileType = $fileType;
        $this->description = $description;
    }

    public function getDisplay() : void{

        $display = "<ul>
                        <li>$this->name</li>
                        <li>£$this->price</li>
                        <li>File Size: $this->fileSize mb</li>
                        <li>File Type: $this->fileType</li>
                        <li>$this->description</li>
                    </ul>";

        echo $display;
    }

    public function getShippingPrice() : float{
        if ($this->fileSize > 1000){
            echo 'Shipping: 50p';
            echo '<hr>';
            return 0.5;
        }
        else{
            echo 'Shipping: £0';
            echo '<hr>';
            return 0;
        }
    }
}

class Customer{

    public string $name;
    public string $email;
    public string $address;

    public function __construct(string $name, string $email, string $address){
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
    }

    function getDisplay() : void{
        $display = "<ul>
                        <li>Name: $this->name</li>
                        <li>Email: $this->email</li>
                        <li>Address: $this->address</li>
                    </ul>";

        echo $display;
    }

}

class Basket{

    public array $itemList = [];

    function addItem(object $item) : void{
        array_push($this->itemList, $item);
    }

    function removeItem(object $item) : void{
        $key = array_search($item, $this->itemList);
        array_splice($this->itemList, $key, 1);
    }

    function getDisplay() : void{
        echo '<h3> My Basket </h3>';
        foreach ($this->itemList as $item){
            $item->getDisplay();
        }
    }

    function getTotalPrice(){
        $price = 0;
        foreach ($this->itemList as $item){
            $price += $item->price;
        }
        echo "<p>Total Cost: £$price</p>";
        return $price;
    }

}

//Product Instantiation
$bananaMachine = new PhysicalProduct('Banana Machine', 800, 80.085, 'Bananas for toes');
$lilGuy = new PhysicalProduct('lil guy', 65, 5.4, 'Just a goofy lil guy');
$mysteriousVideoGame = new VirtualProduct('Mysterious Videogame', 12.99, 1024, '.exe', 'NOT malware');
$pictureOfADuck = new VirtualProduct('Picture of a Duck', 1.99, 6, '.png', 'A picture of a duck having a bath');

//Customer Instantiate
$steve = new Customer("Steven but prefers 'Steve'",'steven@prefers.steve', '23 Brick Lane');
$sandy = new Customer('Sandy Cheeks', 'sandy@gmail.com', 'Treedome, Bikini Bottom');

$myBasket = new Basket();
function getInfo(object $product){
    $product->getDisplay();
    $product->getShippingPrice();
}

getInfo($bananaMachine);
getInfo($lilGuy);
getInfo($mysteriousVideoGame);
getInfo($pictureOfADuck);

$steve->getDisplay();
$sandy->getDisplay();

$myBasket->addItem($lilGuy);
$myBasket->addItem($mysteriousVideoGame);
$myBasket->addItem($mysteriousVideoGame);
$myBasket->addItem($bananaMachine);

$myBasket->removeItem($mysteriousVideoGame);
$myBasket->getDisplay();

$myBasket->getTotalPrice();
?>