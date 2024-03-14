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
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active">dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                @include('admin.sidebar')
                <div class="col-lg-9">

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Total users</p>
                                            <h4 class="mb-2">1452</h4>
                                            <p class="text-muted mb-0"><span
                                                    class="text-success fw-bold font-size-12 me-2"><i
                                                        class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from
                                                previous period</p>
                                        </div>
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-light text-primary rounded-3">
                                                <i class="ri-shopping-cart-2-line font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Total jobs</p>
                                            <h4 class="mb-2">938</h4>
                                            <p class="text-muted mb-0"><span
                                                    class="text-danger fw-bold font-size-12 me-2"><i
                                                        class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from
                                                previous period</p>
                                        </div>
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-light text-success rounded-3">
                                                <i class="mdi mdi-currency-usd font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2"></p>
                                            <h4 class="mb-2">8246</h4>
                                            <p class="text-muted mb-0"><span
                                                    class="text-success fw-bold font-size-12 me-2"><i
                                                        class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from
                                                previous period</p>
                                        </div>
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-light text-primary rounded-3">
                                                <i class="ri-user-3-line font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Unique Visitors</p>
                                            <h4 class="mb-2">29670</h4>
                                            <p class="text-muted mb-0"><span
                                                    class="text-success fw-bold font-size-12 me-2"><i
                                                        class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from
                                                previous period</p>
                                        </div>
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-light text-success rounded-3">
                                                <i class="mdi mdi-currency-btc font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div>

            </div>
        </div>
    </section>
@endsection
