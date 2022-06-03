<?php
namespace App\Repositories;


use Illuminate\Support\Str;
use App\MarketSubCategory;
use App\MarketCategory;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\MarketSubCategoryContract;
use App\Models\SubCategory;

use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class SubCategoryRepository
 *
 * @package \App\Repositories
 */
class MarketSubCategoryRepository extends BaseRepository implements MarketSubCategoryContract
{
    use UploadAble;

    /**
     * SubCategoryRepository constructor.
     * @param MarketSubCategory $model
     */
    public function __construct(MarketSubCategory $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSubCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findSubCategoryById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return Blogcategory|mixed
     */
    public function createSubCategory(array $params)
    {
        try {

            $collection = collect($params);

            $category = new MarketSubCategory;
            $category->title = $collection['title'];
            $category->category_id = $collection['category_id'];
            $profile_image = $collection['image'];
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("subcategories/",$imageName);
            $uploadedImage = $imageName;
            $category->image = $uploadedImage;

            $category->save();

            return $category;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSubCategory(array $params)
    {
        $category = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');

        $category->title = $collection['title'];
        $category->category_id = $collection['category_id'];
        if (!empty($collection['image'])) {
            $profile_image = $collection['image'];
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("subcategories/",$imageName);
            $uploadedImage = $imageName;
            $category->image = $uploadedImage;
            }

        $category->save();

        return $category;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteSubCategory($id)
    {
        $category = $this->findOneOrFail($id);
        $category->delete();
        return $category;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updatesubCategoryStatus(array $params){
        $category = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $category->status = $collection['check_status'];
        $category->save();

        return $category;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function detailsSubCategory($id)
    {
        $categories = SubCategory::where('id',$id)->get();

        return $categories;
    }

    public function listCategory(){
        return MarketCategory::all();
    }

     /**
     * @return mixed
     */
    public function getSearchSubcategory(string $term)
    {
        return MarketSubCategory::where([['title', 'LIKE', '%' . $term . '%']])

        ->get();
    }
}
