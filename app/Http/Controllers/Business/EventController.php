<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Contracts\EventContract;
use App\Contracts\CategoryContract;
use App\Contracts\EventformatContract;
use App\Contracts\LanguageContract;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Auth;

class EventController extends BaseController
{
    /**
     * @var EventContract
     */
    protected $eventRepository;
    /**
     * @var CategoryContract
     */
    protected $categoryRepository;
    /**
     * @var EventformatContract
     */
    protected $eventformatRepository;
    /**
     * @var LanguageContract
     */
    protected $languageRepository;


    /**
     * EventController constructor.
     * @param EventContract $eventRepository
     * @param CategoryContract $categoryRepository
     * @param EventformatContract $eventformatRepository
     * @param LanguageContract $languageRepository
     */
    public function __construct(EventContract $eventRepository,CategoryContract $categoryRepository, EventformatContract $eventformatRepository, LanguageContract $languageRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->categoryRepository = $categoryRepository;
        $this->eventformatRepository = $eventformatRepository;
        $this->languageRepository = $languageRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $events = $this->eventRepository->getEventsByBusiness(Auth::user()->id);

        $this->setPageTitle('Event', 'List of all event');
        return view('business.event.index', compact('events'));
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->categoryRepository->listCategories();
        $eventformats = $this->eventformatRepository->listEventformats();
        $languages = $this->languageRepository->listLanguages();

        $this->setPageTitle('Event', 'Create Event');
        return view('business.event.create', compact('categories','eventformats','languages'));
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
        
        $event = $this->eventRepository->createEvent($params);

        if (!$event) {
            return $this->responseRedirectBack('Error occurred while creating event.', 'error', true, true);
        }
        return $this->responseRedirect('business.event.index', 'Event has been added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetEvent = $this->eventRepository->findEventById($id);
        $categories = $this->categoryRepository->listCategories();
        $eventformats = $this->eventformatRepository->listEventformats();
        $languages = $this->languageRepository->listLanguages();
        
        $this->setPageTitle('Event', 'Edit Event : '.$targetEvent->title);
        return view('business.event.edit', compact('targetEvent','categories','eventformats','languages'));
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
        ]);

        $params = $request->except('_token');

        $event = $this->eventRepository->updateEvent($params);

        if (!$event) {
            return $this->responseRedirectBack('Error occurred while updating event.', 'error', true, true);
        }
        return $this->responseRedirectBack('Event has been updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $event = $this->eventRepository->deleteEvent($id);

        if (!$event) {
            return $this->responseRedirectBack('Error occurred while deleting event.', 'error', true, true);
        }
        return $this->responseRedirect('business.event.index', 'Event has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id)
    {
        $events = $this->eventRepository->detailsEvent($id);
        $event = $events[0];
        
        $this->setPageTitle('Event', 'Event Details : '.$event->title);
        return view('business.event.details', compact('event'));
    }
}
