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
                        <form class="forms-sample" method="post" action="{{route('updateTax',$tax->id)}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Tax Name</label>
                                <input type="text" class="form-control" name="taxName" value="{{$tax->taxName}}"
                                       placeholder="Tax Name">
                            </div>
                            <label for="exampleInputUsername1">Tax Value</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="value" value="{{$tax->value}}"
                                       placeholder="Tax Value">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="sym" id="sym">
                                    @if($tax->sym=='%')
                                        <option value="%">%</option>
                                        <option value="Rs">Rs</option>
                                    @else
                                        <option value="Rs">Rs</option>
                                        <option value="%">%</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Apply for product/bill</label>
                                <select class="form-control" name="taxFor" id="sym">
                                    <option value="Product">Product</option>
                                    <option value="Bill">Bill</option>
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
