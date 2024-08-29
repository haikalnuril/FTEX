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
            </tr>
            @php
                $previousProduksi = $report->produksi;
                $previousHD = number_format(($report->produksi / $report->populasi) * 100, 2)
            @endphp
        @endforeach
        </tbody>
</table>