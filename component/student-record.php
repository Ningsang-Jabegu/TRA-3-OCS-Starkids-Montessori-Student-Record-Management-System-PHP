<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 overflow-hidden">
                <div class="mt-2 mb-4 clearfix">
                    <span class="dashboard-title pull-left">Student Records</span>
                    <a href="admissions.php" class="btn btn-success float-right shadow-sm">
                        <i class="fa fa-plus color-white"></i> Add New Student
                    </a>
                </div>
                <form class="form-inline mb-3" method="get" action="">
                    <div class="input-group">
                        <input type="text" id="liveSearch" class="form-control"
                            placeholder="Search by Name, Class, Roll No...">
                        <div class="input-group-append">
                            <button class="btn btn-secondary float-right shadow-sm" type="submit"><i
                                    class="fa fa-search"></i> Search</button>
                        </div>
                    </div>
                    <?php if (isset($_GET['search']) && $_GET['search'] !== ''): ?>
                        <a href="index.php" class="btn btn-link ml-2">Clear</a>
                    <?php endif; ?>
                </form>
                <?php
                require_once "db/config.php"; // Ensure the database connection is included

                $search = '';
                if (isset($_GET['search']) && $_GET['search'] !== '') {
                    $search = trim($_GET['search']);
                    $search_sql = " WHERE student_name LIKE :search OR class LIKE :search OR roll_no LIKE :search";
                    $sql = "SELECT * FROM students" . $search_sql;
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['search' => "%$search%"]);
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    $sql = "SELECT * FROM students";
                    $stmt = $pdo->query($sql);
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                ?>
                <?php

                // Attempt select query execution
                if (!empty($result)) {
                    echo '<div style="overflow-x:auto;">';
                    echo '<table class="table table-bordered table-striped">';
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Class</th>";
                    echo "<th>Roll No</th>";
                    echo "<th>Gender</th>";
                    echo "<th>DOB</th>";
                    echo "<th>Contact</th>";
                    echo "<th>Action</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody id='studentTableBody'>";
                    foreach ($result as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['student_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['class']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['roll_no']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['contact_number']) . "</td>";
                        echo "<td>";
                        echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                        echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                        echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "<tfoot>";
                    echo "<tr>";
                    echo "<th colspan='2'>Total</th>";
                    $total_ids = count($result);
                    echo "<th colspan='6'>$total_ids Students</th>";
                    echo "</tr>";
                    echo "</tfoot>";
                    echo "</table>";
                    echo '</div>';
                } else {
                    echo '<div class="alert alert-info"><em>No student records found.</em></div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>