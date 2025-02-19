<?php

function newsSiteValidateInput($data, $type = "text")
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    if (empty($data)) {
        return ['value' => "", "error" => "Please enter a valid data."];
    }

    switch ($type) {
        case "email":
            if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
                return ['value' => $data, "error" => "Invalid email format."];
            }
            break;

        case "password":
            if (strlen($data) < 6) {
                return ['value' => $data, "error" => "Password must be at least 6 characters long.'"];
            }
            break;

        case "html_entity_check":
            if ($data !== htmlentities($data)) {
                return ['value' => $data, "error" => "Invalid characters detected."];
            }
    }


}