@extends('includes.app')
@section('content')


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Stock Count</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="well">
                            <form method="POST" action="">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Product</label>
                                                <select
                                                    class="stock_product form-control select2 select2-hidden-accessible"
                                                    tabindex="-1" aria-hidden="true">
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label>
                                                    <div>&nbsp;</div>
                                                </label>
                                                <a href="#" class="btn btn-primary add-stock-row"><i
                                                        class="fa fa-plus"></i>&nbsp;Add</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Show Counted before</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-calendar"></i></span>
                                                    <input type="text" id="datepicker"
                                                           class="form-control datepicker from_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>
                                                    <div>&nbsp;</div>
                                                </label>
                                                <a href="#" class="btn btn-primary show-all-product"><i
                                                        class="fa fa-search"></i>&nbsp;Show All Products</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="print-area">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="">
                                                    <table class="table table-bordered products_list stock-items">
                                                        <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Code</th>
                                                            <th>Unit</th>
                                                            <th>Cost Price</th>
                                                            <th>Sale Price</th>
                                                            <th>Expected</th>
                                                            <th>Counted</th>
                                                            <th>Difference</th>
                                                            <th>Cost Price</th>
                                                            <th>Sale Price</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th colspan="5">Total</th>
                                                            <th class="total_expected"></th>
                                                            <th class="total_counted"></th>
                                                            <th class="total_difference"></th>
                                                            <th class="total_cost_price"></th>
                                                            <th class="total_sale_price"></th>
                                                            <th></th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                    <br>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Qty</th>
                                                            <th>Price</th>
                                                            <th>Cost</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>More than expected</td>
                                                            <td class="more_qty"></td>
                                                            <td class="more_sale"></td>
                                                            <td class="more_cost"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Less than expected</td>
                                                            <td class="less_qty"></td>
                                                            <td class="less_sale"></td>
                                                            <td class="less_cost"></td>
                                                        </tr>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Net Difference</th>
                                                            <th class="total_difference"></th>
                                                            <th class="total_sale_price"></th>
                                                            <th class="total_cost_price"></th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label><input type="checkbox" name="print" value="">&nbsp;Print Invoice</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <a href="https://erp.itvision.pk/accounting/products/stockInvoices"
                                           class="form-btn btn  btn-default btn-default1 ">
                                            Cancel </a>&nbsp;&nbsp;
                                        <input type="submit" value="Apply Changes" name="apply_inventory"
                                               class="form-btn btn btn-shadow btn-primary ">
                                        <input type="submit" value="Save" name="submit"
                                               class="form-btn btn btn-shadow btn-primary ">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>


@endsection
