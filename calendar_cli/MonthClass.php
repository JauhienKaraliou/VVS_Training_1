<?php

class MonthClass
{

    protected $monthNum;

    protected $yearNum;

    protected $daysQuant;

    protected $firstDayNum;


    /**
     * counts month parameters and setts them
     * @param int $month
     * @param int $year
     */
    public function __construct($month = 0, $year = 0)
    {
        $this->setYearNum($year);
        $this->setMonthNum($month);
        $this->setDaysQuant(date('t', mktime(0, 0, 0, $month, 1, $year)));
        $this->setFirstDayNum(date('N', mktime(0, 0, 0, $month, 1, $year)));
    }

    /**
     * @return mixed
     */
    public function getMonthNum()
    {
        return $this->monthNum;
    }

    /**
     * @param mixed $monthNum
     */
    protected function setMonthNum($monthNum)
    {
        $this->monthNum = $monthNum;
    }

    /**
     * @return mixed
     */
    public function getYearNum()
    {
        return $this->yearNum;
    }

    /**
     * @param mixed $yearNum
     */
    protected function setYearNum($yearNum)
    {
        $this->yearNum = $yearNum;
    }

    /**
     * @return mixed
     */
    public function getDaysQuant()
    {
        return $this->daysQuant;
    }

    /**
     * @param mixed $daysQuant
     */
    protected function setDaysQuant($daysQuant)
    {
        $this->daysQuant = $daysQuant;
    }

    /**
     * @return mixed
     */
    public function getFirstDayNum()
    {
        return $this->firstDayNum;
    }

    /**
     * @param mixed $firstDayNum
     */
    protected function setFirstDayNum($firstDayNum)
    {
        $this->firstDayNum = $firstDayNum;
    }

    /**
     * adds spaces and newstrings to calendar table
     * @return string
     */
    public function drawTable()
    {
        $w = 0;
        $string = "Mon_Tue_Wed_Thu_Fri_Sat_Sun\n";
        while ($w < $this->getDaysQuant()) {
            for ($d = 1; $d <= 7; $d++) {
                if ($w >= $this->getDaysQuant() or ($w == 0 and $d != $this->getFirstDayNum())) {
                    $string .= '    ';
                } else {
                    ++$w;
                    if ($w < 10) {
                        $string .= ' ';
                    }
                    $string .= $w . '  ';
                }
            }
            $string .= "\n";
        }
        return $string;
    }
}
