<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Dashboard | Starkids Montessori</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Student Dashboard for Starkids Montessori - manage and view student records efficiently.">
    <meta name="keywords" content="student, dashboard, starkids, montessori, management, records">
    <meta name="author" content="Starkids Montessori">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#563d7c">
    <!-- Bootstrap 4.5.2 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome 4.7.0 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Fonts for Modern Luxury -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Make sure jQuery and Bootstrap JS are loaded -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <?php
    $activePage = 'dashboard';
    include 'layout/page-structure.php';
    ?>
</body>
<script>
    $(document).ready(function () {
        let allStudents = [];

        // Fetch all data once
        $.ajax({
            url: 'search-students.php',
            method: 'POST',
            data: { search: '' },
            success: function (data) {
                allStudents = $('<tbody>' + data.trim() + '</tbody>').children('tr');
                renderRows(allStudents);
            }
        });

        // On input, filter and re-render
        $('#liveSearch').on('input', function () {
            const query = $(this).val().toLowerCase().trim();

            const filteredRows = allStudents.filter(function () {
                const text = $(this).text().toLowerCase();
                return text.includes(query);
            });

            renderRows(filteredRows);
        });

        // Renders rows with animation
        function renderRows(rows) {
            const $tableBody = $('#studentTableBody');
            const oldRows = $tableBody.children('tr');

            oldRows.each(function () {
                const $row = $(this);
                $row.addClass('row-exit');
                $row[0].offsetHeight;
                $row.addClass('row-exit-active');
                $row.one('transitionend', function () {
                    $row.remove();
                });
            });

            setTimeout(() => {
                rows.each(function () {
                    const $newRow = $(this).clone(); // important to avoid detaching from original
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
</script>






</html>