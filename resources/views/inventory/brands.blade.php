@extends('includes.app')
@section('content')


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Brands</h3>
                        <span class="pull-right">
							<button data-toggle="modal" data-target="#add" class="btn btn-sm btn-primary"> <i
                                    class="fa fa-plus"></i> Add New Brands</button>
							</span>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    Catagory Name
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $key=>$brand)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$brand->name}}
                                    </td>
                                    <td>
                                        {{$brand->description}}
                                    </td>
                                    <td>
                                        @if($brand->status==1)
                                            {{"Active"}}
                                        @else
                                            {{"Inactive"}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{URL::to('/products/editBrand/'.$brand->id)}}" class="fa-btn">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{URL::to('/products/brand/delete/'.$brand->id)}}"
                                           class="fa-btn delete-confirm">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div id="add" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Brand</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{ route('storeBrand') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Brand Name</label>
                                <input type="text" class="form-control" name="name"
                                       placeholder="Brand">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Manufacturer</label>
                                <input type="text" class="form-control" name="manufacturer"
                                       placeholder="Manufacturer">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Description">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="status" id="status">
                                    <option value="0">Active</option>
                                    <option value="1">Inactive</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-gradient-primary mr-2">Save</button>
                            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
