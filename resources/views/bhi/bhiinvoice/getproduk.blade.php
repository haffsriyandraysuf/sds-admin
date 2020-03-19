@for ($i = 0; $i < count($bhi_price); $i++)
<input type="hidden" name="sub_produk[]" value="{{ $bhi_price[$i]['sub_produk'] }}">
<input type="hidden" name="price_printing[]" value="{{ $bhi_price[$i]['material_printing'] }}">
<input type="hidden" name="price_inserting[]" value="{{ $bhi_price[$i]['material_inserting'] }}">
<input type="hidden" name="cost_printing[]" value="{{ $bhi_price[$i]['cost_printing'] }}">
<input type="hidden" name="cost_inserting[]" value="{{ $bhi_price[$i]['cost_inserting'] }}">
@if ($bhi_price[$i]['sub_produk'] != "REKSADANA")
<div class="row">
    <div class="col form-group">
      <div class="card">
        <div class="card-header">
          Quantity {{ ucwords(strtolower($bhi_price[$i]['sub_produk'])) }}
        </div>
        <div class="card-body">
          <div class="row">
            <div class="form-group col">
                <label for="qty_printing">Printing</label>
                <input type="text" class="form-control" onkeyup="hitung()" id="qty_printing{{ $i }}" name="qty_printing[]">
            </div>
            @if ($bhi_price[$i]['sub_produk'] != 'WAYBILL')
            <div class="form-group col">
                <label for="qty_inserting">Inserting</label>
                <input type="text" class="form-control" onkeyup="hitung()" id="qty_inserting{{ $i }}" name="qty_inserting[]">
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <div class="card">
        <div class="card-header">
            Material Production
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col">
                    <label for="price_printing">Printing</label>
                    <input type="text" readonly class="form-control" id="price_printing{{ $i }}"
                           name="price_printing{{ $i }}"
                           value="{{ $bhi_price[$i]['material_printing'] }}">
                </div>
                <div class="form-group col">
                    <label for="price_inserting">Inserting</label>
                    <input type="text" readonly class="form-control" id="price_inserting{{ $i }}"
                           name="price_inserting{{ $i }}"
                           value="{{ $bhi_price[$i]['material_inserting'] }}">
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-sm-6 form-group">
        <div class="card">
        <div class="card-header">
            Cost Production
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col">
                    <label for="cost_printing">Printing</label>
                    <input type="text" readonly class="form-control" id="cost_printing{{ $i }}"
                           name="cost_printing{{ $i }}"
                           value="{{ $bhi_price[$i]['cost_printing'] }}">
                </div>
                <div class="form-group col">
                    <label for="cost_inserting">Inserting</label>
                    <input type="text" readonly class="form-control" id="cost_inserting{{ $i }}"
                           name="cost_inserting{{ $i }}"
                           value="{{ $bhi_price[$i]['cost_inserting'] }}">
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col form-group">
      <div class="card">
        <div class="card-header">
          Quantity {{ ucwords(strtolower($bhi_price[$i]['sub_produk'])) }}
        </div>
        <div class="card-body">
          <div class="row">
            <div class="form-group col-sm-3">
              <label for="qty_printing">Printing</label>
              <input type="text" class="form-control" onkeyup="hitung()" id="qty_printing{{ $i }}" name="qty_printing[]">
            </div>
            <div class="form-group col-sm-3">
              <label for="qty_inserting">Inserting</label>
              <input type="text" class="form-control" onkeyup="hitung()" id="qty_inserting{{ $i }}" name="qty_inserting[]">
            </div>
            <div class="form-group col-sm-3">
              <label for="qty_kertas">Kertas</label>
              <input type="text" class="form-control" onkeyup="hitung()" id="qty_kertas" name="qty_kertas">
            </div>
            <div class="form-group col-sm-3">
              <label for="qty_amplop">Amplop</label>
              <input type="text" class="form-control" onkeyup="hitung()" id="qty_amplop" name="qty_amplop">
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 form-group">
        <div class="card">
        <div class="card-header">
            Material Production
        </div>
        <div class="card-body">
            <div class="row">
            <div class="form-group col-sm-6">
                <label for="price_printing">Printing</label>
                <input type="text" readonly class="form-control" id="price_printing{{ $i }}" name="price_printing{{ $i }}" value="{{ $bhi_price[$i]['material_printing'] }}">
            </div>
            <div class="form-group col-sm-6">
                <label for="price_inserting">Inserting</label>
                <input type="text" readonly class="form-control" id="price_inserting{{ $i }}" name="price_inserting{{ $i }}" value="{{ $bhi_price[$i]['material_inserting'] }}">
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-sm-4 form-group">
        <div class="card">
        <div class="card-header">
            Cost Production
        </div>
        <div class="card-body">
            <div class="row">
            <div class="form-group col-sm-6">
                <label for="cost_printing">Printing</label>
                <input type="text" readonly class="form-control" id="cost_printing{{ $i }}" name="cost_printing{{ $i }}" value="{{ $bhi_price[$i]['cost_printing'] }}">
            </div>
            <div class="form-group col-sm-6">
                <label for="cost_inserting">Inserting</label>
                <input type="text" readonly class="form-control" id="cost_inserting{{ $i }}" name="cost_inserting{{ $i }}" value="{{ $bhi_price[$i]['cost_inserting'] }}">
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-sm-4 form-group">
        <div class="card">
        <div class="card-header">
            Biaya Tambahan
        </div>
        <div class="card-body">
            <div class="row">
            <div class="form-group col-sm-6">
                <label for="biaya_kertas">Kertas</label>
                <input type="text" readonly class="form-control" id="biaya_kertas" name="biaya_kertas" value="{{ $bhi_price[$i]['biaya_kertas'] }}">
            </div>
            <div class="form-group col-sm-6">
                <label for="biaya_amplop">Amplop</label>
                <input type="text" readonly class="form-control" id="biaya_amplop" name="biaya_amplop" value="{{ $bhi_price[$i]['biaya_amplop'] }}">
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
  @endif
@endfor
