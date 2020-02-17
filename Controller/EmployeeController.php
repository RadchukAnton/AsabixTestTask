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
    public function getEmployeeProjects($id, EmployeeRepository $employeeRepository)
    {
        $projects = $employeeRepository->getAllProjectsByEmployeeId($id) ?? [];

        return new JsonResponse([
            json_encode($projects)
        ]);
    }

    /**
     * @Route("/employeers")
     * @param EmployeeRepository $employeeRepository
     * @return JsonResponse
     */
    public function getEmployeesWithProjectsList(EmployeeRepository $employeeRepository)
    {
        $employeesList = $employeeRepository->getAuthorsWithProjects();

        return new JsonResponse([
            json_encode($employeesList)
        ]);
    }
}