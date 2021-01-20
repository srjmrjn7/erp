@extends('includes.app')
@section('content')




    <div class="content-wrapper">


        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">

                            <span class="pull-right">
							<button data-toggle="modal" data-target="#addCategory" class="btn btn-sm btn-primary"> <i
                                    class="fa fa-plus"></i>Add New</button>
							</span>
                        <div class="clearfix"></div>
                        <h4 class="card-title">Stock Count</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        S.No
                                    </th>
                                    <th>
                                        Invoice No
                                    </th>
                                    <th>
                                        Created On
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stockCounts as $key=>$sc)
                                    <tr>
                                        <td>
                                            {{$key+1}}
                                        </td>
                                        <td>
                                            {{$sc->ino}}
                                        </td>
                                        <td>
                                            {{$sc->con}}
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
        </div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->


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
v
