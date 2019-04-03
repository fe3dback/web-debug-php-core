<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

use InvalidArgumentException;

/**
 * @see https://web-debug.dev/docs/scheme/types.html#aclvote
 */
final class TypeAclVote extends AbstractType
{
    public const GRANT = 'GRANT';
    public const DENIED = 'DENIED';

    /**
     * @var string
     */
    private $value;

    /**
     * AclVote constructor.
     *
     * @param string $aclVote
     */
    public function __construct(string $aclVote)
    {
        $options = [self::GRANT, self::DENIED];

        if (!\in_array($aclVote, $options, true)) {
            throw new InvalidArgumentException(vsprintf('First argument of `%s` should be in [%s]', [
                self::class,
                implode(', ', $options),
            ]));
        }

        $this->setValue($aclVote);
    }

    /**
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return $this->getValue();
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
