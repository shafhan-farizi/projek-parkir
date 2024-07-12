@extends('admin.main')

@section('title', 'Check In')

@section('data-table-css')
  @include('layouts_admin._dataTables_css')
@endsection

@section('breadcrumb')
    <ul>
      <li>Admin</li>
      <li>Transaksi</li>
      <li>Check In</li>
    </ul>
@endsection

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon">
                    <i class="mdi mdi-ballot"></i>
                </span>
                Check In
            </p>
        </header>
        <div class="card-content">
            <div class="field spaced" style="width: 350px">
                <label class="label">Area Parkir</label>
                <div class="control icons-left flex">
                    <div class="select" style="width: 100%;">
                        <select id="area_parkir" disabled>
                            <option selected disabled>-- Pilih Area Parkir --</option>
                        @foreach ($area_parkir as $ap)
                            <option value="{{ $ap->id }}">{{ $ap->kampus->nama }} // {{ $ap->nama }}</option>                        
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="field spaced" style="width: 350px">
                <label class="label">Nomor Polisi</label>
                <div class="control icons-left flex">
                    <input id="nopol-input" class="input auth" type="text" name="nopol" placeholder="Masukkan Nomor Polisi" autocomplete="off" disabled>
                </div>
                <ul id="rec-drop" class="recommend blue">
                </ul>
            </div>
            <div class="field spaced">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            <span class="icon">
                                <i class="mdi mdi-ballot"></i>
                            </span>
                            Detail Informasi
                        </p>
                    </header>
                    <div class="card-content">
                        <p class="info" id="info">No Data</p>
                        <table id="detail-informasi">
                            <tbody>
                                <tr>
                                    <th style="width: 250px;">Pemilik</th>
                                    <td id="nama"></td>
                                </tr>
                                <tr>
                                    <th>Nomor Polisi</th>
                                    <td id="nopol"></td>
                                </tr>
                                <tr>
                                    <th>Merk</th>
                                    <td id="merk"></td>
                                </tr>
                                <tr>
                                    <th>Jenis Kendaraan</th>
                                    <td id="jenis_kendaraan"></td>
                                </tr>
                                <tr>
                                    <th>Tahun Beli</th>
                                    <td id="thn_beli"></td>
                                </tr>
                                <tr>
                                    <th>Kapasitas Kursi</th>
                                    <td id="kapasitas_kursi"></td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td id="deskripsi"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="field grouped">
                <div class="control" style="margin-left: auto;">
                    <form id="form" action="{{ route('admin.check-in') }}" method="post">
                        @csrf
                        <button type="submit" id="submit-form" type="submit" class="button blue" disabled>
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('data-table-js')
  @include('layouts_admin._dataTables_js')
@endsection

@section('other-script')
    <script>
        let form = document.getElementById('form')
        let submitForm = document.getElementById('submit-form')

        let info = document.getElementById('info')
        let detailInfo = document.getElementById('detail-informasi')

        let area_parkir = document.getElementById('area_parkir')

        let nopolInput = document.getElementById('nopol-input')
        let recDrop = document.getElementById('rec-drop')
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        let nama = document.getElementById('nama')
        let nopol = document.getElementById('nopol')
        let merk = document.getElementById('merk')
        let jenis_kendaraan = document.getElementById('jenis_kendaraan')
        let thn_beli = document.getElementById('thn_beli')
        let kapasitas_kursi = document.getElementById('kapasitas_kursi')
        let deskripsi = document.getElementById('deskripsi')

        async function getNopol(url) {
            fetch(url, {
                method: 'GET',
                headers: {
                    'Content-Type' : 'application/json',
                    'Accept' : 'application/json',
                    "X-CSRF-Token": token
                }
            })
            .then(response => response.json())
            .then(result => {
                nopolInput.addEventListener('keyup', () => {
                    if(nopolInput.value.split('').length >= 0 ) {
                        filteredNopol(result)
                    }
                })

                nopolInput.addEventListener('focus', () => {
                    if(nopolInput.value.split('').length == 0 ) {
                        recDrop.innerHTML = ''
                        recDrop.style.display = 'block'
                        result.forEach(r => {
                            makeLi(r)
                        })
                    } else {
                        filteredNopol(result)
                    }
                })

                area_parkir.addEventListener('change', () => {
                    nopolInput.removeAttribute('disabled')
                })

                area_parkir.removeAttribute('disabled')
            })
        }

        function makeLi(text) {
            let li = document.createElement('li')
            li.classList.add('nestRecDrop')
            li.textContent = text

            li.addEventListener('click', function() {
                getDetail('/admin/transaksi/kendaraan/' + text)
                nopolInput.value = text
                submitForm.removeAttribute('disabled')

                info.style.display = 'none'
                detailInfo.style.display = 'block'
            })
            recDrop.append(li)
        }

        document.addEventListener('DOMContentLoaded', () => {
            getNopol('/admin/transaksi/nopol')

            window.addEventListener('click', e => {
                if(!e.target.classList.contains('nestRecDrop') && e.target.id != 'nopol-input') {
                    recDrop.style.display = 'none'
                }
            })
        })

        async function getDetail(url) {
            recDrop.style.display = 'none'
            fetch(url, {
                method: 'GET',
                headers: {
                    'Content-Type' : 'application/json',
                    'Accept' : 'application/json',
                    "X-CSRF-Token": token
                }
            })
            .then(response => response.json())
            .then(result => {
                console.log(result);
                changeDetail(result[0])
            })
        }

        function changeDetail(text) {
            form.action = ''

            nama.textContent = text['pemilik']
            nopol.textContent = text['nopol']
            merk.textContent = text['merk']
            jenis_kendaraan.textContent = text['jenis']['nama']
            thn_beli.textContent = text['thn_beli']
            kapasitas_kursi.textContent = text['kapasitas_kursi']
            deskripsi.textContent = text['deskripsi']

            form.action+= '/' + text['id'] + '/' + area_parkir.options[area_parkir.selectedIndex].value 
        }

        function filteredNopol(text) {
            recDrop.style.display = 'block'

            let newResult = text.filter(r => r.replaceAll(' ', '').toLowerCase().includes(nopolInput.value.replaceAll(' ', '').toLowerCase()))
            recDrop.innerHTML = ''

            newResult.forEach(nR => {
                makeLi(nR)
            });
        }
    </script>
@endsection
