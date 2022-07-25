<?php

/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Kairee Wu (krwu)
 */

declare(strict_types=1);

namespace Tests\Feature\Controller;

use DateTime;
use Spiral\Http\Exception\ClientException\BadRequestException;
use Tests\TestCase;

class ApiControllerTest extends TestCase
{
    public function testAddClass(): void
    {
        $this
            ->fakeHttp()
            ->postJson(
                '/classes',
                [
                'name' => 'test',
                'startDate' => (new DateTime())->format('Y-m-d\TH:i:sT'),
                'endDate' => (new DateTime())->format('Y-m-d\TH:i:sT'),
                'capacity' => 1
                ],
                [
                    'Content-type' => 'application/json',
                ]
            )
            ->assertOk();
    }

    public function testAddClassWrongParams()
    {
        $this
            ->fakeHttp()
            ->postJson(
                '/classes',
                [
                'name' => 1,
                'startDate' => 'test',
                'endDate' => 'test',
                'capacity' => 'test'
                ],
                [
                    'Content-type' => 'application/json',
                ]
            )
            ->assertStatus(BadRequestException::BAD_DATA);
    }
}
