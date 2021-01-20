@extends('includes.app')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Taxes</h3>
                        <span class="pull-right">
							<button data-toggle="modal" data-target="#add" class="btn btn-sm btn-primary"> <i
                                    class="fa fa-plus"></i> Add Tax</button>
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
                                    Taxes
                                </th>
                                <th>
                                    Tax Value
                                </th>
                                <th>
                                    Tax For
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($taxes as $key=>$tax)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$tax->taxName}}
                                    </td>
                                    <td>
                                        {{$tax->value}}
                                    </td>
                                    <td>
                                        {{$tax->taxFor}}
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
    <div id="add" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Units</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{ route('storeTax') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Tax Name</label>
                                <input type="text" class="form-control" name="taxName"
                                       placeholder="Tax Name">
                            </div>
                            <label for="exampleInputUsername1">Tax Value</label>
                            <div class="row">
                                <div class="form-group col-8">
                                    <input type="text" class="form-control" name="value"
                                           placeholder="Tax Value">
                                </div>
                                <div class="form-group col-4">
                                    <select class="form-control" name="sym" id="sym">
                                        <option value=" %">%</option>
                                        <option value=" RS">RS</option>
                                    </select>
                                </div>
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


@endsection
