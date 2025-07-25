<?php

declare(strict_types=1);

namespace AmoCRM\Filters;

use AmoCRM\Filters\Interfaces\HasPagesInterface;
use AmoCRM\Filters\Traits\ArrayOrNumericFilterTrait;
use AmoCRM\Filters\Traits\ArrayOrStringFilterTrait;
use AmoCRM\Filters\Traits\IntOrIntRangeFilterTrait;
use AmoCRM\Filters\Traits\PagesFilterTrait;

use function implode;
use function is_null;

class FilesFilter extends BaseEntityFilter implements HasPagesInterface
{
    use ArrayOrNumericFilterTrait;
    use ArrayOrStringFilterTrait;
    use IntOrIntRangeFilterTrait;
    use PagesFilterTrait;

    /** @var array|null */
    private $uuid;

    /** @var string|null */
    private $name;

    /** @var array|null */
    private $extensions;

    /** @var string|null */
    private $term;

    /** @var int|null */
    private $sourceId;

    /** @var bool|null */
    private $deleted;

    /** @var array|int|null */
    private $size;

    /** @var int|null */
    private $sizeUnit;

    /** @var array|int|null */
    private $date;

    /** @var string|null */
    private $dateType;

    /** @var string|null */
    private $datePreset;

    /** @var array|int|null */
    private $createdBy;

    /** @var array|int|null */
    private $updatedBy;

    public function getUuid(): ?array
    {
        return $this->uuid;
    }

    /**
     * @param array|string|null $uuid
     * @return FilesFilter
     */
    public function setUuid($uuid): self
    {
        $this->uuid = $this->parseArrayOrStringFilter($uuid);

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getExtensions(): ?array
    {
        return $this->extensions;
    }

    /**
     * @param array|string|null $extensions
     * @return FilesFilter
     */
    public function setExtensions($extensions): self
    {
        $this->extensions = $this->parseArrayOrStringFilter($extensions);

        return $this;
    }

    public function getTerm(): ?string
    {
        return $this->term;
    }

    public function setTerm(?string $term): self
    {
        $this->term = $term;

        return $this;
    }

    public function getSourceId(): ?int
    {
        return $this->sourceId;
    }

    public function setSourceId(?int $sourceId): self
    {
        $this->sourceId = $sourceId;

        return $this;
    }

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(?bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * @return array|int|null
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param BaseRangeFilter|int|null $size
     * @return FilesFilter
     */
    public function setSize($size): self
    {
        $this->size = $this->parseIntOrIntRangeFilter($size);

        return $this;
    }

    public function getSizeUnit(): ?int
    {
        return $this->sizeUnit;
    }

    public function setSizeUnit(?int $sizeUnit): self
    {
        $this->sizeUnit = $sizeUnit;

        return $this;
    }

    /**
     * @return array|int|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param BaseRangeFilter|int|null $date
     * @return FilesFilter
     */
    public function setDate($date): self
    {
        $this->date = $this->parseIntOrIntRangeFilter($date);

        return $this;
    }

    public function getDateType(): ?string
    {
        return $this->dateType;
    }

    public function setDateType(?string $dateType): self
    {
        $this->dateType = $dateType;

        return $this;
    }

    public function getDatePreset(): ?string
    {
        return $this->datePreset;
    }

    public function setDatePreset(?string $datePreset): self
    {
        $this->datePreset = $datePreset;

        return $this;
    }

    /**
     * @return array|int|null
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param array|int|null $createdBy
     * @return FilesFilter
     */
    public function setCreatedBy($createdBy): self
    {
        $this->createdBy = $this->parseArrayOrNumberFilter($createdBy);

        return $this;
    }

    /**
     * @return array|int|null
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * @param array|int|null $updatedBy
     * @return FilesFilter
     */
    public function setUpdatedBy($updatedBy): self
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    public function buildFilter(): array
    {
        $filter = [];

        if (!is_null($this->getUuid())) {
            $filter['filter']['uuid'] = implode(',', $this->getUuid());
        }

        if (!is_null($this->getName())) {
            $filter['filter']['name'] = $this->getName();
        }

        if (!is_null($this->getExtensions())) {
            $filter['filter']['extensions'] = $this->getExtensions();
        }

        if (!is_null($this->getTerm())) {
            $filter['filter']['term'] = $this->getTerm();
        }

        if (!is_null($this->getSourceId())) {
            $filter['filter']['source_id'] = $this->getSourceId();
        }

        if (!is_null($this->getDeleted())) {
            $filter['filter']['deleted'] = $this->getDeleted();
        }

        if (!is_null($this->getSize())) {
            $filter['filter']['size'] = $this->getSize();
        }

        if (!is_null($this->getSizeUnit())) {
            $filter['filter']['size']['unit'] = $this->getSizeUnit();
        }

        if (!is_null($this->getDate())) {
            $filter['filter']['date'] = $this->getDate();
        }

        if (!is_null($this->getDateType())) {
            $filter['filter']['date']['type'] = $this->getDateType();
        }

        if (!is_null($this->getDatePreset())) {
            $filter['filter']['date']['date_preset'] = $this->getDatePreset();
        }

        if (!is_null($this->getCreatedBy())) {
            $filter['filter']['created_by'] = $this->getCreatedBy();
        }

        if (!is_null($this->getUpdatedBy())) {
            $filter['filter']['updated_by'] = $this->getUpdatedBy();
        }

        return $this->buildPagesFilter($filter);
    }
}
