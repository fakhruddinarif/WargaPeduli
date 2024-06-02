<?php

namespace App\Service;

use Illuminate\Pagination\LengthAwarePaginator;

class MabacService {
    private $weight = [0.20, 0.25, 0.30, 0.15, 0.10];
    private $criteriaType = ['Cost', 'Cost', 'Cost', 'Cost', 'Cost'];
    private $column = ['pendapatan', 'luas_bangunan', 'jumlah_tanggungan', 'pajak_bumi', 'tagihan_listrik'];

    public function getWeight(): array
    {
        return $this->weight;
    }

    public function getCriteriaType(): array
    {
        return $this->criteriaType;
    }

    private function getPendapatan($data) {
        if ($data > 3500000) {
            return 1;
        } elseif ($data > 2500000) {
            return 2;
        } elseif ($data > 1500000) {
            return 3;
        } elseif ($data > 1000000) {
            return 4;
        } else {
            return 5;
        }
    }

    private function getLuasBangunan($data) {
        if ($data > 35) {
            return 1;
        } elseif ($data > 30) {
            return 2;
        } elseif ($data > 20) {
            return 3;
        } elseif ($data > 12) {
            return 4;
        } else {
            return 5;
        }
    }

    private function getJumlahTanggungan($data) {
        return min($data, 5);
    }

    private function getPajakBumi($data) {
        if ($data > 120000) {
            return 1;
        } elseif ($data > 75000) {
            return 2;
        } elseif ($data > 50000) {
            return 3;
        } elseif ($data > 20000) {
            return 4;
        } else {
            return 5;
        }
    }

    private function getTagihanListrik($data) {
        if ($data > 150000) {
            return 1;
        } elseif ($data > 125000) {
            return 2;
        } elseif ($data > 100000) {
            return 3;
        } elseif ($data > 70000) {
            return 4;
        } else {
            return 5;
        }
    }

    public function convert($data)
    {
        $result = [];
        $columnFunctions = [
            'pendapatan' => [$this, 'getPendapatan'],
            'luas_bangunan' => [$this, 'getLuasBangunan'],
            'jumlah_tanggungan' => [$this, 'getJumlahTanggungan'],
            'pajak_bumi' => [$this, 'getPajakBumi'],
            'tagihan_listrik' => [$this, 'getTagihanListrik'],
        ];

        foreach ($data as $idx => $item) {
            foreach ($this->column as $column) {
                $result[$idx][$column] = call_user_func($columnFunctions[$column], $item[$column]);
            }
        }

        return $result;
    }

    public function getMax($data) {
        $result = $data;
        return array_map(function ($column) use ($result) {
            return array_reduce($result, function ($max, $item) use ($column) {
                return max($max, $item[$column]);
            }, PHP_INT_MIN);
        }, $this->column);
    }

    public function getMin($data) {
        $result = $data;
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
                if ($this->criteriaType[$columnIdx] === 'Benefit') {
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
