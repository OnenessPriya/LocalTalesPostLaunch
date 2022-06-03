<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Contracts\LoopContract;
use App\Contracts\EventContract;
use App\Contracts\DealContract;
use Illuminate\Http\Request;
use App\Models\Loop;
use App\Http\Controllers\BaseController;
use Auth;

class LoopController extends BaseController
{
	/**
     * @var LoopContract
     */
    protected $loopRepository;
    /**
     * @var EventContract
     */
    protected $eventRepository;
    /**
     * @var DealContract
     */
    protected $dealRepository;


    /**
     * PageController constructor.
     * @param LoopContract $loopRepository
     * @param EventContract $eventRepository
     * @param DealContract $dealRepository
     */
    public function __construct(LoopContract $loopRepository, EventContract $eventRepository, DealContract $dealRepository){
        $this->loopRepository = $loopRepository;
        $this->eventRepository = $eventRepository;
        $this->dealRepository = $dealRepository;
    }

    public function index(){
    	$loops = $this->loopRepository->getLoops();

        $pinCode = '';
        $pin = $this->loopRepository->getLoopByPinCode($pinCode);
        $deals = $this->dealRepository->getTrendingDealsByPinCode($pinCode);
        $events = $this->eventRepository->getEventsByPinCode($pinCode);

    	$this->setPageTitle('Local Loops', 'List of all discussions');
        return view('site.loop.index', compact('loops','deals','events','pin'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createComment(Request $request){
        $this->validate($request, [
            'loop_id'      =>  'required',
            'comment'     =>  'required',
        ]);

        $params = $request->except('_token');
        $params['user_id'] = Auth::user()->id;

        $comment = $this->loopRepository->createComment($params);

        if (!$comment) {
            return $this->responseRedirectBack('Error occurred while adding comment.', 'error', true, true);
        }

        return $this->responseRedirectBack( 'Comment has been added successfully' ,'success',false, false);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loopLike($id){
        $user_id = Auth::user()->id;

        $comment = $this->loopRepository->likeLoop($user_id,$id);

        return $this->responseRedirectBack( 'Loop status has been updated successfully' ,'success',false, false);
    }


      /**
     * List all the Post
     */
    public function post(Request $request)
    {
        $pinCode='';
        $data =  Loop::paginate(5);
        if (!empty($request->term)) {
            // dd($request->term);
             $blogs = $this->loopRepository->getSearchLoop($request->term);

            // dd($categories);
         } else {
        $blogs = $this->loopRepository->getLoopByPinCode($pinCode);
    }
        $this->setPageTitle('Loop', 'List of all Loop');
        return view('site.post.index', compact('blogs','data'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postcreate()
    {
        $this->setPageTitle('Blog', 'Create Blog');
      // $blogcat = $this->loopRepository->getBlogcategories();
        //$blogsubcat = $this->loopRepository->getBlogsubcategories();
       // $suburb = $this->blogRepository->getSuburb();
        $pin = $this->loopRepository->getPincode();

        return view('site.post.create',compact('pin'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function poststore(Request $request)
    {
        $request->validate([
            'content' => 'required|string|min:1',

        ]);

        $blog = $this->loopRepository->createLoop($request->except('_token'));

        if (!$blog) {
            return $this->responseRedirectBack('Error occurred while creating Loop.', 'error', true, true);
        }
        return $this->responseRedirect('site.localloop.post', 'Loop has been created successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postedit($id)
    {
        $targetblog = $this->loopRepository->findLoopById($id);

        $pin = $this->loopRepository->getPincode();
        $this->setPageTitle('Loop', 'Edit Loop : '.$targetblog->title);
        return view('site.post.edit', compact('targetblog','pin'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postupdate(Request $request)
    {
        $request->validate([
            'content' => 'required|string|min:1',

        ]);
        // $slug = Str::slug($request->name, '-');
        // $slugExistCount = Blog::where('slug', $slug)->count();
        // if ($slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);
        $params = $request->except('_token');

        $targetblog = $this->loopRepository->updateLoop($params);

        if (!$targetblog) {
            return $this->responseRedirectBack('Error occurred while updating Loop.', 'error', true, true);
        }
        return $this->responseRedirectBack('Loop has been updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postdelete($id)
    {
        $targetblog = $this->loopRepository->deleteLoop($id);

        if (!$targetblog) {
            return $this->responseRedirectBack('Error occurred while deleting Loop.', 'error', true, true);
        }
        return $this->responseRedirect('site.localloop.post', 'Loop has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postupdateStatus(Request $request){

        $params = $request->except('_token');

        $targetblog = $this->loopRepository->updateLoopStatus($params);

        if ($targetblog) {
            return response()->json(array('message'=>'Loop status has been successfully updated'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postdetails($id)
    {
        $targetblog = $this->loopRepository->detailsLoop($id);
        $loop = $targetblog[0];

        $this->setPageTitle('Loop', 'Loop Details : '.$loop->title);
        return view('site.post.details', compact('loop'));
    }
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function commentdelete($id)
    {
        $targetblog = $this->loopRepository->deleteLoopComment($id);

        if (!$targetblog) {
            return $this->responseRedirectBack('Error occurred while deleting Loop.', 'error', true, true);
        }
        return $this->responseRedirect('site.localloop.post', 'Loop Comment has been deleted successfully' ,'success',false, false);
    }

}
