<?php

namespace App\DoctrineExtensions;

use Doctrine\ORM\Query\SqlWalker;

class IlikeWalker extends SqlWalker
{
    public function walkLikeExpression($likeExpr)
    {
        $sql = parent::walkLikeExpression($likeExpr);
        $sql = str_replace('LIKE', 'ILIKE', $sql);

        return $sql;
    }
}
