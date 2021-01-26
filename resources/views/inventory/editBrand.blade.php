@extends('includes.app')
@section('content')


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form class="forms-sample" method="post" action="{{route('updateCategory',$category->id)}}">
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
    </section>

@endsection
