<?php
namespace BrainGames\Even;

use function BrainGames\GameEngine\gameplay;

function run()
{
    $description = 'Answer "yes" if number even otherwise answer "no".';
    $question = function () {
        return rand(1, 100);
    };
    $correctAnswer = function ($number) {
        $isEven = function ($num) {
            return $num % 2 === 0;
        };
        return $isEven($number) ? 'yes' : 'no';
    };

    gameplay($description, $question, $correctAnswer);
}
