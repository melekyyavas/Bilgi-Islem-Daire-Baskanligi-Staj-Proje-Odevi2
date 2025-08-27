<?php
session_start();

// Database configuration (for demonstration purposes)
// In a real application, use proper database connection
$valid_users = [
    'admin@sakarya.bel.tr' => [
        'password' => 'admin123',
        'name' => 'Sistem Yöneticisi',
        'role' => 'admin'
    ],
    'user@sakarya.bel.tr' => [
        'password' => 'user123',
        'name' => 'Kullanıcı',
        'role' => 'user'
    ],
    'bilgiislem@sakarya.bel.tr' => [
        'password' => 'bilgi123',
        'name' => 'Bilgi İşlem Personeli',
        'role' => 'staff'
    ]
];

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = [
            'success' => false,
            'message' => 'Geçersiz e-posta formatı.'
        ];
        echo json_encode($response);
        exit;
    }
    
    // Check if user exists and password is correct
    if (isset($valid_users[$email]) && $valid_users[$email]['password'] === $password) {
        // Set session variables
        $_SESSION['user_id'] = $email;
        $_SESSION['user_name'] = $valid_users[$email]['name'];
        $_SESSION['user_role'] = $valid_users[$email]['role'];
        $_SESSION['logged_in'] = true;
        $_SESSION['login_time'] = time();
        
        // Set remember me cookie if requested
        if ($remember) {
            $token = bin2hex(random_bytes(32));
            setcookie('remember_token', $token, time() + (30 * 24 * 60 * 60), '/'); // 30 days
            // In a real application, store this token in database
        }
        
        // Log successful login
        logLogin($email, true, $_SERVER['REMOTE_ADDR']);
        
        $response = [
            'success' => true,
            'message' => 'Giriş başarılı! Yönlendiriliyorsunuz...',
            'redirect' => 'dashboard.php'
        ];
    } else {
        // Log failed login attempt
        logLogin($email, false, $_SERVER['REMOTE_ADDR']);
        
        $response = [
            'success' => false,
            'message' => 'E-posta veya şifre hatalı.'
        ];
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    setcookie('remember_token', '', time() - 3600, '/');
    header('Location: ../index.html');
    exit;
}

// Check if user is already logged in
function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

// Get current user info
function getCurrentUser() {
    if (isLoggedIn()) {
        return [
            'email' => $_SESSION['user_id'],
            'name' => $_SESSION['user_name'],
            'role' => $_SESSION['user_role']
        ];
    }
    return null;
}

// Simple login logging function
function logLogin($email, $success, $ip) {
    $log_file = 'login_log.txt';
    $timestamp = date('Y-m-d H:i:s');
    $status = $success ? 'SUCCESS' : 'FAILED';
    $log_entry = "[$timestamp] $status - Email: $email - IP: $ip\n";
    
    // In a real application, use proper database logging
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
}

// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');

// CSRF protection
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $response = [
            'success' => false,
            'message' => 'Güvenlik doğrulaması başarısız.'
        ];
        echo json_encode($response);
        exit;
    }
}

// Generate CSRF token
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş - Sakarya Büyükşehir Belediyesi</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h3 class="mb-0">
                            <i class="fas fa-lock me-2"></i>Personel Girişi
                        </h3>
                        <p class="mb-0 mt-2">Sakarya Büyükşehir Belediyesi</p>
                    </div>
                    <div class="card-body p-5">
                        <form id="loginForm" method="POST" novalidate>
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            
                            <div class="mb-4">
                                <label for="email" class="form-label">E-posta Adresi <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" id="email" name="email" required 
                                           placeholder="ornek@sakarya.bel.tr" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                                    <div class="invalid-feedback">
                                        Lütfen geçerli bir e-posta adresi giriniz.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label">Şifre <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                    <input type="password" class="form-control" id="password" name="password" required 
                                           placeholder="••••••••">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="invalid-feedback">
                                        Lütfen şifrenizi giriniz.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    Beni hatırla
                                </label>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                                    <i class="fas fa-sign-in-alt me-2"></i>Giriş Yap
                                </button>
                                <a href="#" class="text-muted small">Şifrenizi mi unuttunuz?</a>
                            </div>
                        </form>
                        
                        <hr class="my-4">
                        
                        <div class="text-center">
                            <p class="text-muted mb-3">Test Kullanıcıları:</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <small class="text-muted">
                                        <strong>Admin:</strong><br>
                                        admin@sakarya.bel.tr<br>
                                        admin123
                                    </small>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted">
                                        <strong>Kullanıcı:</strong><br>
                                        user@sakarya.bel.tr<br>
                                        user123
                                    </small>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted">
                                        <strong>Personel:</strong><br>
                                        bilgiislem@sakarya.bel.tr<br>
                                        bilgi123
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="../index.html" class="text-decoration-none">
                        <i class="fas fa-arrow-left me-2"></i>Ana Sayfaya Dön
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Form validation and submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            let isValid = true;
            
            // Reset validation
            email.classList.remove('is-invalid');
            password.classList.remove('is-invalid');
            
            // Email validation
            if (!email.value.trim()) {
                email.classList.add('is-invalid');
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
                email.classList.add('is-invalid');
                isValid = false;
            }
            
            // Password validation
            if (!password.value) {
                password.classList.add('is-invalid');
                isValid = false;
            }
            
            if (isValid) {
                // Show loading state
                const submitBtn = document.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Giriş yapılıyor...';
                submitBtn.disabled = true;
                
                // Submit form
                this.submit();
            }
        });
        
        // Password toggle
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
        
        // Auto-focus on email field
        document.getElementById('email').focus();
    </script>
</body>
</html>
