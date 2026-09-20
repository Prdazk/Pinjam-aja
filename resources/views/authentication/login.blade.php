<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Masuk - {{ config('app.name') }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap"
    rel="stylesheet">
  <style>
    :root {
      --navy-950: #0f1a30;
      --navy-800: #1e3a6e;
      --navy-700: #274a89;
      --brass: #a9762f;
      --ink: #1a1f2b;
      --muted: #5b6270;
      --paper: #ffffff;
      --line: #e2e4ea;
      --line-soft: #edeef2;
      --error: #b3261e;
      --error-bg: #fbebea;
      --radius-card: 14px;
      --radius-field: 9px;
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    html {
      -webkit-text-size-adjust: 100%;
    }

    body {
      margin: 0;
      min-height: 100vh;
      min-height: 100dvh;
      display: grid;
      place-items: center;
      padding: 1.5rem;
      font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
      color: var(--ink);
      background-color: var(--navy-950);
      /* -----------------------------------------------------------------
         Foto latar diambil dari: public/images/Latar/Smp 1.jpeg
         Kalau kamu ganti/pindah filenya, cuku
         p ubah path di dalam
         url("...") di baris bawah ini, sisanya tidak perlu diubah.
      ----------------------------------------------------------------- */
      background-image:
        linear-gradient(180deg, rgba(15, 26, 48, .38) 0%, rgba(15, 26, 48, .2) 45%, rgba(15, 26, 48, .5) 100%),
        url("{{ asset('images/Latar/Smp 1.jpeg') }}");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    /* ---------- kartu ---------- */
    .slip {
      position: relative;
      width: min(100%, 27.5rem);
      padding: 2.75rem 2.5rem 2.25rem;
      background: var(--paper);
      border-radius: var(--radius-card);
      box-shadow:
        0 1px 0 rgba(255, 255, 255, .5) inset,
        0 30px 60px -20px rgba(6, 12, 26, .55),
        0 8px 20px -10px rgba(6, 12, 26, .35);
    }

    /* lubang pengait kecil di tengah atas kartu, sisa jejak konsep "tiket" */
    .slip::before {
      content: "";
      position: absolute;
      top: -.6rem;
      left: 50%;
      width: 1.15rem;
      height: 1.15rem;
      margin-left: -.575rem;
      border-radius: 50%;
      background: var(--navy-950);
      box-shadow: 0 0 0 4px var(--paper);
    }

    .slip-head {
      padding-bottom: 1.25rem;
      border-bottom: 3px double var(--brass);
    }

    .brand {
      margin: 0 0 .55rem;
      font-size: .95rem;
      font-weight: 600;
      color: var(--navy-800);
    }

    h1 {
      margin: 0;
      font-family: "Fraunces", "Georgia", serif;
      font-size: clamp(2rem, 6vw, 2.5rem);
      font-weight: 600;
      line-height: 1.05;
      letter-spacing: -.01em;
      color: var(--ink);
    }

    .lead {
      margin: .75rem 0 0;
      max-width: 34ch;
      color: var(--muted);
      font-size: .95rem;
      line-height: 1.5;
    }

    /* ---------- pesan gagal login ---------- */
    .alert {
      display: flex;
      gap: .65rem;
      align-items: flex-start;
      margin: 1.5rem 0 0;
      padding: .8rem .95rem;
      border-radius: var(--radius-field);
      background: var(--error-bg);
      border-left: 3px solid var(--error);
      color: var(--error);
      font-size: .9rem;
      font-weight: 600;
      line-height: 1.4;
    }

    .alert svg {
      flex: none;
      margin-top: .1rem;
    }

    /* ---------- field ---------- */
    .field {
      margin-top: 1.4rem;
    }

    .field label {
      display: block;
      margin-bottom: .4rem;
      font-size: .875rem;
      font-weight: 600;
      color: var(--ink);
    }

    .control {
      position: relative;
    }

    .control input[type="email"],
    .control input[type="password"],
    .control input[type="text"] {
      width: 100%;
      padding: .7rem .85rem;
      border: 1.5px solid var(--line);
      border-radius: var(--radius-field);
      background: var(--paper);
      font: inherit;
      font-size: .975rem;
      color: var(--ink);
      outline: none;
      transition: border-color .15s, box-shadow .15s;
    }

    .control input:focus {
      border-color: var(--navy-800);
      box-shadow: 0 0 0 3px rgba(30, 58, 110, .12);
    }

    .control.has-toggle input {
      padding-right: 2.75rem;
    }

    .toggle {
      position: absolute;
      right: .55rem;
      top: 50%;
      transform: translateY(-50%);
      display: grid;
      place-items: center;
      width: 2rem;
      height: 2rem;
      padding: 0;
      border: 0;
      border-radius: 7px;
      background: transparent;
      color: var(--muted);
      cursor: pointer;
      transition: background-color .15s, color .15s;
    }

    .toggle:hover {
      background: var(--line-soft);
      color: var(--navy-800);
    }

    .toggle:focus-visible,
    .btn-submit:focus-visible,
    .role input:focus-visible+.role__face {
      outline: 3px solid var(--navy-700);
      outline-offset: 2px;
    }

    .field-err {
      margin-top: .4rem;
      font-size: .825rem;
      font-weight: 600;
      color: var(--error);
    }

    /* ---------- pilihan peran: kontrol tersegmentasi ---------- */
    .roles {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: .5rem;
    }

    .role {
      position: relative;
    }

    .role input {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      margin: 0;
      opacity: 0;
      cursor: pointer;
    }

    .role__face {
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: .65rem .4rem;
      border: 1.5px solid var(--line);
      border-radius: var(--radius-field);
      font-size: .85rem;
      font-weight: 600;
      color: var(--muted);
      line-height: 1.25;
      transition: border-color .15s, background-color .15s, color .15s;
    }

    .role input:checked+.role__face {
      border-color: var(--navy-800);
      background: var(--navy-800);
      color: #fff;
    }

    .role input:hover+.role__face {
      border-color: var(--navy-700);
    }

    /* ---------- tombol submit ---------- */
    .btn-submit {
      display: block;
      width: 100%;
      margin-top: 1.85rem;
      padding: .85rem 1rem;
      border: 0;
      border-radius: var(--radius-field);
      background: var(--navy-800);
      font: inherit;
      font-size: 1rem;
      font-weight: 600;
      color: #fff;
      cursor: pointer;
      transition: background-color .15s, transform .1s ease-out;
    }

    .btn-submit:hover {
      background: var(--navy-700);
    }

    .btn-submit:active {
      transform: translateY(1px);
    }

    .foot-note {
      margin: 1.25rem 0 0;
      text-align: center;
      font-size: .825rem;
      color: var(--muted);
    }

    .foot-note a {
      color: var(--navy-800);
      font-weight: 600;
      text-decoration: none;
    }

    .foot-note a:hover {
      text-decoration: underline;
    }

    @media (max-width: 30rem) {
      .slip {
        padding: 2.5rem 1.5rem 1.75rem;
      }

      .roles {
        grid-template-columns: 1fr;
      }
    }

    @media (prefers-reduced-motion: reduce) {

      *,
      *::before,
      *::after {
        transition: none !important;
      }
    }
  </style>
</head>

<body>
  <main class="slip">
    <header class="slip-head">
  <h1><center>Masuk</center></h1>
    </header>

    @if (session('authentication'))
      <div class="alert" role="alert">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M12 9v4m0 4h.01M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"
            stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span>{{ session('authentication') }}</span>
      </div>
    @endif

    <form action="{{ route('login') }}" method="POST" novalidate>
      @csrf

      <div class="field">
        <label for="email">Email</label>
        <div class="control">
          <input type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="masukan email anda" autofocus
            required>
        </div>
        @error('email', 'authentication')
          <p class="field-err">{{ $message }}</p>
        @enderror
      </div>

      <div class="field">
        <label for="password">Password</label>
        <div class="control has-toggle">
          <input type="password" id="password" name="password" autocomplete="current-password" placeholder="Masukkan password" required>
          <button type="button" class="toggle" id="toggle-password" aria-controls="password" aria-pressed="false"
            aria-label="Tampilkan password">
            <svg id="eye-open" width="18" height="18" viewBox="0 0 24 24" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z" stroke="currentColor" stroke-width="1.8"
                stroke-linejoin="round" />
              <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.8" />
            </svg>
            <svg id="eye-closed" width="18" height="18" viewBox="0 0 24 24" fill="none"
              xmlns="http://www.w3.org/2000/svg" style="display:none">
              <path
                d="M3 3l18 18M10.6 10.7A3 3 0 0 0 13.3 13.4M6.6 6.7C4 8.3 2 12 2 12s3.5 7 10 7c1.8 0 3.4-.5 4.7-1.3M9.9 5.1A10.6 10.6 0 0 1 12 5c6.5 0 10 7 10 7-.5 1-1.3 2.2-2.4 3.3"
                stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
        @error('password', 'authentication')
          <p class="field-err">{{ $message }}</p>
        @enderror
      </div>

      <div class="field" role="radiogroup" aria-labelledby="role-label">
        <label id="role-label">Masuk sebagai</label>
        <div class="roles">
          <label class="role">
            <input type="radio" name="type" value="administrator" @checked(old('type') === 'administrator') required>
            <span class="role__face">Admin</span>
          </label>
          <label class="role">
            <input type="radio" name="type" value="officer" @checked(old('type') === 'officer') required>
            <span class="role__face">Pembantu</span>
          </label>
          <label class="role">
            <input type="radio" name="type" value="student" @checked(old('type') === 'student') required>
            <span class="role__face">Siswa</span>
          </label>
        </div>
        @error('type', 'authentication')
          <p class="field-err">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit" class="btn-submit">Masuk</button>
    </form>

    @if (Route::has('password.request'))
      <p class="foot-note">Lupa kata sandi? <a href="{{ route('password.request') }}">Reset di sini</a></p>
    @endif
  </main>

  <script>
    (function () {
      var btn = document.getElementById('toggle-password');
      var input = document.getElementById('password');
      var eyeOpen = document.getElementById('eye-open');
      var eyeClosed = document.getElementById('eye-closed');

      btn.addEventListener('click', function () {
        var show = input.type === 'password';
        input.type = show ? 'text' : 'password';
        btn.setAttribute('aria-pressed', show ? 'true' : 'false');
        btn.setAttribute('aria-label', show ? 'Sembunyikan password' : 'Tampilkan password');
        eyeOpen.style.display = show ? 'none' : '';
        eyeClosed.style.display = show ? '' : 'none';
      });
    })();
  </script>
</body>

</html>