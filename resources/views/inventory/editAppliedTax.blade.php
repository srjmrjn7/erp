@extends('includes.app')
@section('content')


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Applied Tax</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form class="forms-sample" method="post" action="{{route('updateAppliedTax',$atax->id)}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Select Voucher Type</label>
                                <select class="form-control" name="vtype" id="status">
                                    @if($atax->vtype=='purchase')
                                    <option value="purchase">Purchase Invoices</option>
                                    <option value="sale">Sale Invoices</option>
                                        @else
                                        <option value="sale">Sale Invoices</option>
                                        <option value="purchase">Purchase Invoices</option>
                                    @endif
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
    </section>

@endsection
