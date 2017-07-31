<?php
namespace App\Package\Domain\Member;

interface MemberRepositoryInterface
{

    /**
     * 取得
     * 
     * @param
     *            $id
     * @return mixed
     */
    public function findByID($id);

    /**
     * 一覧取得
     * 
     * @return mixed
     */
    public function getList();

    /**
     * 新規登録
     * 
     * @param
     *            $data
     * @return mixed
     */
    public function create($data);

    /**
     * 更新
     * 
     * @param
     *            $id
     * @param
     *            $data
     * @return mixed
     */
    public function update($id, $data);

    /**
     * 削除
     * 
     * @param
     *            $id
     * @return mixed
     */
    public function delete($id);
}


