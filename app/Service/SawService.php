<?php

namespace App\Service;

class SawService {
    private $weight = [0.20, 0.25, 0.30, 0.15, 0.10];
    private $criteriaType = ['cost', 'cost', 'cost', 'cost', 'cost'];
    private $column = ['pendapatan', 'luas_bangunan', 'jumlah_tanggungan', 'pajak_bumi', 'tagihan_listrik'];

    public function getWeight(): array
    {
        return $this->weight;
    }
    public function getCriteriaType(): array
    {
        return $this->criteriaType;
    }
    public function getColumn(): array
    {
        return $this->column;
    }
    public function getMax($data) {
        $result = $data->toArray();
        return array_map(function ($column) use ($result) {
            return array_reduce($result, function ($max, $item) use ($column) {
                return max($max, $item[$column]);
            }, PHP_INT_MIN);
        }, $this->column);
    }

    public function getMin($data) {
        $result = $data->toArray();
        return array_map(function ($column) use ($result) {
            return array_reduce($result, function ($min, $item) use ($column) {
                return min($min, $item[$column]);
            }, PHP_INT_MAX);
        }, $this->column);
    }

    public function normalization($data, $min, $max)
    {
        $result = [];
        foreach ($data as $idx => $item) {
            $result[$idx] = [];
            foreach ($this->column as $columnIdx => $column) {
                if ($this->criteriaType[$columnIdx] === 'benefit') {
                    $result[$idx][$column] = number_format($item[$column] / $max[$columnIdx], 3);
                } else {
                    $result[$idx][$column] = number_format($min[$columnIdx] / $item[$column], 3);
                }
            }
        }
        return $result;
    }

    public function rank($data)
    {
        $result = [];
        foreach ($data as $idx => $item) {
            $result[$idx] = 0;
            for ($i = 0; $i < count($item); $i++) {
                if ($i === 0) {
                    $result[$idx] = $item[$this->column[$i]] * $this->weight[$i];
                } else {
                    $result[$idx] += $item[$this->column[$i]] * $this->weight[$i];
                }
            }
        }
        return $result;
    }
}
