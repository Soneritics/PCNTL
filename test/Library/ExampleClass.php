<?php
/**
 * Class TestClass
 * Extends the IThread interface as an example of what is possible.
 */
class ExampleClass implements \PCNTL\Interfaces\IThread
{
    /**
     * @var string
     */
    private $name;

    /**
     * ExampleClass constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Run the thread code
     * @return void
     */
    public function run(): void
    {
        echo "Starting {$this->name}\n";
        usleep(mt_rand(2000, 10000) * 1000);
        echo "Ended {$this->name}\n";
    }
}
