<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Dashboard | Starkids Montessori</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap 4.5.2 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome 4.7.0 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Fonts for Modern Luxury -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="./assets/images/Star_Kids_Montessori_Preschool_Logo.png" alt="Starkids Montessori Logo"
                style="width:180px;height:auto;vertical-align:middle;padding:4px;background: #fff; border-radius: 8px;">
            <span style="vertical-align:middle;">Starkids Montessori</span>
        </a>
    </nav>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-2 mb-4 clearfix">
                        <span class="dashboard-title pull-left">Student Records</span>
                        <a href="create.php" class="btn btn-success float-right shadow-sm">
                            <i class="fa fa-plus color-white"></i> Add New Student
                        </a>
                    </div>
                    <form class="form-inline mb-3" method="get" action="">
                        <div class="input-group">
                            <input type="text" id="liveSearch" class="form-control"
                                placeholder="Search by Name, Class, Roll No...">

                            <div class="input-group-append">
                                <button class="btn btn-secondary float-right shadow-sm" type="submit"><i
                                        class="fa fa-search"></i>
                                    Search</button>
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
                    ?>
                    <?php

                    // Attempt select query execution
                    $sql = "SELECT * FROM students";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
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
                            while ($row = mysqli_fetch_array($result)) {
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
                            $total_ids = mysqli_num_rows($result);
                            echo "<th colspan='6'>$total_ids Students</th>";
                            echo "</tr>";
                            echo "</tfoot>";
                            echo "</table>";
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-info"><em>No student records found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center mt-5 mb-3">
        <hr>
        <p class="mb-1">&copy; 2024 - <?php echo date('Y'); ?> Starkids Montessori. All rights reserved.</p>
        <small>
            Developed for Montessori School Management.<br>
            For support or queries, contact: <a href="mailto:info@starkids.edu.np">info@starkids.edu.np</a>
        </small>
    </footer>
</body>
<script>
    $(document).ready(function () {
        $('#liveSearch').on('input', function () {
            let query = $(this).val().trim();

            $.ajax({
                url: 'search-students.php',
                method: 'POST',
                data: { search: query },
                success: function (data) {
                    const $tableBody = $('#studentTableBody');
                    const $newRows = $('<tbody>' + data.trim() + '</tbody>').children().filter('tr');

                    // Animate existing rows out
                    $tableBody.children('tr').each(function () {
                        const $row = $(this);
                        $row.addClass('row-exit');
                        $row[0].offsetHeight;
                        $row.addClass('row-exit-active');

                        $row.one('transitionend', function () {
                            $row.remove();
                        });
                    });

                    // Add new rows after short delay
                    setTimeout(function () {
                        $newRows.each(function () {
                            const $newRow = $(this);
                            $newRow.addClass('row-enter');
                            $tableBody.append($newRow);
                            $newRow[0].offsetHeight;
                            $newRow.addClass('row-enter-active');

                            $newRow.one('transitionend', function () {
                                $newRow.removeClass('row-enter row-enter-active');
                            });
                        });
                    }, 200);
                }
            });
        });
    });
</script>



</html>