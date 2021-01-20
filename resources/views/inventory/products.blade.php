@extends('includes.app')
@section('content')


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Products</h3>
                        <span class="pull-right">
							<button data-toggle="modal" data-target="#applyTax" class="btn btn-sm btn-primary"> <i
                                    class="fa fa-plus"></i> Add New Product</button>
							</span>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    Product Code
                                </th>
                                <th>
                                    Product Name
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Brand
                                </th>
                                <th>
                                    Expiry Date
                                </th>
                                <th>
                                    Default Unit
                                </th>
                                <th>
                                    Unit Stock
                                </th>
                                <th>
                                    Purchase Price
                                </th>
                                <th>
                                    Sale Price
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key=>$product)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$product->code}}
                                    </td>
                                    <td>
                                        {{$product->name}}
                                    </td>
                                    <td>
                                        {{$product->category}}
                                    </td>
                                    <td>
                                        {{$product->brand}}
                                    </td>
                                    <td>
                                        {{$product->expiry_date}}
                                    </td>
                                    <td>
                                        {{$product->default_unit}}
                                    </td>
                                    <td>
                                        {{$product->unit_stock}}
                                    </td>
                                    <td>
                                        {{$product->name}}
                                    </td>
                                    <td>
                                        Delete, Edit
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
    <div id="addCategory" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Apply Taxes</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{ route('storeAppliedtax') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Select Voucher Type</label>
                                <select class="form-control" name="vtype" id="status">
                                    <option value="purchase">Purchase Invoices</option>
                                    <option value="sale">Sale Invoices</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Taxes(press CTRL to Choose Multiple Options)</label>
                                <select class="form-control" name="taxes[]" id="status" multiple>
                                    @foreach($taxes as $tax)
                                        <option value="{{$tax->taxName}}">{{$tax->taxName}}</option>
                                    @endforeach
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
