<?php

namespace App\Controller;

use App\Entity\Classe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Student;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManager;

use Doctrine\ORM\EntityManagerInterface;


class AddstudentController extends AbstractController
{
    public  function __construct(
private EntityManagerInterface $entityManager
)
{}

#[Route('/addstudent', name: 'app_addstudent')]
public function create(): JsonResponse
{
   $classe=new Classe();
    $classe->setCapacity(49);
    $classe->setReference("AR1");
   
   $student=new     Student();
    $student->setName("marwane ouadghiri");
    $student->setAge(21);
    $student->setCity("Berkane 49 laymoun");
    $student->setReleation($classe);
   

  
    $this->entityManager->persist($classe);
   $this->entityManager->persist($student);
   $this->entityManager->flush();
return new JsonResponse("ok");

}
}
