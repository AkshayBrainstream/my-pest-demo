<?php

use App\InterestCalculator;

beforeEach(function () {
    $this->calculator = new InterestCalculator(0.09); // 9% annual interest rate
});

it('correctly calculates days between two dates', function () {
    expect($this->calculator->daysBetween('01/04/2023', '05/07/2023'))->toEqual(95);
});

it('calculates total interest accrued correctly', function () {
    $periods = [
        ["01/04/2023", "05/07/2023", 2000000],
        ["05/07/2023", "09/11/2023", 3000000],
        ["09/11/2023", "11/12/2023", 2500000],
        ["11/12/2023", "28/02/2024", 2000000],
        ["28/02/2024", "31/03/2024", 3000000],
        ["31/03/2024", "20/06/2024", 0],
    ];
    $totalInterest = $this->calculator->calculateInterest($periods);
    expect($totalInterest)->toBeGreaterThan(0); // Assert interest is accrued
});
