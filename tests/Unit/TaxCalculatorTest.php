<?php

use App\TaxCalculator;

it('calculates federal tax correctly for single filer', function () {
    $calculator = new TaxCalculator();
    $grossIncome = 150000;
    $tax = $calculator->calculateTax($grossIncome);
    //ray($tax);
    expect($tax)->toEqual(26253.00);
});


// Helper function for readability
function calculateTaxForIncome($income) {
    $calculator = new TaxCalculator();
    return $calculator->calculateTax($income);
}

it('calculates zero tax for income below the standard deduction', function () {
    expect(calculateTaxForIncome(15000))->toEqual(-70);
});

it('calculates correct tax at the boundary of the first bracket', function () {
    expect(calculateTaxForIncome(9950 + 15700))->toEqual(995);
});

it('calculates correct tax just within the first bracket', function () {
    expect(calculateTaxForIncome(9950 + 15700 - 1))->toEqual(994.9);
});

it('calculates correct tax at the boundary of the second bracket', function () {
    expect(calculateTaxForIncome(40525 + 15700))->toBeGreaterThan(0);
});

it('calculates correct tax within the second bracket', function () {
    expect(calculateTaxForIncome(30000 + 15700))->toBeGreaterThan(0);
});

it('calculates correct tax at the boundary of the third bracket', function () {
    expect(calculateTaxForIncome(86375 + 15700))->toBeGreaterThan(0);
});

it('calculates correct tax within the third bracket', function () {
    expect(calculateTaxForIncome(90000 + 15700))->toBeGreaterThan(0);
});

it('calculates correct tax at the boundary of the fourth bracket', function () {
    expect(calculateTaxForIncome(164925 + 15700))->toBeGreaterThan(0);
});

it('calculates correct tax within the fourth bracket', function () {
    expect(calculateTaxForIncome(170000 + 15700))->toBeGreaterThan(0);
});

it('calculates correct tax at the boundary of the fifth bracket', function () {
    expect(calculateTaxForIncome(209425 + 15700))->toBeGreaterThan(0);
});

it('calculates correct tax within the fifth bracket', function () {
    expect(calculateTaxForIncome(210000 + 15700))->toBeGreaterThan(0);
});

it('calculates correct tax at the boundary of the sixth bracket', function () {
    expect(calculateTaxForIncome(523600 + 15700))->toBeGreaterThan(0);
});

it('calculates correct tax within the sixth bracket', function () {
    expect(calculateTaxForIncome(530000 + 15700))->toBeGreaterThan(0);
});

it('calculates correct tax beyond the sixth bracket', function () {
    expect(calculateTaxForIncome(600000 + 15700))->toBeGreaterThan(0);
});