<?php

namespace App;

use DateTime;

class InterestCalculator {
    private $annualInterestRate;

    public function __construct($annualInterestRate) {
        $this->annualInterestRate = $annualInterestRate;
    }

    public function daysBetween($date1, $date2) {
        $date1 = DateTime::createFromFormat('d/m/Y', $date1);
        $date2 = DateTime::createFromFormat('d/m/Y', $date2);
        $diff = date_diff($date1, $date2);
        return abs($diff->days);
    }

    public function calculateInterest(array $periods) {
        $interestAccrued = 0;
        foreach ($periods as $period) {
            list($startDate, $endDate, $balance) = $period;
            $days = $this->daysBetween($startDate, $endDate);
            $years = $days / 365; // More accurate calculation
            $interest = $balance * $this->annualInterestRate * $years;
            $interestAccrued += $interest;
        }
        return $interestAccrued;
    }
}