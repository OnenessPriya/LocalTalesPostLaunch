<?php
namespace App\Repositories;

use App\Models\MarketProduct;
use App\MarketCategory;
use App\MarketSubCategory;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\MarketProductContract;
use Illuminate\Database\QueryException;
use IlluminateAgnostic\Collection\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class DealRepository
 *
 * @package \App\Repositories
 */
class MarketProductRepository extends BaseRepository implements MarketProductContract
{
    use UploadAble;

    /**
     * ProductRepository constructor.
     * @param MarketProduct $model
     */
    public function __construct(MarketProduct $model)
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
    public function listProduct(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findProductById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return Deal|mixed
     */
    public function createProduct(array $params)
    {
        try {

            $collection = collect($params);

            $product = new MarketProduct;
            $product->name = $collection['name'];
            $product->cat_id = $collection['cat_id'];
            $product->sub_cat_id = $collection['sub_cat_id'];
            $product->business_id = $collection['business_id'];
            $product->short_desc = $collection['short_desc'];
            $product->desc = $collection['desc'];
            $product->price = $collection['price'];
            $product->offer_price = $collection['offer_price'];
            $product->meta_title = $collection['meta_title'];
            $product->meta_desc = $collection['meta_desc'];
            $product->meta_keyword = $collection['meta_keyword'];

            $product->pincode = $collection['pincode'];
           // slug generate
           $slug = Str::slug($collection['name'], '-');
           $slugExistCount = MarketProduct::where('name', $collection['name'])->count();
           if ($slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);
           $product->slug = $slug;

            $profile_image = $collection['image'];
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("product/",$imageName);
            $uploadedImage = $imageName;
            $product->image = $uploadedImage;

            $product->save();

            return $product;

            return $product;
        } catch (\Throwable $th) {
            throw $th;

        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProduct(array $params)
    {
        $product = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');

        $product->name = $collection['name'];
        $product->cat_id = $collection['cat_id'];
        $product->sub_cat_id = $collection['sub_cat_id'];
        $product->business_id = $collection['business_id'];
        $product->short_desc = $collection['short_desc'];
        $product->desc = $collection['desc'];
        $product->price = $collection['price'];
        $product->offer_price = $collection['offer_price'];
        $product->meta_title = $collection['meta_title'];
        $product->meta_desc = $collection['meta_desc'];
        $product->meta_keyword = $collection['meta_keyword'];

        $product->pincode = $collection['pincode'];
       // slug generate
       $slug = Str::slug($collection['name'], '-');
       $slugExistCount = MarketProduct::where('slug', $slug)->count();
       if (!$slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);
       $product->slug = $slug;
       if($product->image){
       $profile_image = $collection['image'];
       $imageName = time().".".$profile_image->getClientOriginalName();
       $profile_image->move("product/",$imageName);
       $uploadedImage = $imageName;
       $product->image = $uploadedImage;
       }
        $product->save();

        return $product;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteProduct($id)
    {
        $product = $this->findOneOrFail($id);
        $product->delete();
        return $product;
    }

    // /**
    //  * @param array $params
    //  * @return mixed
    //  */
    // public function updateDealStatus(array $params){
    //     $deal = $this->findOneOrFail($params['id']);
    //     $collection = collect($params)->except('_token');
    //     $deal->status = $collection['check_status'];
    //     $deal->save();

    //     return $deal;
    // }

     /**
     * @param $id
     * @return mixed
     */
    public function detailsProduct($id)
    {
        $product = MarketProduct::with('category')->with('business')->where('id',$id)->get();

        return $product;
    }

    /**
     * @param $businessId
     * @return mixed
     */
    public function getProductByBusiness($businessId){
        $events = MarketProduct::with('category')->where('business_id',$businessId)->get();

        return $events;
    }

    /**
     * @param $pinCode
     * @return mixed
     */
    public function getProductByPinCode($pinCode){
        $product = MarketProduct::with('category')->where('pincode',$pinCode)->get();

        return $product;
    }



    /**
     * @param $pinCode
     * @param $categoryId
     * @param $keyword
     * @return mixed
     */
    public function searchProductData($pinCode,$categoryId,$keyword){
        $product = MarketProduct::with('category')->where('status','=',1)
                        ->when($pinCode, function($query) use ($pinCode){
                            $query->where('pincode', '=', $pinCode);
                        })
                        ->when($categoryId!='', function($query) use ($categoryId){
                            $query->where('cat_id', '=', $categoryId);
                        })
                        ->when($keyword, function($query) use ($keyword){
                            $query->where('name', 'like', '%' . $keyword .'%');
                        })
                        ->get();

        return $product;
    }
    /**
     *
     * @param $categoryId
     * @return mixed
     */
    public function getProductByCategory($categoryId){
        $product = MarketProduct::with('category')->where('cat_id',$categoryId)->get();

        return $product;
    }
    /**
     *
     * @param $categoryId
     * @return mixed
     */
    public function getProductBySubCategory($subcategoryId){
        $product = MarketProduct::with('subcategory')->where('sub_cat_id',$subcategoryId)->get();

        return $product;
    }




    /**
     * @param $pinCode
     * @param $categoryId
     * @param $keyword
     * @param $expiryDate
     * @param $minPrice
     * @param $maxPrice
     * @return mixed
     */
    public function filterProductsData($pinCode,$categoryId,$keyword,$expiryDate,$minPrice,$maxPrice){
        $product = MarketProduct::with('category')->where('status','=',1)
                        ->when($pinCode, function($query) use ($pinCode){
                            $query->where('pin', '=', $pinCode);
                        })
                        ->when($categoryId!='', function($query) use ($categoryId){
                            $query->where('category_id', '=', $categoryId);
                        })
                        ->when($keyword, function($query) use ($keyword){
                            $query->where('title', 'like', '%' . $keyword .'%');
                        })
                        ->when($expiryDate!='', function($query) use ($expiryDate){
                            $query->where('expiry_date', '>=', $expiryDate);
                        })
                        ->when($minPrice!='', function($query) use ($minPrice){
                            $query->where('price', '>=', $minPrice);
                        })
                        ->when($maxPrice!='', function($query) use ($maxPrice){
                            $query->where('price', '<=', $maxPrice);
                        })
                        ->get();

        return $product;
    }
}
