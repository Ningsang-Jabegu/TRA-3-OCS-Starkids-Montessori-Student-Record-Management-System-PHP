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
                <div class="form-inline mb-3">
                    <div class="input-group">
                        <input type="text" id="liveSearch" class="form-control"
                            placeholder="Search by Name, Class, Roll No...">
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
                                <th>ID <i class="fa fa-sort" onclick="sortTable(0)"></i></th>
                                <th>Name <i class="fa fa-sort" onclick="sortTable(1)"></i></th>
                                <th>Class <i class="fa fa-sort" onclick="sortTable(2)"></i></th>
                                <th>Roll No <i class="fa fa-sort" onclick="sortTable(3)"></i></th>
                                <th>Gender</th>
                                <th>DOB <i class="fa fa-sort" onclick="sortTable(5)"></i></th>
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id='studentTableBody'>
                            <!-- Student data will populate here -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan='2'>Total</th>
                                <th colspan='6' id='totalStudents'>Loading students...</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let allStudents = [];
    let currentDisplayedStudents = [];
    let searchTimeout = null;
    let sortState = {
        column: null,
        direction: 'asc' // 'asc' or 'desc'
    };

    // Initialize when page loads
    document.addEventListener('DOMContentLoaded', function () {
        fetchStudents();
        setupEventListeners();
    });

    // Fetch initial student data only once
    function fetchStudents() {
        fetch('./component/get-students.php')
            .then(response => response.json())
            .then(data => {
                allStudents = data;
                currentDisplayedStudents = [...data];
                displayStudents(currentDisplayedStudents);
            })
            .catch(error => {
                console.error('Error loading students:', error);
                document.getElementById('studentTableBody').innerHTML = `
                <tr>
                    <td colspan="8" class="text-center text-danger">
                        Error loading student data. Please try again.
                    </td>
                </tr>`;
            });
    }

    // Set up event listeners
    function setupEventListeners() {
        const searchInput = document.getElementById('liveSearch');
        searchInput.addEventListener('input', function () {
            clearTimeout(searchTimeout);
            const searchTerm = this.value.trim();

            // If search box is empty, show all students immediately
            if (searchTerm === '') {
                currentDisplayedStudents = [...allStudents];
                displayStudents(currentDisplayedStudents);
                return;
            }

            // Show loading indicator
            document.getElementById('studentTableBody').innerHTML = `
            <tr>
                <td colspan="8" class="text-center">
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="sr-only">Searching...</span>
                    </div>
                </td>
            </tr>`;

            // Debounce search
            searchTimeout = setTimeout(() => {
                performSearch(searchTerm);
            }, 300);
        });
    }

    // Perform search on the already fetched data
    function performSearch(searchTerm) {
        const lowerSearch = searchTerm.toLowerCase();
        const filtered = allStudents.filter(item => {
            const s = item.student;
            return (
                (s.first_name && s.first_name.toLowerCase().includes(lowerSearch)) ||
                (s.middle_name && s.middle_name.toLowerCase().includes(lowerSearch)) ||
                (s.last_name && s.last_name.toLowerCase().includes(lowerSearch)) ||
                (s.class && s.class.toLowerCase().includes(lowerSearch)) ||
                (s.roll_no && String(s.roll_no).toLowerCase().includes(lowerSearch))
            );
        });
        currentDisplayedStudents = filtered;
        displayStudents(filtered);
    }

    // Display students in table
    function displayStudents(students) {
        const tableBody = document.getElementById('studentTableBody');
        const totalStudents = document.getElementById('totalStudents');

        if (!students || students.length === 0) {
            tableBody.innerHTML = `
            <tr>
                <td colspan="8" class="text-center">
                    No students found
                </td>
            </tr>`;
            totalStudents.innerText = '0 Students';
            return;
        }

        tableBody.innerHTML = '';
        students.forEach(item => {
            const s = item.student;
            tableBody.innerHTML += `
            <tr>
                <td>${s.id}</td>
                <td>${s.first_name} ${s.middle_name || ''} ${s.last_name}</td>
                <td>${s.class}</td>
                <td>${s.roll_no}</td>
                <td>${s.gender}</td>
                <td>${s.dob}</td>
                <td>${s.contact_number || 'N/A'}</td>
                <td>
                    <a href="view_student.php?id=${s.id}" class="mr-3" title="View Record" data-toggle="tooltip">
                        <span class="fa fa-eye"></span>
                    </a>
                    <a href="edit_student.php?id=${s.id}" class="mr-3" title="Update Record" data-toggle="tooltip">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="delete.php?id=${s.id}" title="Delete Record" data-toggle="tooltip">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>`;
        });

        totalStudents.innerText = `${students.length} Students`;
    }

    // Custom class order mapping
    const classOrder = {
        'Nursery': 0,
        'LKG': 1,
        'UKG': 2,
        '1': 3, '2': 4, '3': 5, '4': 6, '5': 7,
        '6': 8, '7': 9, '8': 10, '9': 11, '10': 12,
        '11': 13, '12': 14
    };

    // Get class order value
    function getClassOrderValue(classStr) {
        // Handle null/undefined
        if (!classStr) return 100;

        // Try to match exact class name
        if (classOrder[classStr] !== undefined) {
            return classOrder[classStr];
        }

        // Try to extract numeric value from strings like "Class 1"
        const numMatch = classStr.match(/\d+/);
        if (numMatch) {
            const num = numMatch[0];
            if (classOrder[num] !== undefined) {
                return classOrder[num];
            }
        }

        // Return a high value for unknown classes
        return 100;
    }

    // Sort table using the currentDisplayedStudents array
    function sortTable(columnIndex) {
        // Toggle sort direction if clicking the same column
        if (sortState.column === columnIndex) {
            sortState.direction = sortState.direction === 'asc' ? 'desc' : 'asc';
        } else {
            sortState.column = columnIndex;
            sortState.direction = 'asc';
        }

        // Create a copy to avoid mutating original array
        const sortedStudents = [...currentDisplayedStudents];

        sortedStudents.sort((a, b) => {
            const sA = a.student;
            const sB = b.student;
            let compareResult = 0;

            // Special handling for class column
            if (columnIndex === 2) {
                const aValue = getClassOrderValue(sA.class);
                const bValue = getClassOrderValue(sB.class);
                compareResult = aValue - bValue;
            }
            // Special handling for DOB column
            else if (columnIndex === 5) {
                const dateA = new Date(sA.dob);
                const dateB = new Date(sB.dob);
                compareResult = dateA - dateB;
            }
            // Special handling for ID and Roll No (numeric)
            else if (columnIndex === 0 || columnIndex === 3) {
                const aValue = parseInt(sA[columnIndex === 0 ? 'id' : 'roll_no']) || 0;
                const bValue = parseInt(sB[columnIndex === 0 ? 'id' : 'roll_no']) || 0;
                compareResult = aValue - bValue;
            }
            // Default handling for other columns (string)
            else {
                const aValue = (sA[getKeyForColumn(columnIndex)] || '').toString().toLowerCase();
                const bValue = (sB[getKeyForColumn(columnIndex)] || '').toString().toLowerCase();
                compareResult = aValue.localeCompare(bValue);
            }

            // Apply sort direction
            return sortState.direction === 'asc' ? compareResult : -compareResult;
        });

        currentDisplayedStudents = sortedStudents;
        displayStudents(sortedStudents);
    }

    // Map column index to student property
    function getKeyForColumn(columnIndex) {
        switch (columnIndex) {
            case 0: return 'id';
            case 1: return 'first_name'; // Name is combination of fields
            case 2: return 'class';
            case 3: return 'roll_no';
            case 4: return 'gender';
            case 5: return 'dob';
            case 6: return 'contact_number';
            default: return 'id';
        }
    }
</script>