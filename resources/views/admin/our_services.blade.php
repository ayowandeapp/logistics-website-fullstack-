@extends('layouts/merchantLayout/merchant_design')
@section('content')
<div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="btn-group float-right">
                                            <ol class="breadcrumb hide-phone p-0 m-0">
                                                <li class="breadcrumb-item"><a href="{{ url('/merchant/dashboard') }}">Wanamove</a></li>
                                                <li class="breadcrumb-item active"> Our Services</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Our Services</h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">            
                                    <!-- Simple card -->
                                    <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title font-20 mt-0">Add service</h4>
                                            <p class="font-14">what services does your company offer </p>
                                            <div class="row">
                                                <div class="col-12">
                                                    <form method="post" action="{{ url('/merchant/our-services') }}"> {{ csrf_field() }}
                                                        <div class="form-row">
                                                        @if($errors->any())
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <ul>
                                                        @foreach($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                        </ul>
                                                        </div>
                                                    @endif
                                                            <div class="form-group col-md-12">
                                                                <label>Favicon</label>
                                                                <input type="text" class="form-control" id="favicon" placeholder="favicon" name="icon" required><code>&lt;i class="fa fa-font-awesome"&gt;&lt;/i&gt;</code>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Title</label>
                                                                <input type="text" class="form-control" id="title" placeholder="Service title" name="title" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea class="form-control" rows="5" name="detail" required></textarea>
                                                        </div>
                                                        <div class="col-auto p-0">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                    
                                                </div>                                           
                                            </div>            
                                        </div>
                                    </div> 
                                    </div>           
                                </div><!-- end col -->
                            <div class="row">
                            @foreach($services as $service)
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title font-20 mt-0"><i class="fa {{ $service->icon }}"></i> {{ $service->title }}</h4>
                                            <p class="card-text">{{ $service->detail }}</p>
                                            <button data-toggle="modal" data-target="#exampleModalform{{ $service->id }}" class="btn btn-primary btn-sm">Edit </button><button class="alertify-confirm btn btn-primary waves-effect waves-light btn-sm " serviceId="{{ $service->id }}" href="#" style="float: right;">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                            <div class="modal fade" id="exampleModalform{{ $service->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Serivice</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ url('/merchant/edit-services/'.$service->id) }}" method="post"> {{csrf_field()}}
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label">Favicon</label>
                                                                        <input type="text" class="form-control" id="" name="icon" placeholder="e.g fa fa-user" value="{{$service->icon }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label">Title</label>
                                                                        <input type="text" class="form-control" id="" name="title" placeholder="service title" value="{{$service->title }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group no-margin">
                                                                        <label for="field-7" class="control-label">Description</label>
                                                                        <textarea class="form-control" id="field-7" placeholder="Write service description" name="detail" rows="5">{{$service->detail }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                                          
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Edit Service</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> 
                            @endforeach
                            </div>
                            <!-- end row -->
                        </div><!-- container -->
@endsection
@section('pages')
<script type="text/javascript">
    //add more product field
    $(".alertify-confirm").click(function(){
         var id = $(this).attr('serviceId');    
        alertify.confirm("Are you sure you want to delete this?", function() {

        $.get('/merchant/delete-services', { Id: id }, function(data) {
        // se eliminó correctamente
        location.reload();
        alertify.success('Deleted successfully');
      }).fail(function() {
        // ocurrió un error
        location.reload();
        alertify.error('Error deleting the item');
      });
    });
        return false;
        
    });

</script>

@endsection
