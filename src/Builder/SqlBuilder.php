<?php

namespace Space\Builder;

class SqlBuilder implements SqlBuilderInterface
{
    protected $table;

    protected $columns='*';

    protected $limit=false;

    protected $offset=false;

    protected $order=false;

    protected $conditions=false;


    public function build(): string
    {
        return "SELECT ".$this->columns . $this->table . $this->conditions .
            $this->order . $this->limit . $this->offset;
    }

    public function select($columns): BuilderInterface
    {

        $this->columns=implode(",",$columns);
        return $this;
    }

    public function where($conditions): BuilderInterface
    {
        foreach ($conditions as $key=>$value){
            $string.=$key . " = '" . $value . "',";
        }
      $this->conditions=" WHERE " . substr($string,0,-1);
        return $this;
    }

    public function table($table): BuilderInterface
    {
        $this->table=" FROM " . $table;
        return $this;
    }

    public function limit($limit): BuilderInterface
    {
        $this->limit=" LIMIT " . $limit;
        return $this;
    }

    public function offset($offset): BuilderInterface
    {
        $this->offset =" OFFSET " . $offset;
        return $this;
    }

    public function order($order): BuilderInterface
    {
        $this->crder=" ORDER BY " . implode(",",$order);
        return $this;
    }

}