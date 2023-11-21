<?php declare(strict_types=1);

namespace Diego\HealthMiddleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Http\Response;

final class HealthMiddleware implements MiddlewareInterface
{

    public const IDENTIFIER = 'diego/health-middleware';

    /** @var string */
    private $path;

    /** @var int */
    private $statusCode;

    public function __construct(string $path = '/_health', int $statusCode = 204)
    {
        $this->path = $path;
        $this->statusCode = $statusCode;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if ($request->getUri()->getPath() === $this->path) {
            return new Response('php://temp', $this->statusCode);
        }

        return $handler->handle($request);
    }

}
