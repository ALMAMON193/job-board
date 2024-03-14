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
                @include('admin.sidebar')
                <div class="col-lg-9">
                    <div class="card border-0 shadow mb-4 p-3">
                        <div class="card-body card-form">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="fs-4 mb-1">Users</h3>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="bg-light">
                                        <tr>

                                            <th scope="col">Name</th>
                                            <th scope="col" style="width: 80px">Email</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">phone</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">
                                        @if ($users->isNotEmpty())
                                            @foreach ($users as $user)
                                                <tr class="active">
                                                    <td>
                                                        <div class="user-name fw-500">{{ $user->name }}</div>
                                                    </td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->formatLocalized('%d-%B-%Y') }}
                                                    </td>
                                                    <td>{{ $user->mobile }}</td>

                                                    <td>
                                                        <div class="action-dots float-end">
                                                            <a href="#" class="" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">

                                                                <li><a class="dropdown-item" <a
                                                                        href="{{ route('admin.users.edit', $user->id) }}"><i
                                                                            class="fa fa-edit" aria-hidden="true"></i>
                                                                        Edit</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('admin.users.delete', $user->id) }}"><i
                                                                            class="fa fa-trash" aria-hidden="true"></i>
                                                                        Remove</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
