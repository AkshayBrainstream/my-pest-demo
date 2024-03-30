<?php

use App\StudentRankCalculator;

beforeEach(function () {
    $this->calculator = new StudentRankCalculator();
});

// Example of using a data provider
dataset('studentMarks', [
    ['John', [90, 80, 70]],
    ['Jane', [80, 90, 100]],
    ['Doe', [75, 85, 95]],
]);

// Testing percentage calculation with a data provider
test('calculate percentage for students', function ($student, $marks) {
    $this->calculator->addStudentMarks($student, $marks);
    $percentages = $this->calculator->calculatePercentage();

    $expectedPercentage = array_sum($marks) / count($marks);
    expect($percentages)->toHaveKey($student, $expectedPercentage);
})->with('studentMarks');

// Testing rank calculation
it('calculates correct ranks for students', function () {
    $this->calculator->addStudentMarks('John', [90, 80, 70]);
    $this->calculator->addStudentMarks('Jane', [80, 90, 100]);
    $this->calculator->addStudentMarks('Doe', [75, 85, 95]);

    $ranks = $this->calculator->calculateRanks();

    // Jane should rank first due to the highest average, followed by Doe and John
    expect($ranks[0])->toBe('Jane');
    expect($ranks[1])->toBe('Doe');
    expect($ranks[2])->toBe('John');
});