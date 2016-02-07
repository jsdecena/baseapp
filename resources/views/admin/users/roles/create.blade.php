@extends('admin.template.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Add a role</h1>
        <ol class="breadcrumb">
          <li><a href="{{url('admin', [], env('APP_HTTPS', false))}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add a role</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box">
              <div class="box-header with-border">
                @include('messages')
              </div><!-- /.box-header -->
                <!-- form start -->
                {!!Form::open(array('url'=> route('admin.role.store'), 'files' => true ))!!}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Role name" value="{{old('name')}}" />
                                </div>
                                <div class="form-group">
                                    <label for="description">Role Description</label>
                                    <textarea name="description" id="description" rows="5" class="form-control" placeholder="Role description">{{old('description')}}</textarea>
                                </div>                                
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div><!-- /.col -->
                        </div> <!-- /.row -->                 
                    </div><!-- /.box-body -->
                {!!Form::close()!!}

            </div><!-- /.box -->
          </div><!--/.col (left) -->
        </div>   <!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection