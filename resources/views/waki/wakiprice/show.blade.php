@extends('layouts.admin')

@section('title', "Startek - Show Price")

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Detail Price Label Waki</h1>
    </div>
    
    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- form start -->
        <form role="form" action="/waki_prices/show" method="post">
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
        </form>
        <a class="btn btn-sm btn-warning" href="/waki_prices/{{ $waki_price->id }}/edit">Edit</a>
        <a class="btn btn-danger" id="delete" href="#" price_id = "{{ $waki_price->id }}">Delete</a>
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
        window.location="/waki_prices/"+id+"/delete";
      }
    });
  })
</script>
@endpush