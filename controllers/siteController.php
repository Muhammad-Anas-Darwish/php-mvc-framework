<?php

namespace app\controllers;

use silvercodes\phpmvc\Controller;
use silvercodes\phpmvc\Request;
use silvercodes\phpmvc\Response;
use silvercodes\phpmvc\Application;
use app\models\ContactForm;

class SiteController extends Controller
{ 
    public function home() 
    {
        $params = [
            'name' => "SilverBullet"
        ];
        return $this->render('home', $params);
    }
 
    public function contact(Request $request, Response $response) {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact,
        ]);
    }
}