<?php

namespace application\controller;

use application\model\User;
use vendor\controller\Controller;
use vendor\session\Session;

Session::start();

class LogController extends Controller
{
    public function index()
    {
        return $this->view('log/index', ['direct' => $this->get('direct')]);
    }
    public function login()
    {
        User::validate(
            [
                $this->post('email') => 'email',
                $this->post('password') => 'min:8|max:32',
            ]
        );
        $user = User::getwhere('email', $this->post('email'));
        if (!$user) {
            return $this->redirect('/log/index');
        }
        if (!password_verify($this->post('password'), $user->password)) {
            return $this->redirect('/log/index');
        }
        Session::set('user_id', $user->id);
        return $this->redirect('/main/index');
    }

    public function register()
    {
        User::validate(
            [
                $this->post('name') => 'name|min:3',
                $this->post('password') => 'min:8|max:32',
                $this->post('email') => 'email',
            ]
        );
        $user = User::create([
            'name' => $this->post('name'),
            'password' => password_hash($this->post('password'), PASSWORD_DEFAULT),
            'email' => $this->post('email'),
        ]);
        Session::set('user_id', $user);
        return $this->redirect('/main/index');
    }

    public function logout()
    {
        Session::destroy();
        return $this->redirect('/log/index');
    }
}
