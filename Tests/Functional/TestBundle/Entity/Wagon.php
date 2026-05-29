<?php

namespace JMS\JobQueueBundle\Tests\Functional\TestBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'wagons')]
#[ORM\ChangeTrackingPolicy('DEFERRED_EXPLICIT')]
class Wagon
{
    #[ORM\Id()]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: Types::INTEGER)]
    public ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Train::class)]
    public $train;

    #[ORM\Column(type: Types::STRING)]
    public $state = 'new';
}