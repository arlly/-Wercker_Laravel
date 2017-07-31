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

    public function findByID($id)
    {
        $member = $this->eloquentMember->find($id);
        
        if (empty($member)) {
            return false;
        }
        return $member;
    }

    public function getList()
    {
        return $this->eloquentMember->orderBy('id', 'desc')->paginate(100);
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

    public function search($param)
    {
        $Member = $this->eloquentMember->orderBy('id', 'desc');
        
        if ($param["search_company"]) {
            $Member->where('company', 'LIKE', '%' . $param["search_company"] . '%');
        }
        
        if ($param["search_name"]) {
            $Member->where('name', 'LIKE', '%' . $param["search_name"] . '%');
        }
        
        if ($param["search_email"]) {
            $Member->where('email', 'LIKE', '%' . $param["search_email"] . '%');
        }
        
        if ($param["search_tel"]) {
            $Member->where('tel', 'LIKE', '%' . $param["search_tel"] . '%');
        }
        
        if ($param["search_is_active"]) {
            $Member->where('is_active', 1);
        }
        
        if ($param["search_refuse"]) {
            $Member->whereIn('refuse', [
                0,
                1
            ]);
        } else {
            $Member->whereIn('refuse', [
                0
            ]);
        }
        
        return $Member->paginate(50);
       
    }
}