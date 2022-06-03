<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Contracts\MarketProductContract;
use App\Contracts\MarketCategoryContract;
use App\Contracts\BusinessContract;
use App\Contracts\MarketSubCategoryContract;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;

class ProductController extends BaseController
{
    /**
     * @var MarketProductContract
     */
    protected $MarketProductRepository;
    /**
     * @var MarketCategoryContract
     */
    protected $MarketCategoryRepository;
     /**
     * @var MarketSubCategoryContract
     */
    protected $MarketSubCategoryRepository;
    /**
     * @var BusinessContract
     */
    protected $businessRepository;


    /**
     * ProductController constructor.
     * @param ProductContract $ProductRepository
     */
    public function __construct(MarketProductContract $MarketProductRepository,MarketCategoryContract $MarketCategoryRepository,MarketSubCategoryContract $MarketSubCategoryRepository,BusinessContract $businessRepository)
    {
        $this->MarketProductRepository = $MarketProductRepository;
        $this->MarketCategoryRepository = $MarketCategoryRepository;
        $this->MarketSubCategoryRepository = $MarketSubCategoryRepository;
        $this->businessRepository = $businessRepository;

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $product = $this->MarketProductRepository->getProductByBusiness(Auth::user()->id);

        $this->setPageTitle('Product', 'List of all Product');
        return view('business.product.index', compact('product'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->MarketCategoryRepository->listCategories();
        $subcategories = $this->MarketSubCategoryRepository->listSubCategories();
        $businesses = $this->businessRepository->listBusinesss();

        $this->setPageTitle('Product', 'Create Product');
        return view('business.product.create', compact('categories','subcategories','businesses'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'image'     =>  'required|mimes:jpg,jpeg,png|max:1000',
        ]);

        $params = $request->except('_token');

        $product = $this->MarketProductRepository->createProduct($params);
       // dd($product);
        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating Product.', 'error', true, true);
        }
        return $this->responseRedirect('business.product.index', 'Product has been added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = $this->MarketProductRepository->findProductById($id);
        $categories = $this->MarketCategoryRepository->listCategories();
        $subcategories = $this->MarketSubCategoryRepository->listSubCategories();
        $businesses = $this->businessRepository->listBusinesss();

        $this->setPageTitle('Product', 'Edit Product : '.$product->title);
        return view('business.product.edit', compact('product','categories','subcategories','businesses'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
        ]);

        $params = $request->except('_token');

        $product = $this->MarketProductRepository->updateProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating Product.', 'error', true, true);
        }
        return $this->responseRedirectBack('Product has been updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $product = $this->MarketProductRepository->deleteProduct($id);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while deleting Product.', 'error', true, true);
        }
        return $this->responseRedirect('business.product.index', 'Product has been deleted successfully' ,'success',false, false);
    }

    // /**
    //  * @param Request $request
    //  * @return \Illuminate\Http\RedirectResponse
    //  * @throws \Illuminate\Validation\ValidationException
    //  */
    // public function updateStatus(Request $request){

    //     $params = $request->except('_token');

    //     $product = $this->ProductRepository->updateDealStatus($params);

    //     if ($product) {
    //         return response()->json(array('message'=>'Product status has been successfully updated'));
    //     }
    // }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id)
    {
        $deals = $this->MarketProductRepository->detailsProduct($id);
        $product = $deals[0];

        $this->setPageTitle('Product', 'Product Details : '.$product->name);
        return view('business.product.details', compact('product'));
    }
}
