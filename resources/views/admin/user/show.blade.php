@extends('admin.layout.main')

@section('content')
    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
        <thead>
        <tr>
            <th>Full Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Address</th>
            <th class="text-center">Level</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            @if($user->image == null)
                            <div class="widget-content-left mr-3">
                                <div class="widget-content-left">
                                    <img width="40" class="rounded-circle"
                                         data-toggle="tooltip" title="Image"
                                         data-placement="bottom"
                                         src="{{asset('/template/admin/assets/images/_default-user.png')}}" alt="">
                                </div>
                            </div>
                            @else
                                <div class="widget-content-left mr-3">
                                    <div class="widget-content-left">
                                        <img width="40" class="rounded-circle"
                                             data-toggle="tooltip" title="Image"
                                             data-placement="bottom"
                                             src="{{asset($user->image) }}" alt="">
                                    </div>
                                </div>
                            @endif
                            <div class="widget-content-left flex2">
                                <div class="widget-heading">{{$user->name}}</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="text-center">{{$user->email}}</td>
                <td class="text-center">{{$user->phone}}</td>
                <td class="text-center w-25">{{$user->address}}</td>
                <td class="text-center">
                    Admin
                </td>
                <td class="text-center">
                    <a href="{{route($model.'.index')}}"
                       class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                        Back
                    </a>
                    <a href="{{route($model.'.edit',$user->id)}}" data-toggle="tooltip" title="Edit"
                       data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                    </a>
                    <form class="d-inline" action="{{route($model.'.destroy',$user->id)}}" method="post">
                        @method('delete')
                        <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                type="submit" data-toggle="tooltip" title="Delete"
                                data-placement="bottom"
                                onclick="return confirm('Do you really want to delete this item?')">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-trash fa-w-20"></i>
                                                            </span>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
