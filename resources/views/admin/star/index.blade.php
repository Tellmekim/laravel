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
                    <th>闯关ID</th>
                    <th>词类名称</th>
                    <th>完成度</th>
                    <th>闯关时间</th>
                    <th class="text-center" width="100">状态</th>
                    <th class="text-center" width="300">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $key => $item)
                    <tr>
                       <td  class="text-center" >{{$item->id}}</td>
                        <td>{{$item->rusn_id}}</td>
                        <td>{{$item->star_title}}</td>
                        <td></td>
                        <td class="text-center">{{$item->created_at}}</td>
                        <td class="text-center">
                            @if($item->status == 1)
                                <span class="text-navy">启用</span>
                            @else
                                <span class="text-danger">禁用</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{route('roles.access',$item->id)}}"><button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 权限设置</button></a>
                                <a href="{{route('roles.edit',$item->id)}}"><button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 修改</button></a>
                                <form class="form-common" action="{{ route('roles.destroy', $item->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> 删除</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
@endsection