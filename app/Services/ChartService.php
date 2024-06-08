<?php

namespace App\Services;

class ChartService {
    const AGE_CATEGORIES = [
        'Balita' => 5,
        'Anak-anak' => 12,
        'Remaja' => 18,
        'Dewasa' => 60,
        'Lansia' => PHP_INT_MAX
    ];

    public function categoryResidentByAge($residents)
    {
        $countResidentsByAge = array_fill_keys(array_keys(self::AGE_CATEGORIES), 0);
        foreach ($residents as $resident) {
            $age = $resident['usia'];
            foreach (self::AGE_CATEGORIES as $category => $limit) {
                if ($age <= $limit) {
                    $countResidentsByAge[$category]++;
                    break;
                }
            }
        }
        return $countResidentsByAge;
    }
}
