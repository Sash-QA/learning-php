<?php echo '<pre>';
// Большинство операторов бинарные, то есть требуют два операнда. Также бывают унарные (один) и тернарные (три)

// АРИФМЕТИЧЕСКИЕ ОПЕРАТОРЫ (+ - * / % **):

var_dump(+$a = '9', $b = -'2.5');   // С помощью + и - можно приводить данные к числовым типам int и float
var_dump($c = -null, +$d = true);
echo '<br>';

var_dump(4.0 / 2);            // Если хотя бы один из операндов float, то результат будет float
//var_dump(10 / 0);                 // Деление на 0 приведет к ошибке в версиях PHP 8 и новее
var_dump(fdiv(10, 0));  // Способ получить бесконечность при делении на 0
echo '<br>';

var_dump(5 % 2);              // Деление по модулю. 2 помещается в 5 дважды, а остаток 1 будет результатом
var_dump(12.1 % 6.9);         // Оба операнда перед вычислением преобразуются в целые числа 12 и 6
var_dump(fmod(10.5,5)); // Способ деления по модулю с float
var_dump(5 % -2);             // Знак результата зависит только от знака первого числа, то есть 5
var_dump(-5 % -2);            // Минус на минус не даст плюс в случае деления по модулю
echo '<br>';
var_dump(2 ** 3);             // Оператор возведения в степень. Возводит 2 в степень 3
echo '<br>';

// ОПЕРАТОРЫ ПРИСВАИВАНИЯ (= += -= *= /= %= **=):

$e = 7;                             // Оператор присваивания = не следует путать с операторами сравнения == и ===
if ($e = 8) {                       // Это грубая ошибка. Переменной присвоилось новое значение вместо сравнения
    echo 'e = 8<br>';               // В этом случает if вернет true, несмотря на то что мы ожидали false
}
$f = $g = 30;                       // Обеим переменным присвоится значение 30
$h = ($i = 100) + 20;               // Переменным присвоятся значения 120 и 100
var_dump($f, $g, $h, $i);           // Это лишь демонстрация возможностей. В реальных задачах так делать не стоит

$j = 12;
echo $j *= 2, '<br>';               // Развернуто $j = 12 * 2. Аналогично работают += -= /= %= **=
echo $k /= 3;                       // Нельзя это проделать с переменной, которая еще не определена
var_dump($k);                       // При этом присвоится неожиданное значение, а не null

// СТРОКОВЫЕ ОПЕРАТОРЫ (. .=):
$l = 'Hi';
var_dump($l .= '!');                // Сокращено от $l = $l . '!'; Точка объединяет строки в одну (конкатенация)
echo '<br>';

// ОПЕРАТОРЫ СРАВНЕНИЯ (== === != <> !== < > <= >= <=> ?? ?:):

$m = 15; $n = '15';
var_dump($m == $n);           // Вернет true, если значения равны
var_dump($m === $n);          // Вернет true, если значения И типы равны
var_dump($m != $n);           // Вернет true, если значения не равны. Оператор <> делает все то же самое
var_dump($m !== $n);          // Вернет true, если значения И/ИЛИ типы не равны

// Этот оператор называется spaceship. Вернет 0 при $m == $n. Вернет -1 при $m < $n. Вернет 1 при $m > $n
var_dump($m <=> $n);

// При таком сравнении, если в операнде типа string нет чисел, то числовой операнд станет строкой ('x' == '0')
var_dump('x' == 0);           // Вернет false
// До версии PHP 8 это сравнение вернуло бы true, потому что строка без чисел конвертировалась в 0 (0 == 0)

// Пример где очень важно использовать строгое сравнение ===, которое вернет false
$o = 'Bye!';
$p = strpos($o, 'B');        // Эта функция ищет первую B в $o и помещает ее индекс в $p
if ($p === false) {                 // Проверяет верно ли сравнение 0 === false
    echo 'B not found';             // При == сработал бы этот вариант, так как false конвертировался бы в 0
}   else {
    echo 'B found at index ' . $p;  // При === сработает этот вариант
}   echo '<br>';

// С помощью тернарного оператора ?: конструкцию выше можно сократить. True вернет первый вариант, а false второй
echo $result = $p === false ? 'B not found' : 'B found at index ' . $p;

$q = null;
echo $r = $q ?? 'Ayo';              // Оператор сравнения с null вернет значение справа от ??, если $q = null
echo $s = $t ?? '!';                // С неопределенными переменными это также работает

$u = 1;
echo $v = $u ?? 'abc';              // Если переменная не null, то вернет ее значение вместо значения справа от ??