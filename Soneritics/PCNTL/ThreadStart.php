<?php
namespace PCNTL;

use PCNTL\Exceptions\CreateForkException;

/**
 * Class ThreadStart
 */
class ThreadStart
{
    /**
     * @var ThreadCollection
     */
    private $threads;

    /**
     * ThreadStart constructor.
     */
    public function __construct()
    {
        $this->threads = new ThreadCollection;
    }

    /**
     * @param ThreadCollection $threads
     * @return array
     * @throws CreateForkException
     */
    public function start(ThreadCollection $threads): array
    {
        $processIds = [];

        while (!$threads->empty()) {
            $thread = $threads->shift();
            $this->threads->add($thread);
            $pid = pcntl_fork();

            if ($pid === -1) {
                throw new CreateForkException;
            } elseif ($pid === 0) {
                $thread->run();
                exit;
            } else {
                $processIds[] = $pid;
            }
        }

        return $processIds;
    }

    /**
     * @param ThreadCollection $threads
     * @return void
     */
    public function startAndWait(ThreadCollection $threads): void
    {
        $threadIds = $this->start($threads);

        foreach ($threadIds as $threadId) {
            pcntl_waitpid($threadId, $status);
        }
    }
}
