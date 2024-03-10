<div class="card border-0 shadow mb-4">
    <div class="card-body p-4">
        <h3 class="fs-4 mb-1">Change Password</h3>
        <div class="mb-4">
            <label for="" class="mb-2">Old Password*</label>
            <input type="password" placeholder="Old Password" class="form-control">
        </div>
        <div class="mb-4">
            <label for="" class="mb-2">New Password*</label>
            <input type="password" placeholder="New Password" class="form-control">
        </div>
        <div class="mb-4">
            <label for="" class="mb-2">Confirm Password*</label>
            <input type="password" placeholder="Confirm Password" class="form-control">
        </div>
    </div>
    <div class="card-footer  p-4">
        <button type="button" class="btn btn-primary">Update</button>
    </div>
</div>
<script>
    window.onload = function() {
        // Assuming you have the old password stored in a variable named oldPassword
        var oldPassword = "old_password"; // Replace this with your actual old password

        // Fill in the old password field
        document.getElementById("oldPassword").value = oldPassword;
    };
</script>
