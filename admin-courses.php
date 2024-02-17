<?php
        session_start();
        include("connection.php");
        
        if(!isset($_SESSION['id']))
    {
        header("location:1n4i13m9d14a-cjrh.php");
        exit();
    }
    include("presets/navigation.php");
?>
    <style>
        /* Active Link */
        .bx-code-curly{
            --active-link-clr: hsl(55, 73%, 61%);
            color: var(--active-link-clr)!important;
        }
    </style>

    <!-- HTML DOCUMENTS -->
    <!-- Admin contents -->
    <div class="contents__headings">
        <h1>Courses</h1>
    </div>

    <div class="modal-overlay" id="addModal" style="display: none;">
        <div class="modal-content">
            <h2 class="update-modal-title">Add Course</h2>
            <form method="POST" class="add-form-controls" action="add-courses.php">
                <label class="update-form-label">Course Name:</label>
                <input type="text" name="course_name" class="update-form-input" autocomplete="new-password" required>
                <label class="update-form-label">Description:</label>
                    <textarea name="description" class="update-form-textarea" autocomplete="new-password" required></textarea>
                    <label class="update-form-label">Assigned Strand:</label>
                    <input type="text" name="strand" class="update-form-input" autocomplete="new-password" required>
                        <div class="update-form-buttons">

                            <button type="submit" class="update-btn-confirm" name="add_course">Add</button>
                            <button type="button" class="update-btn-cancel" onclick="closeAddModal()">Cancel</button>
                        </div>
            </form>
        </div>
    </div>
    <!-- Table wrapper -->
    <div class="table-wrapper" tabindex="0">
        <div class="table-opr-wrapper">
            <div class="table-wrapper__search">
                <input type="text" name="" id="table-search" onkeyup="courseTable()" placeholder="Search Course..." class="search-input">
                <i class="fas fa-search search-icon"></i>
            </div>
            <button type="button" class="start-button" onclick="showAddModal()">
            <span class="button-icon"><i class="fas fa-plus"></i></span>Add Courses</button>
        </div>     
        <table>
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Course</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody id="course-data-storage" data-filter-control="true" data-show-search-clear-button="true">
                <?php
                $sql = "SELECT * FROM courses";
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    $course_id = $row['course_id'];
                    $course_name = $row['course_name'];
                    $description = $row['description'];

                    echo '<tr>
                            <td data-cell="Course ID">' . $course_id . '</td>
                            <td data-cell="Course" class="td-course-name">' . $course_name . '</td>
                            <td data-cell="Operations">

                                <a href="javascript:void(0);" onclick="showUpdateModal(' . $course_id . ')"><i class="bx bxs-edit-alt"></i></a>
                                    <div class="update-modal-overlay" id="updateModal_' . $course_id . '" style="display: none;">
                                        <div class="update-modal-content">
                                            <h2 class="update-modal-title">Update Course</h2>
                                            <form method="POST" class="update-form-controls" action="update-course.php"> 
                                                <input type="hidden" name="update_course_id" value="' . $course_id . '"> 
                                                <label class="update-form-label">New Course Name:</label>
                                                <input type="text" name="new_course_name" class="update-form-input" value="' . $course_name . '" autocomplete="new-password">
                                                <label class="update-form-label">Description:</label>
                                                    <textarea name="description" class="update-form-textarea" autocomplete="new-password">' . $description . '</textarea>
                                                        <div class="update-form-buttons">
                                                            <button type="submit" class="update-btn-confirm" name="update_submit")">Update</button>
                                                            <button type="button" class="update-btn-cancel" onclick="closeUpdateModal(' . $course_id . ')">Cancel</button>
                                                        </div>
                                            </form>
                                        </div>
                                    </div>

                                    <button class="td__button" onclick="showDeleteConfirmation(' . $course_id . ')">
                                    <i class="bx bxs-trash-alt"></i>
                                    </button>
                                
                                    <div class="modal-overlay" id="confirmationModal_' . $course_id . '" style="display: none;">
                                        <div class="modal-content">
                                            <h2>Confirm Deletion</h2>
                                                <p>Are you sure you want to delete this course?</p>
                                                    <div class="button-container">
                                                        <button class="btn-confirm" onclick="confirmDeletion(' . $course_id . ')">Yes</button>
                                                        <button class="btn-cancel" onclick="closeDeleteConfirmation(' . $course_id . ')">No</button>
                                                    </div>
                                        </div>
                                    </div>
                            </td>
                        </tr>';
                }               
                ?>
                                        
            </tbody>                           
        </table> 
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
    </div>


<script type="text/javascript">
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

  // Generate an array of page numbers
  const pageNumbers = Array.from({ length: maxPage }, (_, i) => i + 1);
  
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
    table.rows[i].style.display = i >= (page - 1) * rowsPerPage && i < page * rowsPerPage ? "" : "none";
  }
  updatePagination();
}

// Initial setup
updatePagination();
showPage(currentPage);

function showAddModal() {
        const modal = document.getElementById("addModal");
        modal.style.display = "flex";
    }

function closeAddModal() {
        const modal = document.getElementById("addModal");
        modal.style.display = "none";
    }

function showUpdateModal(courseId) {
    const modal = document.getElementById("updateModal_" + courseId);
    modal.style.display = "flex";
}

function closeUpdateModal(courseId) {
    const modal = document.getElementById("updateModal_" + courseId);
    modal.style.display = "none";
}

function confirmUpdate(courseId) {
    // Implement your update logic here
    // For example, you can redirect to an update page with the courseId
    window.location.href = 'update-course.php?updateid=' + courseId;
}

   
     function showDeleteConfirmation(userId) {
        const modal = document.getElementById("confirmationModal_" + userId);
        modal.style.display = "flex";
    }

    function closeDeleteConfirmation(userId) {
        const modal = document.getElementById("confirmationModal_" + userId);
        modal.style.display = "none";
    }

    function confirmDeletion(userId) {
        window.location.href = 'delete-course.php?confirmed=1&deleteid=' + userId;
    }
      

    function courseTable() {
    let input, filter, table, tr, td, txtValue, found;

    input = document.getElementById("table-search");
    filter = input.value.toUpperCase();
    table = document.getElementById("course-data-storage");
    tr = table.getElementsByTagName("tr");
    found = false; // Flag to track if any matching results are found

    for (let i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Assuming you are targeting the second column (adjust index as needed)
        if (td) {
            txtValue = td.textContent || td.innerText;
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
            newCell.colSpan = "3"; // Replace with the actual number of columns in your table
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