@extends('admin.template.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="col-md-6">
                <div class="row">
                    <h3>Add user to this role : <strong>{{$role->name}}</strong></h3>
                </div>
            </div>         
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                    {!!Form::open(['url' => route('roles.attach', $role->id)])!!}
                        <div class="form-group">
                            <label for="user">User</label>
                            <select name="user" id="user" class="form-control">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}} ({{$user->email}})</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit">Add this user</button>
                    {!!Form::close()!!}
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection