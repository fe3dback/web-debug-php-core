<?php

/** @noinspection MultipleReturnStatementsInspection */

declare(strict_types=1);

namespace WebDebug\Builders;

use RuntimeException;
use WebDebug\Builders\Interfaces\ISchemeBuilder;
use WebDebug\Builders\Models\Id;
use WebDebug\Builders\Models\Interfaces\IModel;
use WebDebug\Builders\Models\Version;
use WebDebug\Builders\Types\Interfaces\IType;
use WebDebug\Builders\Types\UUID;

/**
 * Class AbstractSchemeBuilder.
 *
 * @property \WebDebug\Builders\Models\Id      $id      unique request id
 * @property \WebDebug\Builders\Models\Version $version schema version
 */
abstract class AbstractSchemeBuilder implements ISchemeBuilder
{
    private const PROP_ID = 'id';
    private const PROP_VERSION = 'version';

    /**
     * @param string $uuid
     *
     * @throws \Exception
     */
    public function __construct(string $uuid)
    {
        $this->id = new Id(new UUID($uuid));
        $this->version = new Version();
    }

    /**
     * @return IModel[]|null[]
     */
    protected function getSchemeModels(): array
    {
        return [
            self::PROP_ID => $this->id,
            self::PROP_VERSION => $this->version,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function build(): string
    {
        $scheme = [];
        $v = $this->getVersion();

        foreach ($this->getSchemeModels() as $propName => $model) {
            if (null === $model) {
                continue;
            }

            $scheme[$propName] = $this->mapFields($model->exportModel($v), $v);
        }

        $json = json_encode($scheme, JSON_PRETTY_PRINT);

        if (false === $json) {
            throw new RuntimeException(sprintf('can`t build json in %s', self::class));
        }

        return $json;
    }

    /**
     * @param mixed $fields
     * @param int   $version
     *
     * @return mixed
     */
    private function mapFields($fields, int $version)
    {
        if (\is_array($fields)) {
            $fields = array_map(function ($field) use ($version) {
                return $this->mapFieldValue($field, $version);
            }, $fields);

            $fields = array_filter($fields, function ($field) {
                return null !== $field;
            });
        }

        return $fields;
    }

    /**
     * @param mixed $fieldValue
     * @param int   $version
     *
     * @return mixed
     */
    private function mapFieldValue($fieldValue, int $version)
    {
        if (null === $fieldValue || '' === $fieldValue) {
            return null;
        }

        if ($fieldValue instanceof IType) {
            return $this->mapFields($fieldValue->export($version), $version);
        }

        if (\is_array($fieldValue)) {
            $list = [];
            foreach ($fieldValue as $k => $item) {
                if (null === $item || '' === $item) {
                    continue;
                }

                if ($item instanceof IType) {
                    $list[$k] = $item->export($version);
                }
            }

            return $list;
        }

        return $fieldValue;
    }
}
