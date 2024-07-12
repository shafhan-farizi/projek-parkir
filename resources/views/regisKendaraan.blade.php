@extends('main')

@section('title', 'Registrasi Kendaraan')

@section('content')
  <div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay innerpage" style="background-image: url('/assets/images/hero_1.jpg')">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-6 text-center">
            <h1>Registrasikan Kendaraan Mu Sekarang!!</h1>
            <p></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-light" id="contact-section">
    <div class="container">
      <div class="row justify-content-center text-center">
      <div class="col-7 text-center mb-5">
        <h5 style="font-weight: bold;">Silahkan Isi Data Berikut Sesuai Dengan Data Kendaraanmu</h5>
      </div>
    </div>
      <div class="row">
        <div class="col-lg-10 mb-5 mx-auto" >
          @if ($sudah_regis)
            <p class="info">Sudah Registrasi</p>
          @else
            <form action="{{ route('admin.kendaraan.add') }}" method="post">
              @csrf
              <input type="text" name="uri" value="{{ request()->route()->uri }}" hidden>
              <input type="text" name="pemilik" value="{{ Auth::user()->username }}" hidden>
              <div class="form-group row">
                <div class="error-parent col-md-4">
                  <input type="text" name="merk" class="form-control" placeholder="Merek Kendaraan">
                  @error('merk')
                    <span class="error">{{ $message }}</span>
                  @enderror
                </div>
                <div class="error-parent col-md-4">
                  <input type="text" name="nopol" class="form-control" placeholder="Nomor Polisi">
                  @error('nopol')
                    <span class="error">{{ $message }}</span>
                  @enderror
                </div>
                <div class="error-parent col-md-4">
                  <select class="form-control" name="jenis_kendaraan_id" id="">
                    <option selected disabled>-- Pilih Jenis Kendaraan --</option>
                    @foreach ($jenis_kendaraan as $jk)
                      <option value="{{ $jk->id }}">{{ $jk->nama }}</option>
                    @endforeach
                  </select>
                  @error('jenis_kendaraan_id')
                    <span class="error">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <div class="error-parent col-md-6">
                  <input type="number" name="thn_beli" min="1885" max="2024" class="form-control" placeholder="Tahun Beli (1885 - 2024)">
                  @error('thn_beli')
                    <span class="error">{{ $message }}</span>
                  @enderror
                </div>
                <div class="error-parent col-md-6">
                  <input type="text" name="kapasitas_kursi" class="form-control" placeholder="Kapasitas Kendaraan">
                  @error('kapasitas_kursi')
                    <span class="error">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <div class="error-parent col-md-12">
                  <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" cols="30" rows="10"></textarea>
                  @error('deskripsi')
                    <span class="error">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 ml-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send">
                </div>
              </div>
            </form>
          @endif
        </div>
      </div>
    </div>
  </div>   
@endsection
