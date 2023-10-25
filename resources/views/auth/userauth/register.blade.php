<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Custom styles for this template-->
    <link href="{{ asset('auth/register.css') }}" rel="stylesheet">
    {{-- Toastr CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <title>Register Page</title>
</head>
<body>
    <section>
        <form action="{{ route('userregister') }}" method="POST">
            @csrf

            <h1>Register</h1>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="name" name="name" id="name" >
                <label for="">Name</label>
            </div>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="email" name="email" id="email" >
                <label for="">Email</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="password" id="password" >
                <label for="">Password</label>
            </div>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="password" name="password_confirmation" id="password_confirmation" >
                <label for="">Comfirm Your password</label>
            </div>
            {{-- <div class="forget">
                <label for=""><input type="checkbox">Remember Me</label>
                <a href="#">Forget Password</a>
            </div> --}}
            <button>Register</button>
            <div class="register">
                <p>Have an account<a href="{{ url('loginpage') }}">Login Here!</a></p>
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
