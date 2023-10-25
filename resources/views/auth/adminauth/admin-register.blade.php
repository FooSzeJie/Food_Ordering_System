<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>

    <!-- User Register CSS -->
    <link rel="stylesheet" href="{{ asset('admin/register.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- Toastr CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
    <div class="wrapper">
        <form action="{{ route('register-user') }}" method="POST">
            @csrf

            <h1>Register</h1>
            <div class="input-box">
                <input type="text" name="name" id="name" placeholder="Admin Name" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" name="email" id="email" placeholder="Admin Email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            {{-- <div class="remember-forgot">
                <label><input type="checkbox">Remember Me</label>
                <a href="#">Forgot Password</a>
            </div> --}}

            <button type="submit" class="btn">Register</button>

            <div class="register-link">
                <p>have an account <a href="{{ url('/admin/login') }}">Login Here!</a></p>
            </div>
        </form>
    </div>

    {{-- Toastr JS --}}
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>

        @if(Session::has('success'))
            Toastify({ text: "{{ Session::get('success') }}", duration: 10000,
                style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
            }).showToast();

        @elseif (Session::has('fail'))
            Toastify({ text: "{{ Session::get('fail') }}", duration: 10000,
                    style: { background: "linear-gradient(to right, #b90000, #c99396)" }
            }).showToast();
        @endif

        @if(Session::has('error'))
            Toastify({ text: "{{ Session::get('error') }}", duration: 10000,
                style: { background: "linear-gradient(to right, #b90000, #c99396)" }
            }).showToast();
        @endif

        @if($errors->any())
            @foreach ($errors->all() as $error)
                Toastify({ text: "{{ $error }}", duration: 10000,
                    style: { background: "linear-gradient(to right, #b90000, #c99396)" }
                }).showToast();
            @endforeach
        @endif

    </script>
    
</body>

</html>
