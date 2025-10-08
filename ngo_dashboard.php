<?php
session_start();
require_once 'includes/auth.php';
check_login();
check_role('ngo');

require_once 'includes/header.php';
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>NGO Dashboard</h1>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">New Donation Requests</h5>
                    <p class="card-text fs-4">3</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Completed Donations</h5>
                    <p class="card-text fs-4">12</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Active Donors</h5>
                    <p class="card-text fs-4">5</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Incoming Donation Requests</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Donor Name</th>
                        <th>Donation Type</th>
                        <th>Date Received</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Smith</td>
                        <td>Canned Goods</td>
                        <td>2025-10-07</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                        <td><a href="#" class="btn btn-sm btn-outline-primary">View Details</a></td>
                    </tr>
                    <tr>
                        <td>Jane Doe</td>
                        <td>Clothing</td>
                        <td>2025-10-06</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                        <td><a href="#" class="btn btn-sm btn-outline-primary">View Details</a></td>
                    </tr>
                    <tr>
                        <td>Peter Jones</td>
                        <td>Books</td>
                        <td>2025-10-05</td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td><a href="#" class="btn btn-sm btn-outline-secondary disabled">View Details</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
