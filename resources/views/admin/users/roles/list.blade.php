@extends('admin.template.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="col-md-6">
                <div class="row">
                    <h1 class="pull-left"> 
                        Roles Table <a href="{{route('admin.role.create')}}" class="btn btn-default">Add a role</a>
                    </h1>
                </div>
            </div>         
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                @include('messages')
                    @if( isset($roles) && !$roles->isEmpty())
                        <table class="table table-bordered">
                            <tr>
                              <th>Name</th>
                              <th>Description</th>
                              <th class="hidden">Actions</th>
                            </tr>
                            @foreach($roles as $role)
                                <tr>
                                  <td>{{$role->name}}</td>
                                  <td>{{$role->description}}</td>
                                  <td>
                                        {!!Form::open(array('url' => route('admin.role.destroy', $role->id), 'method' => 'delete', 'class' => 'btn-group'))!!}
                                            <a href="{{route('admin.role.show', $role->id)}}" class="btn btn-default"><i class="fa fa-eye"></i> Show</a>
                                            <a href="{{route('admin.role.edit', $role->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                            <button type="submit" name="submit" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-times"></i> Delete</button>
                                        {!!Form::close()!!}
                                  </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="alert alert-warning">No roles to show</p>
                    @endif
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection