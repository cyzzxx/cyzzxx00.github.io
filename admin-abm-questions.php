<?php
session_start();
include("connection.php");

if (!isset($_SESSION['id'])) {
    header("location:1n4i13m9d14a-cjrh.php");
    exit();
}
include("presets/navigation.php");

// Default table name
$tableName = "question_abm_int";

// Handle the filter if an option is selected
if (isset($_GET['filter'])) {
    $filterValue = $_GET['filter'];
    if ($filterValue === 'interest') {
        $tableName = "question_abm_int";
    } elseif ($filterValue === 'academic') {
        $tableName = "question_abm_acad";
    }
} else {
    // Set a default filter value if not provided
    $filterValue = 'all';
}

// Build the SQL query with the dynamic table name
if ($filterValue === 'all') {
    // If the filter is set to 'all', select from both tables with explicitly specified columns
    $sql = "SELECT id, question_text, qtype FROM question_abm_int UNION SELECT id, question_text, qtype FROM question_abm_acad";
} else {
    // If a specific filter is selected, select from the corresponding table
    $sql = "SELECT * FROM $tableName";
}

// Fetch question data
$result = mysqli_query($con, $sql);
?>

        <!-- HTML DOCUMENT -->
        <!-- Admin contents -->
        <div class="contents__headings">
            <h1>Assessment</h1>
        </div>

        <div class="table-operations">
            <!-- Add button -->
            <button type="button" class="start-button" onclick="showAddModal()">
                <span class="button-icon"><i class="fas fa-plus"></i></span>Add Question
            </button>

            <!-- Filter form -->
            <div class="table-search-container"> 
                <label for="filterValue">Filter by Type &nbsp;</label>
                <select name="filterValue" id="filterValue" onchange="filterQuestions()">
                    <option value="all">All</option>
                    <option value="interest">Interest</option>
                    <option value="academic">Academic</option>
                </select>
            </div>
        </div>

        <!-- Add Question Modal -->
        <div class="modal-overlay" id="addModal" style="display: none;">
            <div class="modal-content">
                <h2 class="update-modal-title">Add Question</h2>
                <form method="POST" class="add-form-controls" action="add-abm-question.php">
                    <label class="update-form-label">Question:</label>
                    <input type="text" name="question_text" class="update-form-input" autocomplete="new-password" required>

                    <div class="qtype-section">
                        <label class="update-form-label">Question Type:</label>
                        <select name="qtype" class="update-form-input" id="qtypeSelect">
                            <option value="interest">Interest</option>
                            <option value="academic">Academic</option>
                        </select>
                    </div>

                    <div id="choicesInput" style="display: none;">
                        <label class="update-form-label">Choices:</label>
                        <input type="text" name="a" class="update-form-input" placeholder="Choice a" autocomplete="new-password">
                        <input type="text" name="b" class="update-form-input" placeholder="Choice b" autocomplete="new-password">
                        <input type="text" name="c" class="update-form-input" placeholder="Choice c" autocomplete="new-password">
                        <input type="text" name="d" class="update-form-input" placeholder="Choice d" autocomplete="new-password">
                    </div>

                    <div class="correct-answer-section" style="display: none;">
                        <label class="update-form-label">Correct Answer:</label>
                        <select name="correct_answer" class="update-form-input">
                            <option value="a">a</option>
                            <option value="b">b</option>
                            <option value="c">c</option>
                            <option value="d">d</option>
                        </select>
                    </div>
                    <label class="update-form-label">Keyword:</label>
                    <input type="text" name="keyword" class="update-form-input" autocomplete="new-password" required>

                        <?php
                            $courseSql = "SELECT course_name FROM courses WHERE strand = 'ABM'";
                            $courseResult = mysqli_query($con, $courseSql);
                            $courseData = array();

                            while ($courseRow = mysqli_fetch_assoc($courseResult)) {
                                $courseData[] = $courseRow;
                            }
                        ?>
                    <div class="assigned-course-section">
                        <label class="update-form-label">Assigned Course:</label>
                            <select name="assigned_course" class="update-form-input">
                                <option value="">Select an assigned course</option>
                                <?php
                                foreach ($courseData as $course) {
                                    $courseName = $course['course_name'];
                                    echo "<option value=\"$courseName\">$courseName</option>";
                                    }
                                    ?>
                            </select>
                    </div>
                        <div class="update-form-buttons">
                            <button type="submit" class="update-btn-confirm" name="add_question">Add</button>
                            <button type="button" class="update-btn-cancel" onclick="closeAddModal()">Cancel</button>
                        </div>
                </form>
            </div>
        </div>

        <!-- Table wrapper -->
        <div class="table-wrapper" tabindex="0">
            <div class="table-opr-wrapper">
                <div class="table-wrapper__search">
                    <input type="text" name="" id="table-search" onkeyup="courseTable()" placeholder="Search Question..." class="search-input">
                    <i class="fas fa-search search-icon alter-icon"></i>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Question ID</th>
                        <th>Questions</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody id="course-data-storage" data-filter-control="true" data-show-search-clear-button="true">
                    <?php                 
                        // Retrieve course data before the loop
                        $courseSql = "SELECT * FROM courses";
                        $courseResult = mysqli_query($con, $courseSql);
                        $courseData = array();

                        while ($courseRow = mysqli_fetch_assoc($courseResult)) {
                            $courseData[] = $courseRow;
                        }
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $question_text = $row['question_text'];

                            echo '<tr>
                                    <td data-cell="Question ID">' . $id . '</td>
                                    <td data-cell="Questions" class="td-questions">' . $question_text . '</td>
                                    <td data-cell="Operations" class="buttons-flex-row">

                                        <a href="javascript:void(0);" onclick="showUpdateModal(' . $id . ')"><i class="bx bxs-edit-alt"></i></a>
                                        <!-- Update Question Modal -->
                                        <div class="update-modal-overlay" id="updateModal_' . $id . '" style="display: none;">
                                            <div class="update-modal-content">
                                                <h2 class="update-modal-title">Update Question</h2>
                                                <form method="POST" class="update-form-controls" action="update-abm-question.php">
                                                    <!-- Update the action attribute -->
                                                    <input type="hidden" name="update_question_id" value="' . $id . '">
                                                    <!-- Add a hidden field for the question ID -->
                                                    <label class="update-form-label">New Question:</label>
                                                    <input type="text" name="new_question_name" class="update-form-input" value="' . $question_text . '" autocomplete="new-password">
                                                    <div class="update-form-buttons">
                                                        <button type="submit" class="update-btn-confirm" name="update_submit">Update</button>
                                                        <button type="button" class="update-btn-cancel" onclick="closeUpdateModal(' . $id . ')">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <button class="td__button" onclick="showDeleteConfirmation(' . $id . ')"><i class="bx bxs-trash-alt"></i></button>
                                        <!-- Delete Confirmation Modal -->
                                        <div class="modal-overlay" id="confirmationModal_' . $id . '" style="display: none;">
                                            <div class="modal-content">
                                                <h2>Confirm Deletion</h2>
                                                <p>Are you sure you want to delete this course?</p>
                                                <div class="button-container">
                                                    <button class="btn-confirm" onclick="confirmDeletion(' . $id . ')">Yes</button>
                                                    <button class="btn-cancel" onclick="closeDeleteConfirmation(' . $id . ')">No</button>
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
    

    <script>
    
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
        

        // Function to show the Add Modal
        function showAddModal() {
            const modal = document.getElementById("addModal");
            modal.style.display = "flex";
        }

        function closeAddModal() {
            const modal = document.getElementById("addModal");
            modal.style.display = "none";
        }

        // JavaScript function to filter questions dynamically
        function filterQuestions() {
            var filterValue = document.getElementById("filterValue").value;
            window.location.href = '?filter=' + filterValue;
        }

        // Initialize the dropdown with the current filter value on page load
        var currentFilter = "<?php echo isset($_GET['filter']) ? $_GET['filter'] : 'all'; ?>";
        document.getElementById("filterValue").value = currentFilter;


        function showUpdateModal(questionId) {
            const modal = document.getElementById("updateModal_" + questionId);
            modal.style.display = "flex";
        }

        function closeUpdateModal(questionId) {
            const modal = document.getElementById("updateModal_" + questionId);
            modal.style.display = "none";
        }

        function confirmUpdate(questionId) {
        
            window.location.href = 'update-abm-question.php?updateid=' + questionId;
        }

       
         function showDeleteConfirmation(questionId) {
            const modal = document.getElementById("confirmationModal_" + questionId);
            modal.style.display = "flex";
        }

        function closeDeleteConfirmation(questionId) {
            const modal = document.getElementById("confirmationModal_" + questionId);
            modal.style.display = "none";
        }

        function confirmDeletion(questionId) {
            window.location.href = 'delete-abm-question.php?confirmed=1&deleteid=' + questionId;
        }
          


