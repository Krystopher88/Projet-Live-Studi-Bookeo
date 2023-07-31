<?php

namespace App\Controller;

class Controller
{
  public function route(): void
  {
    try {
      if (isset($_GET['controller'])) {
        switch ($_GET['controller']) {
          case 'page':
            // charger controleur page
            $pageController = new PageController();
            $pageController->route();
            break;
          case 'book':
            // charger controleur book
            $pageController = new BookController();
            $pageController->route();
            break;
          default:
            throw new \Exception("Le controleur n'existe pas");
            break;
        }
      } else {
        // charger la page d'accueil
        $pageController = new PageController();
        $pageController->home();
      }
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage(),
      ]);

    }
  }

  protected function render(string $path, array $params = []): void
  {
    $filePath = __ROOTPATH__ . '/templates/' . $path . '.php';

    try {
      if (!file_exists($filePath)) {
        throw new \Exception("Fichier non trouvé : " . $filePath);
      } else {
        extract($params);
        require_once $filePath;
      }
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage(),
      ]);
    }
  }
}
