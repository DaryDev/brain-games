<?php
namespace BrainGames\Calc;

use function \cli\line;
use function \cli\prompt;

function run()
{
    $signArray = ['+', '-', '*'];
    line('Welcome to the Brain Games!');
    line('What is the result of the expression?');
    line('');
    $name = prompt('May I have your name?');
    line("Hello, $name!");

    for ($i = 0; $i < 3; $i++) {
        $sign = $signArray[array_rand($signArray)];
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        line("Question:" . "$number1" . $sign . "$number2");
        $answer = prompt("Your answer");
        line("$answer");
        $correctAnswer = getCorrectAnswer($number1, $number2, $sign);
        if ($answer != $correctAnswer) {
            line("'$answer' is wrong answer :(. Correct answer was '$correctAnswer'");
            line("Let's try again, $name!");
            return;
        } else {
            line('Correct!');
        }
    }
    line("Congratulations, $name!");
}

/**
 * Расчет правильного ответа.
 */
function getCorrectAnswer($num1, $num2, $sign)
{
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
}
