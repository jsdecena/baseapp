@extends('admin.template.main')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Roles</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body no-padding">
                            @if($roles)
                                <table class="table">
                                    <tr>
                                      <th class="col-md-1">#</th>
                                      <th class="col-md-4">Name</th>
                                      <th class="col-md-2">Email</th>
                                      <th class="col-md-1">Created</th>
                                      <th class="col-md-2">Actions</th>
                                    </tr>
                                    @foreach($roles as $role)
                                        <tr>
                                          <td>{{$role->id}}</td>
                                          <td><a href="{{route('admin.role.edit', $role->id)}}">{{$role->name}}</a></td>
                                          <td>{{$role->email}}</td>
                                          <td>{{$role->created_at->format('d M Y')}}</td>
                                          <td>
                                                {!!Form::open(['url' => route('admin.role.destroy', $role->id), 'method' => 'delete' ])!!}
                                                    <a href="{{route('admin.role.edit', $role->id)}}" class="btn btn-sml btn-default"><i class="fa fa-pencil"></i> Edit</a>
                                                    <button type="submit" class="btn btn-sml btn-danger" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-timex"></i> Delete</button>
                                                {!!Form::close()!!}
                                          </td>
                                        </tr>
                                    @endforeach
                                </table>
                                @include('admin.template.pagination', ['pages' => $roles])
                            @else
                                <p class="alert alert-warning">No roles to show</p>
                            @endif
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </section>
    </div>
@endsection