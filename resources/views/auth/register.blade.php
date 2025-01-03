<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            overflow: hidden;
            width: 70%; /* Membuat card lebih lebar */
        }

        .custom-img {
            height: 100%; /* Memastikan gambar memenuhi seluruh area */
            width: 100%;
            object-fit: cover; /* Agar gambar tidak terdistorsi */
        }

        .form-section {
            padding: 40px; /* Memberikan padding lebih banyak */
        }

        .text-pink {
            color: rgb(241, 72, 157);
        }

        .btn-pink {
            background-color: #ff69b4;
            color: white;
            border: none;
        }

        .btn-pink:hover {
            background-color: #ff1493;
            color: white;
        }

        .btn-pink:focus {
            box-shadow: 0 0 5px 2px #ff69b4;
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
                        class="img-fluid h-100 custom-img" alt="Register Image">
                </div>
                <!-- Form -->
                <div class="col-md-6">
                    <div class="card-body text-start form-section">
                        <h3 class="mb-4">Register</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-pink">Register</button>
                            </div>
                        </form>
                        <div class="mt-3">
                            <a href="{{ route('login') }}" class="text-decoration-none text-pink">Already have an account? Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
