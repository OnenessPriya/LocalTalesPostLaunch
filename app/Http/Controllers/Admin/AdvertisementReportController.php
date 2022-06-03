<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Contracts\AdvertisementReportContract;
// use App\Contracts\CategoryContract;
use App\Contracts\BusinessContract;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;

class AdvertisementReportController extends Controller
{
    /**
     * @var AdvertisementContract
     */
    protected $advertisementRepository;

    /**
     * NotificationController constructor.
     * @param AdvertisementContract $advertisementRepository
     */
    public function __construct(AdvertisementReportContract $advertisementReportRepository,BusinessContract $businessRepository)
    {
        $this->advertisementRepository = $advertisementReportRepository;
        $this->businessRepository = $businessRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $data = $this->advertisementRepository->findAdvertisementByBusiness(Auth::user()->id);

        $this->setPageTitle('Advertisement', 'List of all advertisements');
        return view('admin.advertisement.index', compact('data'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // $categories = $this->categoryRepository->listCategories();
         $businesses = $this->businessRepository->listBusinesss();

        $this->setPageTitle('Advertisement', 'Create Advertisement');
        return view('admin.advertisement.create',compact('businesses'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'description' => 'nullable',
            'page' => 'required',
            'slot_id' => 'required',
            'redirect_link' => 'required',
            'target_postcode' => 'required',
            'target_city' => 'required',
            'target_state' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:100000',
        ]);

        $params = $request->except('_token');

        $advertisement = $this->advertisementRepository->createAdvertisement($params);

        if (!$advertisement) {
            return $this->responseRedirectBack('Error occurred while creating advertisement.', 'error', true, true);
        }
        return $this->responseRedirect('admin.business.advertisement.index', 'Advertisement has been added successfully' ,'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetAd = $this->advertisementRepository->findAdvertisementById($id);

        $this->setPageTitle('Advertisement', 'Edit Advertisement : '.$targetAd->title);
        return view('admin.advertisement.edit', compact('targetAd'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'page' => 'required',
            'slot_id' => 'required',
            'redirect_link' => 'required',
            'target_postcode' => 'required',
            'target_city' => 'required',
            'target_state' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:100000',
        ]);

        $params = $request->except('_token');

        $advertisement = $this->advertisementRepository->updateAdvertisement($params);

        if (!$advertisement) {
            return $this->responseRedirectBack('Error occurred while updating Advertisement.', 'error', true, true);
        }
        return $this->responseRedirectBack('Advertisement has been updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $advertisement = $this->advertisementRepository->deleteAdvertisement($id);

        if (!$advertisement) {
            return $this->responseRedirectBack('Error occurred while deleting Advertisement.', 'error', true, true);
        }
        return $this->responseRedirect('admin.business.advertisement.index', 'Advertisement has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    /* public function updateStatus(Request $request){

        $params = $request->except('_token');

        $deal = $this->advertisementRepository->updateDealStatus($params);

        if ($deal) {
            return response()->json(array('message'=>'Deal status has been successfully updated'));
        }
    } */

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    /* public function details($id)
    {
        $deals = $this->advertisementRepository->detailsDeal($id);
        $deal = $deals[0];

        $this->setPageTitle('Deal', 'Deal Details : '.$deal->title);
        return view('business.deal.details', compact('deal'));
    } */
}
