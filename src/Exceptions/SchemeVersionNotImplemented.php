<?php

declare(strict_types=1);

namespace WebDebug\Exceptions;

use RuntimeException;
use Throwable;

/**
 * Class SchemeVersionNotImplementedYet
 * @package WebDebug\Exceptions
 */
class SchemeVersionNotImplemented extends RuntimeException
{
    /**
     * Construct the exception.
     * @param int $targetVersion
     * @param Throwable|null $previous
     */
    public function __construct(int $targetVersion, Throwable $previous = null)
    {
        parent::__construct(
            sprintf('Scheme version %d is not implemented yet', $targetVersion),
            1,
            $previous
        );
    }
}