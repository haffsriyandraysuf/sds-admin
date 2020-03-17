@extends('layouts.admin')

@section('title', "Startek - Edit Fund Manager")

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Edit Fund Manager</h1>
    </div>
    
    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- form start -->
        <form role="form" action="/rdct_fundmanagers/{{ $rdct_fundmanager->id }}" method="post">
          @method('patch')
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="id">Fund Manager Code</label>
              <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ $rdct_fundmanager->id }}">
              @error('id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="fund_manager">Fund Manager</label>
              <input type="text" class="form-control @error('fund_manager') is-invalid @enderror" id="fund_manager" name="fund_manager" value="{{ $rdct_fundmanager->fund_manager }}">
              @error('fund_manager')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="currency">Currency</label>
              <input type="text" class="form-control @error('currency') is-invalid @enderror" id="currency" name="currency" value="{{ $rdct_fundmanager->currency }}">
              @error('currency')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="paid_by">Paid By</label>
              <input type="text" class="form-control @error('paid_by') is-invalid @enderror" id="paid_by" name="paid_by" value="{{ $rdct_fundmanager->paid_by }}">
              @error('paid_by')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  
  </div>
  <!-- /.container-fluid -->
@endsection