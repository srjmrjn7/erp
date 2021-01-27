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
                        <form class="forms-sample" method="post" action="{{route('updateUnit',$unit->id)}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Unit</label>
                                <input type="text" class="form-control" name="unit" value="{{$unit->unit}}"
                                       placeholder="Enter unit here">
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
