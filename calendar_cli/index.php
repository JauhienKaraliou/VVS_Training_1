#!/usr/bin/php -q
<?php
require_once 'MonthClass.php';
ncurses_init();
$fullscreen = ncurses_newwin(0, 0, 0, 0);
$month = date("n");
$year = date("Y");
while (true) {
    ncurses_clear();
    ncurses_refresh($fullscreen);
    ncurses_getmaxyx($fullscreen, $winHeight, $winWidth);
    $a = floor(($winHeight - 8) / 2);
    $b = floor(($winWidth - 29) / 2);
    $selectedMonth = new MonthClass($month, $year);
    $date = '      ' . date('F', mktime(0, 0, 0, $month, 1, $year)) . "  -  " . $year;
    ncurses_mvaddstr($winHeight-1,1, "Move Up/Down keys to change year and Right/Left keys to change month");
    $frame = ncurses_newwin(11, 32, $a - 2, $b - 2);
    ncurses_wborder($frame, 0, 0, 0, 0, 0, 0, 0, 0);
    ncurses_mvwaddstr($frame, 1, 1, $date);
    ncurses_wrefresh($frame);
    $small = ncurses_newwin(8, 29, $a, $b);
    ncurses_mvwaddstr($small, 1, 0, $selectedMonth->drawTable());
    ncurses_wrefresh($small);
    $pressed = ncurses_getch();
    if ($pressed == 27) {
        break;
    } else {
        switch ($pressed) {
            case 258:
                $year--;
                break;
            case 259:
                $year++;
                break;
            case 260:
                $month--;
                break;
            case 261:
                $month++;
                break;
        }
        if ($month >= 13) {
            $month = 1;
            $year++;
        } elseif ($month <= 0) {
            $month = 12;
            $year--;
        }
    }
}
ncurses_end();
