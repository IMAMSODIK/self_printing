<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Halaman Cetak - Print Settings</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 30px 20px;
            margin: 0;
            position: relative;
        }

        /* Decorative background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.1"><path d="M10 10 L90 10 L90 90 L10 90 Z" fill="none" stroke="white" stroke-width="2"/><path d="M20 20 L80 20 L80 80 L20 80 Z" fill="none" stroke="white" stroke-width="2"/></svg>');
            background-size: 50px 50px;
            pointer-events: none;
            z-index: 0;
        }

        .container {
            max-width: 1400px;
            position: relative;
            z-index: 1;
        }

        /* Card Styles */
        .print-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 30px;
            box-shadow: 0 30px 70px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            margin-bottom: 25px;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 30px;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .card-header h3 {
            margin: 0;
            font-weight: 600;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            z-index: 1;
        }

        .card-header h3 i {
            font-size: 1.8rem;
            opacity: 0.9;
        }

        .card-header::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .card-body {
            padding: 30px;
        }

        /* Document Preview Section */
        .preview-wrapper {
            background: #f8f9fa;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: inset 0 2px 10px rgba(0,0,0,0.05);
        }

        .preview-toolbar {
            background: white;
            padding: 15px 20px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
        }

        .preview-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .file-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .page-info {
            color: #718096;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .preview-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .preview-controls button {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: white;
            color: #4a5568;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .preview-controls button:hover {
            background: #667eea;
            color: white;
            border-color: #667eea;
            transform: translateY(-2px);
        }

        .preview-controls button:active {
            transform: translateY(0);
        }

        .iframe-container {
            position: relative;
            width: 100%;
            height: 500px;
            background: #2d3748;
        }

        .iframe-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .preview-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .iframe-container:hover .preview-overlay {
            opacity: 1;
        }

        .preview-overlay span {
            background: rgba(255,255,255,0.9);
            padding: 10px 25px;
            border-radius: 50px;
            color: #2d3748;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Print Settings Section */
        .settings-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
        }

        .settings-header {
            background: #f8f9fa;
            padding: 20px 30px;
            border-bottom: 2px solid #e2e8f0;
        }

        .settings-header h4 {
            margin: 0;
            color: #2d3748;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .settings-body {
            padding: 30px;
        }

        /* Page Range Section */
        .range-section {
            background: linear-gradient(145deg, #ffffff, #f8f9fa);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 25px;
            border: 1px solid #e2e8f0;
        }

        .range-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            color: #2d3748;
            font-weight: 600;
        }

        .range-title i {
            color: #667eea;
            font-size: 1.3rem;
        }

        .range-inputs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper label {
            display: block;
            margin-bottom: 10px;
            color: #4a5568;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .input-wrapper label i {
            color: #667eea;
            margin-right: 8px;
        }

        .input-field {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .input-field:hover {
            border-color: #667eea;
        }

        .input-field:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .input-field:disabled {
            background: #f1f5f9;
            cursor: not-allowed;
        }

        .range-helper {
            margin-top: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .quick-range {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quick-range button {
            padding: 8px 20px;
            border: 1px solid #e2e8f0;
            background: white;
            border-radius: 50px;
            color: #4a5568;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .quick-range button:hover {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        .range-info {
            color: #718096;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Print Type Selection */
        .print-type-section {
            background: linear-gradient(145deg, #ffffff, #f8f9fa);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 25px;
            border: 1px solid #e2e8f0;
        }

        .print-type-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            color: #2d3748;
            font-weight: 600;
        }

        .print-type-title i {
            color: #667eea;
            font-size: 1.3rem;
        }

        .print-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .print-option {
            position: relative;
            cursor: pointer;
        }

        .print-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .option-card {
            border: 2px solid #e2e8f0;
            border-radius: 20px;
            padding: 25px 20px;
            text-align: center;
            transition: all 0.3s ease;
            background: white;
        }

        .option-card:hover {
            border-color: #667eea;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.2);
        }

        input[type="radio"]:checked + .option-card {
            border-color: #667eea;
            background: linear-gradient(145deg, #f0f4ff, #ffffff);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .option-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            transition: all 0.3s ease;
        }

        .print-option:hover .option-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .option-title {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .option-price {
            color: #667eea;
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 5px;
        }

        .option-desc {
            color: #718096;
            font-size: 0.9rem;
        }

        /* Price Summary */
        .price-summary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 25px;
            color: white;
            margin-bottom: 25px;
        }

        .price-summary h5 {
            margin: 0 0 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .price-details {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .price-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .price-item:last-child {
            border-bottom: none;
        }

        .price-label {
            display: flex;
            align-items: center;
            gap: 8px;
            opacity: 0.9;
        }

        .price-value {
            font-weight: 600;
            font-size: 1.2rem;
        }

        .total-price {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid rgba(255,255,255,0.3);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1.3rem;
            font-weight: 700;
        }

        /* Next Button */
        .btn-next {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 18px 35px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.2rem;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .btn-next:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.4);
        }

        .btn-next:active {
            transform: translateY(0);
        }

        .btn-next::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn-next:hover::before {
            left: 100%;
        }

        .btn-next i {
            transition: transform 0.3s ease;
        }

        .btn-next:hover i {
            transform: translateX(5px);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .range-inputs {
                grid-template-columns: 1fr;
            }
            
            .preview-toolbar {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .card-header h3 {
                font-size: 1.3rem;
            }

            .card-body {
                padding: 20px;
            }

            .print-options {
                grid-template-columns: 1fr;
            }

            .quick-range {
                flex-wrap: wrap;
            }

            .iframe-container {
                height: 350px;
            }
        }

        @media (max-width: 480px) {
            .preview-info {
                flex-direction: column;
                align-items: flex-start;
            }

            .range-helper {
                flex-direction: column;
                align-items: flex-start;
            }

            .option-card {
                padding: 20px 15px;
            }

            .option-icon {
                width: 60px;
                height: 60px;
                font-size: 2rem;
            }
        }

        /* Loading State */
        .loading {
            position: relative;
            pointer-events: none;
            opacity: 0.7;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 30px;
            height: 30px;
            margin: -15px 0 0 -15px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Tooltip */
        .tooltip-icon {
            display: inline-block;
            margin-left: 8px;
            color: #718096;
            cursor: help;
            position: relative;
        }

        .tooltip-icon:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
            transform: translateY(0);
        }

        .tooltip-text {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(-10px);
            background: #2d3748;
            color: white;
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 0.85rem;
            white-space: nowrap;
            transition: all 0.3s ease;
            z-index: 10;
            pointer-events: none;
        }

        .tooltip-text::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border-width: 5px;
            border-style: solid;
            border-color: #2d3748 transparent transparent transparent;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Document Preview Card -->
    <div class="print-card animate__animated animate__fadeInUp">
        <div class="card-header">
            <h3>
                <i class="fas fa-eye"></i>
                Preview Dokumen
            </h3>
        </div>
        <div class="card-body">
            <div class="preview-wrapper">
                <div class="preview-toolbar">
                    <div class="preview-info">
                        <span class="file-badge">
                            <i class="fas fa-file-pdf"></i>
                            {{ $doc->name ?? 'Dokumen' }}
                        </span>
                        <span class="page-info">
                            <i class="fas fa-copy"></i>
                            Total Halaman: <strong>{{ $doc->total_pages ?? '?' }}</strong>
                        </span>
                    </div>
                    <div class="preview-controls">
                        <button onclick="zoomOut()" title="Perkecil">
                            <i class="fas fa-search-minus"></i>
                        </button>
                        <button onclick="zoomIn()" title="Perbesar">
                            <i class="fas fa-search-plus"></i>
                        </button>
                        <button onclick="fullscreen()" title="Fullscreen">
                            <i class="fas fa-expand"></i>
                        </button>
                    </div>
                </div>
                <div class="iframe-container" id="iframeContainer">
                    <iframe 
                        src="{{ asset('storage/'.$doc->file_path) }}#toolbar=0&navpanes=0" 
                        id="pdfPreview"
                        title="Preview Dokumen">
                    </iframe>
                    <div class="preview-overlay">
                        <span>
                            <i class="fas fa-hand-pointer"></i>
                            Klik untuk scroll
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Settings Card -->
    <div class="print-card animate__animated animate__fadeInUp animate__delay-1s">
        <div class="card-header">
            <h3>
                <i class="fas fa-sliders-h"></i>
                Atur Halaman Cetak
            </h3>
        </div>
        <div class="card-body">
            <form action="/range/{{ $doc->id }}" method="POST" id="printForm">
                @csrf

                <!-- Page Range Section -->
                <div class="range-section">
                    <div class="range-title">
                        <i class="fas fa-layer-group"></i>
                        <span>Rentang Halaman</span>
                        <div class="tooltip-icon">
                            <i class="fas fa-question-circle"></i>
                            <span class="tooltip-text">Kosongkan jika ingin mencetak semua halaman</span>
                        </div>
                    </div>

                    <div class="range-inputs">
                        <div class="input-wrapper">
                            <label>
                                <i class="fas fa-play"></i>
                                Halaman Awal
                            </label>
                            <input type="number" 
                                   name="start_page" 
                                   class="input-field" 
                                   id="startPage"
                                   min="1" 
                                   :max="totalPages"
                                   placeholder="Contoh: 1">
                            <small class="text-muted">Kosongkan untuk mulai dari halaman 1</small>
                        </div>

                        <div class="input-wrapper">
                            <label>
                                <i class="fas fa-stop"></i>
                                Halaman Akhir
                            </label>
                            <input type="number" 
                                   name="end_page" 
                                   class="input-field" 
                                   id="endPage"
                                   min="1" 
                                   :max="totalPages"
                                   placeholder="Contoh: 10">
                            <small class="text-muted">Kosongkan untuk sampai halaman terakhir</small>
                        </div>
                    </div>

                    <div class="range-helper">
                        <div class="quick-range">
                            <span class="text-muted">Quick Range:</span>
                            <button type="button" onclick="setRange('all')">
                                <i class="fas fa-copy"></i> Semua
                            </button>
                            <button type="button" onclick="setRange('odd')">
                                <i class="fas fa-hashtag"></i> Ganjil
                            </button>
                            <button type="button" onclick="setRange('even')">
                                <i class="fas fa-hashtag"></i> Genap
                            </button>
                            <button type="button" onclick="setRange('first')">
                                <i class="fas fa-fast-backward"></i> Halaman 1
                            </button>
                        </div>
                        <div class="range-info" id="pageCountInfo">
                            <i class="fas fa-calculator"></i>
                            <span>Total halaman yang akan dicetak: <strong id="selectedPageCount">0</strong></span>
                        </div>
                    </div>
                </div>

                <!-- Print Type Section -->
                <div class="print-type-section">
                    <div class="print-type-title">
                        <i class="fas fa-print"></i>
                        <span>Jenis Cetak</span>
                    </div>

                    <div class="print-options">
                        <label class="print-option">
                            <input type="radio" name="print_type" value="bw" checked onchange="updatePrice()">
                            <div class="option-card">
                                <div class="option-icon">
                                    <i class="fas fa-circle"></i>
                                </div>
                                <div class="option-title">Hitam Putih</div>
                                <div class="option-price">Rp 500<span style="font-size:0.9rem">/hal</span></div>
                                <div class="option-desc">Ekonomis & cepat</div>
                            </div>
                        </label>

                        <label class="print-option">
                            <input type="radio" name="print_type" value="colored" onchange="updatePrice()">
                            <div class="option-card">
                                <div class="option-icon">
                                    <i class="fas fa-palette"></i>
                                </div>
                                <div class="option-title">Berwarna</div>
                                <div class="option-price">Rp 2000<span style="font-size:0.9rem">/hal</span></div>
                                <div class="option-desc">Full color berkualitas</div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Price Summary -->
                <div class="price-summary" id="priceSummary">
                    <h5>
                        <i class="fas fa-file-invoice"></i>
                        Ringkasan Biaya
                    </h5>
                    <div class="price-details">
                        <div class="price-item">
                            <span class="price-label">
                                <i class="fas fa-copy"></i>
                                Jumlah Halaman
                            </span>
                            <span class="price-value" id="totalPages">0 hal</span>
                        </div>
                        <div class="price-item">
                            <span class="price-label">
                                <i class="fas fa-paint-brush"></i>
                                Harga per Halaman
                            </span>
                            <span class="price-value" id="pricePerPage">Rp 500</span>
                        </div>
                        <div class="total-price">
                            <span>Total</span>
                            <span id="totalPrice">Rp 0</span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-3 flex-wrap">
                    <button type="button" class="btn-next flex-grow-1" onclick="submitForm()">
                        <i class="fas fa-credit-card"></i>
                        Lanjut ke Pembayaran
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    
                    <button type="button" class="btn-next" style="background: linear-gradient(135deg, #48bb78 0%, #38a169 100%); width: auto; min-width: 200px;" onclick="calculatePrice()">
                        <i class="fas fa-calculator"></i>
                        Hitung Ulang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Variables
let totalPages = {{ $doc->total_pages ?? 100 }}; // Replace with actual total pages
const bwPrice = 500;
const colorPrice = 2000;

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    updatePageCount();
    updatePrice();
    
    // Add input listeners
    document.getElementById('startPage').addEventListener('input', updatePageCount);
    document.getElementById('endPage').addEventListener('input', updatePageCount);
});

// Update page count
function updatePageCount() {
    const start = parseInt(document.getElementById('startPage').value) || 1;
    const end = parseInt(document.getElementById('endPage').value) || totalPages;
    
    let count = 0;
    if (start && end) {
        count = Math.max(0, Math.min(end, totalPages) - Math.max(start, 1) + 1);
    } else if (start) {
        count = totalPages - Math.max(start, 1) + 1;
    } else if (end) {
        count = Math.min(end, totalPages);
    } else {
        count = totalPages;
    }
    
    count = Math.max(0, Math.min(count, totalPages));
    document.getElementById('selectedPageCount').textContent = count;
    document.getElementById('totalPages').textContent = count + ' hal';
    
    updatePrice();
}

// Update price
function updatePrice() {
    const pages = parseInt(document.getElementById('selectedPageCount').textContent) || 0;
    const isColor = document.querySelector('input[name="print_type"]:checked').value === 'colored';
    const pricePerPage = isColor ? colorPrice : bwPrice;
    const total = pages * pricePerPage;
    
    document.getElementById('pricePerPage').textContent = `Rp ${formatNumber(pricePerPage)}`;
    document.getElementById('totalPrice').textContent = `Rp ${formatNumber(total)}`;
}

// Format number
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Set range
function setRange(type) {
    const startInput = document.getElementById('startPage');
    const endInput = document.getElementById('endPage');
    
    switch(type) {
        case 'all':
            startInput.value = '';
            endInput.value = '';
            break;
        case 'odd':
            startInput.value = '1';
            endInput.value = '';
            break;
        case 'even':
            startInput.value = '2';
            endInput.value = '';
            break;
        case 'first':
            startInput.value = '1';
            endInput.value = '1';
            break;
    }
    
    updatePageCount();
}

// Calculate price
function calculatePrice() {
    updatePageCount();
    updatePrice();
    
    // Show calculation animation
    const summary = document.getElementById('priceSummary');
    summary.style.transform = 'scale(1.02)';
    setTimeout(() => {
        summary.style.transform = 'scale(1)';
    }, 200);
}

// Submit form
function submitForm() {
    const form = document.getElementById('printForm');
    const btn = event.target.closest('button');
    
    // Validate
    const pages = parseInt(document.getElementById('selectedPageCount').textContent);
    if (pages <= 0) {
        alert('Pilih minimal 1 halaman untuk dicetak!');
        return;
    }
    
    // Add loading state
    btn.classList.add('loading');
    btn.disabled = true;
    
    // Submit form
    form.submit();
}

// Preview controls
function zoomIn() {
    const iframe = document.getElementById('pdfPreview');
    iframe.style.width = '120%';
    iframe.style.height = '120%';
}

function zoomOut() {
    const iframe = document.getElementById('pdfPreview');
    iframe.style.width = '100%';
    iframe.style.height = '100%';
}

function fullscreen() {
    const container = document.getElementById('iframeContainer');
    if (container.requestFullscreen) {
        container.requestFullscreen();
    }
}

// Validate inputs
document.getElementById('startPage').addEventListener('change', function() {
    if (this.value && parseInt(this.value) < 1) {
        this.value = 1;
    }
    if (this.value && parseInt(this.value) > totalPages) {
        this.value = totalPages;
    }
});

document.getElementById('endPage').addEventListener('change', function() {
    if (this.value && parseInt(this.value) < 1) {
        this.value = 1;
    }
    if (this.value && parseInt(this.value) > totalPages) {
        this.value = totalPages;
    }
});

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl+Enter to submit
    if (e.ctrlKey && e.key === 'Enter') {
        e.preventDefault();
        submitForm();
    }
    
    // Esc to reset
    if (e.key === 'Escape') {
        setRange('all');
    }
});

// Warn before leaving if changes made
let formChanged = false;
document.getElementById('printForm').addEventListener('input', function() {
    formChanged = true;
});

window.addEventListener('beforeunload', function(e) {
    if (formChanged) {
        e.preventDefault();
        e.returnValue = '';
    }
});
</script>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>