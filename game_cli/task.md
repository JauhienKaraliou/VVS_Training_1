Нужно реализовать скрипт и систему классов к нему. 

Задача:
-------

В  консоли рисуется поле m x n. 
Поле ограниченно рамкой.
Каждая точка поля обозначается например точкой ( легко должно меняться ).

На поле  находится отображение персонажа - зеленый символ @.
Символ можно перемещать с помощью стрелок клавиатуры.
Предусмотреть два режима - перемещение только при нажатии стрелки и постоянное перемещение,
 а при нажатии стрелок - смена направления.

При достижении границы поля  - возможны два режима - появление с другой стороны поля и остановка. 
Предусмотреть оба ( менять на лету не нужно, но смена логики не должна вызвать проблем )

Обращаю внимание что нет полной перерисовки поля при движении - меняются две точки - старое положение и новое. 

Над или под полем есть информационная область, которая отображает текущие координаты персонажа 
и число нажатий на кливиши, которое было сделано с момента запуска программы.

Предусмотреть возможность в классах наследниках ( а они будут в следующем задании ) выполнять методы до / после движения.

продолжаем
-----------
 
Нужно добавить в игру новых персонажей. Их будет два типа ( лучше начать с первого  )
1) двигается случайно
2) Если персонаж игрока ближе чем на 5 клеток к персонажу - персонаж начинает преследовать ( двигаться в сторону ) игрока
Каждый тип отображается новым цветом и новым символом.
 
На один ход игрока ( передвижение на одну клетку ) - в любом режиме - делается ход каждого персонажа
 
Если персонажи оказываются в одной клетке с игроком - игрок погибает. Игра останавливается.
 
В информационном окне нужно отображать число ходов, которые сделал персонаж игрока
 
P.S. не надо лепить весь код в одном файле. Если классов несколько -разносите по файлам и делайте автолоадер


Заканчиваем игру. Последняя неделя на рихтовку косяков
------------------------------------------------------
 
По функционалу доделать - в конце игры запросить имя пользователя и сохранить его и число шагов,
 которые он сделал до проигрыша/конца игры.
Статистику нужно показать в виде таблицы при запуске игры ( как заставку ) и в конце после ввода имени пользователя
 
Данные нужно сохранять в базе SQLite. Файл базы должен лежать в папке с самой игрой.
 Нормально должно обрабатываться отсутсвие файла ( он должен создаваться заново )
 
Плюс нужно снять небольшое видео с демонстрацией игры в разных режимах.
 Видео на Youtube и вставить  в сопроводительный файл, залитый в репозиторий. 
 Чтобы можно было не устанавливая посмотреть, что вы натворили
 
После этого возвращаемся к работе с вебом.