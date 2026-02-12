<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BlogModel;
use Config\Services;
class Admin extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
         $blogModel = new BlogModel();
        
        $data['count'] = $blogModel            
            ->countAllResults();
        return view('index',$data);
         
    }
     public function blogindex()
    {
        $data['title'] = 'Blog Index';
        $blogModel = new BlogModel();
        
        $data['blogs'] = $blogModel
            ->orderBy('ID', 'DESC')
            ->findAll();
        return view('blogindex',$data);
    }
    public function blogNewRowCreate()
    {
        $blogModel = new BlogModel();
        $row = [
            'CreatedDate'   => date("Y-m-d"),
            'RCount'    => '0',
            'RStatus' => '0'
        ];
         $blogModel->insert($row);
        $lastId = $blogModel->getInsertID();
       return redirect()->to('blogadd/' . $lastId);

    }
     public function blogadd($rid)
    {
        $data['title'] = 'Blog Add';


        $blogModel = new BlogModel();

        $blog = $blogModel->find($rid);

        if (!$blog) {
            return redirect()->back()
                ->with('error', 'Blog not found');
        }

        $data['rid']  = $rid;
        $data['blog'] = $blog;
        return view('blogcreate',$data);
    }
    //============= Update Blog =====================
    public function blogupdate()
    {
        $id = $this->request->getPost('ID');

        if (!$id) {
            return redirect()->back()->with('error', 'Invalid blog ID');
        }

        $blogModel = new BlogModel();

        // Base data (always update)
        $data = [
            'Heading'     => $this->request->getPost('Heading'),
            'BlogText'    => $this->request->getPost('BlogText'),
            'UpdatedDate' => date('Y-m-d'),
        ];

        // Handle optional feature image
        $file = $this->request->getFile('feature_image');

        if ($file && $file->isValid() && !$file->hasMoved()) {

            $ext = $file->getClientExtension();
            $newName = $id . '.' . $ext;

            $uploadPath = FCPATH . 'uploads/blog/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // OPTIONAL: delete old image if extension changed
            $oldBlog = $blogModel->find($id);
            if (!empty($oldBlog['Ext']) && $oldBlog['Ext'] !== $ext) {
                $oldPath = $uploadPath . $id . '.' . $oldBlog['Ext'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            // Resize & save new image
            Services::image()
                ->withFile($file)
                ->resize(800, 600, false, 'height')
                ->save($uploadPath . $newName);

            // ✅ Update EXT only when image is uploaded
            $data['Ext'] = $ext;
        }

        // Update DB
        $blogModel->update($id, $data);

        return redirect()->to('blogadd/' . $id)
            ->with('success', 'Blog updated successfully');
    }

//============= // Update Blog =====================
 public function uploadImage()
    {
        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {

            // security checks
            $allowed = ['image/png', 'image/jpg', 'image/jpeg', 'image/webp'];
            if (!in_array($file->getMimeType(), $allowed)) {
                return $this->response->setBody('');
            }

            if ($file->getSize() > 1 * 1024 * 1024) { // 1MB
                return $this->response->setBody('');
            }
            

            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/blog-img/', $newName);

            return base_url('uploads/blog-img/' . $newName);
        }

        return '';
    }
    // Delte blog image from summernote editor
    public function delblogimg()
    {
        $imageUrl = $this->request->getPost('image');

        if (!$imageUrl) {
            return $this->response->setJSON(['status' => 'error', 'msg' => 'No image URL']);
        }

        $fileName = basename(parse_url($imageUrl, PHP_URL_PATH));
        $uploadDir = realpath(FCPATH . 'uploads/blog-img');
        $fullPath  = realpath($uploadDir . DIRECTORY_SEPARATOR . $fileName);
        //$fullPath = FCPATH . 'uploads/blog-img/' . $fileName;

        // Security check
        if (!$fullPath || strpos($fullPath, $uploadDir) !== 0) {
            return $this->response->setJSON(['status' => 'error', 'msg' => 'Invalid path']);
        }

        if (file_exists($fullPath)) {
            unlink($fullPath);
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'msg' => 'File not found',
            'path' => $fullPath
        ]);
    }
    //Delete Blog
    public function blogdelete()
    {
        $id = $this->request->getPost('ID');

        if (!$id) {
            return redirect()->back()->with('error', 'Invalid blog ID');
        }

        $blogModel = new BlogModel();

        // Fetch blog first (to get Ext)
        $blog = $blogModel->find($id);

        if (!$blog) {
            return redirect()->back()->with('error', 'Blog not found');
        }

        // Delete feature image if exists
        if (!empty($blog['Ext'])) {
            $imagePath = FCPATH . 'uploads/blog/' . $id . '.' . $blog['Ext'];

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete DB record
        $blogModel->delete($id);

        return redirect()->to('blogindex')
            ->with('success', 'Blog deleted successfully');
    }
     public function logout()
    {
        
        session()->destroy();               
        return redirect()->to('/');
    }
}
