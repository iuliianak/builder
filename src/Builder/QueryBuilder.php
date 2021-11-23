<?php

namespace Space\Builder;

class QueryBuilder implements QueryBuilderInterface
{
    protected $table;

    protected $columns='*';

    protected $limit=false;

    protected $offset=false;

    protected $order=false;

    protected $conditions=false;


    public function build(): QueryInterface
    {
        if(empty($this->table)){
            throw new \Exception('Table is required');
        }
        return new Query($this);
    }

    public function select($columns): BuilderInterface
    {

        $this->columns = implode(",",$columns);
        return $this;
    }

    public function where($conditions): BuilderInterface
    {
        foreach ($conditions as $key => $value){
            $string .= $key . " = '" . $value . "',";
        }

      $this->conditions = " WHERE " . substr($string,0,-1);
        return $this;
    }

    public function table($table): BuilderInterface
    {
        $this->table = " FROM " . $table;
        return $this;
    }

    public function limit($limit): BuilderInterface
    {
        $this->limit = " LIMIT " . $limit;
        return $this;
    }

    public function offset($offset): BuilderInterface
    {
        $this->offset = " OFFSET " . $offset;
        return $this;
    }

    public function order($order): BuilderInterface
    {
        $this->crder = " ORDER BY " . implode(",",$order);
        return $this;
    }

    public function getTable(): string
    {
      return $this->table;
    }

    public function getColumns(): string
    {
        return $this->columns;
    }

    public function getLimit(): string
    {
        return $this->limit;
    }

    public function getOffset(): string
    {
        return $this->offset;
    }

    public function getOrder(): string
    {
        return $this->order;
    }

    public function getConditions(): string
    {
        return $this->conditions;
    }

}