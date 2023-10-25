<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- User Login CSS -->
    <link href="{{ asset('auth/login.css') }}" rel="stylesheet">
    {{-- Toastr CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <title>Login Page</title>
</head>
<body>
    <section>
        <form action="{{ route('userlogin') }}" method="POST">
            @csrf

            <h1>Login</h1>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="email" name="email" id="email" required>
                <label for="">Email</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="password" id="password" required>
                <label for="">Password</label>
            </div>
            {{-- <div class="forget">
                <label for=""><input type="checkbox">Remember Me</label>
                <a href="#">Forget Password</a>
            </div> --}}
            <button>Log in</button>
            <div class="register">
                <p>Don't have a account <a href="{{ url('registerpage') }}">Register Here!</a></p>
            </div>
        </form>
    </section>

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
