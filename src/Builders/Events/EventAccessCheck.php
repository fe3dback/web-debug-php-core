<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

use WebDebug\Builders\Types\TypeAclVote;

/**
 * Class EventAccessCheck.
 *
 * @property TypeAclVote $access
 * @property string      $control
 * @property string      $object
 * @property string      $action
 *
 * @see https://web-debug.dev/docs/scheme/events.html#access-check
 */
class EventAccessCheck extends AbstractEvent
{
    /**
     * EventAccessCheck constructor.
     *
     * @param TypeAclVote $access
     * @param string      $control
     */
    public function __construct(TypeAclVote $access, string $control)
    {
        parent::__construct(self::EVENT_TYPE_ACCESS_CHECK);

        $this->access = $access;
        $this->control = $control;
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'access' => $this->access,
            'control' => $this->control,
            'object' => $this->object,
            'action' => $this->action,
        ]);
    }
}
