<?php

/**
 * @param string $name
 * @param string $email
 * @return int
 */
function saveNewRecord($name, $email)
{
    $mysqli = new mysqli("localhost", "my_user", "my_password", "foo_database");
    $query = "INSERT INTO students (name, email) VALUES '{$name}', '{$email}'";
//    insert syntax should be
//    $query = "INSERT INTO `students` (`name`, `email`) VALUES ('$name', '$email')";

    if ($mysqli->query($query) == 1) {
        return mysqli_insert_id($mysqli);
    }
}

