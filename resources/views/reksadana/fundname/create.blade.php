@extends('layouts.admin')

@section('title', "Startek - Create Fund Name")

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
      
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Add Fund Name</h1>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- form start -->
        <form role="form" action="{{ url('/rdct_fundnames') }}" method="post">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="id">Fund Name Code</label>
              <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ old('id') }}" placeholder="Fund Name Code">
              @error('id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="fund_name">Fund Name</label>
              <input type="text" class="form-control @error('fund_name') is-invalid @enderror" id="fund_name" name="fund_name" value="{{ old('fund_name') }}" placeholder="Fund Name">
              @error('fund_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="rdct_fundmanager_id">Fund Manager Code</label>
              <select class="form-control select2" style="width: 100%;" name="rdct_fundmanager_id">
                @foreach($rdct_fundmanagers as $fundmanager)
                  <option value="{{ $fundmanager->id }}">{{ $fundmanager->fund_manager }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="fn_code_old">Fund Code Old</label>
              <input type="text" class="form-control @error('fn_code_old') is-invalid @enderror" id="fn_code_old" name="fn_code_old" value="{{ old('fn_code_old') }}" placeholder="Fund Code Old">
              @error('fn_code_old')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="addr1">Address 1</label>
              <input type="text" class="form-control @error('addr1') is-invalid @enderror" id="addr1" name="addr1" value="{{ old('addr1') }}" placeholder="Address 1">
              @error('addr1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="addr2">Address 2</label>
              <input type="text" class="form-control @error('addr2') is-invalid @enderror" id="addr2" name="addr2" value="{{ old('addr2') }}" placeholder="Address 2">
              @error('addr2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="addr3">Address 3</label>
              <input type="text" class="form-control" id="addr3" name="addr3" value="{{ old('addr3') }}" placeholder="Address 3">
            </div>
            <div class="form-group">
              <label for="addr4">Address 4</label>
              <input type="text" class="form-control" id="addr4" name="addr4" value="{{ old('addr4') }}" placeholder="Address 4">
            </div>
            <div class="form-group">
              <label for="npwp">NPWP</label>
              <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp" name="npwp" value="{{ old('npwp') }}" placeholder="NPWP">
              @error('npwp')
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
