<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Guest;
use Exception;
use Hyperf\HttpServer\Contract\RequestInterface;

class IndexController extends AbstractController
{
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }
    /**
     * @OA\Get(
     *     path="/guest/{id}",
     *     @OA\Response(response="200", description="An example resource")
     * )
     */
    public function getGuest(int $id): array
    {
        return Guest::find($id)->toArray();
    }

    /**
     * @throws Exception
     */
    public function addGuest(RequestInterface $request): array
    {
        $parametrs = $request->all();

        foreach (['name', 'last_name', 'phone'] as $required) {
            if (! array_key_exists($required, $parametrs)) {
                throw new Exception("{$required} обязательное поле");
            }
        }

        $res = Guest::create($request);
        return $res->toArray();
    }

    public function updateGuest(int $id, RequestInterface $request): array
    {
        $guest = Guest::find($id);
        $res = $guest->toArray();
        $res['save'] = $guest->save($request->all());
        return $res;
    }

    /**
     * @throws Exception
     */
    public function deleteGuest(int $id): array
    {
        $user = Guest::query()->find($id);

        $user->delete();

        return $user->toArray();
    }
}
