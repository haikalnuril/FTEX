@extends('components.template')
@section('title', 'Dashboard')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow-sm">
                    <div class="card-header">
                        DASHBOARD
                    </div>
                    <div class="card-body">
                        hello guys
                    </div>
                    <div class="container-fluid">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm align-middle text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th rowspan="2" class="align-middle">Tanggal</th>
                                        <th rowspan="2" class="align-middle">Umur</th>
                                        <th rowspan="2" class="align-middle">Populasi</th>
                                        <th colspan="2" class="align-middle">Deplesi</th>
                                        <th colspan="2" class="align-middle">Pakan</th>
                                        <th colspan="3" class="align-middle">Produksi Telur</th>
                                        <th colspan="2" class="align-middle">Retak</th>
                                        <th colspan="2" class="align-middle">Performa Produksi</th>
                                        <th rowspan="2" class="align-middle">FCR</th>
                                        <th rowspan="2" class="align-middle vertical-text">Keterangan</th>
                                    </tr>
                                    <tr>
                                        <th>Mati</th>
                                        <th>Afkir</th>
                                        <th>Total</th>
                                        <th>Gr/ekor</th>
                                        <th>Butir</th>
                                        <th>Berat</th>
                                        <th>Kg</th>
                                        <th>Butir</th>
                                        <th>Kg</th>
                                        <th>Gr/Butir</th>
                                        <th>HD%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Add your table data rows here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection