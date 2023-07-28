<?php

namespace App\Controller;

class PageController extends Controller
{
  public function route():void
  {

    if (isset($_GET['action'])) 
    {
      switch ($_GET['action']) {
        case 'about':
          // appeler methode about()
          $this->about();
          break;
        case 'home':
          // appeler methode home()
          var_dump('on appelle la methode home');
          break;
        default:
          // erreur
          break;
      }
    } else {
      // charger la page d'accueil
    }
  }


protected function about()
{
  $params = [
    'test' => 'abc',
    'test2' => 'abc2'
  ];
  $this->render('page/about', $params);
}

}
