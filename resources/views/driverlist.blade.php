<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Driver List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f0f4f8;">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">
            Driver List
        </div>

        <div class="card-body">
            {{-- Search Bar --}}
            <form method="GET" action="" class="row g-3 align-items-center mb-4">
                <div class="col-auto">
                    <label for="name" class="col-form-label">Driver Name</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="name" name="name" class="form-control" value="{{ request('name') }}">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="" class="btn btn-success">Add</a>
                </div>
            </form>

            {{-- Driver Table --}}
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>License No</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr>
                                <td class="text-center">1</td>
                                <td>aungyelin</td>
                                <td>lelelrlr</td>
                                <td>ma shi</td>
                                <td>ma a bay</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="" method="POST" class="d-inline">

                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this driver?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="6" class="text-center text-muted">No drivers found.</td>
                            </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
