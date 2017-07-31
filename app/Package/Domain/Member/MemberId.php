<?php
namespace App\Package\Domain\Member;

class MemberId
{

    private $value;

    public function __construct(int $value)
    {
        if ($value < 0) { 
            throw new \Exception('exception!');
        }
        
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}