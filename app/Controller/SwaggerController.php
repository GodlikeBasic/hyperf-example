<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Lengbin\Hyperf\Swagger\Swagger;

/**
 * Class SwaggerController.
 * @Controller
 */
class SwaggerController extends AbstractController
{
    /**
     * @Inject
     * @var Swagger
     */
    public $swagger;

    /**
     * swagger ui.
     * @GetMapping(path="/swagger")
     */
    public function index()
    {
        return $this->swagger->html();
    }

    /**
     * swagger open api.
     * @GetMapping(path="/swagger/api")
     */
    public function api()
    {
        // 扫码目录path
        $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'swagger';
        return $this->swagger->api([
            $path,
        ]);
    }

    /**
     * swagger web -> generator annotation.
     * @GetMapping(path="/swagger/generator")
     */
    public function generator()
    {
        return $this->swagger->generator($this->request);
    }

    /**
     * swagger web api.
     * @RequestMapping(path="/swagger/annotation", methods={"GET", "POST"})
     */
    public function annotation()
    {
        // 扫码目录path, 生成注释文档目录
        $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'swagger';
        return ['code' => 0, 'message' => 'Success', 'data' => $this->swagger->annotation($this->request, $path)];
    }
}
