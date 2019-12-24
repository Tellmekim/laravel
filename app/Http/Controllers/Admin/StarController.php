<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\Tree;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Star;
use App\Repositories\RulesRepository;
use Illuminate\Http\Request;

class StarController extends BaseController
{

     public function __construct(Star $Star)
    {
        $this->Star = $Star;
    }

    /**
     * 展示所有闯关
     * @param RushThroughController 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Star $Star)
    {
        
        $roles = $this->Star->where('parent_id','0')->where('rusn_id','1')->paginate(10);
        return $this->view(null,compact('roles'));
    }

    public function grade(Star $Star){
        $roles = $this->Star->where('parent_id','0')->where('rusn_id','2')->paginate(10);
        return $this->view(null,compact('roles'));
    }

    public function speech(Star $Star){
        $roles = $this->Star->where('parent_id','0')->where('rusn_id','3')->paginate(10);
        return $this->view(null,compact('roles'));
    }

    /**
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
       // return $this->view();
    }

    /**
     * 添加关卡
     * @param RushThroughController $request
     * @param RushThroughController $Rush
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request, Role $role)
    {
        $role->fill($request->all());
        $role->save();

        flash('添加关卡成功')->success()->important();

        return redirect()->route('star.create');
    }


    /**
     * @param  RushThroughController $Rush
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        return $this->view('edit',compact('role'));
    }

    /**
     * @param RoleRequest $request
     * @param  RushThroughController $Rush
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());

        flash('修改成功')->success()->important();

        return redirect()->route('roles.index');
    }

    /**
     * @param  
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        $role->rules()->detach(); //删除关联数据

        $role->delete();

        flash('删除成功')->success()->important();

        return redirect()->route('roles.index');
    }

    /**
     * 展示分配权限页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function access(Role $role,RulesRepository $rulesRepository,Tree $tree)
    {
        $rules = $rulesRepository->getRules();

        $datas = $tree::channelLevel($rules, 0, '&nbsp;', 'id','parent_id');

        $rules = $role->rules->pluck('id')->toArray();

        return $this->view(null,compact('role','datas','rules'));
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function groupAccess(Request $request,Role $role)
    {

        $role->rules()->sync($request->get('rule_id'));

        flash('授权成功')->success()->important();

        return redirect()->route('roles.index');
    }

  /**
     * 展示所有闯关
     * @param RushThroughController 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function status(Request $request)
    {
      $id = $request->get('id');

      if($id){
         $data = Star::find($id);
      
        if($data['status'] == '1'){
            $status=[
            'status'=>'0',
            'updated_at'=>time()
            ];
            Star::where('id',$id)->update($status);
        }else{
           
             $status=['status'=>'1','updated_at'=>time()];
             Star::where('id',$id)->update($status);
        }
         flash('修改成功')->success()->important();
        return redirect()->route('star.index');
      }
      
    }
    
    /**
    * 子课程
    */
    public function childCourse(Request $request, Star $star){
         // $id = $request->get('id');
         // $data = $this->Star->where('parent_id',$id)->paginate(10);
    }

}
