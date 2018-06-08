<?php

namespace One\Database\Mysql;

class HasOne extends Relation
{
    public function get()
    {
        return $this->third_model->find();
    }

    public function merge($key)
    {
        $third_arr = $this->third_model->findAll()->pluck($this->third_column, true);
        foreach ($this->list_model as $val) {
            $k = $val[$this->self_column];
            $val->$key = isset($third_arr[$k]) ? $third_arr[$k] : null;
        }
    }
}