let questionsPerPage = 10; // Set the number of questions to display per page

function courseTable() {
    let input, filter, table, tr, td, txtValue, found;

    input = document.getElementById("table-search");
    filter = input.value.toUpperCase();
    table = document.getElementById("course-data-storage");
    tr = table.getElementsByTagName("tr");
    found = false; // Flag to track if any matching results are found

    for (let i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; 
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
    if (!found) {
        const noResultsRow = document.createElement("tr");
        const noResultsCell = document.createElement("td");
        noResultsCell.colSpan = 7; // Span all columns
        noResultsCell.innerText = "No matching results found";
        noResultsRow.appendChild(noResultsCell);

        // Remove any existing message row
        const existingMessageRow = table.querySelector(".no-results-row");
        if (existingMessageRow) {
            existingMessageRow.remove();
        }

        noResultsRow.className = "no-results-row";
        table.appendChild(noResultsRow);
    } else {
        // Remove the "No results found" message if there are new results
        const existingMessageRow = table.querySelector(".no-results-row");
        if (existingMessageRow) {
            existingMessageRow.remove();
        }
    }

    // Restore all rows if the search input is cleared
    if (filter === "") {
        for (let i = 0; i < tr.length; i++) {
            tr[i].style.display = "";
        }
        // Display only the first 10 questions (or as per the questionsPerPage variable)
        for (let i = questionsPerPage; i < tr.length; i++) {
            tr[i].style.display = "none";
        }
    }
}



        // JavaScript function to filter questions dynamically
        function filterQuestions() {
            var filterValue = document.getElementById("filterValue").value;
            window.location.href = '?filter=' + filterValue;
        }

        // Initialize the dropdown with the current filter value on page load
        var currentFilter = "<?php echo isset($_GET['filter']) ? $_GET['filter'] : 'all'; ?>";
        document.getElementById("filterValue").value = currentFilter;
    </script>

    <!-- JavaScript code for your HTML page -->
    <script>
        // Function to save checkbox states in localStorage
        function saveCheckboxState(questionId, courseId, state) {
            const key = `checkbox_${questionId}_${courseId}`;
            localStorage.setItem(key, state ? 'checked' : 'unchecked');
        }

        // Function to load and set checkbox states from localStorage
        function loadCheckboxStates() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach((checkbox) => {
                const questionId = checkbox.getAttribute('data-question-id');
                const courseId = checkbox.value;
                const key = `checkbox_${questionId}_${courseId}`;
                const state = localStorage.getItem(key);

                if (state === 'checked') {
                    checkbox.checked = true;
                }

                // Add an event listener for checking checkboxes
                checkbox.addEventListener('change', function () {
                    saveCheckboxState(questionId, courseId, checkbox.checked);
                });
            });
        }

        // Function to handle checkbox behavior
        function handleCheckboxes() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach((checkbox) => {
                const questionId = checkbox.getAttribute('data-question-id');

                // Add an event listener to checkboxes within the same question group
                checkbox.addEventListener('change', function () {
                    if (checkbox.checked) {
                        checkboxes.forEach((otherCheckbox) => {
                            if (otherCheckbox.getAttribute('data-question-id') === questionId) {
                                otherCheckbox.disabled = true; // Make other checkboxes read-only
                            }
                        });
                    } else {
                        checkboxes.forEach((otherCheckbox) => {
                            if (otherCheckbox.getAttribute('data-question-id') === questionId) {
                                otherCheckbox.disabled = false; // Enable other checkboxes
                            }
                        });
                    }
                });
            });
        }

        // Call the function to load checkbox states when the page loads
        loadCheckboxStates();

        // Call the function to handle checkbox behavior when the page loads
        handleCheckboxes();
    </script> 
    <script type="text/javascript">
        // Function to show/hide choices and correct answer fields based on the selected option
        function toggleFieldsBasedOnQType() {
            const qtypeSelect = document.getElementById("qtypeSelect");
            const choicesInput = document.getElementById("choicesInput");
            const correctAnswerSection = document.querySelector(".correct-answer-section");

            if (qtypeSelect.value === "academic") {
                // If "Academic" is selected, show the choices and correct answer fields
                choicesInput.style.display = "block";
                correctAnswerSection.style.display = "block";
            } else {
                // If "Interest" is selected, hide the choices and correct answer fields
                choicesInput.style.display = "none";
                correctAnswerSection.style.display = "none";
            }
        }

        // Attach an event listener to the qtype select box to trigger the function
        document.getElementById("qtypeSelect").addEventListener("change", toggleFieldsBasedOnQType);

        // Call the function initially to set the initial state based on the selected option
        toggleFieldsBasedOnQType();
    </script>
</body>
</html>

