<?php

namespace Jarvis\Router\Helpers;

/**
 * class StatusCode presents simple http status codes...
 */
class StatusCode
{
    const OK = 200;
    const REDIRECT = 301;
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const SERVER_ERROR = 500;
}
