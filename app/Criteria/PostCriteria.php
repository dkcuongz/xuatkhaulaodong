<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class PostCriteria.
 *
 * @package namespace App\Criteria;
 */
class PostCriteria implements CriteriaInterface
{

    /**
     * @var $type
     */
    protected $type;

    /**
     * BannerController constructor.
     * @param $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }
    /**
     * Apply criteria in query repository
     *
     * @param string $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where('type', '=',$this->type);
        return $model;
    }
}
