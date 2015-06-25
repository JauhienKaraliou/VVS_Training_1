#!/usr/bin/php -q
<?php
// начинаем с инициализации библиотеки
ncurses_init();
// используем весь экран
$fullscreen = ncurses_newwin ( 0, 0, 0, 0);
// рисуем рамку вокруг окна
ncurses_border(0,0, 0,0, 0,0, 0,0);
// создаём второе окно
$small = ncurses_newwin(10, 30, 7, 25);
// рамка для него
ncurses_wborder($small,0,0, 0,0, 0,0, 0,0);

ncurses_refresh(); // рисуем окна

// пишем в маленьком окне
ncurses_mvwaddstr($small, 5, 5, "   Test  String   ");

// обновляем маленькое окно для вывода строки
ncurses_wrefresh($small);

while (true) {
    $pressed = ncurses_getch(); // ждём нажатия клавиши
    if ($pressed == 27) {
        break;
    } else {
        ncurses_mvwaddstr($small, 6, 5,$pressed);
        ncurses_wrefresh($small);
    }
}

ncurses_end(); // выходим из режима ncurses, чистим экран
