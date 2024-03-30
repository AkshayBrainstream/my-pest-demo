<?php 

namespace App;

class BMICalculator {
    public function calculateBMI(float $weight, float $height): float {
        if ($height <= 0) {
            throw new \InvalidArgumentException("Height must be greater than zero.");
        }
        return $weight / ($height ** 2);
    }

    public function categorizeBMI(float $bmi): string {
        if ($bmi < 18.5) {
            return "Underweight";
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            return "Normal weight";
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            return "Overweight";
        } else {
            return "Obesity";
        }
    }
}
