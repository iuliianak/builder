<?php
namespace Space\Builder;

interface QueryBuilderInterface extends BuilderInterface
{
    /**
     * @return QueryInterface
     */
    public function build(): QueryInterface;
    public function getTable(): string;
    public function getColumns(): string;
    public function getLimit(): string;
    public function getOffset(): string;
    public function getOrder(): string;
    public function getConditions(): string;
}