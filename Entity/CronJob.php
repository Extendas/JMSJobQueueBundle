<?php

namespace JMS\JobQueueBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table(
    name: 'jms_cron_jobs',
)]
#[ORM\ChangeTrackingPolicy('DEFERRED_EXPLICIT')]
class CronJob
{
    #[ORM\Id()]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: Types::INTEGER, options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 200, unique: true)]
    private string $command;

    #[ORM\Column(name: 'lastRunAt', type: Types::DATETIME_MUTABLE)]
    private \DateTime $lastRunAt;

    public function __construct(string $command)
    {
        $this->command = $command;
        $this->lastRunAt = new \DateTime();
    }

    public function getCommand(): string
    {
        return $this->command;
    }

    public function getLastRunAt(): \DateTime
    {
        return $this->lastRunAt;
    }
}