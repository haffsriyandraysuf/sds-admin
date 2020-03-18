@extends('layouts.admin')

@section('title', "Startek - Edit Price")

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
      
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Edit Price Label Waki</h1>
    </div>
    
    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- form start -->
        <form method="post" action="/waki_prices/{{ $waki_price->id }}">
          @method('patch')
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="price_material">Price Material</label>
              <input type="text" required class="form-control" id="price_material" name="price_material" value="{{ $waki_price->price_material }}">
            </div>
            <div class="form-group">
              <label for="cost_service">Cost Service</label>
              <input type=" text" required class="form-control" id="cost_service" name="cost_service" value="{{ $waki_price->cost_service }}">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
    <!-- END OVERVIEW -->
  </div>>
@stop