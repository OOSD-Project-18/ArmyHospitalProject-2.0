<?php
require_once '../core/initfromhandlers.php';

$user=new User();

if(!$user->isLoggedIn()){
    Redirect::to('../index.php');
}
if(Input::existsPost()){
    
        $validate=new Validate();
        $validation=$validate->check($_POST,array(
            'user_pwd'=>array(
                'name'=>'Current Password',
                'required'=>true,
                'min'=> 4,
                'max'=>50

            ),
            'user_pwd_new'=>array(
                'name'=>'New Password',
                'required'=>true,
                'min'=>4,
                'max'=>50,

            ),
            'user_pwd_again'=>array(
                'name'=>'Confirmation password',
                'required'=>true,
                'min'=>4,
                'max'=>50,
                'matches'=>'user_pwd_new'

            )

        ));
        if($validation->passed()){
            if(!Hash::verify(Input::get('user_pwd'),$user->data()->user_pwd)){
                Redirect::towithdata('../views/update.php','error_msg_pwd='.'The current password is wrong.Please try again');
            }else{
                $user->update(array(
                    'user_pwd'=>Hash::make(Input::get('user_pwd_new'))

                ));
                Session::flash('home','Password changed successfully');
                Redirect::to('../views/home.php');

            }



        }
        else{
            $errors= '';
            foreach ($validation->errors() as $error) {
                $errors .= $error.'<br>';
                echo($errors);
            }
            
            Redirect::towithdata('../views/update.php','error_msg_pwd='.$errors);
        }
    
}else{
    Redirect::to('../views/home.php');
}


?>


