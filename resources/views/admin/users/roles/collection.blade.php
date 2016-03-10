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
                    {!!Form::open(['url' => route('admin.role.attach', $role->id)])!!}
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
                    @if(!$user_roles->isEmpty())
                        <hr />
                    {!!Form::open(['url' => route('admin.role.detach', $role->id)])!!}
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($user_roles as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <input type="hidden" name="userID" value="{{$user->id}}">
                                            <button class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {!!Form::close()!!}
                    @endif                    
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection