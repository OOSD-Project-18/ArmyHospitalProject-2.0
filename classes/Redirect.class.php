<?php

class Redirect
{
    public static function to($location = null, $error = null)
    {
        if ($location && !$error) {

            header('Location:' . $location);
            exit();
        } else if ($location && $error) {

            header('Location:' . $location . '?error_msg=' . $error);
        }
    }
    public static function towithdata($location = null, $data = null)
    {
        if ($location && !$data) {

            header('Location:' . $location);
            exit();
        } else if ($location && $data) {

            header('Location:' . $location . '?' . $data);
        }
    }
}
