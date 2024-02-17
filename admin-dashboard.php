<!-- PHP -->
<?php
    session_start();
    include("connection.php");

        if (!isset($_SESSION['id'])) {
            header("location:1n4i13m9d14a-cjrh.php");
            exit();
        }

        //Query to get the number of users of CORE - line chart

            $sql = "SELECT strand_track, COUNT(*) as user_count FROM results GROUP BY strand_track";
            $result = mysqli_query($con, $sql);

            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = [
                    'strand_track' => $row['strand_track'],
                    'user_count' => $row['user_count']
                ];
            }

            $data_json = json_encode($data);


            //Query to get the number of users per strand - doughnut

            $sql = "SELECT DATE_FORMAT(date, '%Y-%m') AS month_year, COUNT(*) as user_count FROM results GROUP BY month_year";
            $result = mysqli_query($con, $sql);

                $line_data = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $line_data[] = [
                        'month_year' => $row['month_year'],
                        'user_count' => $row['user_count']
                    ];
                }
            $line_data_json = json_encode($line_data);



        //Query to get top 3 recommended courses for Pie Chart
           $topCoursesQuery = "
            SELECT course1, COUNT(*) as user_count
            FROM recommended_courses
            GROUP BY course1
            ORDER BY COUNT(*) DESC
            LIMIT 3
        ";

            $topCoursesResult = mysqli_query($con, $topCoursesQuery);

            $topCoursesData = [];
            $percentageData = [];

            // Calculate total users and find maxUserCount
            $totalUsers = 0;
            $maxUserCount = 0;

            $colorsForCourse1 = [
                            'rgb(173,216,230)',
                            'rgb(0,191,255)',
                            'rgb(25,25,112)',
                        ];
            while ($row = mysqli_fetch_assoc($topCoursesResult)) {
            $totalUsers += $row['user_count'];

            // Update maxUserCount if the current course has more users than the previous max
            if ($row['user_count'] > $maxUserCount) {
                $maxUserCount = $row['user_count'];
            }

            $index = count($percentageData); // Get the index for colorsForCourse1 array
            $percentageData[] = [
                    'label' => $row['course1'],
                    'user_count' => $row['user_count'],
                    'backgroundColor' => $colorsForCourse1[$index], // Assigning color based on the index
                ];
            }

            // Calculate and store percentages
            foreach ($percentageData as &$data) {
                $data['percentage'] = ($totalUsers != 0) ? ($data['user_count'] / $totalUsers) * 100 : 0;
                $data['percentage'] = round($data['percentage'], 2);
            }

            $topCoursesDataJson = json_encode($percentageData);



            // Top Navigation & Side Bar
        include("presets/navigation.php");
        ?>

    <!-- Message Unread Dot Notification -->
    <style>
        .unread-message {
            position: relative;
        }

        .unread-message::after {
            --new-msg-dot: hsl(0, 82%, 54%);
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 10px;
            height: 10px;
            background-color: var(--new-msg-dot);
            border-radius: 50%;
        }
        
        /* Active Link */
        .bxs-dashboard{
            --active-link-clr: hsl(55, 73%, 61%);
            color: var(--active-link-clr)!important;
        }
    </style>

    <!-- HTML DOCUMENT -->
    <!-- Admin contents -->
    <div class="contents__headings">
        <h1>Dashboard</h1>
    </div>

    <!-- Dashboard content wrapper -->
    <div class="contents__flex-wrapper">
         <!-- Pie chart & Doughnut Chart Wrapper -->
         <div class="pie-dough__wrapper">
            <!-- Pie chart wrapper -->                 
            <div class="wrapper__pie-chart">
                <div class="chart-headings">
                    <h3>Top Recommended Courses</h3>
                    <div class="hr-divider" role="separator"></div>
                </div>
                <canvas id="pieChart" class="pie-chart--data" width="500" height="auto"></canvas>
            </div>
            <!-- Doughnut chart wrapper -->
            <div class="wrapper__dough-chart">
                <div class="chart-headings">
                    <h3>Number of users per strand</h3>
                    <div class="hr-divider" role="separator"></div>
                </div>    
                <canvas id="doughnutChart" class="dough-chart--data" width="300" height="auto"></canvas>
            </div>  
        </div>   
        <!-- Line Chart Flex area -->
        <div class="line-chart-flex">
            <!-- Recent top users -->
            <div class="line-chart__recent-users">
                <div class="header-wrapper--flex">
                    <h3>Recent Users</h3>
                    <i class='bx bxs-user-detail'></i>
                </div>                  
                    <div class="hr-divider" role="separator"></div>
                    <?php
                        include("connection.php");

                        // Query to get the 10 most recent users sorted by date
                        $query = "SELECT fname, lname, date FROM results ORDER BY date DESC LIMIT 10";
                        $result = mysqli_query($con, $query);

                        if (mysqli_num_rows($result) > 0) {
                            echo '<div class="recent-user-wrapper">';
                            echo '<ul>';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<li>' . $row['fname'] . ' ' . $row['lname'] . ' - ' . $row['date'] . '</li>';
                            }
                            echo '</ul>';
                            echo '</div>';
                        } else {
                            echo 'No recent users found.';
                        }
                    ?>               
            </div>          
            <!-- Line Chart Wrapper -->
            <div class="wrapper__line-chart">
                <div class="header-wrapper--flex">
                    <h3>Number of users of CORE</h3>
                    <i class='bx bxs-user-plus'></i>                
                </div>
                <div class="hr-divider" role="separator"></div>
                <!-- Select Year Dropdown -->
                <div class="year-select-wrapper">
                        <!-- Year dropdown -->
                        <div class="year-dropdown">
                            <label for="yearSelect">Select Year:</label>
                            <select id="yearSelect" onchange="updateLineChart()">
                                <!-- PHP code to populate the dropdown with available years -->
                                <?php
                                    $availableYears = [];
                                    foreach ($line_data as $item) {
                                        $year = substr($item['month_year'], 0, 4);
                                        if (!in_array($year, $availableYears)) {
                                            $availableYears[] = $year;
                                    ?>
                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                    <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                </div>
                <canvas class="line-chart--data" id="lineChart" width="600" height="auto"></canvas>
            </div>
        </div>
        <!-- Message feedbacks -->
        <div class="feedback-wrapper">
            <div class="message-section">
                <div class="feedback-nav" role="navigation">
                    <div class="title-wrapper">
                        <h3>Messages</h3>
                        <i class="fas fa-envelope fa-fw"></i>
                    </div>               
                    <ul class="feed-nav__link-wrapper">
                        <li>
                            <div class="link-items">
                                <i class='bx bx-sort'></i>
                                    <select id="message-sort">
                                        <option value="old">Old</option>
                                        <option value="newest">Newest</option>
                                    </select>
                            </div>
                        </li>
                        <li>
                            <div class="link-items"  id="mark-all-as-read">
                                <i class='bx bx-check-double'></i>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="message-col">
                    <?php
                        include 'connection.php';
                        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'newest';
                        
                        // Define the SQL query for selecting messages
                        $sql = "SELECT id, message, email FROM contact_messages";

                        // Add ordering based on the selected sorting option
                        if ($sort === 'old') {
                            $sql .= " ORDER BY id ASC";
                        } else {
                            $sql .= " ORDER BY id DESC";
                        }
                        
                        $result = $con->query($sql);

                        if (!$result) {
                            die("Query error: " . $con->error);
                        }

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $email = $row["email"];
                                $messageContent = $row["message"];
                                $messageId = $row["id"]; // Include the message ID
                                echo "<div class='message-row clickable-message' data-email='" . $email . "' data-id='" . $messageId . "'><a>" . $messageContent . 
                                    "</a><i class='fas fa-trash-alt delete-icon' data-id='" . $messageId . "'></i></div>";
                        }   
                        } else {
                            echo "<em style='font-weight: 700; color: purple;'>No messages found.</em>";
                        }
                    ?>
                </div>
            </div>
            <div class="message-full-view-section">
                <div class="section__icon-wrapper">
                    <div id="chatIconWrapper">
                       <img src="assets/images/chat.png" alt="" width="125">
                        <h3>No message selected</h3>
                    </div>  
                    <div id="selected-email" class="messageWrapper"></div>
                    <div id="selected-message" class="messageWrapper"></div>              
                </div>                                   
            </div>
        </div>
    </div>
                    
    <!-- Message functions -->
    <script>
        const clickableMessages = document.querySelectorAll('.clickable-message');
        const noMessageSelected = document.getElementById('chatIconWrapper');
        const selectedMessage = document.querySelector('.messageWrapper');
        const selectedEmail = document.querySelector('#selected-email');
        const selectedMessageContent = document.querySelector('#selected-message');
        const markAllAsReadButton = document.getElementById('mark-all-as-read');
        const messageSort = document.getElementById('message-sort');

            // Function to mark a message as read
            function markAsRead(row) {
                const email = row.getAttribute('data-email');
                row.classList.remove('unread-message');
                localStorage.setItem(email, 'read');
            }
                clickableMessages.forEach(row => {
                const email = row.getAttribute('data-email');
                const isRead = localStorage.getItem(email) === 'read';

                    if (!isRead) {
                    row.classList.add('unread-message');
                    }
                        row.addEventListener('click', () => {
                        noMessageSelected.style.display = 'none';
                        selectedMessage.style.display = 'block';

                            const email = row.getAttribute('data-email');
                            const messageContent = row.textContent;
                            const messageId = row.getAttribute('data-id');

                                selectedEmail.textContent = 'Email: ' + email;
                                selectedMessageContent.textContent = messageContent;
                                markAsRead(row);
                        });
                });

        markAllAsReadButton.addEventListener('click', () => {
        clickableMessages.forEach(row => markAsRead(row));
        });
               // Add event listener for delete icons
