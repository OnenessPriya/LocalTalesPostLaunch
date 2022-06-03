<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\MarketSubCategoryContract;
use Illuminate\Http\Request;
use App\MarketSubCategory;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Str;
use Session;

class MarketSubCategoryController extends BaseController
{
/**
     * @var SubCategoryContract
     */
    protected $SubCategoryRepository;


    /**
     * PageController constructor.
     * @param SubCategoryContract $MarketSubCategoryRepository
     */
    public function __construct(MarketSubCategoryContract $MarketSubCategoryRepository)
    {
        $this->MarketSubCategoryRepository = $MarketSubCategoryRepository;

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(Request $request)
    {
        $data =  MarketSubCategory::paginate(5);
        if (!empty($request->term)) {
            // dd($request->term);
             $subcategories = $this->MarketSubCategoryRepository->getSearchSubcategory($request->term);

            // dd($categories);
         } else {
        $subcategories = $this->MarketSubCategoryRepository->listSubCategories();
         }
        $categories = $this->MarketSubCategoryRepository->listCategory();
        $this->setPageTitle('Sub Category', 'List of all sub categories');
        return view('admin.market-subcategory.index', compact('subcategories','categories','data'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Sub Category', 'Create Subcategory');
        $categories = $this->MarketSubCategoryRepository->listCategory();

        return view('admin.market-subcategory.create',compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',
            'category_id'      =>  'required|max:191',
        ]);
        // $slug = Str::slug($request->name, '-');
        // $slugExistCount = MarketSubCategory::where('slug', $slug)->count();
        // if ($slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);

        // // send slug
        // request()->merge(['slug' => $slug]);
        $params = $request->except('_token');

        $targetsubCategory = $this->MarketSubCategoryRepository->createSubCategory($params);

        if (!$targetsubCategory) {
            return $this->responseRedirectBack('Error occurred while creating sub category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.market-subcat.index', 'Category has been created successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetsubCategory = $this->MarketSubCategoryRepository->findSubCategoryById($id);
        $categories = $this->MarketSubCategoryRepository->listCategory();
        $this->setPageTitle('Sub Category', 'Edit Sub Category : '.$targetsubCategory->title);
        return view('admin.market-subcategory.edit', compact('targetsubCategory','categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',
            'category_id'      =>  'required|max:191',
        ]);
        // $slug = Str::slug($request->name, '-');
        // $slugExistCount = MarketSubCategory::where('slug', $slug)->count();
        // if ($slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);
        $params = $request->except('_token');

        $subcategory = $this->MarketSubCategoryRepository->updateSubCategory($params);

        if (!$subcategory) {
            return $this->responseRedirectBack('Error occurred while updating sub category.', 'error', true, true);
        }
        return $this->responseRedirectBack('SubCategory has been updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $subcategory = $this->MarketSubCategoryRepository->deleteSubCategory($id);

        if (!$subcategory) {
            return $this->responseRedirectBack('Error occurred while deleting sub category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.market-subcat.index', 'sub Category has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $params = $request->except('_token');

        $subcategory = $this->MarketSubCategoryRepository->updatesubCategoryStatus($params);

        if ($subcategory) {
            return response()->json(array('message'=>'SubCategory status has been successfully updated'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id)
    {
        $categories = $this->MarketSubCategoryRepository->detailsSubCategory($id);
        $subcategory = $categories[0];

        $this->setPageTitle('SubCategory', 'Sub Category Details : '.$subcategory->title);
        return view('admin.market-subcategory.details', compact('subcategory'));
    }


}
