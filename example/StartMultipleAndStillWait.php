<?php
/**
 * This example shows how to use the start method.
 * This is one of the usages, as the program will still wait for the threads to finish.
 * This is useful when you want to start threads at multiple points of your application.
 */

// For this example without an Autoloader, load the necessary classes
require_once __DIR__ . '/../Soneritics/PCNTL/Exceptions/CreateForkException.php';
require_once __DIR__ . '/../Soneritics/PCNTL/Interfaces/IThread.php';
require_once __DIR__ . '/../Soneritics/PCNTL/ThreadCollection.php';
require_once __DIR__ . '/../Soneritics/PCNTL/ThreadStart.php';
require_once __DIR__ . '/../test/Library/ExampleClass.php';

// Start the first 5 threads
echo "Starting first 5 threads..\n";

$threadIds = (new \PCNTL\ThreadStart)->start(
    (new \PCNTL\ThreadCollection)
        ->add(new ExampleClass('Test 1'))
        ->add(new ExampleClass('Test 2'))
        ->add(new ExampleClass('Test 3'))
        ->add(new ExampleClass('Test 4'))
        ->add(new ExampleClass('Test 5'))
);

// Do some other stuff in your application
echo "In here, I am doing some other work.\n";

// Then start some more threads
echo "Starting some more threads...\n";
$threadIds = array_merge($threadIds, (new \PCNTL\ThreadStart)->start(
    (new \PCNTL\ThreadCollection)
        ->add(new ExampleClass('Test 6'))
        ->add(new ExampleClass('Test 7'))
        ->add(new ExampleClass('Test 8'))
        ->add(new ExampleClass('Test 9'))
        ->add(new ExampleClass('Test 10'))
));

// And do some more work again
echo "Again, I'm doing some other work here\n";

// Now you can wait for the threads to finish
foreach ($threadIds as $threadId) {
    pcntl_waitpid($threadId, $status);
}

// This will be printed when all the threads have been finished
echo "Program is done.\n\n\n";
