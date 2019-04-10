<?php
/**
 * Copyright (c) Enalean, 2019-Present. All Rights Reserved.
 *
 * This file is a part of Tuleap.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap. If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace Tuleap\REST;

use Mockery;
use PFUser;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tuleap\Http\HTTPFactoryBuilder;
use Tuleap\Http\Server\NullServerRequest;
use Tuleap\Request\ForbiddenException;
use User_StatusInvalidException;

final class RESTCurrentUserMiddlewareTest extends TestCase
{
    use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    public function testRequestIsProcessedWhenCurrentUserIsNotRejected() : void
    {
        $basic_rest_auth   = Mockery::mock(BasicAuthentication::class);
        $rest_user_manager = Mockery::mock(UserManager::class);

        $rest_current_user_middleware = new RESTCurrentUserMiddleware($rest_user_manager, $basic_rest_auth);

        $expected_user = Mockery::mock(PFUser::class);
        $basic_rest_auth->shouldReceive('__isAllowed');
        $rest_user_manager->shouldReceive('getCurrentUser')->andReturn($expected_user);

        $request_handler   = Mockery::mock(RequestHandlerInterface::class);
        $expected_response = HTTPFactoryBuilder::responseFactory()->createResponse();
        $request_handler->shouldReceive('handle')->with(Mockery::on(
            static function (ServerRequestInterface $request) use ($expected_user) : bool {
                return $request->getAttribute(RESTCurrentUserMiddleware::class) === $expected_user;
            }
        ))->andReturn($expected_response);

        $server_request = new NullServerRequest();
        $response       = $rest_current_user_middleware->process(
            $server_request,
            $request_handler
        );
        $this->assertSame($expected_response, $response);
    }

    public function testRequestIsRejectedWhenCurrentUserIsInInvalidState() : void
    {
        $basic_rest_auth   = Mockery::mock(BasicAuthentication::class);
        $rest_user_manager = Mockery::mock(UserManager::class);

        $rest_current_user_middleware = new RESTCurrentUserMiddleware($rest_user_manager, $basic_rest_auth);

        $basic_rest_auth->shouldReceive('__isAllowed');
        $rest_user_manager->shouldReceive('getCurrentUser')->andThrow(User_StatusInvalidException::class);

        $this->expectException(ForbiddenException::class);
        $rest_current_user_middleware->process(
            Mockery::mock(ServerRequestInterface::class),
            Mockery::mock(RequestHandlerInterface::class)
        );
    }
}
