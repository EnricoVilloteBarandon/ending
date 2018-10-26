<?php 
    use App\Http\Controllers\HomeController;
    $segment = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    echo "<h1>" . HomeController::getGameTitle($segment[4])->title . "</h1>";
    echo "<h3>" . date("D, M d,Y g:i A",strtotime(HomeController::getGameTitle($segment[4])->date)) . "</h3>";
?>
<h3>Prize: {{ $prize->grandprice }}</h3>

<?php 
    foreach($images as $index => $value){
        echo "<img src='". url('/') . '/' . $value->path ."' height='200px' width='200px'>";
    }
?>