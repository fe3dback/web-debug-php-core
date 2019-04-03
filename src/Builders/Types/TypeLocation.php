<?php

declare(strict_types=1);

namespace WebDebug\Builders\Types;

/**
 * @see https://web-debug.dev/docs/scheme/types.html#location
 */
final class TypeLocation extends AbstractType
{
    /**
     * relative path to project root.
     *
     * @var TypeRelativePath
     */
    private $relativePath;

    /**
     * line in file.
     *
     * @var int|null
     */
    private $line;

    /**
     * cursor position in line (work only if "line" defined).
     *
     * @var int|null
     */
    private $positionStart;

    /**
     * cursor end position in line (work only if "pos" defined).
     *
     * @var int|null
     */
    private $positionEnd;

    /**
     * Location constructor.
     *
     * @param TypeRelativePath $relativePath relative path to project root
     */
    public function __construct(TypeRelativePath $relativePath)
    {
        $this->setRelativePath($relativePath);
    }

    /**
     * {@inheritdoc}
     */
    public function export(int $schemeVersion)
    {
        return self::build($schemeVersion, [
            'relativePath' => $this->getRelativePath(),
            'line' => $this->getLine(),
            'positionStart' => $this->getPositionStart(),
            'positionEnd' => $this->getPositionEnd(),
        ]);
    }

    /**
     * @return TypeRelativePath
     */
    public function getRelativePath(): TypeRelativePath
    {
        return $this->relativePath;
    }

    /**
     * @param TypeRelativePath $relativePath
     */
    public function setRelativePath(TypeRelativePath $relativePath): void
    {
        $this->relativePath = $relativePath;
    }

    /**
     * @return int|null
     */
    public function getLine(): ?int
    {
        return $this->line;
    }

    /**
     * @param int|null $line
     */
    public function setLine(?int $line): void
    {
        $this->line = $line;
    }

    /**
     * @return int|null
     */
    public function getPositionStart(): ?int
    {
        return $this->positionStart;
    }

    /**
     * @param int|null $positionStart
     */
    public function setPositionStart(?int $positionStart): void
    {
        $this->positionStart = $positionStart;
    }

    /**
     * @return int|null
     */
    public function getPositionEnd(): ?int
    {
        return $this->positionEnd;
    }

    /**
     * @param int|null $positionEnd
     */
    public function setPositionEnd(?int $positionEnd): void
    {
        $this->positionEnd = $positionEnd;
    }
}
