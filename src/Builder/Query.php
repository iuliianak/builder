<?php

namespace Space\Builder;

class Query implements QueryInterface
{
    protected $table;

    protected $columns = '*';

    protected $limit = false;

    protected $offset = false;

    protected $order = false;

    protected $conditions = false;

    public function __construct(QueryBuilderInterface $builder)
    {
        $this->table = $builder->getTable();
        $this->columns = $builder->getColumns();
        $this->limit = $builder->getLimit();
        $this->offset = $builder->getOffset();
        $this->order = $builder->getOrder();
        $this->conditions = $builder->getConditions();
    }

    public function toSql(): string
    {
        return "SELECT ".$this->columns . $this->table . $this->conditions .
            $this->order . $this->limit . $this->offset;
    }
    public function getColumns()
    {
    return $this->columns;
    }
}