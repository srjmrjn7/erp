@extends('includes.app')
@section('content')


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Applied Taxes</h3>
                        <span class="pull-right">
							<button data-toggle="modal" data-target="#applyTax" class="btn btn-sm btn-primary"> <i
                                    class="fa fa-plus"></i> Apply Tax</button>
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
                                    Voucher Type
                                </th>
                                <th>
                                    Applied Tax
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appliedTaxes as $key=>$atax)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$atax->vtype}}
                                    </td>
                                    <td>
                                        {{$atax->atax}}
                                    </td>
                                    <td>
                                        <a href="{{URL::to('/products/editAppliedTax/'.$atax->id)}}" class="fa-btn">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{URL::to('/products/appliedTax/delete/'.$atax->id)}}" class="fa-btn delete-confirm">
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
    <div id="applyTax" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Apply Taxes<button type="button" class="close" data-dismiss="modal">&times;</button></h4>

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
