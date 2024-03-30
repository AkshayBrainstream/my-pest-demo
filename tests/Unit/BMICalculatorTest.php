<?php

use App\BMICalculator;

beforeEach(function () {
    $this->calculator = new BMICalculator();
});

it('calculates BMI correctly', function () {
    $bmi = $this->calculator->calculateBMI(70,1.5);
    //ray($bmi); // Send the result to Ray for inspection

    expect($bmi)->toBeGreaterThanOrEqual(31.11);
    expect($bmi)->toBeLessThanOrEqual(32.87);

    $bmi = $this->calculator->calculateBMI(50, 1.50);
    //ray($bmi); // Send the result to Ray for inspection
    expect($bmi)->toBeGreaterThanOrEqual(22.21);
    expect($bmi)->toBeLessThanOrEqual(22.23);
});

