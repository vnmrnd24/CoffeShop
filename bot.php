<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

$config = [
];

$servername = "";
$username = "";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Load the driver(s) you want to use
DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);

// Create an instance
$botman = BotManFactory::create($config);

// Give the bot something to listen for.
$botman->hears('hello', function ($bot) {
    $bot->reply('Welcome to Sandman Coffee.');
});

$botman->hears('I want ([0-9]+) (small coffee|medium coffee|large coffee|shot
  of espresso)', function ($bot, $number, $drink){
    $cost = 5;
    $total = $number * $cost;
    $bot->reply('You have order'.$number.'cups of '.$coffee.'.');

    /*
      if(isset($_REQUEST["term"])){
        $sql = "SELECT * FROM  drinks WHERE name LIKE ?";

        if($stmt = mysqli_prepare($conn, $sql)){
          mysqli_stmt_bind_param($stmt, "s", $param_term);
          if(mysqli_num_rows($result) > 0){
            echo "$row["price"]";
          } else {
            echo "Drink choice not availible";
          }
        } else {
          echo "ERROR: Could not able to execute order"
        }
         mysqli_stmt_close($stmt);
      }
    */


});

$botman->hears('Good Bye', function ($bot) {
    $conn->close();
});

botman

// Start listening
//$botman->listen();

?>
