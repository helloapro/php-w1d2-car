
<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $picture;

//Class Constructor
    function __construct($car_make, $car_price, $car_miles, $car_picture = "/img/car.jpg" )
    {
        $this->make_model = $car_make;
        $this->price = $car_price;
        $this->miles = $car_miles;
        $this->picture = $car_picture;
    }

//Class Getters and Setters
    function setModel($new_model)
    {
        $this->make_model = $new_model;
    }

    function getModel()
    {
        return $this->make_model;
    }

    function setPrice($new_price)
    {
        $this->price = $new_price;
    }

    function getPrice()
    {
        return $this->price;
    }

    function setMiles($new_miles)
    {
        $this->miles = $new_miles;
    }

    function getMiles()
    {
        return $this->miles;
    }

    function setPicture($new_picture)
    {
        $this->picture = $new_picture;
    }

    function getPicture()
    {
        return $this->picture;
    }

//Additional Methods
    function worthBuying($max_price, $max_miles)
    {
        $output = false;
        if ($this->price < $max_price && $this->miles < $max_miles) {
            $output = true;
        }
        return $output;
    }

}

$camry = new Car("2015 Toyota Camry", 15000, 5000, "/img/camry.jpg");
$prius = new Car("2013 Toyota Prius", 17000, 33000, "/img/prius.jpg");

// $porsche = new Car();
// $porsche->make_model = "2014 Porsche 911";
// $porsche->price = 114991;
// $porsche->miles = 7864;
//
// $ford = new Car();
// $ford->make_model = "2011 Ford F450";
// $ford->price = 55995;
// $ford->miles = 14241;
//
// $lexus = new Car();
// $lexus->make_model = "2013 Lexus RX 350";
// $lexus->price = 44700;
// $lexus->miles = 20000;
//
// $mercedes = new Car();
// $mercedes->make_model = "Mercedes Benz CLS550";
// $mercedes->price = 39900;
// $mercedes->miles = 37979;

//$porsche, $ford, $lexus, $mercedes

$cars = array($camry, $prius);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->worthBuying($_GET['price'],$_GET['miles'])) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            foreach ($cars_matching_search as $car) {
                echo "<li>" . $car->getModel() . "</li>";
                echo "<ul>";
                    echo "<li> $" . $car->getPrice() .  "</li>";
                    echo "<li> Miles: " . $car->getMiles() . "</li>";
                    echo "<img src='" . $car->getPicture() . "'>";
                echo "</ul>";
            }
        ?>
    </ul>
</body>
</html>
