@extends('includes.app')
@section('content')


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Products</h3>
                        <span class="pull-right">
							<a href="{{url('products/addProduct')}}" class="btn btn-sm btn-primary"> <i
                                    class="fa fa-plus"></i> Add New Product</a>
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
                                        {{$product->product_name}}
                                    </td>
                                    <td>
                                        @php
                                            $category=DB::table('categories')->where('id',$product->category_id)->first();
                                            $brand=DB::table('brands')->where('id',$product->brand_id)->first();
                                            $punit=DB::table('units')->where('id',$product->brand_id)->first();
                                        @endphp
                                        {{$category}}
                                    </td>
                                    <td>
                                        {{$brand}}
                                    </td>
                                    <td>
                                        {{$product->expiry_date}}
                                    </td>
                                    <td>
                                        {{$product->default_unit}}
                                    </td>
                                    <td>
                                        {{$punit}}
                                    </td>
                                    <td>
                                        {{$product->product_name}}
                                    </td>
                                    <td>
                                        <a href="" class="fa-btn">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        &nbsp;
                                        <a href="" class="fa-btn delete-confirm">
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
@endsection
