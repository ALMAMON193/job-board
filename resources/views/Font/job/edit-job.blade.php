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
                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-1">Job Details</h3>
                            <form action="{{ route('jobs.update', $editJob->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="title" class="form-label mb-2">Title<span
                                                class="req">*</span></label>
                                        <input type="title" name="title" class="form-control" id="title"
                                            value="{{ $editData->title }}" required="">

                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror


                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="category" class="form-label mb-2">Category<span
                                                class="req">*</span></label>
                                        <select name="category" id="category"
                                            class="form-select @error('category') is-invalid @enderror">
                                            <option value="">Select a Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('vacancy'))
                                            <span class="text-danger">{{ $errors->first('vacancy') }}</span>
                                        @endif
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="job_type_id" class="form-label mb-2">Job Nature<span
                                                class="req">*</span></label>
                                        <select name="job_type_id" id="job_type_id"
                                            class="form-select @error('job_type_id') is-invalid @enderror">
                                            <option value="">Select a Nature</option>
                                            @foreach ($job_type as $job_type_id)
                                                <option value="{{ $job_type_id->id }}"
                                                    {{ old('job_type_id') == $job_type_id->id ? 'selected' : '' }}>
                                                    {{ $job_type_id->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('job_type_id'))
                                            <span class="text-danger">{{ $errors->first('job_type_id') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="vacancy" class="form-label mb-2">Vacancy<span
                                                class="req">*</span></label>
                                        <input type="vacancy" class="form-control @error('vacancy') is-invalid @enderror"
                                            id="title" name="vacancy" value="{{ old('vacancy') }}">
                                        @if ($errors->has('vacancy'))
                                            <span class="text-danger">{{ $errors->first('vacancy') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="salary" class="form-label mb-2">Salary<span
                                                class="req">*</span></label>
                                        <input type="salary" class="form-control @error('salary') is-invalid @enderror"
                                            id="salary" name="salary" value="{{ old('salary') }}">
                                        @if ($errors->has('salary'))
                                            <span class="text-danger">{{ $errors->first('salary') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="location" class="form-label mb-2">Location<span
                                                class="req">*</span></label>
                                        <input type="location" class="form-control @error('location') is-invalid @enderror"
                                            id="location" name="location" value="{{ old('location') }}">
                                        @if ($errors->has('location'))
                                            <span class="text-danger">{{ $errors->first('location') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="form-label mb-2">Experience<span
                                            class="req">*</span></label>
                                    <select name="experience" id="experience"
                                        class="form-select @error('experience') is-invalid @enderror">
                                        <option value="">Select Experience</option>
                                        <option value="0" {{ old('experience') == '0' ? 'selected' : '' }}>0 years
                                        </option>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}"
                                                {{ old('experience') == $i ? 'selected' : '' }}>{{ $i }} years
                                            </option>
                                        @endfor
                                        <option value="10+">10+ years</option>
                                    </select>
                                    @error('experience')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="form-label mb-2">Description<span
                                            class="req">*</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                        cols="5" rows="5" placeholder="Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="qualifications" class="form-label mb-2">Qualifications</label>
                                    <textarea class="form-control" name="qualifications" id="qualifications" cols="5" rows="5"
                                        placeholder="Qualifications"></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="benefits" class="form-label mb-2">Benefits</label>
                                    <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5"
                                        placeholder="Benefits"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="responsibility" class="form-label mb-2">Responsibility</label>
                                    <textarea class="form-control" name="responsibility" id="responsibility" cols="5" name="responsibility"
                                        id="responsibility" rows="5" placeholder="Responsibility"></textarea>
                                </div>


                                <div class="mb-4">
                                    <label for="keywords" class="form-label mb-2">Keywords</label>
                                    <input type="text" placeholder="Keywords" id="keywords" name="keywords"
                                        class="form-control">
                                </div>

                                <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="company_name" class="form-label mb-2">Name<span
                                                class="req">*</span></label>
                                        <input type="text"
                                            class="form-control @error('company_name') is-invalid @enderror"
                                            id="company_name" name="company_name" value="{{ old('company_name') }}">
                                        @if ($errors->has('company_name'))
                                            <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="company_location" class="form-label mb-2">Location<span
                                                class="req">*</span></label>
                                        <input type="text"
                                            class="form-control @error('company_location') is-invalid @enderror"
                                            id="company_location" name="company_location"
                                            value="{{ old('company_location') }}">
                                        @if ($errors->has('company_location'))
                                            <span class="text-danger">{{ $errors->first('company_location') }}</span>
                                        @endif
                                    </div>


                                </div>

                                <div class="mb-4">
                                    <label for="website" class="form-label mb-2">Website</label>
                                    <input type="text" placeholder="Website" id="company_website"
                                        name="company_website" class="form-control">
                                </div>

                                <div class="footer ">
                                    <button type="submit" class="btn btn-primary">update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
