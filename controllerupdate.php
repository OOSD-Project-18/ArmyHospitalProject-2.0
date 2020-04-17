<?php
require_once 'core/init.php';
$user = new User();

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}
if (Input::exists()) {
    if (Token::check(Input::post('token'))) {
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
            

        ), $user->data()->id);
        if ($validation->passed()) {



            try {
                $user->update(array(
                    'user_first' => Input::post('user_first'),
                    'user_last' => Input::post('user_last'),
                    'user_uid' => Input::post('user_uid'),
                ));
                Session::flash('home', 'Information updated successfully');
                Redirect::to('viewhome.php');
            } catch (Exception $e) {
                Redirect::to('viewupdate.php','database connection error');
            }
        } else {
            $errors= '';
            foreach ($validation->errors() as $error) {
                $errors .= $error.'<br>';
                echo($errors);
            }
            
            Redirect::towithdata('viewupdate.php','error_msg='.$errors.'&user_first='.Input::post('user_first').'&user_last='.Input::post('user_last').'&user_uid='.Input::post('user_uid'));
        }
    }
}