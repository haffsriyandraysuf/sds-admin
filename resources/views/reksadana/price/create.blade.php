@extends('layouts.admin')

@section('title', "Startek - Create Price")

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
      
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Add Price Material & Cost Production</h1>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- form start -->
        <form role="form" action="{{ url('/rdct_prices') }}" method="post">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="material_inserting">Material Inserting</label>
              <input type="text" class="form-control @error('material_inserting') is-invalid @enderror" id="material_inserting" name="material_inserting" value="{{ old('material_inserting') }}" placeholder="Material Inserting">
              @error('material_inserting')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="material_printing">Material Printing</label>
              <input type="text" class="form-control @error('material_printing') is-invalid @enderror" id="material_printing" name="material_printing" value="{{ old('material_printing') }}" placeholder="Material Printing">
              @error('material_printing')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="cost_inserting">Cost Inserting</label>
              <input type="text" class="form-control @error('cost_inserting') is-invalid @enderror" id="cost_inserting" name="cost_inserting" value="{{ old('cost_inserting') }}" placeholder="Cost Inserting">
              @error('cost_inserting')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="cost_printing">Cost Printing</label>
              <input type="text" class="form-control @error('cost_printing') is-invalid @enderror" id="cost_printing" name="cost_printing" value="{{ old('cost_printing') }}" placeholder="Cost Printing">
              @error('cost_printing')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
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