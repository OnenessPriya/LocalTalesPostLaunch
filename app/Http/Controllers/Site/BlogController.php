<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Contracts\BlogContract;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\BaseController;
use Auth;

class BlogController extends BaseController
{
	/**
     * @var BlogContract
     */
    protected $blogRepository;


    /**
     * PageController constructor.
     * @param BlogContract $blogRepository
     */
    public function __construct(BlogContract $blogRepository){
        $this->blogRepository = $blogRepository;
    }

    public function index(){
    	$blogs = $this->blogRepository->getBlogs();
        $latestBlogs = $this->blogRepository->latestBlogs();
        $categories = $this->blogRepository->getBlogcategories();
        $tags = $this->blogRepository->getBlogtags();

    	$this->setPageTitle('Blog List', 'List of blogs');
        return view('site.blog.index', compact('blogs','latestBlogs','categories','tags'));
    }

    /**
     * @param $id
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id,$slug)
    {
        $blogs = $this->blogRepository->detailsBlog($id);
        $blog = $blogs[0];

        $relatedBlogs = $this->blogRepository->getRelatedBlogs($blog->category_id, $blog->id);

        $latestBlogs = $this->blogRepository->latestBlogs();
        $categories = $this->blogRepository->getBlogcategories();

        $this->setPageTitle($blog->title, 'Blog Details : '.$blog->title);
        return view('site.blog.details', compact('blog','relatedBlogs','latestBlogs','categories'));
    }

    /**
     * @param $id
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryWiseList($id,$slug){
        $blogs = $this->blogRepository->categoryWiseBlogs($id);

        $latestBlogs = $this->blogRepository->latestBlogs();
        $categories = $this->blogRepository->getBlogcategories();

        $this->setPageTitle('Category Wise Blogs', 'Category wise list of blogs');
        return view('site.blog.category_wise', compact('blogs','latestBlogs','categories'));
    }





}
