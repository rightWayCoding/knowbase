<?php

namespace App\Domain\Models;

use App\Domain\Contracts\DatabaseInterface;
use App\Domain\DTO\ArticleDTO;
use App\Domain\Enum\ArticleStatus;

/**
 * Базовая сущность блога
 */
class Article
{
    public DatabaseInterface $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    /**
     * Создание статьи
     */
    public function create(ArticleDTO $dto): bool
    {
        $id = $this->db->create($dto);
        return (bool)$id;
    }

    public function updateContent(int $id, ArticleDTO $dto): bool
    {
        $count = $this->db->updateById($id, [
            'title' => $dto->title,
            'text' => $dto->text,
        ]);
        return (bool)$count;
    }

    /**
     * Публикация: статья становиться доступна
     */
    public function publish(int $id): bool
    {
        return (bool)$this->db->updateById($id, [
            'status' => ArticleStatus::Published
        ]);
    }

    /**
     * Противоположно publish: статья становиться видна только автору
     */
    public function hide(int $id): bool
    {
        return (bool)$this->db->updateById($id, [
            'status' => ArticleStatus::Hided
        ]);
    }

    /**
     * soft delete на статью (есть возможность восстановить)
     */
    public function delete(int $id): bool
    {
        return (bool)$this->db->updateById($id, [
            'status' => ArticleStatus::Deleted
        ]);
    }
}
