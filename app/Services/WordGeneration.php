<?php

namespace App\Services;

class WordGeneration
{

    /**
     * @var string
     */
    private $letters_and_numbers = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
    * @return string
    */
    public function getLettersAndNumbers(): string
    {
        return $this->letters_and_numbers;
    }

    /**
     * @param $strength
     * @return string
     */
    public function generator($strength = 16)
    {
        $input_length = strlen($this->getLettersAndNumbers());
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = ($this->getLettersAndNumbers())[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
}
