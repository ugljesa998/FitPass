<?php

namespace App\Interface;

interface ReceptionInterface
{
    /**
     * Get the user information, if it has access to enter.
     *
     * @return array
     */
    public function getUserReception($params): array;
}
