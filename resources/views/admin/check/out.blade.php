@extends('admin.main')

@section('title', 'Check Out')

@section('data-table-css')
  @include('layouts_admin._dataTables_css')
@endsection

@section('breadcrumb')
    <ul>
      <li>Admin</li>
      <li>Check Out</li>
    </ul>
@endsection

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon">
                    <i class="mdi mdi-ballot"></i>
                </span>
                Check Out
            </p>
        </header>
        <div class="card-content">
            <div class="field spaced" style="width: 350px">
                <label class="label">Nomor Polisi</label>
                <div class="control icons-left flex">
                    <input id="nopol-input" class="input  type_admin="text" name="nopol" placeholder="Masukkan Nomor Polisi" autocomplete="off" disabled>
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
                                    <th style="width: 250px;">Tanggal</th>
                                    <td id="tanggal"></td>
                                </tr>
                                <tr>
                                    <th>Area Parkir</th>
                                    <td id="area-parkir"></td>
                                </tr>
                                <tr>
                                    <th>Pemilik</th>
                                    <td id="pemilik"></td>
                                </tr>
                                <tr>
                                    <th>Nomor Polisi</th>
                                    <td id="nopol"></td>
                                </tr>
                                <tr>
                                    <th>Mulai</th>
                                    <td id="mulai"></td>
                                </tr>
                                <tr>
                                    <th>Akhir</th>
                                    <td id="akhir"></td>
                                </tr>
                                <tr>
                                    <th>Biaya</th>
                                    <td id="biaya"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="field grouped">
                <div class="control" style="margin-left: auto;">
                    <form id="form" action="{{ route('admin.check-out') }}" method="post">
                        @csrf
                        <button id="submit-form" type="submit" class="button blue" disabled>
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

        let nopolInput = document.getElementById('nopol-input')
        let recDrop = document.getElementById('rec-drop')
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        let tanggal = document.getElementById('tanggal')
        let area_parkir = document.getElementById('area-parkir')
        let pemilik = document.getElementById('pemilik')
        let nopol = document.getElementById('nopol')
        let mulai = document.getElementById('mulai')
        let akhir = document.getElementById('akhir')
        let biaya = document.getElementById('biaya')

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
                console.log(result);
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
                nopolInput.removeAttribute('disabled')
            })
        }

        function makeLi(text) {
            let li = document.createElement('li')
            li.classList.add('nestRecDrop')
            li.textContent = text[1]

            li.addEventListener('click', function() {
                getDetail('/admin/transaksi/' + text[0])
                nopolInput.value = text[1]
                submitForm.removeAttribute('disabled')

                info.style.display = 'none'
                detailInfo.style.display = 'block'
            })
            recDrop.append(li)
        }

        document.addEventListener('DOMContentLoaded', () => {
            getNopol('/admin/transaksi/nopol/checked')

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
                console.log(result[0]);
                changeDetail(result[0])
            })
        }

        function changeDetail(text) {
            form.action = ''

            tanggal.textContent = text['tanggal']
            area_parkir.textContent = text['area_parkir']['nama']
            pemilik.textContent = text['kendaraan']['pemilik']
            nopol.textContent = text['kendaraan']['nopol']
            mulai.textContent = text['mulai']
            akhir.textContent = text['akhir']
            biaya.textContent = text['biaya']

            form.action+= '/' + text['id']
        }

        function filteredNopol(text) {
            recDrop.style.display = 'block'
            let newResult = text.filter(text => text[1].replaceAll(' ', '').toLowerCase().includes(nopolInput.value.replaceAll(' ', '').toLowerCase()))
            recDrop.innerHTML = ''
            newResult.forEach(nR => {
                makeLi(nR)
            });
        }
    </script>
@endsection