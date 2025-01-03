<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Social Media Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #E6D9F3;

      font-family: Comic Sans MS;
    }

    .main-container {
      display: flex;
      justify-content: center;
      gap: 20px;
      padding: 20px;
    }

    .sidebar,
    .trending {
      width: 250px;
      background-color: #ffecf2;
      padding: 20px;
      border-radius: 10px;
      color: #fff;
    }

    .feed {
      flex: 1;
      max-width: 600px;
      color: #fff;
      background-color: #9A74C3;
      padding: 20px;
    }

    .post {
      background-color: #D6C3E6;
      color: #8e5a7f;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 15px;
    }

    .post img {
      max-width: 100%;
      border-radius: 10px;
    }

    .trending ul {
      list-style: none;
      padding: 0;
    }

    .trending ul li {
      background-color: transparent;
      color: #ff8fa4;
      padding: 5px 0;
    }

    .nav-item-custom {
      background-color: #f9f4ef;
      border: 1px solid #e5dac9;
      border-radius: 10px;
      padding: 10px;
      display: flex;
      align-items: center;
      text-decoration: none;
      color: #000;
      margin-bottom: 10px;
    }

    .nav-item-custom svg {
      margin-right: 8px;
      /* Jarak ikon dengan teks */
    }

    .nav-item-custom:hover {
      background-color: #ece1d5;
    }

    .nav-text {
      color: #fff;
      font-size: 14px;
      font-family: Arial, sans-serif;
    }
  </style>
</head>

<body>
  @section('content')
  @include('layouts.navbar') <!-- Memasukkan Navbar -->
  <div class="container mt-5">
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    <p>Here is the index page for posts.</p>
  </div>
  @endsection
  <div class="main-container">
    <!-- Sidebar -->
    <nav class="sidebar">
      {{-- <table>
        <tr>
          <td>
            <div class="col-6 text-center">
              <img src="{{ asset('images/inilogo.jpeg') }}" alt="Logo UsCare" class="img-fluid">
            </div>
          </td>
          <td>
            <!-- Bagian Teks -->
            <div class="col-6 text-center">
              <h3 class="m-0">UsCare</h3>
            </div>
          </td>
        </tr>
      </table> --}}
      <div class="d-flex justify-content-center align-items-center">
        <img src="{{ asset('images/inilogo.jpeg') }}" alt="Logo UsCare" class="img-fluid"
          style="width: 200px; height: 200px;">
      </div>
      <hr>
      <ul class="nav flex-column">
        <li>
          <a href="#" class="nav-item-custom">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="bi bi-house-door-fill" viewBox="0 0 16 16">
              <path
                d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
            </svg>
            Home
          </a>
        </li>
        <li>
          <!-- Tombol Logout dengan ikon -->
          <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="nav-item-custom btn btn-link"
              style="text-decoration:none; border: 1px solid #ddd; padding: 9px 70px; ">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z" />
              </svg>
              Logout
            </button>
          </form>
        </li>

        <li>
          <a href="https://www.lapor.go.id/instansi/kementerian-pemberdayaan-perempuan-dan-perlindungan-anak"
            class="nav-item-custom">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send"
              viewBox="0 0 16 16">
              <path
                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
            </svg>
            Link Pelaporan
          </a>
        </li>
        <li>
          <a href="https://www.instagram.com/us_care/profilecard/?igsh=NjB3ZzVxM2hhcjBy" class="nav-item-custom">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram"
              viewBox="0 0 16 16">
              <path
                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
            </svg>
            Profil UsCare
          </a>
        </li>
        <li class="nav-text p-3 rounded" style="background-color: #6b8ed4; border-left: 5px solid #007bff;">
          "A woman in any form shall be celebrated and honored, be it, a sister or a wife or a mother or any other
          form."
          <br>
          <small>- Amitabh Bachchan</small>
        </li>
      </ul>
    </nav>

    <!-- Main Feed -->
    <main class="feed align-items-center">
      <div class="container mt-3">
        <div class="row">
          <div class="col-12 text-center">
            <h1><b>#TemanPeduli</b></h1>
          </div>
        </div>
      </div>

      <!-- Input Form -->
      <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="post">
          <h5>Create a new post</h5>
          <div class="mb-3">
            <textarea id="postContent" class="form-control" rows="3" placeholder="What's happening?"
              name="content"></textarea>
          </div>
          <div class="mb-3">
            <input id="postImage" class="form-control" type="file" accept="image/*" name="image">
          </div>
          <button id="addPostBtn" class="btn btn-primary">Post</button>
        </div>
      </form>

      <!-- Posts Section -->
      <div id="postsContainer">
        <!-- Existing Post -->
        <div class="post">
          <strong>You</strong> <small class="text-muted">Just now</small>
          <p>Example post content</p>
        </div>
      </div>
    </main>

    <!-- Trending Section -->
<aside class="trending" style="color: #81609d">
    <h5>ARTIKEL</h5>
    <ul>
        <li><a
                href="https://www.alodokter.com/perhatikan-hal-hal-berikut-jika-anda-mengalami-pelecehan-seksual">
                Tips Menghadapi Pelecehan Seksual yang Perlu Diketahui</a></li>
        <li><a
                href="https://www.klikdokter.com/psikologi/kesehatan-mental/cara-sederhana-untuk-menghindari-pelecehan-seksual?srsltid=AfmBOopZnP1PKXrNQjEkAboucg32QWb-cKbt_LKuUMkbNXYGUKs2eVf-">
                8 Cara Mencegah Pelecehan Seksual, Lindungi Dirimu!</a></li>
        <li><a
                href="https://www.hukumonline.com/klinik/a/pidana-pasal-pelecehan-seksual-cl3746/">
                Jerat Pidana Pasal Pelecehan Seksual dan Pembuktiannya</a></li>
        <li><a
                href="https://www.hukumonline.com/klinik/a/jenis-jenis-kekerasan-seksual-menurut-pasal-4-uu-tpks-lt66ebf05b2a715/">
                Jenis-jenis Kekerasan Seksual Menurut Pasal 4 UU TPKS</a></li>
        <li><a
                href="https://misaelandpartners.com/perlindungan-hukum-yang-diberikan-terhadap-korban-pelecehan-seksual/">
                Perlindungan Hukum yang Diberikan Terhadap Korban Pelecehan Seksual</a></li>
    </ul>
</aside>
</div>

  <script>
    document.getElementById('addPostBtn').addEventListener('click', function () {
      const content = document.getElementById('postContent').value;
      const imageInput = document.getElementById('postImage');
      const postsContainer = document.getElementById('postsContainer');

      if (!content.trim()) {
        alert('Please enter some content for your post.');
        return;
      }

      const postDiv = document.createElement('div');
      postDiv.className = 'post';
      postDiv.innerHTML = `
        <strong>You</strong> <small class="text-muted">Just now</small>
        <p>${content}</p>
      `;

      if (imageInput.files && imageInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
          const img = document.createElement('img');
          img.src = e.target.result;
          postDiv.appendChild(img);
          postsContainer.insertBefore(postDiv, postsContainer.firstChild);
        };
        reader.readAsDataURL(imageInput.files[0]);
      } else {
        postsContainer.insertBefore(postDiv, postsContainer.firstChild);
      }

      document.getElementById('postContent').value = '';
      imageInput.value = '';
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
