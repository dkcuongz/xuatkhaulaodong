<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\IntroducePeopleRepository;
use App\Entities\IntroducePeople;
use App\Validators\IntroducePeopleValidator;

/**
 * Class IntroducePeopleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class IntroducePeopleRepositoryEloquent extends BaseRepositoryEloquent implements IntroducePeopleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return IntroducePeople::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
