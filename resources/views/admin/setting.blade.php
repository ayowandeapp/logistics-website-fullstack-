

@extends('layouts/merchantLayout/merchant_design')
@section('content')
<style type="text/css">
    .remove{
        border-top-style: hidden;
        border-left-style: hidden;
        border-right-style: hidden;
    }
</style>
<script type="text/javascript">

</script>
<div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="btn-group float-right">
                                            <ol class="breadcrumb hide-phone p-0 m-0">
                                                <li class="breadcrumb-item"><a href="{{ url('/merchant/dashboard') }}">Wanamove</a></li>
                                                <li class="breadcrumb-item active"> Setting</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">About us</h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">            
                                    <!-- Simple card -->
                                    <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title font-20 mt-0">Add logo</h4>
                                            <div class="row">
                                                <div class="col-12">
                                                    <form method="post" action="{{ url('/merchant/setting/header') }}" enctype="multipart/form-data"> {{ csrf_field() }}
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
                                                                <label>Thumbnail</label>
                                                                <input type="file" class="form-control" name="image" id="image" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Meta_title</label>
                                                                <input type="text" class="form-control" id="title" placeholder="Meta title" name="title" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Meta_keywords</label>
                                                                <input type="text" class="form-control" id="title" placeholder="Meta keywords" name="keywords" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Meta_description</label>
                                                            <textarea class="form-control" rows="5" name="description" required></textarea>
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
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                                        <div class="form-group col-md-12">
                                                                <label>Thumbnail: </label>      
                                                                <img src="{{ asset('images/frontend_images/'. $service->image) }}" width="80" height="80">
                                                         </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Meta_title: </label>
                                                                {{ $service->meta_title }}
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Meta_keyword: </label>
                                                                {{ $service->meta_keywords }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Meta_description: </label>
                                                            {{ $service->meta_description }}
                                                        </div>
                                                        <button data-toggle="modal" data-target="#exampleModalform{{ $service->id }}" class="btn btn-primary btn-sm">Edit </button>
                                        
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                            <div class="modal fade" id="exampleModalform{{ $service->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit homepage settings</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ url('/merchant/logo/'.$service->id) }}" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label">Image</label>
                                                                        <input type="file" class="form-control" name="editimage" id="image" value="{{ $service->image }}"><img src="{{ asset('images/frontend_images/'. $service->image) }}" width="50" height="50"><input type="hidden" name="current_image" value="{{ $service->image }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label">Meta_title</label>
                                                                        <input type="text" class="form-control" id="" name="title" placeholder="About title" value="{{$service->meta_title }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label">Meta_keywords</label>
                                                                        <input type="text" class="form-control" id="" name="keywords" placeholder="About title" value="{{$service->meta_keywords }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group no-margin">
                                                                        <label for="field-7" class="control-label">Description</label>
                                                                        <textarea class="form-control" id="field-7" placeholder="Write description" name="description" rows="5">{{$service->meta_description }}</textarea>
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

@section('plugins')
        <script src="{{ asset('js/backend_js/pages/sweet-alert.init.js') }}"></script> 

@endsection
@section('pages')
<script type="text/javascript">
    //add more product field

   $(document).ready(function(){
    



});
   

</script>

@endsection
