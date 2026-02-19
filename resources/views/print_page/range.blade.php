<!DOCTYPE html>
<html>
<head>
    <title>Atur Halaman Cetak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            Preview Dokumen
        </div>
        <div class="card-body">

            <iframe 
                src="{{ asset('storage/'.$doc->file_path) }}" 
                width="100%" 
                height="500px">
            </iframe>

        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            Atur Halaman Cetak
        </div>
        <div class="card-body">

            <form action="/range/{{ $doc->id }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label>Start Page (Kosongkan jika semua)</label>
                        <input type="number" name="start_page" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label>End Page (Kosongkan jika semua)</label>
                        <input type="number" name="end_page" class="form-control">
                    </div>
                </div>

                <div class="mt-3">
                    <label>Jenis Cetak</label>
                    <select name="print_type" class="form-control" required>
                        <option value="bw">Hitam Putih</option>
                        <option value="colored">Berwarna</option>
                    </select>
                </div>

                <button class="btn btn-success mt-3">Next ke Pembayaran</button>

            </form>

        </div>
    </div>

</div>

</body>
</html>
