<?php
namespace BrainGames\Calc;

use function  BrainGames\GameEngine\gameplay;

function run()
{
    $description ='What is the result of the expression?';
    $signArray = ['+', '-', '*'];
    $question = function () use ($signArray) {
        $sign = $signArray[array_rand($signArray)];
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        return "$number1 " . $sign . " $number2";
    };
    $correctAnswer = function ($expression) {
        list($num1, $sign, $num2) = explode(' ', $expression);
        switch ($sign) {
            case '+':
                return $num1 + $num2;
            case '-':
                return $num1 - $num2;
            case '*':
                return $num1 * $num2;
            default:
                return null;
        }
    };

    gameplay($description, $question, $correctAnswer);
}
