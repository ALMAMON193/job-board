<div class="col-lg-3">
    <div class="card border-0 shadow mb-4 p-3">
        <div class="s-body text-center mt-3">
            @if (Auth::user()->profile_picture)
                <img src="data:image/jpeg;base64,{{ Auth::user()->profile_picture }}" alt="Profile Picture"
                    class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
            @else
                <!-- If no profile picture is set, show a default image -->
                <img src="{{ asset('upload/no_image.jpg') }}" alt="Default Profile Picture"
                    class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
            @endif
            <h5 class="mt-3 pb-0">{{ Auth::user()->name }}</h5>
            <p class="text-muted mb-1 fs-6">{{ Auth::user()->designation }}</p>
            <div class="d-flex justify-content-center mb-2">
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"
                    class="btn btn-primary">Change Profile Picture</button>
            </div>
        </div>
    </div>

    <div class="card account-nav border-0 shadow mb-4 mb-lg-0">
        <div class="card-body p-0">
            <ul class="list-group list-group-flush ">
                <li class="list-group-item d-flex justify-content-between p-3">
                    <a href="{{ route('account.profile') }}">Account Settings</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('Job.post') }}">Post a Job</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('my.job') }}">My Jobs</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="job-applied.html">Jobs Applied</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="saved-jobs.html">Saved Jobs</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('account.logout') }}">Log out</a>
                </li>
            </ul>
        </div>
    </div>
</div>
