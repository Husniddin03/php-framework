<?php

namespace application\controller;

use application\model\Topic;
use application\model\User;
use vendor\controller\Controller;
use vendor\session\Session;

Session::start();

class MainController extends Controller
{
    public function header()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
        return $this->view('common/header');
    }
    public function footer()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
        return $this->view('common/footer');
    }
    public function index()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
        return $this->view('main/index');
    }

    public function search()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }

        $search = $this->get("search");

        if (strlen($search) > 0) {
            $hint = Topic::select("*")->where("theme like '%{$search}%'")->all();
            if (isset($hint)) {
                $div = "<div class='search-result'>";
                foreach ($hint as $item) {
                    $div .= "<a href='/quiz/form?id={$item->id}' class='search-item'>{$item->theme}</a>";
                }
                $div .= "</div>";
                $hint = $div;
            } else {
                $hint = "";
            }
        } else {
            $hint = "";
        }


        if ($hint == "") {
            $response = "Topilmadi";
        } else {
            $response = $hint;
        }

        echo $response;
    }
}
