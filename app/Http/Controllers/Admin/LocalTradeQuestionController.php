<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\LocalTradeQuestions;

class LocalTradeQuestionController extends BaseController
{
    public function index()
    {
        $data = LocalTradeQuestions::orderBy('position', 'asc')->get();
        $this->setPageTitle('Questions', 'List of all Questions');
        return view('admin.trade-question.index', compact('data'));
    }

    public function create()
    {
        $this->setPageTitle('Question', 'Create new Question');
        return view('admin.trade-question.create');
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
            'question' => 'required',
            'type' => 'required',
            'name' => 'required',
            'answer' => 'nullable',
        ]);

        $LocalTradeQuestionsCount = LocalTradeQuestions::count();

        $question = new LocalTradeQuestions();
        $question->question = $request->question;
        $question->type = $request->type;
        $question->name = $request->name;
        $question->answer = $request->answer ?? '';
        $question->position = $LocalTradeQuestionsCount + 1;
        $question->save();

        // $params = $request->except('_token');
        // $blog = $this->blogRepository->createBlog($params);

        if (!$question) {
            return $this->responseRedirectBack('Error occurred while creating question.', 'error', true, true);
        }
        return $this->responseRedirect('admin.localtrade.question.index', 'Question has been added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = LocalTradeQuestions::findOrFail($id);
        $this->setPageTitle('Question', 'Edit Question : '.$data->question);
        return view('admin.trade-question.edit', compact('data'));
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
            'question' => 'required',
            'type' => 'required',
            'name' => 'required',
            'answer' => 'nullable',
        ]);

        $question = LocalTradeQuestions::findOrFail($request->id);
        $question->question = $request->question;
        $question->type = $request->type;
        $question->name = $request->name;
        $question->answer = $request->answer ?? '';
        $question->update();

        if (!$question) {
            return $this->responseRedirectBack('Error occurred while updating Question.', 'error', true, true);
        }
        return $this->responseRedirectBack('Question has been updated successfully' ,'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $question = LocalTradeQuestions::destroy($id);

        if (!$question) {
            return $this->responseRedirectBack('Error occurred while deleting blog.', 'error', true, true);
        }
        return $this->responseRedirect('admin.localtrade.question.index', 'Blog has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){
        $question = LocalTradeQuestions::findOrFail($request->id);
        $question->status = $request->check_status;
        $question->update();

        if ($question) {
            return response()->json(array('message'=>'Blog status has been successfully updated'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id)
    {
        $blogs = $this->blogRepository->detailsBlog($id);
        $blog = $blogs[0];

        $this->setPageTitle('Blog', 'Blog Details : '.$blog->title);
        return view('admin.trade-question.details', compact('blog'));
    }
}
