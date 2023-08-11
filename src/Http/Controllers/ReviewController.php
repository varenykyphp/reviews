<?php

namespace VarenykyReviews\Http\Controllers;

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
        return view('VarenykyReviews::reviews.index', compact('reviews'));
    }

    public function create(): View
    {
        return view('VarenykyReviews::reviews.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $create = $request->except(['_token']);
        $review = $this->repository->create($create);

        return redirect()->route('admin.reviews.index')->with('success', __('varenyky::labels.added'));
    }

    public function edit(Review $review): View
    {
        return view('VarenykyReviews::reviews.edit', compact('review'));
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
