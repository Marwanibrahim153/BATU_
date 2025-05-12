<?php
session_start();
include '../components/connect.php';

// Access Control
if (!isset($_SESSION['admin_id']) || !in_array($_SESSION['admin_role'], ['admission', 'super_admin'])) {
    header("Location: index.php");
    exit();
}

// Handle the approve/reject action
if (isset($_POST['action']) && isset($_POST['id'])) {
    $application_id = $_POST['id'];
    $action = $_POST['action'];

    if (in_array($action, ['approve', 'reject'])) {
        // Update the application status in the database
        $stmt = $conn->prepare("UPDATE applications SET status = :xx WHERE id = :id");
        $stmt->execute([
            ':xx' => $action,
            ':id' => $application_id
        ]);
        $message = "Application " . ucfirst($action) . "d successfully!";
    }
}

// Search functionality
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$statusFilter = isset($_GET['status']) ? $_GET['status'] : '';

// Pagination setup
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch applications based on search and status filter
$sql = "SELECT * FROM applications WHERE (name LIKE :search OR email LIKE :search) AND (status LIKE :status) ORDER BY id DESC LIMIT :limit OFFSET :offset";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':search', "%" . $searchTerm . "%", PDO::PARAM_STR);
$stmt->bindValue(':status', "%" . $statusFilter . "%", PDO::PARAM_STR);
$stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT); // Bind limit as integer
$stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT); // Bind offset as integer
$stmt->execute();
$applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get total number of applications for pagination
$stmt = $conn->prepare("SELECT COUNT(*) FROM applications WHERE (name LIKE :search OR email LIKE :search) AND (status LIKE :status)");
$stmt->execute([
    ':search' => "%" . $searchTerm . "%",
    ':status' => "%" . $statusFilter . "%"
]);
$totalApplications = $stmt->fetchColumn();
$totalPages = ceil($totalApplications / $limit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Applications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4 text-center">Submitted Applications</h2>

    <?php if (isset($message)): ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php endif; ?>

    <!-- Search Form -->
    <form method="get" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" value="<?= htmlspecialchars($searchTerm) ?>" class="form-control" placeholder="Search by name or email">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-control">
                    <option value="">All Statuses</option>
                    <option value="pending" <?= $statusFilter == 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="approved" <?= $statusFilter == 'approved' ? 'selected' : '' ?>>Approved</option>
                    <option value="rejected" <?= $statusFilter == 'rejected' ? 'selected' : '' ?>>Rejected</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <?php if (count($applications) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Application No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>College</th>
                        <th>Program</th>
                        <th>Status</th>
                        <th>Actions</th>
                        <th>Submitted At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($applications as $i => $app): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($app['id']) ?></td>
                            <td><?= htmlspecialchars($app['name']) ?></td>
                            <td><?= htmlspecialchars($app['email']) ?></td>
                            <td><?= htmlspecialchars($app['phone']) ?></td>
                            <td><?= htmlspecialchars($app['college']) ?></td>
                            <td><?= htmlspecialchars($app['program']) ?></td>
                            <td>
                                <span class="badge <?= $app['status'] == 'approved' ? 'bg-success' : ($app['status'] == 'rejected' ? 'bg-danger' : 'bg-warning') ?>">
                                    <?= ucfirst($app['status']) ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($app['status'] == 'pending'): ?>
                                    <form method="post" action="">
                                        <input type="hidden" name="id" value="<?= $app['id'] ?>">
                                        <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">Approve</button>
                                        <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Reject</button>
                                    </form>
                                <?php else: ?>
                                    <span class="text-muted">No actions</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($app['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=1&search=<?= htmlspecialchars($searchTerm) ?>&status=<?= htmlspecialchars($statusFilter) ?>" aria-label="First">
                        <span aria-hidden="true">&laquo;&laquo;</span>
                    </a>
                </li>
                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page - 1 ?>&search=<?= htmlspecialchars($searchTerm) ?>&status=<?= htmlspecialchars($statusFilter) ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page + 1 ?>&search=<?= htmlspecialchars($searchTerm) ?>&status=<?= htmlspecialchars($statusFilter) ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $totalPages ?>&search=<?= htmlspecialchars($searchTerm) ?>&status=<?= htmlspecialchars($statusFilter) ?>" aria-label="Last">
                        <span aria-hidden="true">&raquo;&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

    <?php else: ?>
        <div class="alert alert-info text-center">No applications found.</div>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="admission-dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>

</body>
</html>
