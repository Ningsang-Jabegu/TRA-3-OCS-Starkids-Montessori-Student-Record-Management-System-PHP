<?php
// main.php
// This component renders the main content area. Pass $content to render different pages.

function renderMain($content)
{
    ?>
    <main class="main">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 overflow-hidden">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
}

// Example usage for dashboard page:
ob_start();
?>
<div class="mt-2 mb-4 clearfix">
    <span class="dashboard-title pull-left">Student Records</span>
    <a href="create.php" class="btn btn-success float-right shadow-sm">
        <i class="fa fa-plus color-white"></i> Add New Student
    </a>
</div>
<form class="form-inline mb-3" method="get" action="">
    <div class="input-group">
        <input type="text" name="search" id="liveSearch" class="form-control"
            placeholder="Search by Name, Class, Roll No...">
        <div class="input-group-append">
            <button class="btn btn-secondary float-right shadow-sm" type="submit">
                <i class="fa fa-search"></i> Search
            </button>
        </div>
    </div>
    <?php if (isset($_GET['search']) && $_GET['search'] !== ''): ?>
        <a href="index.php" class="btn btn-link ml-2">Clear</a>
    <?php endif; ?>
</form>
<?php
require_once "config.php";
$search = '';
if (isset($_GET['search']) && $_GET['search'] !== '') {
    $search = trim($_GET['search']);
    $search_sql = " WHERE student_name LIKE ? OR class LIKE ? OR roll_no LIKE ?";
    $sql = "SELECT * FROM students" . $search_sql;
    $stmt = mysqli_prepare($link, $sql);
    $param = '%' . $search . '%';
    mysqli_stmt_bind_param($stmt, "sss", $param, $param, $param);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $sql = "SELECT * FROM students";
    $result = mysqli_query($link, $sql);
}

if ($result && mysqli_num_rows($result) > 0) {
    echo '<div style="overflow-x:auto;">';
    echo '<table class="table table-bordered table-striped">';
    echo "<thead><tr>
        <th>ID</th>
        <th>Name</th>
        <th>Class</th>
        <th>Roll No</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Contact</th>
        <th>Action</th>
    </tr></thead><tbody id='studentTableBody'>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . htmlspecialchars($row['student_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['class']) . "</td>";
        echo "<td>" . htmlspecialchars($row['roll_no']) . "</td>";
        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
        echo "<td>" . htmlspecialchars($row['contact_number']) . "</td>";
        echo "<td>
            <a href='view_student.php?id={$row['id']}' class='mr-3' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
            <a href='edit_student.php?id={$row['id']}' class='mr-3' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
            <a href='delete.php?id={$row['id']}' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
        </td>";
        echo "</tr>";
    }
    $total_ids = mysqli_num_rows($result);
    echo "</tbody><tfoot><tr>
        <th colspan='2'>Total</th>
        <th colspan='6'>{$total_ids} Students</th>
    </tr></tfoot></table></div>";
    mysqli_free_result($result);
} else {
    echo '<div class="alert alert-info"><em>No student records found.</em></div>';
}
mysqli_close($link);
?>
<?php
$dashboardContent = ob_get_clean();

// Render the main layout with dashboard content
renderMain($dashboardContent);
?>