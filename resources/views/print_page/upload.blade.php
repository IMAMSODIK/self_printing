<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Dokumen - Cetak Dokumen</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 (untuk icon) -->
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 0;
            position: relative;
            overflow-x: hidden;
        }

        /* Decorative elements */
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
            animation: rotate 30s linear infinite;
            z-index: 0;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .upload-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 30px;
            box-shadow: 0 30px 70px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 700px;
            width: 100%;
            margin: 0 auto;
            animation: slideUp 0.6s ease-out;
            position: relative;
            z-index: 1;
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
            padding: 30px 35px;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .card-header::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(50%, -50%);
        }

        .card-header h2 {
            margin: 0;
            font-weight: 700;
            font-size: 2.2rem;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .card-header h2 i {
            font-size: 2.5rem;
            opacity: 0.9;
        }

        .card-header p {
            margin: 10px 0 0;
            opacity: 0.9;
            font-size: 1.1rem;
            position: relative;
            z-index: 1;
            padding-left: 10px;
            border-left: 3px solid rgba(255,255,255,0.5);
        }

        .card-body {
            padding: 40px;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 30px;
            position: relative;
        }

        .form-label {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 10px;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-label i {
            color: #667eea;
            font-size: 1.2rem;
        }

        .form-label span {
            color: #dc3545;
            font-size: 1.2rem;
            margin-left: 2px;
        }

        /* Custom Select Styles */
        .custom-select-wrapper {
            position: relative;
        }

        .custom-select-wrapper::after {
            content: '\f078';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            pointer-events: none;
            font-size: 0.9rem;
        }

        .form-select-custom {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 15px;
            font-size: 1rem;
            color: #2d3748;
            background-color: white;
            transition: all 0.3s ease;
            appearance: none;
            cursor: pointer;
        }

        .form-select-custom:hover {
            border-color: #667eea;
            background-color: #fafaff;
        }

        .form-select-custom:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .printer-option {
            padding: 10px;
        }

        .printer-code {
            display: inline-block;
            background: #e2e8f0;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            color: #4a5568;
            margin-left: 10px;
        }

        /* File Upload Area - PERBAIKAN: Hanya satu style untuk file upload */
        .file-upload-area {
            border: 3px dashed #e2e8f0;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            background: #f8fafc;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .file-upload-area:hover {
            border-color: #667eea;
            background: #f0f4ff;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.2);
        }

        .file-upload-area.dragover {
            border-color: #667eea;
            background: #e6ecff;
            transform: scale(1.02);
        }

        .file-upload-icon {
            font-size: 4rem;
            color: #667eea;
            margin-bottom: 15px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .file-upload-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 10px;
        }

        .file-upload-subtitle {
            color: #718096;
            font-size: 0.95rem;
            margin-bottom: 15px;
        }

        .file-upload-formats {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .format-badge {
            background: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            color: #2d3748;
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .format-badge i {
            color: #667eea;
        }

        .format-badge:hover {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        .format-badge:hover i {
            color: white;
        }

        /* Hide default file input */
        #fileInput {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        /* Selected file info */
        .selected-file-info {
            margin-top: 15px;
            padding: 15px;
            background: #e6ecff;
            border-radius: 12px;
            display: none;
            align-items: center;
            gap: 15px;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .selected-file-info.show {
            display: flex;
        }

        .file-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }

        .file-details {
            flex: 1;
        }

        .file-name {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 3px;
            word-break: break-all;
        }

        .file-size {
            font-size: 0.85rem;
            color: #718096;
        }

        .remove-file {
            color: #dc3545;
            cursor: pointer;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .remove-file:hover {
            background: rgba(220, 53, 69, 0.1);
            transform: scale(1.1);
        }

        /* Next Button */
        .btn-next {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 16px 35px;
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
            margin-top: 20px;
        }

        .btn-next:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }

        .btn-next:active:not(:disabled) {
            transform: translateY(0);
        }

        .btn-next::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-next:hover::before {
            left: 100%;
        }

        .btn-next:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            background: linear-gradient(135deg, #a0aec0 0%, #718096 100%);
        }

        .btn-next i {
            transition: transform 0.3s ease;
        }

        .btn-next:hover:not(:disabled) i {
            transform: translateX(5px);
        }

        /* Loading state */
        .btn-next.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .btn-next.loading i {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .card-header {
                padding: 25px;
            }

            .card-header h2 {
                font-size: 1.8rem;
            }

            .card-header h2 i {
                font-size: 2rem;
            }

            .card-header p {
                font-size: 1rem;
            }

            .card-body {
                padding: 25px;
            }

            .file-upload-area {
                padding: 30px 20px;
            }

            .file-upload-icon {
                font-size: 3rem;
            }

            .file-upload-title {
                font-size: 1.1rem;
            }

            .format-badge {
                padding: 6px 15px;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 480px) {
            .card-header h2 {
                font-size: 1.5rem;
                flex-direction: column;
                text-align: center;
                gap: 5px;
            }

            .card-header p {
                text-align: center;
                border-left: none;
                padding-left: 0;
            }

            .file-upload-formats {
                flex-direction: row;
                justify-content: center;
            }

            .format-badge {
                padding: 6px 12px;
                font-size: 0.8rem;
            }

            .selected-file-info {
                flex-wrap: wrap;
            }

            .file-icon {
                width: 40px;
                height: 40px;
            }
        }

        /* Success animation */
        @keyframes checkmark {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .success-icon {
            color: #28a745;
            animation: checkmark 0.5s ease;
        }

        /* Printer info tooltip */
        .printer-info {
            display: inline-block;
            margin-left: 10px;
            color: #718096;
            cursor: help;
            position: relative;
        }

        .printer-info:hover .tooltip-text {
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
            transform: translateX(-50%) translateY(10px);
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

<div class="upload-card animate__animated animate__fadeIn">
    <div class="card-header">
        <h2>
            <i class="fas fa-cloud-upload-alt"></i>
            Upload Dokumen
        </h2>
        <p>
            <i class="fas fa-info-circle me-2"></i>
            Unggah dokumen Anda untuk memulai proses pencetakan
        </p>
    </div>
    
    <div class="card-body">
        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
            @csrf

            <!-- Printer Selection -->
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-print"></i>
                    Pilih Printer Box
                    <span>*</span>
                    <div class="printer-info">
                        <i class="fas fa-question-circle"></i>
                        <span class="tooltip-text">Pilih printer box yang tersedia</span>
                    </div>
                </label>
                
                <div class="custom-select-wrapper">
                    <select name="printer_box_id" class="form-select-custom" id="printerSelect" required>
                        <option value="" disabled selected>-- Pilih Printer Box --</option>
                        @foreach($printers as $printer)
                            <option value="{{ $printer->id }}" data-code="{{ $printer->printer_code }}">
                                {{ $printer->name }} 
                                <span class="printer-code">{{ $printer->printer_code }}</span>
                                @if(isset($printer->location))
                                    - {{ $printer->location }}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- File Upload Area - Hanya SATU area upload -->
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-file"></i>
                    Pilih File (PDF / Word)
                    <span>*</span>
                </label>
                
                <div class="file-upload-area" id="fileUploadArea">
                    <input type="file" name="file" id="fileInput" accept=".pdf,.doc,.docx,.txt" required>
                    
                    <div class="file-upload-icon">
                        <i class="fas fa-file-upload"></i>
                    </div>
                    
                    <div class="file-upload-title">
                        Drag & drop file Anda disini
                    </div>
                    
                    <div class="file-upload-subtitle">
                        atau klik untuk memilih file
                    </div>
                    
                    <div class="file-upload-formats">
                        <span class="format-badge">
                            <i class="fas fa-file-pdf"></i> PDF
                        </span>
                        <span class="format-badge">
                            <i class="fas fa-file-word"></i> DOC/DOCX
                        </span>
                        <span class="format-badge">
                            <i class="fas fa-file-alt"></i> TXT
                        </span>
                    </div>
                </div>

                <!-- Selected File Info -->
                <div class="selected-file-info" id="selectedFileInfo">
                    <div class="file-icon">
                        <i class="fas fa-file-pdf" id="fileTypeIcon"></i>
                    </div>
                    <div class="file-details">
                        <div class="file-name" id="fileName">filename.pdf</div>
                        <div class="file-size" id="fileSize">0 KB</div>
                    </div>
                    <div class="remove-file" id="removeFile" onclick="resetFileInput()">
                        <i class="fas fa-times"></i>
                    </div>
                </div>

                <!-- File validation message -->
                <div id="fileError" class="text-danger mt-2 small" style="display: none;">
                    <i class="fas fa-exclamation-circle me-1"></i>
                    <span></span>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-next" id="submitBtn">
                <i class="fas fa-arrow-right"></i>
                Lanjutkan ke Detail Cetak
                <i class="fas fa-chevron-right"></i>
            </button>
        </form>

        <!-- Security Note -->
        <div class="text-center mt-4">
            <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
                <small class="text-muted">
                    <i class="fas fa-lock me-1 text-success"></i>
                    File Anda aman & terenkripsi
                </small>
                <small class="text-muted">
                    <i class="fas fa-clock me-1 text-primary"></i>
                    Maksimal 10MB
                </small>
            </div>
        </div>
    </div>
</div>

<script>
// DOM Elements
const fileInput = document.getElementById('fileInput');
const fileUploadArea = document.getElementById('fileUploadArea');
const selectedFileInfo = document.getElementById('selectedFileInfo');
const fileName = document.getElementById('fileName');
const fileSize = document.getElementById('fileSize');
const fileTypeIcon = document.getElementById('fileTypeIcon');
const fileError = document.getElementById('fileError');
const submitBtn = document.getElementById('submitBtn');
const printerSelect = document.getElementById('printerSelect');

// Maximum file size (10MB)
const MAX_FILE_SIZE = 10 * 1024 * 1024; // 10MB in bytes

// Allowed file types
const ALLOWED_TYPES = [
    'application/pdf',
    'application/msword',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'text/plain'
];

// File Upload Area Events
fileUploadArea.addEventListener('click', () => {
    fileInput.click();
});

fileUploadArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    fileUploadArea.classList.add('dragover');
});

fileUploadArea.addEventListener('dragleave', () => {
    fileUploadArea.classList.remove('dragover');
});

fileUploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    fileUploadArea.classList.remove('dragover');
    
    if (e.dataTransfer.files.length) {
        fileInput.files = e.dataTransfer.files;
        handleFileSelect(e.dataTransfer.files[0]);
    }
});

// File Input Change Event
fileInput.addEventListener('change', (e) => {
    if (e.target.files.length) {
        handleFileSelect(e.target.files[0]);
    }
});

// Handle File Selection
function handleFileSelect(file) {
    // Validate file size
    if (file.size > MAX_FILE_SIZE) {
        showFileError(`File terlalu besar. Maksimal ${MAX_FILE_SIZE / (1024 * 1024)}MB`);
        resetFileInput();
        return;
    }

    // Validate file type
    if (!ALLOWED_TYPES.includes(file.type) && !file.name.match(/\.(pdf|doc|docx|txt)$/i)) {
        showFileError('Tipe file tidak didukung. Gunakan PDF, Word, atau TXT');
        resetFileInput();
        return;
    }

    // Clear any previous errors
    hideFileError();

    // Update file info
    fileName.textContent = file.name;
    fileSize.textContent = formatFileSize(file.size);

    // Update icon based on file type
    updateFileIcon(file.type, file.name);

    // Show selected file info
    selectedFileInfo.classList.add('show');
    fileUploadArea.style.borderColor = '#28a745';
    
    // Enable submit button (if printer is selected)
    validateForm();
}

// Format file size
function formatFileSize(bytes) {
    if (bytes < 1024) return bytes + ' B';
    if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
    return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
}

// Update file icon based on type
function updateFileIcon(fileType, fileName) {
    if (fileType === 'application/pdf' || fileName.endsWith('.pdf')) {
        fileTypeIcon.className = 'fas fa-file-pdf';
        fileTypeIcon.style.color = '#dc3545';
    } else if (fileType.includes('word') || fileName.match(/\.docx?$/i)) {
        fileTypeIcon.className = 'fas fa-file-word';
        fileTypeIcon.style.color = '#2b5797';
    } else {
        fileTypeIcon.className = 'fas fa-file-alt';
        fileTypeIcon.style.color = '#6c757d';
    }
}

// Reset file input
function resetFileInput() {
    fileInput.value = '';
    selectedFileInfo.classList.remove('show');
    fileUploadArea.style.borderColor = '#e2e8f0';
    hideFileError();
    validateForm();
}

// Show file error
function showFileError(message) {
    fileError.querySelector('span').textContent = message;
    fileError.style.display = 'block';
    fileUploadArea.style.borderColor = '#dc3545';
}

// Hide file error
function hideFileError() {
    fileError.style.display = 'none';
    fileUploadArea.style.borderColor = '#e2e8f0';
}

// Printer selection change
printerSelect.addEventListener('change', function() {
    validateForm();
});

// Validate form before submit
function validateForm() {
    const hasPrinter = printerSelect.value;
    const hasFile = fileInput.files.length > 0;
    
    submitBtn.disabled = !(hasPrinter && hasFile);
}

// Form submit handling
document.getElementById('uploadForm').addEventListener('submit', function(e) {
    if (submitBtn.disabled) {
        e.preventDefault();
        return;
    }
    
    // Add loading state
    submitBtn.classList.add('loading');
    submitBtn.innerHTML = '<i class="fas fa-spinner"></i> Memproses... <i class="fas fa-chevron-right"></i>';
});

// Prevent form resubmission on page refresh
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

// Initialize validation on page load
validateForm();
</script>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>