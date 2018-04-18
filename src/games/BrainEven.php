<?php
namespace BrainGames\Even;

use function \cli\line;
use function \cli\prompt;

const SUCCESS_CNT = 3;

function run()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if number even otherwise answer "no".');
    line('');
    $name = prompt('May I have your name?');
    line("Hello, $name!");

    $correctAnswerCnt = 0;
    while ($correctAnswerCnt < SUCCESS_CNT) {
        $number = rand(1, 100);
        line("Question: $number");
        $answer = prompt('Your answer');
        line("$answer");
        if (isEven($number)) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        if ($answer !== $correctAnswer) {
            line("'$answer' is wrong answer :(. Correct answer was '$correctAnswer'");
            line("Let's try again, $name!");
            break;
        } else {
            line('Correct!');
            $correctAnswerCnt++;
        }
    }

    if ($correctAnswerCnt === SUCCESS_CNT) {
        line("Congratulations, $name!");
    }
}

/**
 * Проверка на четность.
 */
function isEven($num)
{
    return $num % 2 === 0;
}
