<?php
    session_start();
    include("connection.php");

    if (!isset($_SESSION['id'])) {
        header("location:1n4i13m9d14a-cjrh.php");
        exit();
    }

    //  Top navigation & Side Panel
    include("presets/navigation.php");
?>
    <style>
        /* Active Link */
        .bx-book-content{
            --active-link-clr: hsl(55, 73%, 61%);
            color: var(--active-link-clr)!important;
        }
    </style>

    <!-- HTML DOCUMENT -->
    <!-- Admin contents -->
    <div class="contents__headings">
        <h1>Records</h1>
    </div>

    <!-- Table Records -->
    <div class="table-wrapper" tabindex="0">

        <!-- Search input -->
        <div class="table-wrapper__search" style="margin-bottom: 1rem;">
            <input type="text" name="" id="table-search" onkeyup="recordsTable()" placeholder="Search by First Name / LRN" class="search-input">
            <i class="fas fa-search search-icon" style="top: 50%;!important;"></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>LRN</th>
                    <th>Strand/Track</th>
                     <th>Date</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody id="course-data-storage" data-filter-control="true" data-show-search-clear-button="true">
                <?php
                    $sql = "SELECT * FROM results ORDER BY date DESC LIMIT 10";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $result_id = $row['result_id'];
                        $user_id = $row['user_id'];
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $email = $row['email'];
                        $lrn = $row['lrn'];
                        $strand_track = $row['strand_track'];
                        $date = $row['date'];
                        echo '<tr>
                                <td data-cell="User ID">' . $user_id . '</td>
                                <td data-cell="First name">' . $fname . '</td>
                                <td data-cell="Last name">' . $lname . '</td>
                                <td data-cell="Email">' . $email . '</td>
                                <td data-cell="LRN">' . $lrn . '</td>
                                <td data-cell="Strand/Track">' . $strand_track . '</td>
                                <td data-cell="Strand/Track">' . $date . '</td>
                                <td data-cell="Operation" id="deletionButton">
                                    <button class="td__button delete-btn" onclick="showDeleteConfirmation(' . $result_id . ')">
                                        <i class="bx bxs-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Pagination Section -->
            <div class="pagination-wrapper">
                <div class="wrapper__title">
                    <span id="entryCount" class="entryCount"></span>
                </div>
                <div class="wrapper__pagings">
                    <button id="prevPage"><i class='bx bxs-arrow-to-left'></i></button>
                        <span id="pages"></span>
                    <button id="nextPage"><i class='bx bxs-arrow-to-right' ></i></button>
                </div>
            </div>
    



    <script>
      
    function showDeleteConfirmation(result_id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to delete this record. This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'delete-user.php?result_id=' + result_id; 
            }
        });
    }

    
const table = document.getElementById("course-data-storage");
const rowsPerPage = 10;
let currentPage = 1;

// Event listeners for previous and next buttons
document.getElementById("prevPage").addEventListener("click", () => {
    showPage(currentPage - 1);
});

document.getElementById("nextPage").addEventListener("click", () => {
    showPage(currentPage + 1);
});

function updatePagination() {
    const maxPage = Math.ceil(table.rows.length / rowsPerPage);
    const prevPageBtn = document.getElementById("prevPage");
    const nextPageBtn = document.getElementById("nextPage");
    const entryCountSpan = document.getElementById("entryCount");
    const pagesSpan = document.getElementById("pages");

    prevPageBtn.disabled = currentPage === 1;
    nextPageBtn.disabled = currentPage === maxPage;

    const startEntry = (currentPage - 1) * rowsPerPage + 1;
    const endEntry = Math.min(currentPage * rowsPerPage, table.rows.length);

    entryCountSpan.textContent = `Showing ${startEntry} to ${endEntry} of ${table.rows.length} entries`;

    // Generate an array of page numbers to display
    let pageNumbers;
    if (maxPage <= 5) {
        pageNumbers = Array.from({ length: maxPage }, (_, i) => i + 1);
    } else {
        // Display only 5 page numbers at a time based on the current page
        const offset = Math.max(1, currentPage - 2);
        pageNumbers = Array.from({ length: 5 }, (_, i) => offset + i).filter(pageNum => pageNum <= maxPage);
    }

    // Create a string to display page numbers as links
    const pagesHTML = pageNumbers.map(pageNum => {
        const activeClass = pageNum === currentPage ? "active" : "";
        return `<a class="${activeClass}" href="javascript:void(0);" onclick="showPage(${pageNum})">${pageNum}</a>`;
    }).join(" ");

    pagesSpan.innerHTML = pagesHTML;
}


function showPage(page) {
    currentPage = page;
    for (let i = 0; i < table.rows.length; i++) {
        const isVisible = i >= (page - 1) * rowsPerPage && i < page * rowsPerPage;
        table.rows[i].style.display = isVisible ? "" : "none";
    }
    updatePagination();
}


// Initial setup
updatePagination();
showPage(currentPage);

function toggleDropdown(questionId) {
    const dropdown = document.getElementById("dropdown_" + questionId);
    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
    } else {
        dropdown.style.display = "block";
        loadCheckboxStates(questionId); // Load the checkbox states
    }
}


function recordsTable() {
    let input, filter, table, tr, td, txtValue, found;

    input = document.getElementById("table-search");
    filter = input.value.toUpperCase();
    table = document.getElementById("course-data-storage");
    tr = table.getElementsByTagName("tr");
    found = false; // Flag to track if any matching results are found

    for (let i = 0; i < tr.length; i++) {
        // Targeting the second column (index 1) and the fifth column (index 5)
        let column2 = tr[i].getElementsByTagName("td")[1];
        let column5 = tr[i].getElementsByTagName("td")[4];

        if (column2 || column5) {
            txtValue = (column2 ? column2.textContent || column2.innerText : '') + ' ' + (column5 ? column5.textContent || column5.innerText : '');

            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                found = true;
            } else {
                tr[i].style.display = "none";
            }
        }
    }

    // Show a message if no results are found
    const noResultsRow = document.getElementById('no-results-row');
    if (!found) {
        if (!noResultsRow) {
            const newRow = table.insertRow(-1);
            const newCell = newRow.insertCell(0);
            newCell.colSpan = "9"; // Replace with the actual number of columns in your table
            newCell.innerHTML = "No results found";
            newRow.id = 'no-results-row';
        } else {
            noResultsRow.style.display = ''; // Show the message row
        }
    } else if (noResultsRow) {
        noResultsRow.style.display = 'none'; // Hide the message row if results are found
    }
}




   
    

    
</script>

</body>
</html>
