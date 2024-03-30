<?php
namespace App;

class StudentRankCalculator {
    private $studentsMarks = [];

    public function addStudentMarks($studentName, array $marks) {
        $this->studentsMarks[$studentName] = $marks;
    }

    public function calculatePercentage() {
        $percentages = [];
        foreach ($this->studentsMarks as $student => $marks) {
            $totalMarks = array_sum($marks);
            $percentages[$student] = ($totalMarks / count($marks));
        }
        return $percentages;
    }

    public function calculateRanks() {
        $percentages = $this->calculatePercentage();
        arsort($percentages);
        return array_keys($percentages);
    }
}