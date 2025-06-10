<!DOCTYPE html>
<html>
<head>
    <title>Jadwal MotoGP 2025</title>
    <style>
        body { background: #f6f6f6; font-family: 'Montserrat', Arial, sans-serif; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; padding: 2rem; }
        .card {
            background: #fff;
            border-radius: 16px;
            padding: 1.2rem 1.5rem;
            position: relative;
            box-shadow: 0 2px 16px rgba(0,0,0,0.07);
        }
        .status {
            position: absolute; top: 1rem; right: 1rem;
            padding: 0.25rem 1rem;
            border-radius: 8px;
            font-size: 0.85em;
            font-weight: bold;
            color: #fff;
        }
        .status.UPNEXT { background: #f03d3d; }
        .status.FINISHED { background: #111; }
        .seri { color: #aaa; font-size: 1em; margin-bottom: 0.1em; }
        .date { font-size: 0.95em; color: #111; margin-bottom: 0.25em; font-weight: 500;}
        .negara {
            font-size: 1.6em; font-weight: 800; letter-spacing: 2px;
            margin-bottom: 0.15em; display: flex; align-items: center;
        }
        .negara img { width: 28px; margin-right: 0.6em; }
        .event { font-size: 1em; font-weight: 400; margin-bottom: 0.2em; }
        .desc { font-size: 0.95em; color: #777;}
    </style>
</head>
<body>
    <div class="grid">
        @foreach ($jadwal as $j)
            <div class="card">
                <div class="status {{ str_replace(' ', '', strtoupper($j->status)) }}">
                    {{ $j->status }}
                </div>
                <div class="seri">{{ $j->seri }}</div>
                <div class="date">
                    {{ \Carbon\Carbon::parse($j->tanggal_mulai)->format('d M') }} -
                    {{ \Carbon\Carbon::parse($j->tanggal_selesai)->format('d M') }}
                </div>
                <div class="negara">
                    @if($j->flag_url)
                        <img src="{{ $j->flag_url }}" alt="{{ $j->negara }}">
                    @endif
                    {{ strtoupper($j->negara) }}
                </div>
                <div class="event">{{ $j->nama_event }}</div>
                <div class="desc">{{ $j->deskripsi }}</div>
            </div>
        @endforeach
    </div>
</body>
</html>
