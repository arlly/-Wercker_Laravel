<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package\Domain\Member\MemberRepositoryInterface;

use App\Http\Requests\MemberRequest;

class AdminMemberController extends AdminController
{
    protected $memberRepo;
    public function __construct(MemberRepositoryInterface $memberRepo)
    {
        $this->middleware('auth:admin');
        parent::__construct();
        
        $this->breadcrumb = [
            'Member' => route('admin.member')
        ];
        
        $this->memberRepo = $memberRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $results = $this->memberRepo->getList();
        
        return view('admin.member.index', [
            'breadcrumb' => $this->breadcrumb,
            'results' => $results
        ]);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.member.edit', [
            'breadcrumb' => $this->breadcrumb
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        //
        $this->memberRepo->create(request()->all());
        \Flash::success('登録しました');
        return redirect()->route('admin.member');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
        if (! is_numeric($id)) {
            abort(500, '許可されていないアクション');
        }
        
        $row = $this->memberRepo->findByID($id);
        
        if (! $row->id) {
            abort(404);
        }
        
        return view('admin.member.edit', [
            'row' => $row,
            'breadcrumb' => $this->breadcrumb
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, int $id)
    {
        if (! is_numeric($id)) {
            abort(500, '許可されていないアクション');
        }
        
        $this->memberRepo->update($id, $request->all());
        \Flash::success('更新しました。');
        
        return redirect()->route('admin.member');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        if (! is_numeric($id)) {
            abort(500, '許可されていないアクション');
        }
        
        $this->memberRepo->delete($id);
        \Flash::success('削除しました。');
        return redirect()->route('admin.member');
    }
    
    
    public function postIndex(Request $request)
    {
        session()->put('admin.member.search', request()->all() );
        return redirect()->route('admin.member.search')->withInput();
    }
    
    public function search()
    {
        $search = session()->get('admin.member.search');
        
        $results = $this->memberRepo->search($search);
        
        return view('admin.member.index', [
            'breadcrumb' => $this->breadcrumb,
            'results' => $results,
            'search' => $search
        ]);
    }
    
    public function resetSearch()
    {
        session()->forget('admin.member.search');
        return redirect()->route('admin.member');
    }
}
