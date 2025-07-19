<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f4f8;
        }

        .profile-card {
            max-width: 600px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .profile-title {
            font-weight: bold;
            font-size: 1.4rem;
            color: #0d6efd;
            text-align: center;
            margin-bottom: 25px;
        }

        .btn-update {
            background-color: #0d6efd;
            color: white;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }

        .form-control:disabled {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-card">
        <div class="profile-title">User Profile</div>

        <form method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="John Doe">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="johndoe@example.com">
            </div>

            <div class="mb-3">
                <label class="form-label">Phone No</label>
                <input type="text" class="form-control" name="phone_no" value="0987654321">
            </div>

            <div class="mb-3">
                <label class="form-label">NGO Name</label>
                <input type="text" class="form-control" name="ngo_name" value="Disabled NGO" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Current Password</label>
                <input type="password" class="form-control" name="current_password">
            </div>

            <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" class="form-control" name="new_password">
            </div>

            <div class="d-flex justify-content-center gap-3 mt-4">
                <button type="submit" class="btn btn-update px-4"><i class="bi bi-save"></i> Update</button>
                <a href="#" class="btn btn-cancel px-4"><i class="bi bi-x-circle"></i> Cancel</a>
            </div>
        </form>
    </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
