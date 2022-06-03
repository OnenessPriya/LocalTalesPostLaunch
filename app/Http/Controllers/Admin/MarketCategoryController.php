<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\MarketCategoryContract;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class MarketCategoryController extends BaseController
{
    /**
     * @var CategoryContract
     */
    protected $categoryRepository;


    /**
     * PageController constructor.
     * @param CategoryContract $categoryRepository
     */
    public function __construct(MarketCategoryContract $marketcategoryRepository)
    {
        $this->marketcategoryRepository = $marketcategoryRepository;

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $categories = $this->marketcategoryRepository->listCategories();

        $this->setPageTitle('Category', 'List of all categories');
        return view('admin.market-category.index', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Category', 'Create category');
        return view('admin.market-category.create');
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
            'image'     =>  'required|mimes:jpg,jpeg,png|max:1000',
        ]);

        $params = $request->except('_token');

        $category = $this->marketcategoryRepository->createCategory($params);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while creating category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.market-cat.index', 'Category has been created successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetCategory = $this->marketcategoryRepository->findCategoryById($id);

        $this->setPageTitle('Category', 'Edit Category : '.$targetCategory->title);
        return view('admin.market-category.edit', compact('targetCategory'));
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
            'image'     =>  'mimes:jpg,jpeg,png|max:1000',
        ]);

        $params = $request->except('_token');

        $category = $this->marketcategoryRepository->updateCategory($params);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while updating category.', 'error', true, true);
        }
        return $this->responseRedirectBack('Category has been updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = $this->marketcategoryRepository->deleteCategory($id);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.market-cat.index', 'Category has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $params = $request->except('_token');

        $category = $this->marketcategoryRepository->updateCategoryStatus($params);

        if ($category) {
            return response()->json(array('message'=>'Category status has been successfully updated'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id)
    {
        $categories = $this->marketcategoryRepository->detailsCategory($id);
        $category = $categories[0];

        $this->setPageTitle('Category', 'Category Details : '.$category->title);
        return view('admin.market-category.details', compact('category'));
    }
}
