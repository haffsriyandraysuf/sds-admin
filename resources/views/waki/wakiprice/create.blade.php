@extends('layouts.admin')

@section('title', 'Startek - Create Price')

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
      
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Add Price Label Waki</h1>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- form start -->
          <form role="form" action="{{ url('/waki_prices') }}" method="post">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="price_material">Price Material</label>
                <input type="text" required class="form-control" id="price_material" name="price_material" placeholder="Price Material">
              </div>
              <div class="form-group">
                <label for="cost_iservice">Cost Service</label>
                <input type=" text" required class="form-control" id="cost_service" name="cost_service" placeholder="Cost Service">
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
      <!-- END OVERVIEW -->
  </div>
@stop