<?php
namespace BrainGames\GameEngine;

use function \cli\line;
use function \cli\prompt;

const SUCCESS_CNT = 3;

function gameplay($description, $questionFunc, $correctAnswerFunc)
{
    line('Welcome to the Brain Games!');
    line($description);
    line('');
    $name = prompt('May I have your name?', 0, ' ');
    line("Hello, $name!");

    for ($i = 0; $i < SUCCESS_CNT; $i++) {
        $question = $questionFunc();
        line("Question: $question");
        $answer = prompt('Your answer');
        $correctAnswer = $correctAnswerFunc($question);
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