<?php

namespace App\Controller;

use App\Services\Api\Drivers\Openweather;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function index()
    {
        $repo = $this->container
            ->get('repository.city');

        $allCities = $repo->getAll();

        return $this->render(
            'Desktop/Dashboard/index.html.php',
            [
                'allCities' => $allCities,
            ]
        );
    }

    public function cityData(string $id)
    {
        /** @var Openweather $api */
        $api = $this->container
            ->get('api.driver.open_weather');
        $repo = $this->container
            ->get('repository.city');

        $city = $repo->getById($id);
        if (empty($city) || $city['id'] < 1) {
            return new JsonResponse([
                'status' => 'error',
                'message' => 'No data for city '.$id
            ]);
        }

        $cityData = $api->getCityData(
            $city['name'],
            $city['key']
        );

        return new JsonResponse($cityData);
    }

    public function addCity(string $name, string $key)
    {
        /** @var Openweather $api */
        $api = $this->container
            ->get('api.driver.open_weather');

        $cityData = $api->getCityData($name, $key);


        if (empty($cityData) || $cityData['id'] < 1) {
            return new JsonResponse([
                'status' => 'error',
                'message' => 'No data for city '.$name
            ]);
        }

        $repo = $this->container
            ->get('repository.city');
        $insertId = $repo->insertCity($name, $key);

        if ($insertId === 0) {
            return new JsonResponse([
                'status' => 'error',
                'message' => 'Database problem, try again '
            ]);
        }

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Success',
            'id' => $insertId,
            'name' => $name,
        ]);
    }
}
