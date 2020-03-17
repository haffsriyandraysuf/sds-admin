@extends('layouts.admin')

@section('title', "Startek - Edit Fund Name")

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
        
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Edit Fund Name</h1>
    </div>
    
    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- form start -->
        <form role="form" action="/rdct_fundnames/{{ $rdct_fundname->id }}" method="post">
          @method('patch')
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="id">Fund Name Code</label>
              <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ $rdct_fundname->id }}">
              @error('id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="fund_name">Fund Name</label>
              <input type="text" class="form-control @error('fund_name') is-invalid @enderror" id="fund_name" name="fund_name" value="{{ $rdct_fundname->fund_name }}">
              @error('fund_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="rdct_fundmanager_id">Fund Manager Code</label>
              <select class="form-control select2" style="width: 100%;" name="rdct_fundmanager_id">
                <option value="{{ $rdct_fundname->rdct_fundmanager->id }}">{{ $rdct_fundname->rdct_fundmanager->fund_manager }}</option>
              </select>
            </div>
            <div class="form-group">
              <label for="fn_code_old">Fund Code Old</label>
              <input type="text" class="form-control @error('fn_code_old') is-invalid @enderror" id="fn_code_old" name="fn_code_old" value="{{ $rdct_fundname->fn_code_old }}">
              @error('fn_code_old')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="addr1">Address 1</label>
              <input type="text" class="form-control @error('addr1') is-invalid @enderror" id="addr1" name="addr1" value="{{ $rdct_fundname->addr1 }}">
              @error('addr1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="addr2">Address 2</label>
              <input type="text" class="form-control @error('addr2') is-invalid @enderror" id="addr2" name="addr2" value="{{ $rdct_fundname->addr2 }}">
              @error('addr2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="addr3">Address 3</label>
              <input type="text" class="form-control" id="addr3" name="addr3" value="{{ $rdct_fundname->addr3 }}">
            </div>
            <div class="form-group">
              <label for="addr4">Address 4</label>
              <input type="text" class="form-control" id="addr4" name="addr4" value="{{ $rdct_fundname->addr4 }}">
            </div>
            <div class="form-group">
              <label for="npwp">NPWP</label>
              <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp" name="npwp" value="{{ $rdct_fundname->npwp }}">
              @error('npwp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- END OVERVIEW -->
  </div>
@stop