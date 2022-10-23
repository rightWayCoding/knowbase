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
    public function create(ArticleDTO $dto)
    {
        $this->db->create($dto);
    }

    public function updateContent(int $id, ArticleDTO $dto)
    {
        $this->db->updateById($id, [
            'title' => $dto->title,
            'text' => $dto->text,
        ]);
    }

    /**
     * Публикация: статья становиться доступна
     */
    public function publish(int $id)
    {
        $this->db->updateById($id, [
            'status' => ArticleStatus::Published
        ]);
    }

    /**
     * Противоположно publish: статья становиться видна только автору
     */
    public function hide(int $id)
    {
        $this->db->updateById($id, [
            'status' => ArticleStatus::Hided
        ]);
    }

    /**
     * soft delete на статью (есть возможность восстановить)
     */
    public function delete(int $id)
    {
        $this->db->updateById($id, [
            'status' => ArticleStatus::Deleted
        ]);
    }
}
