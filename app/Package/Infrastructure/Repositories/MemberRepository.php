<?php
namespace App\Package\Infrastructure\Repositories;

use App\Package\Domain\Member\MemberRepositoryInterface;
use App\Package\Infrastructure\Eloquents\Member;

class MemberRepository implements MemberRepositoryInterface
{

    protected $eloquentMember;

    public function __construct(Member $member)
    {
        $this->eloquentMember = $member;
    }

    public function findByID(int $id)
    {
        $member = $this->eloquentMember->find($id);
        
        if (empty($member)) {
            return false;
        }
        return $member;
    }

    public function getList()
    {
        return $this->eloquentMember->orderBy('id', 'desc')->paginate(50);
    }

    public function create($data)
    {
        $model = $this->eloquentMember->create($data);
        if (isset($model->id)) {
            return $model->id;
        }
        return null;
    }

    public function update(int $id, $data)
    {
        if (! is_numeric($id)) {
            throw new \RuntimeException();
        }
        
        if ($this->eloquentMember->find($id)->update($data)) {
            return $id;
        }
        return null;
    }

    public function delete(int $id)
    {
        if (! is_numeric($id)) {
            throw new \RuntimeException();
        }
        
        return $this->eloquentMember->find($id)->delete();
    }
}