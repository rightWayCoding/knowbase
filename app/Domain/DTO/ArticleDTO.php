<?php

namespace App\Domain\DTO;

use App\Domain\DTO;
use App\Domain\Enum\ArticleStatus;

class ArticleDTO extends DTO
{
    public string $title;
    public string $text;
    public \DateTimeInterface $created;
    public \DateTimeInterface $updated;
    public int $authorId;
    public ArticleStatus $status;
}
