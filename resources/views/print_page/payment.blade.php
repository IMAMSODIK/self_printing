<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Dokumen Cetak</title>
    
    <!-- Midtrans Snap JS -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
    </script>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 (untuk icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 0;
        }

        .payment-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px 30px;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .card-header h3 {
            margin: 0;
            font-weight: 600;
            font-size: 1.8rem;
            position: relative;
            z-index: 1;
        }

        .card-header p {
            margin: 5px 0 0;
            opacity: 0.9;
            font-size: 1rem;
            position: relative;
            z-index: 1;
        }

        .card-body {
            padding: 30px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 15px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .detail-item:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            background: white;
        }

        .detail-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            font-size: 1.5rem;
        }

        .detail-content {
            flex: 1;
        }

        .detail-label {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .detail-value {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2d3748;
            margin: 0;
        }

        .total-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            border-radius: 15px;
            margin: 20px 0;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .total-label {
            font-size: 1.1rem;
            font-weight: 500;
            opacity: 0.9;
        }

        .total-amount {
            font-size: 2rem;
            font-weight: 700;
        }

        .btn-pay {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-pay:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-pay:active {
            transform: translateY(0);
        }

        .btn-pay::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-pay:hover::before {
            left: 100%;
        }

        .btn-pay i {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .btn-pay:hover i {
            transform: translateX(5px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .card-header {
                padding: 20px;
            }

            .card-header h3 {
                font-size: 1.5rem;
            }

            .card-body {
                padding: 20px;
            }

            .detail-item {
                padding: 12px;
            }

            .detail-icon {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .detail-value {
                font-size: 1rem;
            }

            .total-amount {
                font-size: 1.5rem;
            }

            .btn-pay {
                padding: 12px 25px;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .card-header h3 {
                font-size: 1.3rem;
            }

            .detail-item {
                flex-direction: column;
                text-align: center;
            }

            .detail-icon {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .total-section {
                flex-direction: column;
                text-align: center;
            }

            .total-amount {
                font-size: 1.8rem;
            }
        }

        /* Loading animation for button */
        .btn-pay.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .btn-pay.loading i {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Alert custom styles (optional) */
        .alert-custom {
            position: fixed;
            top: 20px;
            right: 20px;
            left: 20px;
            max-width: 400px;
            margin: 0 auto;
            z-index: 9999;
            animation: slideInRight 0.3s ease-out;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<div class="payment-card">
    <div class="card-header">
        <h3><i class="fas fa-credit-card me-2"></i>Detail Pembayaran</h3>
        <p>Konfirmasi dan selesaikan pembayaran Anda</p>
    </div>
    
    <div class="card-body">
        <!-- Detail Items -->
        <div class="detail-item">
            <div class="detail-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="detail-content">
                <div class="detail-label">Nama File</div>
                <div class="detail-value">{{ $doc->name }}</div>
            </div>
        </div>

        <div class="detail-item">
            <div class="detail-icon">
                <i class="fas fa-copy"></i>
            </div>
            <div class="detail-content">
                <div class="detail-label">Jumlah Halaman</div>
                <div class="detail-value">{{ $doc->count_print_page }} Halaman</div>
            </div>
        </div>

        <div class="detail-item">
            <div class="detail-icon">
                <i class="fas fa-print"></i>
            </div>
            <div class="detail-content">
                <div class="detail-label">Jenis Cetak</div>
                <div class="detail-value">{{ $doc->print_type }}</div>
            </div>
        </div>

        <!-- Total Section -->
        <div class="total-section">
            <span class="total-label">Total Pembayaran</span>
            <span class="total-amount">Rp {{ number_format($doc->total_price, 0, ',', '.') }}</span>
        </div>

        <!-- Pay Button -->
        <button id="pay-button" class="btn-pay">
            <i class="fas fa-lock"></i>
            Bayar Sekarang
            <i class="fas fa-arrow-right"></i>
        </button>

        <!-- Security Note -->
        <div class="text-center mt-3">
            <small class="text-muted">
                <i class="fas fa-shield-alt me-1"></i>
                Pembayaran aman dan terenkripsi
            </small>
        </div>
    </div>
</div>

<!-- Custom Alert Container (optional) -->
<div id="alertContainer" class="alert-custom" style="display: none;"></div>

<script>
document.getElementById('pay-button').onclick = function () {
    const payButton = this;
    
    // Add loading state
    payButton.classList.add('loading');
    payButton.innerHTML = '<i class="fas fa-spinner"></i> Memproses... <i class="fas fa-arrow-right"></i>';
    
    fetch('/pay/{{ $doc->id }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(res => {
        if (!res.ok) {
            throw new Error('Network response was not ok');
        }
        return res.json();
    })
    .then(data => {
        // Remove loading state
        payButton.classList.remove('loading');
        payButton.innerHTML = '<i class="fas fa-lock"></i> Bayar Sekarang <i class="fas fa-arrow-right"></i>';
        
        snap.pay(data.snap_token, {
            onSuccess: function(result){
                showAlert('success', 'Pembayaran berhasil! Terima kasih.');
                setTimeout(() => {
                    window.location = "/";
                }, 2000);
            },
            onPending: function(result){
                showAlert('warning', 'Menunggu pembayaran! Silakan selesaikan pembayaran Anda.');
            },
            onError: function(result){
                showAlert('error', 'Pembayaran gagal! Silakan coba lagi.');
            },
            onClose: function(){
                // Reset button if user closes popup
                payButton.innerHTML = '<i class="fas fa-lock"></i> Bayar Sekarang <i class="fas fa-arrow-right"></i>';
            }
        });
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('error', 'Terjadi kesalahan. Silakan coba lagi.');
        
        // Reset button
        payButton.classList.remove('loading');
        payButton.innerHTML = '<i class="fas fa-lock"></i> Bayar Sekarang <i class="fas fa-arrow-right"></i>';
    });
};

// Function to show custom alerts
function showAlert(type, message) {
    const alertContainer = document.getElementById('alertContainer');
    const icon = type === 'success' ? 'check-circle' : (type === 'warning' ? 'exclamation-triangle' : 'times-circle');
    const bgColor = type === 'success' ? '#28a745' : (type === 'warning' ? '#ffc107' : '#dc3545');
    
    alertContainer.innerHTML = `
        <div style="background: ${bgColor}; color: white; padding: 15px 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-${icon} fa-lg"></i>
            <span style="flex: 1;">${message}</span>
            <button onclick="this.parentElement.parentElement.style.display='none'" style="background: none; border: none; color: white; cursor: pointer; font-size: 1.2rem;">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    alertContainer.style.display = 'block';
    
    // Auto hide after 5 seconds
    setTimeout(() => {
        alertContainer.style.display = 'none';
    }, 5000);
}
</script>

<!-- Bootstrap JS Bundle (optional, for additional features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>