<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\IntroduceRepository;
use App\Entities\Introduce;
use App\Validators\IntroducePeopleValidator;

/**
 * Class IntroducePeopleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class IntroduceRepositoryEloquent extends BaseRepositoryEloquent implements IntroduceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Introduce::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
