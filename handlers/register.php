<?php
require_once '../core/initfromhandlers.php';
if (Input::exists()) {
  print_r((Input::post('token')));
  print_r('-----');
  print(Session::get(Config::get('session/token_name')));
    if (Token::check(Input::post('token'))) {
      echo "3";
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
            'user_uid' => array(
                'name' => 'ID Number',
                'required' => true,
                'size' => 10,
                'unique' => 'users',
                'IDformat' => true,
            ),
            'user_pwd' => array(
                'name' => 'Password',
                'required' => true,
                'min' => 4,

            ),
            'user_pwd_again' => array(
                'name' => 'Confirmation Password',
                'required' => true,
                'matches' => 'user_pwd'
            ),
            'user_group' => array(
                'name' => 'User Category',
                'select' => 0

            ),
            'user_mobile' => array(
                'name' => 'Mobile Number',
                'required'=>true,
                'size' => 10,

            ),
            'user_email' => array(
                'name' => 'Email',
                'required'=>true,
                'email' => true,

            ),

        ));
        if ($validation->passed()) {
            $user = new User();


            try {
                $user->create(array(
                    'user_first' => Input::post('user_first'),
                    'user_last' => Input::post('user_last'),
                    'user_pwd' => Hash::make(Input::post('user_pwd')),
                    'user_uid' => Input::post('user_uid'),
                    'user_joined' => date('Y-m-d H:i:s'),
                    'user_group' => Input::post('user_group'),
                    'user_imgstatus'=>0,
                    'user_email' => Input::post('user_email'),
                    'user_mobile' => Input::post('user_mobile'),

                ));
                Session::flash('home', 'You are now registered you can now log in');
                Redirect::to('../index.php');
            } catch (Exception $e) {
                Redirect::to('../views/register.php','database error');
            }
        } else {
            $errors= '';
            foreach ($validation->errors() as $error) {
                $errors .= $error.'<br>';
                echo($errors);
            }

            Redirect::towithdata('../views/register.php','error_msg='.$errors.'&user_first='.Input::post('user_first').'&user_last='.Input::post('user_last').'&user_uid='.Input::post('user_uid').'&user_email='.Input::post('user_email').'&user_mobile='.Input::post('user_mobile'));
        }
    }
}else{
    Redirect::to('../views/register.php');
}
