<?php
use App\Calculator;

it('multiplies two numbers', function () {
    $calculator = new Calculator();
    expect($calculator->multiply(3, 4))->toBe(12);
});

it('divides two numbers', function () {
    $calculator = new Calculator();
    expect($calculator->divide(10, 2))->toBe(5);
});

it('Sum of two numbers', function () {
    $calculator = new Calculator();
    expect($calculator->add(10, 2))->toBe(12);
});


it('Sum of two numbers equal', function () {
    $calculator = new Calculator();
    expect($calculator->add(10,3))->toBe(13);
});

it('checks if a number is divisible by another', function () {
    $calculator = new Calculator();
    expect($calculator->isDivisible(10, 5))->toBeTrue();
    expect($calculator->isDivisible(10, 3))->toBeFalse();
});

it('throws an exception when dividing by zero', function () {
    $calculator = new Calculator();
    $calculator->divide(10, 0);
})->throws(InvalidArgumentException::class, 'Division by zero.');

it('throws an exception when checking divisibility by zero', function () {
    $calculator = new Calculator();
    $calculator->isDivisible(10, 0);
})->throws(InvalidArgumentException::class, 'Division by zero.');

dataset('multiplication cases', [
    [2, 3, 6],
    [-1, -1, 1],
    [0, 5, 0],
]);

it('correctly multiplies numbers', function ($a, $b, $expected) {
    $calculator = new Calculator();
    expect($calculator->multiply($a, $b))->toBe($expected);
})->with('multiplication cases');
