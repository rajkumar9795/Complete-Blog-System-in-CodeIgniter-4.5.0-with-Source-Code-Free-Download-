<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\BlogModel;
class Home extends BaseController
{
    public function index(): string
    {
        $data['title'] = 'Welcome to Blog';
        $blogModel = new BlogModel();
        
        $data['blogs'] = $blogModel
            ->orderBy('ID', 'DESC')
            ->findAll(10);
        return view('homepage', $data);
    }
     public function blogview($rid): string
    {
        $data['title'] = 'Welcome to Blog';
         $blogModel = new BlogModel();
        $blog = $blogModel->find($rid);
        if (!$blog) {
            return redirect()->back()
                ->with('error', 'Blog not found');
        }

        $data['rid']  = $rid;
        $data['blog'] = $blog;
        $data['sidebar'] = $blogModel
            ->orderBy('ID', 'DESC')
            ->findAll(10);
        return view('blogview', $data);
    }
    
    public function loginpage(): string
    {
        $data['title'] = 'Login';
        return view('LoginPage', $data);
    }
     public function LoginUser()
    {
        if ($this->request->is('post'))
         {
        
            $uname    = $this->request->getPost('Username');
            $password = $this->request->getPost('Pass');

            $userModel = new UserModel();
            $user = $userModel->where('Username', $uname)->first();
            if ($user && password_verify($password, $user['Pass'])) {

                session()->set([
                    'UID'   => $user['ID'],
                    'Username'     => $user['Username'],
                    'logged_in' => true
                ]);

                return redirect()->to('dashboard');
            }

            return redirect()->back()->with('error', 'Invalid Username or password');
        }

        return redirect()->to('/');
    }
}
