#!/usr/bin/php -q
<?php
require_once 'PersonClass.php';
//$db = new PDO('sqlite:dbname=testdb;host=127.0.0.1');

ncurses_init();
ncurses_start_color();
ncurses_init_pair(1, NCURSES_COLOR_BLUE, NCURSES_COLOR_BLACK);
ncurses_init_pair(2, NCURSES_COLOR_WHITE, NCURSES_COLOR_BLACK);
ncurses_curs_set(0);
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
/**
 * recount $fullscreen coordinates to $field coordinates
 */
$maxX = $fieldWidth + 1;
$minX = 2;
$maxY = $fieldHeight + 1;
$minY = 2;
$hero = new Person();
$hero->setCurrentX(rand($minX, $maxX));
$hero->setCurrentY(rand($minY, $maxY));
$hero->setPreviousState();
$hero->setSymbol('@');
$step = -1;
while (true) {
    $step++;
    ncurses_mvwaddstr($frame, 0, 0, 'Y:'.$hero->getCurrentY().' X:'.$hero->getCurrentX()." Steps:".$step.' ');
    ncurses_wrefresh($frame);
    ncurses_color_set(1);
    ncurses_mvaddch($hero->getCurrentY(), $hero->getCurrentX(), ord($hero->getSymbol()));
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
        if ($hero->getCurrentX() > $maxX) {
            $hero->setCurrentX($minX);
        } elseif ($hero->getCurrentX() < $minX) {
            $hero->setCurrentX($maxX);
        } elseif ($hero->getCurrentY() > $maxY) {
            $hero->setCurrentY($minY);
        } elseif ($hero->getCurrentY() < $minY) {
            $hero->setCurrentY($maxY);
        }
        ncurses_color_set(2);
        ncurses_mvaddch($hero->getPreviousY(), $hero->getPreviousX(), ord('.'));
    }
}
ncurses_end();
