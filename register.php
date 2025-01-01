
<?php
session_start();
include 'config.php';

// Redirect if already logged in
if(isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit;
}

if(isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $nama_admin = mysqli_real_escape_string($conn, $_POST['nama_admin']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Validasi
    $errors = array();
    
    // Cek username sudah ada atau belum
    $check_username = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    if(mysqli_num_rows($check_username) > 0) {
        $errors[] = "Username sudah digunakan!";
    }
    
    // Validasi password
    if(strlen($password) < 6) {
        $errors[] = "Password minimal 6 karakter!";
    }
    
    if($password !== $confirm_password) {
        $errors[] = "Konfirmasi password tidak cocok!";
    }
    
    // Validasi email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid!";
    }
    
    // Jika tidak ada error, simpan data
    if(empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO admin (username, password, nama_admin, email) 
                  VALUES ('$username', '$hashed_password', '$nama_admin', '$email')";
        
        if(mysqli_query($conn, $query)) {
            $success = "Registrasi berhasil! Silahkan login.";
        } else {
            $errors[] = "Terjadi kesalahan: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Administrator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="text-center mb-0">Register Administrator</h4>
                    </div>
                    <div class="card-body">
                        <?php if(isset($errors) && !empty($errors)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    <?php foreach($errors as $error): ?>
                                        <li><?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                        
                        <?php if(isset($success)): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $success; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required 
                                       value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                                <small class="text-muted">Minimal 6 karakter</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_admin" class="form-control" required
                                       value="<?php echo isset($_POST['nama_admin']) ? htmlspecialchars($_POST['nama_admin']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required
                                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                            </div>
                            <button type="submit" name="register" class="btn btn-primary w-100 mb-3">Register</button>
                            <div class="text-center">
                                Sudah punya akun? <a href="login.php">Login di sini</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>