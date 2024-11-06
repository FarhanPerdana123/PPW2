<!-- admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Admin Dashboard</h1>
    <!-- Admin Actions -->
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Manage Users</h5>
                    <p class="card-text">Add, edit, or delete users from the system.</p>
                    <a href="/admin/users" class="btn btn-primary">Go to Users</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Manage Orders</h5>
                    <p class="card-text">View and manage orders placed by users.</p>
                    <a href="/admin/orders" class="btn btn-primary">Go to Orders</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">View Reports</h5>
                    <p class="card-text">Analyze system data and performance reports.</p>
                    <a href="/admin/reports" class="btn btn-primary">Go to Reports</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Information Section -->
    <div class="mt-5">
        <h2>System Overview</h2>
        <p>Welcome to the admin dashboard. Here you can manage various aspects of the application including users, orders, and reports.</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>