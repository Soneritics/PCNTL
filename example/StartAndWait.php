<?php
/**
 * This example shows how to use the start method.
 * It starts a single thread and waits for it to end.
 */

// For this example without an Autoloader, load the necessary classes
require_once __DIR__ . '/../Soneritics/PCNTL/Exceptions/CreateForkException.php';
require_once __DIR__ . '/../Soneritics/PCNTL/Interfaces/IThread.php';
require_once __DIR__ . '/../Soneritics/PCNTL/ThreadCollection.php';
require_once __DIR__ . '/../Soneritics/PCNTL/ThreadStart.php';
require_once __DIR__ . '/../test/Library/ExampleClass.php';

// Echo the start of the program
echo "Starting \n";

// Example of the usage
$threadStart = new \PCNTL\ThreadStart;
$threadId = $threadStart->start((new ExampleClass('Test')));
$threadStart->wait([$threadId]);

// This will be printed when all the threads have been finished
echo "Program is done.\n\n\n";
