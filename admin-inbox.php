<!-- PHP -->
<?php
    session_start();
    include("connection.php");

    if(!isset($_SESSION['id']))
    {
        header("location:1n4i13m9d14a-cjrh.php");
        exit();
    }

    // Top Navigation & Side Bar
    include("presets/navigation.php");
?>

    <!-- Admin Contents -->
    <div class="contents__headings">
        <h1>Invoice messages</h1>
    </div>

        <!-- Message feedbacks -->
        <div class="feedback-wrapper">
            <div class="message-section">
                <div class="feedback-nav" role="navigation">
                    <h3>Messages</h3>
                    <i class="fas fa-envelope fa-fw"></i>
                </div>
                <div class="message-col">
                    <?php
                        include 'connection.php';
                        $sql = "SELECT message FROM contact_messages";
                        $result = $con->query($sql);
                            if (!$result) {
                                die("Query error: " . $con->error);
                            }

                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<div class='message-row'><i class='bx bx-mail-send'></i><a href='#'>" . $row["message"] . "</a></div>";
                                }
                            } else {
                                echo "No messages found.";
                            }
                    ?>
                </div> 
            </div>             
        </div>