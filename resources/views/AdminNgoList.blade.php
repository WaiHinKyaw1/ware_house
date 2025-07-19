<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NGO List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f4f8;
        }

        .ngo-card {
            max-width: 1000px;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .card-title-custom {
            font-weight: bold;
            font-size: 1.3rem;
            color: #0d6efd;
            margin-bottom: 20px;
        }

        .btn-search, .btn-add {
            background-color: #0d6efd;
            color: white;
        }

        .btn-edit {
            color: #0d6efd;
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .btn-delete {
            color: #dc3545;
            background: transparent;
            border: none;
            cursor: pointer;
        }

        table thead {
            background-color: #0d6efd;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #e9f2fd;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="ngo-card">
        <div class="card-title-custom">NGO List</div>

        <form method="GET">
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label">NGO Name</label>
                    <input type="text" class="form-control" name="ngo_name" placeholder="Enter NGO name">
                </div>
                <div class="col-md-6 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-search"><i class="bi bi-search"></i> Search</button>
                    <a href="#" class="btn btn-add"><i class="bi bi-plus-circle"></i> Add</a>
                </div>
            </div>
        </form>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact Person</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Example row --}}
                    <tr>
                        <td>1</td>
                        <td>NgoName</td>
                        <td>09....</td>
                        <td>..@gmail.com</td>
                        <td>Yangon</td>
                        <td>09....</td>
                        <td>
                            <button class="btn-edit"><i class="bi bi-pencil"></i></button>
                        </td>
                        <td>
                            <button class="btn-delete"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    {{-- Add dynamic rows here --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
