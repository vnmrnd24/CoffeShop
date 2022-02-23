<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

$config = [
    // Your driver-specific configuration
    // "telegram" => [
    //    "token" => "TOKEN"
    // ]
];

// Load the driver(s) you want to use
DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);

// Create an instance
$botman = BotManFactory::create($config);

// Give the bot something to listen for.
$botman->hears('hello', function (BotMan $bot) {
    $bot->reply('Welcome to Sandman Coffee.');
});

$botman->hears('I want ([0-9]+) (small coffee|medium coffee|large coffee|shot
  of espresso)', function ($bot, $number, $drink){
    $cost = 5;
    $total = $number * $cost;
    $bot->reply('You have order'.$number.'cups of '.$coffee.'.')
});

botman

// Start listening
$botman->listen();
