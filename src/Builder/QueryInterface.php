<?php
namespace Space\Builder;

interface QueryInterface
{
    /**
     * @return string
     */
    public function toSql(): string;
}