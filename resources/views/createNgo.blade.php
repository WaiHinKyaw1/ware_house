<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create NGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #e9f1fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .main-card {
            margin-top: 60px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 30px 40px;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary, .btn-secondary {
            border-radius: 8px;
            padding: 8px 20px;
        }

        .warehouse-list {
            margin-top: 20px;
        }

        .warehouse-table th {
            background-color: #0d6efd;
            color: white;
        }

        .warehouse-table td {
            vertical-align: middle;
        }

        .btn-danger {
            border-radius: 6px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="main-card">
            <h3 class="text-center text-primary mb-4">NGO Create</h3>

            <form>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ngoName" class="form-label">NGO Name</label>
                        <input type="text" id="ngoName" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Select Warehouse</label>
                    <div class="input-group">
                        <select class="form-select">
                            <option selected disabled>Choose...</option>
                            <option>WareHouseOne</option>
                            <option>WareHouseTwo</option>
                        </select>
                        <button class="btn btn-primary" type="button">Add</button>
                    </div>
                </div>

                <div class="warehouse-list">
                    <table class="table table-bordered warehouse-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Warehouse Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>WareHouseOne</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
