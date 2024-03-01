@extends('Font.Layouts.master')
<style>
    .colored-toast.swal2-icon-success {
        background-color: #57e307 !important;
    }

    .colored-toast.swal2-icon-error {
        background-color: #fc0000 !important;
    }

    .colored-toast.swal2-icon-warning {
        background-color: #f5d60c !important;
    }

    .colored-toast.swal2-icon-info {
        background-color: #02b7f3 !important;
    }

    .colored-toast.swal2-icon-question {
        background-color: #87adbd !important;
    }

    .colored-toast .swal2-title {
        color: white;
    }

    .colored-toast .swal2-close {
        color: rgb(242, 243, 230);
    }

    .colored-toast .swal2-html-container {
        color: rgb(250, 248, 241);
    }
</style>

@section('main')
    <section class="section-5 bg-2">
        @if (Session::has('success'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    iconColor: 'white',
                    customClass: {
                        popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                });
                Toast.fire({
                    icon: 'success',
                    title: '{{ Session::get('success') }}',
                });
            </script>
        @endif
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                @include('Font.account.sidebar')
                <div class="col-lg-9">
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body  p-4">
                            <form action="{{ route('profile.update') }}" id="profileForm" name="profileForm" method="post">
                                @csrf
                                <h3 class="fs-4 mb-1 fw-bold">My Profile</h3>
                                <div class="mb-4">
                                    <label for="name" class="mb-2">Name*</label>
                                    <input type="text" name="name" id="name" placeholder="Enter Name"
                                        class="form-control" value="{{ $user->name }}">
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="mb-2">Email*</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}">

                                </div>

                                <div class="mb-4">
                                    <label for="designation" class="mb-2">Designation*</label>
                                    <input type="text" name="designation" id="designation" placeholder="Designation"
                                        value="{{ $user->designation }}" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="mobile" class="mb-2">Mobile*</label>
                                    <input type="text" name="mobile" id="mobile" placeholder="Mobile"
                                        value="{{ $user->mobile }}" class="form-control">
                                </div>
                                <div class="card-footer p-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>



                        </div>

                    </div>

                    @include('Font.account.changePassword')
                </div>
            </div>
        </div>
    </section>
@endsection
