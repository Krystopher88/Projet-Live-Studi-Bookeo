<?php

namespace App\Controller;

class Controller
{
  public function route(): void
  {

    if (isset($_GET['controller'])) {
      switch ($_GET['controller']) {
        case 'page':
          // charger controleur page
          $pageController = new PageController();
          $pageController->route();
          break;
        case 'book':
          // charger controleur book
          var_dump('on charge BookController');
          break;
        default:
          // erreur
          break;
      }
    } else {
      // charger la page d'accueil
    }
  }

  protected function render(string $path, array $params = []): void
  {
    $filePath = __ROOTPATH__ . '/templates/' . $path . '.php';

    try {
      if (!file_exists($filePath)) {
        throw new \Exception("Fichier non trouvé : " .$filePath);
      } else {
        extract($params);
        require_once $filePath;
      }
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }
}
