<?php
namespace PCNTL;

use PCNTL\Exceptions\CreateForkException;
use PCNTL\Interfaces\IThread;

/**
 * Class ThreadStart
 */
class ThreadStart
{
    /**
     * @param IThread $thread
     * @return int
     * @throws CreateForkException
     */
    public function start(IThread $thread): int
    {
        $pid = pcntl_fork();

        if ($pid === -1) {
            throw new CreateForkException;
        } elseif ($pid === 0) {
            $thread->run();
            exit;
        }

        return $pid;
    }

    /**
     * @param ThreadCollection $threads
     * @return array
     * @throws CreateForkException
     */
    public function startMultiple(ThreadCollection $threads): array
    {
        $processIds = [];

        while (!$threads->empty()) {
            $thread = $threads->shift();
            $processIds[] = $this->start($thread);
        }

        return $processIds;
    }

    /**
     * @param ThreadCollection $threads
     * @return void
     */
    public function startAndWait(ThreadCollection $threads): void
    {
        $threadIds = $this->startMultiple($threads);
        $this->wait($threadIds);
    }

    /**
     * Wait for threads to finish
     * @param array $threadIds
     */
    public function wait(array $threadIds): void
    {
        foreach ($threadIds as $threadId) {
            pcntl_waitpid($threadId, $status);
        }
    }
}
