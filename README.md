# PCNTL #

[![Build Status](https://api.travis-ci.org/Soneritics/PCNTL.svg?branch=master)](https://travis-ci.org/Soneritics/PCNTL)
[![Coverage Status](https://coveralls.io/repos/Soneritics/PCNTL/badge.svg?branch=master)](https://coveralls.io/r/Soneritics/PCNTL?branch=master)
![License](http://img.shields.io/badge/license-MIT-green.svg)

by
* [@Soneritics](https://github.com/Soneritics) - Jordi Jolink


## Introduction ##
Helper method for working with forks.

## Minimum Requirements ##

- PHP 7.1

## Features ##

- tbd
- tbd

### Example ###
The following PHP code is a minimal example of one of the possibilities of this library.
```php
(new \PCNTL\ThreadStart)->startAndWait(
    (new \PCNTL\ThreadCollection)
        ->add(new ExampleClass('Test 1'))
        ->add(new ExampleClass('Test 2'))
        ->add(new ExampleClass('Test 3'))
        ->add(new ExampleClass('Test 4'))
        ->add(new ExampleClass('Test 5'))
);
```

Running multiple threads (forks), output will look like:
```
Starting
Starting Test 1
Starting Test 2
Starting Test 3
Starting Test 5
Starting Test 4
Ended Test 1
Ended Test 3
Ended Test 5
Ended Test 2
Ended Test 4
Program is done.
```
