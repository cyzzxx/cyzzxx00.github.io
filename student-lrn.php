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
        .bx-id-card{
            --active-link-clr: hsl(55, 73%, 61%);
            color: var(--active-link-clr)!important;
        }
    </style>

    <!-- HTML DOCUMENTS -->
    <!-- Admin contents -->
    <div class="contents__headings">
        <h1>Students LRN</h1>
    </div>

    <div class="modal-overlay" id="addModal" style="display: none;">
        <div class="modal-content">
            <h2 class="update-modal-title">Add LRN</h2>
            <form method="POST" id="addLRNForm" class="add-form-controls" action="add-lrn.php">
                <label class="update-form-label">Student LRN:</label>
                <input type="number" name="student_lrn" id="lrn" class="update-form-input" autocomplete="new-password" required>
                    <div class="update-form-buttons">
                        <button type="submit" class="update-btn-confirm" name="add_lrn">Add</button>
                        <button type="button" class="update-btn-cancel" onclick="closeAddModal()">Cancel</button>
                    </div>
                </form>
        </div>
    </div>
    <!-- Add a form for CSV file upload -->
   <div class="modal-overlay" id="addCsvModal" style="display: none;">
    <div class="modal-content csv-modal">
        <h2 class="update-modal-title">Add File in CSV Format</h2>
        <form id="csvForm" enctype="multipart/form-data" method="POST" action="import-csv.php">
            <label for="file-upload" class="modal-content__csv-input">
                <input type="file" name="csv_file" accept=".csv" id="file-upload" onchange="displaySelectedFileName(this)">
                <span id="selected-file-name">Upload File</span>
            </label>               
            <div class="modal-content__csv-button-wrapper">
                <button type="submit" class="update-btn-confirm" name="add_csv">Add</button>
                <button type="button" class="update-btn-cancel" onclick="closeAddCsvModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>
    <!-- Table wrapper -->
    <div class="table-wrapper" tabindex="0">
        <div class="table-opr-wrapper">
            <div class="table-wrapper__search">
                <input type="search" name="" id="table-search" onkeyup="lrnTable()" placeholder="Search by LRN" class="search-input">
                <i class="fas fa-search search-icon"></i>
            </div>
             <button type="button" class="start-button" onclick="showDeletelrn()">
                    <span class="button-icon"></span>Delete Student LRN</button>
                <button type="button" class="start-button" onclick="showAddModal()">
                    <span class="button-icon"><i class="fas fa-plus"></i></span>Add Student LRN</button>
                <button type="submit" class="start-button" onclick="showAddCsvModal()">
                    <span class="button-icon"><i class="fas fa-upload"></i></span>Import CSV file</button>
        </div>     
        <table>
            <thead>
                <tr>
                    <th>Student LRN</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody id="course-data-storage" data-filter-control="true" data-show-search-clear-button="true">
               <?php
                    $sql = "SELECT * FROM lrn";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $student_lrn = $row['student_lrn'];
            

                    echo '<tr>
                            <td data-cell="Student LRN">' . $student_lrn . '</td>
                            <td data-cell="Operations">

                            <button class="td__button" onclick="showDeleteConfirmation(' . $id . ')">
                                    <i class="bx bxs-trash-alt"></i>
                                    </button>
                                
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


   
     function showDeleteConfirmation(Id) {
        const modal = document.getElementById("confirmationModal_" + Id);
        modal.style.display = "flex";
    }

    function closeDeleteConfirmation(Id) {
        const modal = document.getElementById("confirmationModal_" + Id);
        modal.style.display = "none";
    }

    function confirmDeletion(Id) {
        window.location.href = 'delete-lrn.php?confirmed=1&deleteid=' + Id;
    }
      

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
    }
}
  document.getElementById("table-search").addEventListener("input", function() {
    var value = this.value;
    // Remove any non-digit characters
    var newValue = value.replace(/\D/g, '');
    // Limit the input to 12 digits
    newValue = newValue.slice(0, 12);
    // Update the input value
    this.value = newValue;
});

        

// restrict LRN to 12 digits
        document.getElementById("lrn").addEventListener("input", function() {
            var value = this.value;
            // Remove any non-digit characters
            var newValue = value.replace(/\D/g, '');
            // Limit the input to 12 digits
            newValue = newValue.slice(0, 12);
            // Update the input value
            this.value = newValue;
        });

        // Add event listener to validate input exactly 12 digits before form submission
        document.getElementById("modalForm").addEventListener("submit", function(event) {
            var lrnValue = document.getElementById("lrn").value;
            // If the LRN input is not exactly 12 digits, prevent form submission
            if (lrnValue.length !== 12) {
                event.preventDefault();
                alert("Please enter exactly 12 digits for the LRN.");
            }
        });

//CSV IMPORT
function showAddModal() {
        const modal = document.getElementById("addModal");
        modal.style.display = "flex";
    }

function closeAddModal() {
        const modal = document.getElementById("addModal");
        modal.style.display = "none";
    }

function showAddCsvModal() {
        const modal = document.getElementById("addCsvModal");
        modal.style.display = "flex";
    }

function closeAddCsvModal() {
        const modal = document.getElementById("addCsvModal");
        modal.style.display = "none";
    }



document.querySelector("#csvForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch("import-csv.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (response.ok) {
            // Redirect or perform actions after successful import if needed
            console.log("CSV file imported successfully!");
        } else {
            console.error("Failed to import CSV file.");
        }
    })
    .catch(error => console.error("Error:", error));
});
//SEARCH BY LRN
function lrnTable() {
    var input = document.getElementById('table-search').value.toLowerCase();
    var rows = document.querySelectorAll('#course-data-storage tr'); // Select all table rows
    var found = false; // Flag to track if any match is found

    rows.forEach(function(row) {
        var student_lrn = row.getElementsByTagName('td')[0].textContent.toLowerCase(); // Get content of the 'fname' column

        if (student_lrn.includes(input)) { // Check for 'fname' or 'lrn' match
            row.style.display = ''; // Show the row
            found = true; // Set flag to true if match is found
        } else {
            row.style.display = 'none'; // Hide the row
        }
    });

    // Create and display a message if no results are found
    var messageRow = document.getElementById('no-results-row');
    if (!found && input !== "") {
        if (!messageRow) {
            messageRow = document.createElement('tr');
            messageRow.id = 'no-results-row';
            var cell = messageRow.insertCell(0);
            cell.colSpan = "7"; // Span all columns in the row
            cell.textContent = 'No matching results found';
            var table = document.getElementById('course-data-storage');
            table.appendChild(messageRow);
        } else {
            messageRow.style.display = ''; // Show the message row
        }
    } else if (messageRow) {
        messageRow.style.display = 'none'; // Hide the message row if results are found or input is cleared
    }

    // Restore all rows if the search input is cleared
    if (input === "") {
        rows.forEach(function(row) {
            row.style.display = ''; // Show all rows
        });
        if (messageRow) {
            messageRow.style.display = 'none'; // Hide the message row if input is cleared
        }
    }
}
 function showDeletelrn() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action will delete all student LRN. Are you sure you want to proceed?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete all!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to delete-all-lrn.php if confirmed
                window.location.href = 'delete-all-lrn.php';
            }
        });
    }


</script>
<script>
    function displaySelectedFileName(input) {
        const fileNameElement = document.getElementById('selected-file-name');
        if (input.files.length > 0) {
            fileNameElement.textContent = input.files[0].name;
        } else {
            fileNameElement.textContent = 'Upload File';
        }
    }

    function closeAddCsvModal() {
        document.getElementById('addCsvModal').style.display = 'none';
    }
</script>
<script>
        $(window).resize( function() {
            window.location.href = window.location.href;
        });
    </script>
</body>
</html>