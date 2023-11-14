@extends('frontend.layout')
@section('frontend-section')

<br><br><br><br>

{{-- Toastr CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<!-- Contact Start -->
<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
    <div class="row g-0">
        <div class="col-md-6">
            <div class="video">
                <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                    <span></span>
                </button>
            </div>
        </div>
        <div class="col-md-6 bg-dark d-flex align-items-center">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Contact</h5>
                <h1 class="text-white mb-4">Contact Us</h1>
                <form action="{{ url('contactUs') }}" method="post">
                    @csrf
                    <div class="row g-3">

                        <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                        <input type="hidden" name="email" value="{{ auth()->user()->email }}">

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Your Subject">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Contact Number">
                                <label for="phone">Phone Number</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Your Message" name="message" id="message" style="height: 100px"></textarea>
                                <label for="message">Your Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Contact Us</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                        allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Reservation Start -->

{{-- Toastr New JS --}}
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

{{-- New Toastr --}}
<script>

    @if(Session::has('success'))
        Toastify({ text: "{{ Session::get('success') }}", duration: 10000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
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


@endsection
