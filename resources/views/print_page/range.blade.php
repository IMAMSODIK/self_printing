<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Halaman Cetak</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6 -->
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
            padding: 30px 20px;
            margin: 0;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Card Styling */
        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 25px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
            margin-bottom: 25px;
            overflow: hidden;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
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
            padding: 20px 25px;
            border: none;
            font-weight: 600;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header i {
            font-size: 1.5rem;
        }

        .card-body {
            padding: 30px;
        }

        /* Preview Card */
        .preview-container {
            background: #f8f9fa;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .preview-header {
            background: white;
            padding: 15px 20px;
            border-bottom: 2px solid #e9ecef;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .preview-header i {
            color: #667eea;
            font-size: 1.2rem;
        }

        .preview-header span {
            color: #495057;
            font-weight: 500;
        }

        iframe {
            width: 100%;
            height: 500px;
            border: none;
            display: block;
        }

        /* Form Styling */
        .form-section {
            padding: 10px 0;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .col-md-6 {
            flex: 0 0 calc(50% - 20px);
            max-width: calc(50% - 20px);
            margin: 0 10px;
        }

        /* Input Field Styling */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #495057;
            font-weight: 500;
            font-size: 0.95rem;
        }

        label i {
            color: #667eea;
            margin-right: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:hover {
            border-color: #667eea;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        /* Hint text */
        .form-text {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 5px;
        }

        /* Select Styling */
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236c757d' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
        }

        /* Button Styling */
        .btn {
            padding: 14px 30px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-success {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            width: 100%;
            margin-top: 20px;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(72, 187, 120, 0.3);
        }

        .btn-success:active {
            transform: translateY(0);
        }

        .btn-success i {
            font-size: 1.1rem;
        }

        /* Info Badge */
        .info-badge {
            background: #e9ecef;
            border-radius: 20px;
            padding: 3px 10px;
            font-size: 0.8rem;
            color: #495057;
            margin-left: 10px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .card-body {
                padding: 20px;
            }

            .col-md-6 {
                flex: 0 0 calc(100% - 20px);
                max-width: calc(100% - 20px);
            }

            iframe {
                height: 350px;
            }

            .card-header {
                padding: 15px 20px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .preview-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn {
                padding: 12px 20px;
            }

            iframe {
                height: 250px;
            }
        }

        /* Additional Styling */
        .text-muted {
            color: #6c757d;
        }

        .mt-3 {
            margin-top: 20px;
        }

        .mt-4 {
            margin-top: 25px;
        }

        .mt-5 {
            margin-top: 30px;
        }

        .mb-2 {
            margin-bottom: 10px;
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        /* Separator */
        .separator {
            height: 2px;
            background: linear-gradient(to right, transparent, #e1e5e9, transparent);
            margin: 25px 0;
        }

        /* File Info */
        .file-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 10px 15px;
            margin-top: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px dashed #667eea;
        }

        .file-info i {
            color: #667eea;
        }

        .file-info span {
            color: #495057;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Preview Card -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-eye"></i>
                Preview Dokumen
                <span class="info-badge">
                    <i class="fas fa-file-pdf"></i> PDF
                </span>
            </div>
            <div class="card-body">
                <div class="preview-container">
                    <div class="preview-header">
                        <i class="fas fa-file-alt"></i>
                        <span>{{ $doc->name ?? 'Dokumen' }}</span>
                    </div>
                    <iframe
                        src="https://docs.google.com/gview?url={{ urlencode(asset('storage/' . $doc->file_path)) }}&embedded=true"
                        style="width:100%; height:600px;">
                    </iframe>

                </div>

                <!-- File Info -->
                <div class="file-info">
                    <i class="fas fa-info-circle"></i>
                    <span>Gunakan scroll untuk melihat dokumen secara lengkap</span>
                </div>
            </div>
        </div>

        <!-- Print Settings Card -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-sliders-h"></i>
                Atur Halaman Cetak
            </div>
            <div class="card-body">

                <form action="/range/{{ $doc->id }}" method="POST">
                    @csrf

                    <!-- Page Range Section -->
                    <div class="form-section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        <i class="fas fa-play"></i>
                                        Start Page
                                    </label>
                                    <input type="number" name="start_page" class="form-control"
                                        placeholder="Kosongkan jika semua" min="1">
                                    <small class="form-text">
                                        <i class="fas fa-info-circle"></i>
                                        Kosongkan untuk mulai dari halaman 1
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        <i class="fas fa-stop"></i>
                                        End Page
                                    </label>
                                    <input type="number" name="end_page" class="form-control"
                                        placeholder="Kosongkan jika semua" min="1">
                                    <small class="form-text">
                                        <i class="fas fa-info-circle"></i>
                                        Kosongkan untuk sampai halaman terakhir
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Separator -->
                    <div class="separator"></div>

                    <!-- Print Type Section -->
                    <div class="form-section">
                        <div class="form-group">
                            <label>
                                <i class="fas fa-print"></i>
                                Jenis Cetak
                            </label>
                            <select name="print_type" class="form-control" required>
                                <option value="bw">Hitam Putih</option>
                                <option value="colored">Berwarna</option>
                            </select>
                            <small class="form-text">
                                <i class="fas fa-paint-brush"></i>
                                Pilih jenis cetak yang diinginkan
                            </small>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-credit-card"></i>
                        Next ke Pembayaran
                        <i class="fas fa-arrow-right"></i>
                    </button>

                </form>

                <!-- Additional Info -->
                <div class="text-center mt-4">
                    <small class="text-muted">
                        <i class="fas fa-lock"></i>
                        Data pengaturan akan disimpan dengan aman
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional, for additional features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Optional: Add smooth scroll to preview
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Optional: Add input validation
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('input', function() {
                if (this.value < 1 && this.value !== '') {
                    this.value = 1;
                }
            });
        });
    </script>

</body>

</html>
