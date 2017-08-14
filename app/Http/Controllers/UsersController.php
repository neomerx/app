<?php namespace App\Http\Controllers;

use App\Json\Api\UsersApi as Api;
use App\Json\Schemes\UserScheme as Scheme;
use App\Json\Validators\UserCreate;
use App\Json\Validators\UserUpdate;
use Limoncello\Flute\Http\BaseController;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @package App
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
class UsersController extends BaseController
{
    /** @inheritdoc */
    const API_CLASS = Api::class;

    /** @inheritdoc */
    const SCHEMA_CLASS = Scheme::class;

    /** @inheritdoc */
    const ON_CREATE_VALIDATION_RULES_SET_CLASS = UserCreate::class;

    /** @inheritdoc */
    const ON_UPDATE_VALIDATION_RULES_SET_CLASS = UserUpdate::class;

    /**
     * @param array                  $routeParams
     * @param ContainerInterface     $container
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public static function readPosts(
        array $routeParams,
        ContainerInterface $container,
        ServerRequestInterface $request
    ): ResponseInterface {
        $index    = $routeParams[static::ROUTE_KEY_INDEX];
        $response = static::readRelationship($index, Scheme::REL_POSTS, $container, $request);

        return $response;
    }

    /**
     * @param array                  $routeParams
     * @param ContainerInterface     $container
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public static function readComments(
        array $routeParams,
        ContainerInterface $container,
        ServerRequestInterface $request
    ): ResponseInterface {
        $index    = $routeParams[static::ROUTE_KEY_INDEX];
        $response = static::readRelationship($index, Scheme::REL_COMMENTS, $container, $request);

        return $response;
    }
}
