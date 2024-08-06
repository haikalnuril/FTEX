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
                    <div>
                        <a href="{{ route('create') }}" class="btn btn-primary">Tambah Data</a>
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
                                        <th colspan="3" class="align-middle">Performa Produksi</th>
                                        <th rowspan="2" class="align-middle">FCR</th>
                                        <th rowspan="2" class="align-middle vertical-text">Keterangan</th>
                                        <th rowspan="2" class="align-middle vertical-text">Action</th>
                                    </tr>
                                    <tr>
                                        <th>Mati</th>
                                        <th>Afkir</th>
                                        <th>Total</th>
                                        <th>Gr/ekor</th>
                                        <th>Butir</th>
                                        <th>+ / -</th>
                                        <th>Berat</th>
                                        <th>Butir</th>
                                        <th>Kg</th>
                                        <th>Gr/Butir</th>
                                        <th>HD%</th>
                                        <th>+ / - HD%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $previousProduksi = null;
                                        $previousHD = null;
                                    @endphp

                                    @foreach ($reports as $report)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ \Carbon\Carbon::parse($report->date)->format('d-m-Y') }}
                                            </td>
                                            <td>
                                                {{ $report->umur }}
                                            </td>
                                            <td>
                                                {{ $report->populasi }}
                                            </td>
                                            <td>
                                                {{ $report->mati }}
                                            </td>
                                            <td>
                                                {{ $report->afkir }}
                                            </td>
                                            <td>
                                                {{ $report->pakan }}
                                            </td>
                                            <td>
                                                @php
                                                    $result = ceil(($report->pakan / $report->populasi) * 1000);
                                                @endphp
                                                {{ $result }}
                                            </td>
                                            <td>
                                                <!-- This is the Butir column -->
                                                {{ $report->produksi }}
                                            </td>
                                            <td>
                                                <!-- This is the +/- column -->
                                                @if ($previousProduksi === null)
                                                    {{ $report->produksi }}
                                                @else
                                                    {{ $report->produksi - $previousProduksi }}
                                                @endif
                                            </td>
                                            <td>
                                                {{ $report->berat }}
                                            </td>
                                            <td>
                                                {{ $report->butir }}
                                            </td>
                                            <td>
                                                {{ $report->retakKg }}
                                            </td>
                                            <td>
                                                @php
                                                    $result = ceil(($report->berat * 1000 ) / $report->produksi );
                                                @endphp
                                                {{ $result }}
                                            </td>
                                            <td>
                                                {{ number_format(($report->produksi / $report->populasi) * 100, 2) }}%
                                            </td>
                                            <td>
                                                <!-- This is the +/- column -->
                                                @if ($previousHD === null)
                                                    {{ number_format(($report->produksi / $report->populasi) * 100, 2) }}%
                                                @else
                                                    {{ (number_format(($report->produksi / $report->populasi) * 100, 2)) - $previousHD }}%
                                                @endif
                                            </td>
                                            <td>
                                                {{ number_format($report->pakan / ($report->berat + $report->retakKg), 2) }}
                                            </td>
                                            <td>
                                                {{ $report->keterangan }}
                                            </td>
                                            <td>
                                                <form action="{{ route('destroy', $report->id) }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="badge bg-danger py-2 border-0" onclick="return confirm('Are you sure?')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                        </svg>
                                                    </button>  
                                                </form>
                                            </td>
                                        </tr>
                                        @php
                                            $previousProduksi = $report->produksi;
                                            $previousHD = number_format(($report->produksi / $report->populasi) * 100, 2)
                                        @endphp
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection