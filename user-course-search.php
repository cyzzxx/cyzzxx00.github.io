<?php
// Include the database connection file
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search_query = $_POST['search_query'];

    // Create a prepared statement
    $stmt = mysqli_prepare($con, "SELECT * FROM courses WHERE course_name LIKE ?");

    // Check if the prepared statement was successfully created
    if ($stmt) {
        // Escape special characters that can be used as wildcards and add wildcards to the search query
        $search_query = '%' . str_replace(array('%', '_'), array('\%', '\_'), $search_query) . '%';

        // Bind the search query parameter
        mysqli_stmt_bind_param($stmt, "s", $search_query);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // Start building the HTML for the search results
            $output = '<ul>';

            while ($row = mysqli_fetch_assoc($result)) {
                // Add the data-course-id attribute with the course ID to each list item
                $output .= '<li data-course-id="' . $row['course_id'] . '">' . $row['course_name'] . '</li>';
            }

            $output .= '</ul>';
            echo $output;
        } else {
            // No results found
            echo '<p style="padding-left: 1rem; font-weight: 700; color: #c40233 ;">No results found.</p>';
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // Handle the case where the prepared statement creation failed
        echo 'Prepared statement creation failed.';
    }
}

// Close the database connection
mysqli_close($con);
?>