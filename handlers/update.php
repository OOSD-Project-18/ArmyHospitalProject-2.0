<?php
require_once '../core/initfromhandlers.php';
$user = new User();

if (!$user->isLoggedIn()) {
    Redirect::to('../index.php');
}
if (Input::existsPost()) {//if postexists

    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'user_first' => array(
            'name' => 'First name',
            'required' => true,
            'min' => 2,
            'max' => 50,

        ),
        'user_last' => array(
            'name' => 'Last name',
            'required' => true,
            'min' => 2,
            'max' => 50,

        ),
        'user_email' => array(
            'name' => 'Email',
            'required' => true,
            'email' => true,

        ),
        'user_mobile' => array(
            'name' => 'Mobile Number',
            'required' => true,
            'size' => 10,

        ),



    ), $user->data()->id);
    if ($validation->passed()) {



        try {
            $user->update(array(
                'user_first' => Input::post('user_first'),
                'user_last' => Input::post('user_last'),
                'user_email' => Input::post('user_email'),
                'user_mobile' => Input::post('user_mobile'),
            ));
            Session::flash('home', 'Information updated successfully');
            Redirect::to('../views/home.php');
        } catch (Exception $e) {
            Redirect::to('../views/update.php', 'database connection error');
        }
    } else {
        $errors = '';
        foreach ($validation->errors() as $error) {
            $errors .= $error . '<br>';
            echo ($errors);
        }

        Redirect::towithdata('../views/update.php', 'error_msg=' . $errors . '&user_first=' . Input::post('user_first') . '&user_last=' . Input::post('user_last') . '&user_uid=' . Input::post('user_uid'));
    }
} else {
    Redirect::to('../views/update.php');
}
