<?php

namespace App;

class TaxCalculator {
    private $standardDeduction = 15700;
    private $taxBrackets = [
        [9950, 0.10], 
        [40525, 0.12], 
        [86375, 0.22], 
        [164925, 0.24], 
        [209425, 0.32], 
        [523600, 0.35], 
        [523601, 0.37]
    ];

    public function calculateTax($grossIncome) {
        $taxableIncome = $grossIncome - $this->standardDeduction;
        $tax = 0;
        $previousBracketCap = 0;

        foreach ($this->taxBrackets as $bracket) {
            list($cap, $rate) = $bracket;
            if ($taxableIncome > $cap) {
                $tax += ($cap - $previousBracketCap) * $rate;
            } else {
                $tax += ($taxableIncome - $previousBracketCap) * $rate;
                break;
            }
            $previousBracketCap = $cap;
        }

        return round($tax, 2);
    }
}