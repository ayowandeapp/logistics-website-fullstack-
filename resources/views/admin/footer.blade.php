

@extends('layouts/merchantLayout/merchant_design')
@section('content')
<div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="btn-group float-right">
                                            <ol class="breadcrumb hide-phone p-0 m-0">
                                                <li class="breadcrumb-item"><a href="{{ url('/merchant/dashboard') }}">Wanamove</a></li>
                                                <li class="breadcrumb-item active"> Footer</li>
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
                                            <h4 class="card-title font-20 mt-0">Add footer</h4>
                                            <div class="row">
                                                <div class="col-12">
                                                    <form method="post" action="{{ url('/merchant/setting/footer') }}"> {{ csrf_field() }}
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
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Title</label>
                                                                <input type="text" class="form-control" id="title" placeholder="footer title" name="title">
                                                            </div>
                                                        
                                                        <div class="col-auto p-0">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div></div>
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
                                            <p> Title: {{ $service->title }}</p>
                                            <button data-toggle="modal" data-target="#exampleModalform{{ $service->id }}" class="btn btn-primary btn-sm">Edit </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalform{{ $service->id }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit footer</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{ url('/merchant/edit-footer/'.$service->id) }}" method="post"> {{csrf_field()}}
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="field-1" class="control-label">Title</label>
                                                            <input type="text" class="form-control" id="" name="title" placeholder="service title" value="{{$service->title }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 

                            </div>
                            <!-- end row -->
                        @endforeach
                            
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
