@extends('layouts.admin')

@section('title', "Startek - Show Price")

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
      
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Detail Price Material & Cost Production</h1>
    </div>
    
    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- form start -->
        <form role="form" action="/prices/show" method="post">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="material_inserting">Material Inserting</label>
              <input type="text" required class="form-control" id="material_inserting" name="material_inserting" value="{{ $rdct_price->material_inserting }}">
            </div>
            <div class="form-group">
              <label for="material_printing">Material Printing</label>
              <input type="text" required class="form-control" id="material_printing" name="material_printing" value="{{ $rdct_price->material_printing }}">
            </div>
            <div class="form-group">
              <label for="cost_inserting">Cost Inserting</label>
              <input type="text" required class="form-control" id="cost_inserting" name="cost_inserting" value="{{ $rdct_price->cost_inserting }}">
            </div>
            <div class="form-group">
              <label for="cost_printing">Cost Printing</label>
              <input type="text" required class="form-control" id="cost_printing" name="cost_printing" value="{{ $rdct_price->cost_printing }}">
            </div>
          </div>
          <!-- /.box-body -->
        </form>
        <a class="btn btn-warning" href="/rdct_prices/{{ $rdct_price->id }}/edit">Edit</a>
        <a class="btn btn-danger" id="delete" href="#" price_id = "{{ $rdct_price->id }}">Delete</a>
        <!-- </div> -->
      </div>
    </div>
    <!-- END OVERVIEW -->
  </div>
@stop

@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
<script>
  $('#delete').click(function(){
    var id = $(this).attr('price_id');
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location="/rdct_prices/"+id+"/delete";
      }
    });
  })
</script>
@endpush