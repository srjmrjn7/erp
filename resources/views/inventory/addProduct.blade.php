@extends('includes.app')
@section('content')


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add New Product</h3>
                        <span class="pull-right">
							<a href="{{url('products/products')}}" class="pull-right btn btn-back">
                                <i class="fa fa-reply">&nbsp;&nbsp;Go Back</i></a>
							</span>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{route('storeProduct')}}" method="POST" role="form">
                            <input type="hidden" name="id" value="">
                            <div class="well">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="">
                                            <div class="form-group">
                                                <label class="panelheadingfont">Name</label>
                                                <input type="text" required="true" name="product_name"
                                                       class="form-control" placeholder="Product Name">
                                            </div>
                                            <div class="form-group">
                                                <label class="panelheadingfont">Product Code</label>
                                                <input type="text" name="code" placeholder="Code"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="panelheadingfont">Reorder level</label>
                                                <input type="text" placeholder="Reorder level" name="reorder_level"
                                                       class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <label class="panelheadingfont">Barcode</label>
                                                <input type="text" maxlength="12" size="12" placeholder="Barcode" name="barcode"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="panelheadingfont">Minimum Stock</label>
                                                <input type="MyNumber" name="min_stock" class="form-control"
                                                       placeholder="Minimum Stock">
                                            </div>
                                            <div class="form-group">
                                                <label class="panelheadingfont">Narration</label>
                                                <textarea class="form-control" name="narration"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-sm-12" style="margin-top: 5px;">
                                                    <div class="form-group">
                                                        <label class="panelheadingfont">Product Group</label>

                                                        <select name="category_id" class="form-control select2">
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}">
                                                                    {{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12" style="margin-top: 5px;">
                                                    <div class="form-group">
                                                        <label class="panelheadingfont">Brand</label>
                                                        <!-- <label></label> -->
                                                        <!-- <input type="text" name="" class="form-control"> -->
                                                        <select name="brand_id" class="form-control">
                                                            @foreach($brands as $brand)
                                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>Expiry Date</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                                        <input type="text" name="expiry_date" id="datepicker"
                                                               class="form-control datepicker">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-sm-12" style="margin-top: 5px;">
                                                    <div class="form-group">
                                                        <label class="panelheadingfont">Size</label>
                                                        <input type="text" name="size" class="form-control" placeholder="Size">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="panelheadingfont">Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="1">active</option>
                                                            <option value="0">inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="display: none;">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="panelheadingfont">Type</label>
                                                        <select class="form-control" name="stock_type">
                                                            <option value="1">Multiple Units (Stock count of Base
                                                                Unit)
                                                            </option>
                                                            <option value="2">Multiple Units (Separate Stock)</option>
                                                            <option value="3">Single Unit</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="well">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="">
                                                <table class="table products_list">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th style="width:300px">UOM</th>
                                                        <th style="width: 150px;"></th>
                                                        <th style="width:200px">Purchase Rate</th>
                                                        <th style="width:200px">Sale Rate</th>
                                                        <th style="width:200px">Qty (Opening Stock)</th>
                                                        <th style="width: 100px;"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><input type="hidden" name="product[0][id]" value="">
                                                            1Default
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select required="true"
                                                                        class="form-control itemIDs UOMId select2"
                                                                        name="unit">

                                                                    @foreach($units as $unit)
                                                                        <option value="{{$unit->id}}">
                                                                            {{$unit->unit}}
                                                                        </option>
                                                                    @endforeach

                                                                </select>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a data-toggle="modal" data-target="#addUnit"
                                                                    class="btn btn-primary addUnitFromProductPage">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="input-group price-input ">
                                                                    <div class="input-group-addon">Rs</div>
                                                                    <input type="MyNumber"
                                                                           name="product[0][purchaseRate]"
                                                                           class="form-control purchaseRate"
                                                                           placeholder="0.00"/>
                                                                    <div class="input-group-addon">NPR</div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="input-group price-input ">
                                                                    <div class="input-group-addon">Rs</div>
                                                                    <input type="MyNumber" name="product[0][saleRate]"
                                                                           class="form-control saleRate"
                                                                           placeholder="0.00"/>
                                                                    <div class="input-group-addon">NPR</div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="MyNumber"
                                                                       name="product[0][opening_stock_qty]" value=""
                                                                       class="form-control">
                                                            </div>
                                                        </td>
                                                        <td style="width: 120px;">
                                                            <!-- addNewTrPriceList -->
                                                            <a href="#"
                                                               class="btn btn-info addNewTrPriceList add_derived_unit pull-right"><span
                                                                    class="fa fa-plus"></span></a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="{{url('products/products')}}"
                                           class="form-btn btn  btn-primary btn-default1 ">
                                            Cancel </a>&nbsp&nbsp
                                        <input type="submit" value="Save" name="submit"
                                               class="form-btn btn btn-shadow btn-primary "/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>

    <div id="addUnit" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Units</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{ route('storeUnit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Unit</label>
                                <input type="text" class="form-control" name="unit"
                                       placeholder="Enter unit here">
                            </div>

                            <button type="submit" class="btn btn-gradient-primary mr-2">Create</button>
                            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
