<?php

declare(strict_types=1);

namespace WebDebug\Builders\Events;

use WebDebug\Builders\Types\TypeAclVote;

/**
 * @see https://web-debug.dev/docs/scheme/events.html#access-check
 */
class EventAccessCheck extends AbstractEvent
{
    /**
     * @var TypeAclVote
     */
    private $access;

    /**
     * @var string
     */
    private $control;

    /**
     * @var string|null
     */
    private $object;

    /**
     * @var string|null
     */
    private $action;

    /**
     * EventAccessCheck constructor.
     *
     * @param TypeAclVote $access
     * @param string      $control
     */
    public function __construct(TypeAclVote $access, string $control)
    {
        parent::__construct(self::EVENT_TYPE_ACCESS_CHECK);

        $this->setAccess($access);
        $this->setControl($control);
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(int $schemeVersion): array
    {
        return self::build($schemeVersion, [
            'access' => $this->getAccess(),
            'control' => $this->getControl(),
            'object' => $this->getObject(),
            'action' => $this->getAction(),
        ]);
    }

    /**
     * @return TypeAclVote
     */
    public function getAccess(): TypeAclVote
    {
        return $this->access;
    }

    /**
     * @param TypeAclVote $access
     */
    public function setAccess(TypeAclVote $access): void
    {
        $this->access = $access;
    }

    /**
     * @return string
     */
    public function getControl(): string
    {
        return $this->control;
    }

    /**
     * @param string $control
     */
    public function setControl(string $control): void
    {
        $this->control = $control;
    }

    /**
     * @return string|null
     */
    public function getObject(): ?string
    {
        return $this->object;
    }

    /**
     * @param string|null $object
     */
    public function setObject(?string $object): void
    {
        $this->object = $object;
    }

    /**
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @param string|null $action
     */
    public function setAction(?string $action): void
    {
        $this->action = $action;
    }
}
