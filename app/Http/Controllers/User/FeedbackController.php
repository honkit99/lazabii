<?php

namespace App\Http\Controllers\User;

use App\Feedback;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\FeedbackStoreRequest;
use App\Http\Requests\User\FeedbackUpdateRequest;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $feedbacks = Feedback::all();

        return view('user.feedback.index', compact('feedbacks'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.feedback.create');
    }

    /**
     * @param \App\Http\Requests\User\FeedbackStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackStoreRequest $request)
    {
        $feedback = Feedback::create($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('user.feedback.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Feedback $feedback)
    {
        return view('user.feedback.show', compact('feedback'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Feedback $feedback)
    {
        return view('user.feedback.edit', compact('feedback'));
    }

    /**
     * @param \App\Http\Requests\User\FeedbackUpdateRequest $request
     * @param \App\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(FeedbackUpdateRequest $request, Feedback $feedback)
    {
        $feedback->update($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('user.feedback.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Feedback $feedback)
    {
        $feedback->delete();

        $request->session()->flash('success', $success);

        return redirect()->route('user.feedback.index');
    }
}
