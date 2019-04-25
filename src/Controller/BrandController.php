<?php

namespace App\Controller;

use App\Entity\Brand;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * @Rest\Prefix("api")
 */
class BrandController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }
    
    public function getBrandAction()
    {
        $products = $this->em
        ->getRepository(Brand::Class)
        ->findAll(); 
        return new JsonResponse(
            ["data"=>$products],
            JsonResponse::HTTP_OK
        );
    }
}
