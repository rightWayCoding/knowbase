<?php

namespace App\Domain\UseCases;

/**
 * Выдача прав
 */
class GrantAccess
{
    /**
     * Права на чтение статьи
     */
    public function forReadArticle(int $articleId, int $userId): bool
    {
        // TODO
    }
}
