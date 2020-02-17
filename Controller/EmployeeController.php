<?php
namespace App\Controller;

use App\Repository\EmployeeRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EmployeeController
{
    /**
     * @Route("/employee/{id}/projects")
     * @param $id
     * @param EmployeeRepository $employeeRepository
     * @return JsonResponse
     */
    public function getEmployeeTasks($id, EmployeeRepository $employeeRepository)
    {
        $projects = $employeeRepository->getAllProjectsByEmployeeId($id) ?? [];

        return new JsonResponse([
            json_encode($projects)
        ]);
    }
}