const deleteIcons = document.querySelectorAll('.delete-icon');
deleteIcons.forEach(deleteIcon => {
    deleteIcon.addEventListener('click', () => {
        event.stopPropagation(); // Prevent the click event from propagating to the message click handler
        const messageId = deleteIcon.getAttribute('data-id');
        
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send an AJAX request to delete the message
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete-messages.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            // Message was deleted on the server, now remove it from the UI
                            const messageRow = document.querySelector(`.clickable-message[data-id="${messageId}`);
                            if (messageRow) {
                                messageRow.remove();
                                
                                // Clear the selected message
                                selectedEmail.textContent = '';
                                selectedEmail.style.display = 'none'; // Hide the email element
                                selectedMessageContent.textContent = '';
                                noMessageSelected.style.display = 'block';
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Failed to delete the message. Please try again.'
                            });
                        }
                    }
                };
                xhr.send(`delete_message_id=${messageId}`);
            }
        });
    });
});


        function sortMessages(sortOrder) {
            const messageCol = document.querySelector('.message-col');
            const messages = Array.from(messageCol.querySelectorAll('.clickable-message'));

            messages.sort((a, b) => {
                const idA = parseInt(a.getAttribute('data-id'));
                const idB = parseInt(b.getAttribute('data-id'));

                if (sortOrder === 'newest') {
                    return idB - idA;
                } else {
                return idA - idB;
                }
            });

            messageCol.innerHTML = '';
            messages.forEach((message) => messageCol.appendChild(message));
        }

        messageSort.addEventListener('change', function () {
        const selectedSortOrder = this.value;
            sortMessages(selectedSortOrder);
        });
    </script>

    <!-- Pie Chart -->
 <script>
 // Create data for the pie chart using PHP result
