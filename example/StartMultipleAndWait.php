<?php
/**
 * This example shows how to use the startAndWait method.
 * It starts multiple threads and waits until all are completed.
 * The program will resumeon the main thread when the threads are done.
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
(new \PCNTL\ThreadStart)->startAndWait(
    (new \PCNTL\ThreadCollection)
        ->add(new ExampleClass('Test 1'))
        ->add(new ExampleClass('Test 2'))
        ->add(new ExampleClass('Test 3'))
        ->add(new ExampleClass('Test 4'))
        ->add(new ExampleClass('Test 5'))
);

// This will be printed when all the threads have been finished
echo "Program is done.\n\n\n";
