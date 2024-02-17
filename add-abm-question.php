<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['add_question'])) {
        if (isset($_POST['question_text'], $_POST['qtype'], $_POST['assigned_course'])) {
            $question_text = mysqli_real_escape_string($con, $_POST['question_text']);
            $qtype = mysqli_real_escape_string($con, $_POST['qtype']);
            $assigned_course = mysqli_real_escape_string($con, $_POST['assigned_course']);
            $keyword = mysqli_real_escape_string($con, $_POST['keyword']);

            if (!empty($question_text)) {
                $id = mt_rand(10000000, 99999999);

                if ($qtype === 'academic') {
                    // Insert into question_abm_acad
                    $insertQuery = "INSERT INTO question_abm_acad (id, question_text, qtype, assigned_course, keyword) VALUES ('$id', '$question_text', '$qtype', '$assigned_course', '$keyword')";
                    if (mysqli_query($con, $insertQuery)) {
                        // Additional fields for academic questions
                        $choiceA = mysqli_real_escape_string($con, $_POST['a']);
                        $choiceB = mysqli_real_escape_string($con, $_POST['b']);
                        $choiceC = mysqli_real_escape_string($con, $_POST['c']);
                        $choiceD = mysqli_real_escape_string($con, $_POST['d']);
                        $correctAnswer = mysqli_real_escape_string($con, $_POST['correct_answer']);

                        // Update the academic question
                        $updateQuery = "UPDATE question_abm_acad 
                                        SET a='$choiceA', b='$choiceB', c='$choiceC', d='$choiceD', correct_answer='$correctAnswer', keyword='$keyword'
                                        WHERE id='$id'";

                        if (!mysqli_query($con, $updateQuery)) {
                            echo "Error updating academic question: " . mysqli_error($con);
                        }
                    } else {
                        echo "Error inserting academic question: " . mysqli_error($con);
                    }
                } elseif ($qtype === 'interest') {
                    // Insert into question_abm_int
                    $insertQuery = "INSERT INTO question_abm_int (id, question_text, qtype, assigned_course, keyword) VALUES ('$id', '$question_text', '$qtype', '$assigned_course', '$keyword')";
                    if (!mysqli_query($con, $insertQuery)) {
                        echo "Error inserting interest question: " . mysqli_error($con);
                    }
                }

                header("Location: admin-abm-questions.php");
                exit();
            }
        }
    } elseif (isset($_POST['return'])) {
        header("Location: admin-abm-questions.php");
        exit;
    }
}
?>
