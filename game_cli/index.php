#!/usr/bin/php -q
<?php
/**
 * @param $a
 * @param $b
 * @return string
 */
function dots($b)
{
    $string = '';
    for ($k = 1; $k <= $b; $k++) {
        $string .= '.';
    }
    return $string;
}

ncurses_init();
$fullscreen = ncurses_newwin(0, 0, 0, 0);
    ncurses_clear();
    ncurses_refresh($fullscreen);
    ncurses_getmaxyx($fullscreen, $fullscreenHeight, $fullscreenWidth);
    $frame = ncurses_newwin($fullscreenHeight - 4, $fullscreenWidth - 2, 1, 1);
    ncurses_wborder($frame, 0, 0, 0, 0, 0, 0, 0, 0);
    ncurses_wrefresh($frame);

    $field = ncurses_newwin($fullscreenHeight - 6, $fullscreenWidth - 4, 2, 2);
    ncurses_getmaxyx($field, $fieldHeight, $fieldWidth);
    $fieldDots = dots($fieldWidth*$fieldHeight);
    ncurses_mvwaddstr($field, 0, 0, $fieldDots);
    ncurses_wrefresh($field);
while (true) {
    //$db = new PDO('sqlite:dbname=testdb;host=127.0.0.1');
    $pressed = ncurses_getch();
    if ($pressed == 27) {
        break;
    } /* else {
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
 */
}
ncurses_end();