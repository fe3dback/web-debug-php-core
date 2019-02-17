<?php

declare(strict_types=1);

namespace WebDebug\Builders\Models;

/**
 * Class VersionModel.
 */
class Version extends AbstractModel
{
    /**
     * {@inheritdoc}
     *
     * @internal
     */
    public function exportModel(int $schemeVersion)
    {
        return $schemeVersion;
    }
}
