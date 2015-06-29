#!/usr/bin/php -q
<?php
require_once 'PersonClass.php';
//$db = new PDO('sqlite:dbname=testdb;host=127.0.0.1');

ncurses_init();
ncurses_start_color();
ncurses_init_pair(1, NCURSES_COLOR_BLUE, NCURSES_COLOR_BLACK);
ncurses_init_pair(2, NCURSES_COLOR_WHITE, NCURSES_COLOR_BLACK);
$fullscreen = ncurses_newwin(0, 0, 0, 0);
ncurses_clear();
ncurses_refresh($fullscreen);
ncurses_getmaxyx($fullscreen, $fullscreenHeight, $fullscreenWidth);
$frame = ncurses_newwin($fullscreenHeight - 4, $fullscreenWidth - 2, 1, 1);
ncurses_wborder($frame, 0, 0, 0, 0, 0, 0, 0, 0);
ncurses_wrefresh($frame);
$field = ncurses_newwin($fullscreenHeight - 6, $fullscreenWidth - 4, 2, 2);
ncurses_getmaxyx($field, $fieldHeight, $fieldWidth);
$fieldDots = str_repeat('.', $fieldWidth * $fieldHeight);
ncurses_mvwaddstr($field, 0, 0, $fieldDots);
ncurses_wrefresh($field);
$hero = new Person();
$hero->setCurrentX(rand(0, $fieldWidth));
$hero->setCurrentY(rand(0, $fieldHeight));
$hero->setPreviousState();
$hero->setSymbol('@');
while (true) {
    ncurses_mvwaddstr($frame, 0, 0, $hero->getCurrentY().'-'.$hero->getCurrentX().'--'.$hero->getPreviousY().'-'.$hero->getPreviousX());
    ncurses_wrefresh($frame);
    ncurses_move($hero->getCurrentY(), $hero->getCurrentX());
//ncurses_delch();
    ncurses_color_set(1);
    ncurses_addch(ord($hero->getSymbol()));

    $pressed = ncurses_getch();
    if ($pressed == 27) {
        break;
    } else {
        switch ($pressed) {
            case 258:
                $hero->moveDown();
                break;
            case 259:
                $hero->moveUp();
                break;
            case 260:
                $hero->moveLeft();
                break;
            case 261:
                $hero->moveRight();
                break;
        }
        ncurses_move($hero->getPreviousY(), $hero->getPreviousX());
        ncurses_color_set(2);
        ncurses_addch(ord('.'));
        /*
        if ($month >= 13) {
            $month = 1;
            $year++;
        } elseif ($month <= 0) {
            $month = 12;
            $year--;
        }
        */
    }

}
ncurses_end();