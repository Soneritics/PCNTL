<?php
/**
 * This example shows how to use the start method.
 * It demonstrates that threads (forks) will live after the program has finished.
 *
 * Running this from the command line will have an output like:
    Starting..
    Starting Test 1
    Starting Test 2
    Starting Test 3
    Starting Test 4
    Program is done.

    Starting Test 5
    [user@server example]# Ended Test 4
    Ended Test 3
    Ended Test 2
    Ended Test 1
    Ended Test 5
 */

// For this example without an Autoloader, load the necessary classes
require_once __DIR__ . '/../Soneritics/PCNTL/Exceptions/CreateForkException.php';
require_once __DIR__ . '/../Soneritics/PCNTL/Interfaces/IThread.php';
require_once __DIR__ . '/../Soneritics/PCNTL/ThreadCollection.php';
require_once __DIR__ . '/../Soneritics/PCNTL/ThreadStart.php';
require_once __DIR__ . '/../test/Library/ExampleClass.php';

// Start the first 5 threads
echo "Starting..\n";

(new \PCNTL\ThreadStart)->startMultiple(
    (new \PCNTL\ThreadCollection)
        ->add(new ExampleClass('Test 1'))
        ->add(new ExampleClass('Test 2'))
        ->add(new ExampleClass('Test 3'))
        ->add(new ExampleClass('Test 4'))
        ->add(new ExampleClass('Test 5'))
);

// This will be printed when all the threads have been finished
echo "Program is done.\n\n\n";
