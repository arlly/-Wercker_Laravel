<?php
namespace App\Package\Domain\Member;

class Members
{

    protected $id;

    protected $name;

    protected $email;

    public function setId(MemberId $value)
    {
        $this->id = $value;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($value)
    {
        $this->name = $value;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($value)
    {
        $this->email = $value;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
}