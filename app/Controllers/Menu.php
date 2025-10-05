<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Menu extends BaseController
{
    public function index()
    {
        try {
            $menuModel = new MenuModel();
            $menus = $menuModel->findAll();
            log_message('debug', 'Menu data retrieved: ' . json_encode($menus));
            if (empty($menus)) {
                return '<div class="debug-info"><p>No menu items found in database.</p></div>';
            }
            $data['menus'] = $menus;
            return view('menu', $data);
            
        } catch (\Exception $e) {
            log_message('error', 'Menu controller error: ' . $e->getMessage());
            return '<div class="error-message"><p>Error loading menu: ' . $e->getMessage() . '</p></div>';
        }
    }

    public function addMenu()
{
    try {
        $menuModel = new MenuModel();
        $item = $this->request->getPost('item');
        $price = $this->request->getPost('price');
        $description = $this->request->getPost('description');
        $menuModel->insert([
            'item' => $item,
            'price' => $price,
            'description' => $description
        ]);
        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $safeName = strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $item)) . '.png';
            $imageFile->move(FCPATH . 'assets/images/', $safeName);
        }
        return $this->response->setJSON(['success' => true]);
    } catch (\Throwable $e) {
        return $this->response->setJSON([
            'success' => false,
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);
    }
}

    public function deleteMenu($id)
    {
        try {
            $menuModel = new MenuModel();
            $menuModel->delete($id);
            return $this->response->setJSON(['success' => true]);
        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
        $item = $menuModel->find($id);
    if ($item) {
        $safeName = strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $item['item'])) . '.png';
        $imagePath = FCPATH . 'assets/images/' . $safeName;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }
}