var percentageData = <?php echo $topCoursesDataJson; ?>;
var totalUsers = <?php echo $totalUsers; ?>;

// Extract labels and data for the pie chart
var pieLabels = percentageData.map(function (item) {
    return item.label;
});

var pieData = percentageData.map(function (item) {
    return item.user_count;
});

var pieCtx = document.getElementById('pieChart').getContext('2d');

var pieChart = new Chart(pieCtx, {
    type: 'pie',
    data: {
        labels: pieLabels,
        datasets: [{
            data: pieData,
            backgroundColor: percentageData.map(function (item) {
                return item.backgroundColor;
            }),
        }]
    },
    options: {
        responsive: false,
        maintainAspectRatio: true,
        plugins: {
            tooltip: {
                callbacks: {
                    label: function (context) {
                        var label = context.label || '';
                        var userCount = context.parsed.y || 0;
                        var percentage = percentageData[context.dataIndex].percentage.toFixed(2);
                        return  percentage + '%'
                    },
                },
            },
        },
    },
});

</script>

    <!-- Doughnut Chart -->
    <script type="text/javascript"> 
        var chartData = <?php echo $data_json; ?>;

        // Extract labels and values for the doughnut chart
        var labels = chartData.map(function(item) {
            return item.strand_track;
        });

        var data = chartData.map(function(item) {
            return item.user_count;
        });

        var ctx = document.getElementById('doughnutChart').getContext('2d');
        var doughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
                        'rgb(173,216,230)',
                        'rgb(0,191,255)',
                        'rgb(25,25,112)',
                    ]
                }]
            },
                options: {
                    responsive: false,
                    maintainAspectRatio: false
                }
        });
    </script>
    <!-- Line Chart -->
    <script>
        var chartData = <?php echo $data_json; ?>;
        var lineChartData = <?php echo $line_data_json; ?>;
        var allMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var monthData = {};

        lineChartData.forEach(function(item) {
            var date = new Date(item.month_year);
            var year = date.getFullYear();
            var month = date.getMonth() + 1; // Month is 0-based, so add 1 to get the correct month.
            if (!monthData[year]) {
                monthData[year] = {};
            }
            monthData[year][month] = item.user_count;
        });

        // Function to update the line chart based on the selected year
        function updateLineChart() {
            var selectedYear = document.getElementById('yearSelect').value;
            var lineData = allMonths.map(function(month, index) {
                var userCount = monthData[selectedYear] && monthData[selectedYear][index + 1]; // Adjust month index
                return userCount || 0;
            });

            // Update the line chart data
            lineChart.data.datasets[0].data = lineData;
            lineChart.update();
        }

        var lineData = allMonths.map(function(month) {
            return 0;
        });

        var lineCtx = document.getElementById('lineChart').getContext('2d');
        var doughnutCtx = document.getElementById('doughnutChart').getContext('2d');

        const MIN_Y_AXIS = 0;
        const MAX_Y_AXIS = 100;

        var lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: allMonths,
                datasets: [{
                    label: 'Users per Month',
                    data: lineData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        },
                        ticks: {
                            autoSkip: false,
                            maxRotation: 0,
                        }
                    },
                    y: {
                        beginAtZero: true,
                        min: MIN_Y_AXIS,
                        max: MAX_Y_AXIS,
                        title: {
                            display: true,
                            text: 'User Count'
                        }
                    }
                }
            }
        });

        // Call the updateLineChart and updateDoughnutChart functions to display data for the initial selected year
        updateLineChart();
    </script>
    

    
    
