@extends('layouts.admin')

@section('title', "Startek - Create Fund Manager")

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Add Fund Manager</h1>
    </div>
    
    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- form start -->
        <form role="form" action="{{ url('/rdct_fundmanagers') }}" method="post">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="id">Fund Manager Code</label>
              <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ old('id') }}" placeholder="Fund Manager Code">
              @error('id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="fund_manager">Fund Manager</label>
              <input type="text" class="form-control @error('fund_manager') is-invalid @enderror" id="fund_manager" name="fund_manager" value="{{ old('fund_manager') }}" placeholder="Fund Manager">
              @error('fund_manager')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="currency">Currency</label>
              <input type="text" class="form-control @error('currency') is-invalid @enderror" value="{{ old('currency') }}" id="currency" name="currency" placeholder="Currency">
              @error('currency')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="paid_by">Paid By</label>
              <input type="text" class="form-control @error('paid_by') is-invalid @enderror" value="{{ old('paid_by') }}" id="paid_by" name="paid_by" placeholder="Paid By">
              @error('paid_by')
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
  <!-- END MAIN CONTENT -->
@endsection