<?php

namespace App\Controller;
require_once ('App/Repository/BookRepository.php');
require_once ('App/Entity/Book.php');
use App\Repository\BookRepository;


class BookController extends Controller
{
  public function route(): void
  {
    try {
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          case 'show':
            // appeler methode show()
            $this->show();
            break;
          case 'list':
            // appeler methode list()

            break;
          case 'edit':
            // appeler methode edit()

            break;
          case 'add':
            // appeler methode add()

            break;
          case 'delete':
            // appeler methode delete()

            break;
          default:
            throw new \Exception("Cette action n'existe pas" . $_GET['action']);
            break;
        }
      } else {
        throw new \Exception("Aucune action");
      }
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage(),
      ]);
    }
  }


  protected function show()
  {
    try {
      if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $bookRepository = new BookRepository();
        $book = $bookRepository->findOneById($id);
        $this->render('book/show', [
          'book' => $book
        ]);
      } else {
        throw new \Exception("L'id est manquant");
      }
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage(),
      ]);
    }
  }
}
