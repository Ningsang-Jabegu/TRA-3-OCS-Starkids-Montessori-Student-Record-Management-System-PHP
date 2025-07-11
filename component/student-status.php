<!-- student-status.php -->
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 overflow-hidden">
                <div class="mt-2 mb-4 clearfix">
                    <span class="dashboard-title pull-left">Student Status</span>
                    <!-- <a href="admissions.php" class="btn btn-success float-right shadow-sm">
                        <i class="fa fa-plus color-white"></i> Add New Student
                    </a> -->
                </div>
                <div class="form-inline mb-3">
                    <div class="input-group">
                        <input type="text" id="liveSearch" class="form-control"
                            placeholder="Search by Name or Email...">
                        <div class="input-group-append">
                            <button class="btn btn-secondary shadow-sm" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div style="overflow-x:auto;">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Verify</th>
                                <th>Document</th>
                            </tr>
                        </thead>
                        <tbody id="studentStatusTableBody">
                            <!-- Rows inserted via JS -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Total</th>
                                <th colspan="4" id="totalStudents">0 Students</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
async function fetchStudents(search = '') {
    const res = await fetch('./component/get-students.php' + (search ? '?search=' + encodeURIComponent(search) : ''));
    const data = await res.json();
    return data;
}

function renderStudents(students) {
    const tbody = document.getElementById('studentStatusTableBody');
    tbody.innerHTML = '';
    let count = 0;
    students.forEach(item => {
        const student = item.student;
        const id = student.id;
        const name = [student.first_name, student.middle_name, student.last_name].filter(Boolean).join(' ');
        const email = student.email || '';
        const status = student.status || 'pending';
        const verify = student.verify || 0;

        let statusHtml = '';
        if (status === 'pending') statusHtml = '<span class="badge badge-warning">Pending</span>';
        else if (status === 'accepted') statusHtml = '<span class="badge badge-success">Accepted</span>';
        else statusHtml = `<span class="badge badge-danger">${status.charAt(0).toUpperCase() + status.slice(1)}</span>`;

        let verifyHtml = '';
        if (status === 'pending') {
            verifyHtml = `
                <form method="post" style="display:inline;">
                    <input type="hidden" name="student_id" value="${id}">
                    <button type="submit" name="action" value="accepted" class="btn btn-sm btn-success">Accept</button>
                    <button type="submit" name="action" value="rejected" class="btn btn-sm btn-danger">Reject</button>
                </form>
            `;
        } else if (parseInt(verify) === 1) {
            verifyHtml = `<span class="text-success"><i class="fa fa-check"></i> Verified</span>`;
        } else {
            verifyHtml = `<span class="text-danger"><i class="fa fa-times"></i> Not Verified</span>`;
        }

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${id}</td>
            <td>${name}</td>
            <td>${email}</td>
            <td>${statusHtml}</td>
            <td>${verifyHtml}</td>
            <td>
                <a href="view_student.php?id=${id}" class="btn btn-sm btn-primary">View</a>
            </td>
        `;
        tbody.appendChild(row);
        count++;
    });
    document.getElementById('totalStudents').innerText = count + ' Students';
}

async function loadStudents(search = '') {
    const students = await fetchStudents(search);
    renderStudents(students);
}

document.getElementById('liveSearch').addEventListener('input', function () {
    loadStudents(this.value.trim());
});

loadStudents();
</script>
