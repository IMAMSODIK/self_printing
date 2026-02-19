<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card">
        <div class="card-header">
            Detail Pembayaran
        </div>
        <div class="card-body">

            <p><b>Nama File:</b> {{ $doc->name }}</p>
            <p><b>Jumlah Halaman:</b> {{ $doc->count_print_page }}</p>
            <p><b>Jenis Cetak:</b> {{ $doc->print_type }}</p>
            <h4>Total: Rp {{ number_format($doc->total_price) }}</h4>

            <button id="pay-button" class="btn btn-primary mt-3">
                Bayar Sekarang
            </button>

        </div>
    </div>

</div>

<script>
document.getElementById('pay-button').onclick = function () {

    fetch('/pay/{{ $doc->id }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {

        snap.pay(data.snap_token, {
            onSuccess: function(result){
                alert("Pembayaran berhasil!");
                window.location = "/";
            },
            onPending: function(result){
                alert("Menunggu pembayaran!");
            },
            onError: function(result){
                alert("Pembayaran gagal!");
            }
        });

    });

};
</script>

</body>
</html>
