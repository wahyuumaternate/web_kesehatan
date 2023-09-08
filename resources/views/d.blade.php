@foreach ($clusters as $i => $cluster)
    @foreach ($cluster as $item)
        @foreach ($data2 as $j => $kecamatan)
            @if ($item == $kecamatan->id_cluster)
                @if ($i == 0 && $kecamatan->nama_kecamatan)
                    <h1 data-cluster="{{ $i }}" class="data">
                        Cluster {{ $i + 1 }} Kecamatan {{ $kecamatan->nama_kecamatan }}
                    </h1>
                @endif
                @if ($i == 1 && $kecamatan->nama_kecamatan)
                    <h1>
                        Cluster {{ $i + 1 }} Kecamatan {{ $kecamatan->nama_kecamatan }}
                    </h1>
                @endif
                @if ($i == 2 && $kecamatan->nama_kecamatan)
                    <h1>
                        Cluster {{ $i + 1 }} Kecamatan {{ $kecamatan->nama_kecamatan }}
                    </h1>
                @endif
                @if ($i == 3 && $kecamatan->nama_kecamatan)
                    <h1>
                        Cluster {{ $i + 1 }} Kecamatan {{ $kecamatan->nama_kecamatan }}
                    </h1>
                @endif
            @endif
        @endforeach
    @endforeach
@endforeach
