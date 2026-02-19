<!DOCTYPE html>
<html>
<head>
    <title>Upload Dokumen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Upload Dokumen
        </div>
        <div class="card-body">

            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Pilih Printer Box</label>
                    <select name="printer_box_id" class="form-control" required>
                        @foreach($printers as $printer)
                            <option value="{{ $printer->id }}">
                                {{ $printer->name }} ({{ $printer->printer_code }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Pilih File (PDF / Word)</label>
                    <input type="file" name="file" class="form-control" required>
                </div>

                <button class="btn btn-primary">Next</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
