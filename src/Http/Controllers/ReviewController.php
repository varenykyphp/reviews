<?php

namespace VarenykyReview\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Varenyky\Http\Controllers\BaseController;
use VarenykyReview\Models\Review;
use VarenykyReview\Repositories\ReviewRepository;

class ReviewController extends BaseController
{
    public function __construct(ReviewRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): View
    {
        $reviews = $this->repository->getAll();
         $reviews = ['hi'=>'ho'];
        return view('VarenykyReview::reviews.index', compact('reviews'));
    }

    public function show(Review $review): View
    {
        return view('VarenykyReview::reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review): RedirectResponse
    {
        $update = array_filter($request->except(['_token', '_method']));
        $this->repository->update($review->id, $update);

        return redirect()->route('admin.reviews.edit', $review->id)->with('success', __('varenyky::labels.updated'));
    }

    public function destroy(Review $review): RedirectResponse
    {
        
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('error', __('varenyky::labels.deleted'));
    }
}
