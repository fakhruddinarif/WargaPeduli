<?php

namespace App\Service;

use Illuminate\Pagination\LengthAwarePaginator;

class MabacService {
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

    public function normalization($data, $min, $max) {
        $result = [];
        foreach ($data as $idx => $item) {
            $result[$idx] = [];
            foreach ($this->column as $columnIdx => $column) {
                if ($this->criteriaType[$columnIdx] === 'benefit') {
                    $result[$idx][$column] = number_format(($item[$column] - $min[$columnIdx]) / ($max[$columnIdx] - $min[$columnIdx]), 3);
                } else {
                    $result[$idx][$column] = number_format(($item[$column] - $max[$columnIdx]) / ($min[$columnIdx] - $max[$columnIdx]), 3);
                }
            }
        }
        return $result;
    }

    public function weightedNormalization($data) {
        $result = [];
        foreach ($data as $idx => $item) {
            $result[$idx] = [];
            foreach ($this->column as $columnIdx => $column) {
                $result[$idx][$column] = number_format($item[$column] * $this->weight[$columnIdx] + $this->weight[$columnIdx], 3);
            }
        }
        return $result;
    }

    public function limit($data)
    {
        $result = [];
        foreach ($this->column as $columnIdx => $column) {
            $result[$columnIdx] = 0;
            foreach ($data as $idx => $item) {
                if ($idx === 0) {
                    $result[$columnIdx] = $item[$column];
                } else {
                    $result[$columnIdx] *= $item[$column];
                }
            }
            $result[$columnIdx] = number_format(pow($result[$columnIdx], 1 / count($data)), 3);
        }
        return $result;
    }

    public function distance($weighted, $limit)
    {
        $result = [];
        foreach ($weighted as $idx => $item) {
            $result[$idx] = [];
            for ($i = 0; $i < count($item); $i++) {
                $result[$idx][$this->column[$i]] = number_format($item[$this->column[$i]] - $limit[$i], 3);
            }
        }
        return $result;
    }

    public function rank($data) {
        $result = [];
        foreach ($data as $idx => $item) {
            $result[$idx] = 0;
            foreach ($item as $columnIdx => $column) {
                $result[$idx] += $column;
            }
        }
        return $result;
    }
}
