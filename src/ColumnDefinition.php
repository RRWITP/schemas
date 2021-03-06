<?php
/**
 * Plasma Schemas component
 * Copyright 2018-2019 PlasmaPHP, All Rights Reserved
 *
 * Website: https://github.com/PlasmaPHP
 * License: https://github.com/PlasmaPHP/schemas/blob/master/LICENSE
 */

namespace Plasma\Schemas;

/**
 * A generic Column Definition implementation.
 *
 * It takes input and outputs it without any changes.
 */
class ColumnDefinition extends \Plasma\AbstractColumnDefinition implements ColumnDefinitionInterface {
    /**
     * @var bool
     */
    protected $nullable;
    
    /**
     * @var bool
     */
    protected $autoIncremented;
    
    /**
     * @var bool
     */
    protected $primary;
    
    /**
     * @var bool
     */
    protected $unique;
    
    /**
     * @var bool
     */
    protected $composite;
    
    /**
     * @var bool
     */
    protected $unsigned;
    
    /**
     * @var bool
     */
    protected $zerofilled;
    
    /**
     * @var string|null
     */
    protected $foreignTarget;
    
    /**
     * @var string|null
     */
    protected $foreignKey;
    
    /**
     * @var int
     */
    protected $foreignFetchMode = \Plasma\Schemas\PreloadInterface::FETCH_MODE_LAZY;
    
    /**
     * Constructor.
     * @param string       $table
     * @param string       $name
     * @param string       $type
     * @param string|null  $charset
     * @param int|null     $length
     * @param int          $flags
     * @param int|null     $decimals
     * @param bool         $nullable
     * @param bool         $autoIncremented
     * @param bool         $primary
     * @param bool         $unique
     * @param bool         $composite
     * @param bool         $unsigned
     * @param bool         $zerofilled
     * @param string|null  $foreignTarget
     * @param string|null  $foreignKey
     * @param int|null     $foreignFetchMode
     * @internal
     */
    function __construct(
        string $table,
        string $name,
        string $type,
        ?string $charset,
        ?int $length,
        int $flags,
        ?int $decimals,
        bool $nullable,
        bool $autoIncremented,
        bool $primary,
        bool $unique,
        bool $composite,
        bool $unsigned,
        bool $zerofilled,
        ?string $foreignTarget,
        ?string $foreignKey,
        ?int $foreignFetchMode
    ) {
        parent::__construct($table, $name, $type, $charset, $length, $flags, $decimals);
        
        $this->nullable = $nullable;
        $this->autoIncremented = $autoIncremented;
        $this->primary = $primary;
        $this->unique = $unique;
        $this->composite = $composite;
        $this->unsigned = $unsigned;
        $this->zerofilled = $zerofilled;
        $this->foreignTarget = $foreignTarget;
        $this->foreignKey = $foreignKey;
        $this->foreignFetchMode = ($foreignFetchMode !== null ? $foreignFetchMode : $this->foreignFetchMode);
    }
    
    /**
     * Whether the column is nullable (not `NOT NULL`).
     * @return bool
     */
    function isNullable(): bool {
        return $this->nullable;
    }
    
    /**
     * Whether the column is auto incremented.
     * @return bool
     */
    function isAutoIncrement(): bool {
        return $this->autoIncremented;
    }
    
    /**
     * Whether the column is the primary key.
     * @return bool
     */
    function isPrimaryKey(): bool {
        return $this->primary;
    }
    
    /**
     * Whether the column is the unique key.
     * @return bool
     */
    function isUniqueKey(): bool {
        return $this->unique;
    }
    
    /**
     * Whether the column is part of a multiple/composite key.
     * @return bool
     */
    function isMultipleKey(): bool {
        return $this->composite;
    }
    
    /**
     * Whether the column is unsigned (only makes sense for numeric types).
     * @return bool
     */
    function isUnsigned(): bool {
        return $this->unsigned;
    }
    
    /**
     * Whether the column gets zerofilled to the length.
     * @return bool
     */
    function isZerofilled(): bool {
        return $this->zerofilled;
    }
    
    /**
     * Get the foreign table for this column, or null.
     * @return string|null
     */
    function getForeignTarget(): ?string {
        return $this->foreignTarget;
    }
    
    /**
     * Get the foreign key for this column, or null.
     * @return string|null
     */
    function getForeignKey(): ?string {
        return $this->foreignKey;
    }
    
    /**
     * Get the foreign fetch mode. See the constants.
     * @return int
     */
    function getForeignFetchMode(): int {
        return $this->foreignFetchMode;
    }
}
