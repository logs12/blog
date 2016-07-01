<?php
namespace app\commands;

class Test
{
    public static function __callStatic($_name, $_param)
    {
        return 'Название метода: <b>'. $_name .'</b><br>
		Аргументы метода: <pre>'. var_export($_param, true) .'</pre>
		Массив аргументов метода: <pre>'. var_export(func_get_args(), true) .'</pre>
		<b>'. implode('-', $_param) .'</b>';

    }

    /*
    * При использование спецификатора доступа "private" или "protected" данный метод вызван не будет т.к его перехватит метод "__callStatic()",
    * но при использование спецификатора доступа "public" данный метод задействуется.
    * Но и данный случай можно обойти.
    */
    private static function _newCall(){ echo 'Method: '. __METHOD__; }

}