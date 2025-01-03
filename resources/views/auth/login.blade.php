<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .centered-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .custom-card {
            border-radius: 30px;
            /* Atur kelengkungan border */
            overflow: hidden;
            /* Supaya konten di dalam card mengikuti radius */
        }

        .custom-img {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
            object-fit: cover;
            /* Agar gambar tetap proporsional */
        }

        .form-section {
            padding-left: 20px;
            /* Tambahkan padding agar lebih dekat dengan gambar */
        }

        .text-pink {
            color: rgb(241, 72, 157);
            /* Warna pink */
        }

        .btn-pink {
            background-color: #ff69b4;
            /* Warna pink */
            color: white;
            /* Warna teks */
            border: none;
            /* Hilangkan border */
        }

        .btn-pink:hover {
            background-color: #ff1493;
            /* Warna pink lebih gelap untuk efek hover */
            color: white;
            /* Warna teks tetap putih */
        }

        .btn-pink:focus {
            box-shadow: 0 0 5px 2px #ff69b4;
            /* Efek fokus */
        }        
    </style>
</head>

<body>
    <div class="centered-container">
        <div class="card custom-card shadow-lg">
            <div class="row g-0">
                <!-- Gambar -->
                <div class="col-md-6">
                    <img src="{{ Vite::asset('resources/images/usecare.jpg') }}"
                        class="img-fluid h-100 rounded-start custom-img" alt="Login Image">
                </div>
                <!-- Form -->
                <div class="col-md-6">
                    <div class="card-body text-start p-5 form-section">
                        <h3 class="mb-4">Login</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-pink">Login</button>
                            </div>
                        </form>
                        <div class="mt-3">
                            <a href="{{ route('register') }}" class="text-decoration-none text-pink">Don't have an
                                account? Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>