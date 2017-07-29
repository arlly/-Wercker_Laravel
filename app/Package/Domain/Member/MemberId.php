<?php
namespace App\Package\Domain\Member;

class MemberId
{

    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}