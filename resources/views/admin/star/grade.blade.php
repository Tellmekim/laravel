@extends('admin.layouts.layout')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="ibox-title">
            <h5>星球闯关</h5>
        </div>
        <div class="ibox-content">
            <table class="table table-striped table-bordered table-hover m-t-md">
                <thead>
                <tr>
                     <th class="text-center" width="100">ID</th>
                    <th>分类名称</th>
                    <th>分类类型</th>
                    <th>创建时间</th>
                    <th>课程</th>
                    <th class="text-center" width="100">状态</th>
                    
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $key => $item)
                    <tr>
                       <td  class="text-center" >{{$item->id}}</td>
                      
                        <td>{{$item->star_title}}</td>
                        <td>{{$item->desc}}</td>
                        <td class="text-center">{{$item->created_at}}</td>
                        <td><a href="{{route('star.childCourse')}}">课程</a></td>
                        <td class="text-center">
                            @if($item->status == 1)
                                <span class="text-navy">
                                <a href="{{route('star.status',['id'=>$item->id])}}">启用</a></span>
                            @else
                                <span class="text-danger">
                                <a href="{{route('star.status',['id'=>$item->id])}}">禁用</a></span>
                            @endif
                        </td>
                       <!--  <td class="text-center">
                            <div class="btn-group">
                                <a href="{{route('roles.access',$item->id)}}"><button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 权限设置</button></a>
                                <a href="{{route('roles.edit',$item->id)}}"><button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 修改</button></a>
                                <form class="form-common" action="{{ route('roles.destroy', $item->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> 删除</button>
                                </form>
                            </div>
                        </td> -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<script>
    function checkAll(obj){
        $(obj).parents('.b-group').eq(0).find("input[type='checkbox']").prop('checked', $(obj).prop('checked'));
    }
</script>
@endsection