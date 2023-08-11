@extends('varenykyAdmin::app')

@section('title', __('varenykyReview::admin.reviews.index.title'))

@section('content_header')
    <strong>{{ __('varenykyReview::admin.reviews.index.title') }}</strong>
@stop

@section('create-btn', route('admin.reviews.create'))

@section('content')
    <div class="card border p-3">
        <table class="table">
            <thead>
                <tr class="">
                    <th>{{ __('varenykyReview::labels.name') }}</th>
                    <th>{{ __('varenykyReview::labels.rating') }}</th>
                    <th>{{ __('varenykyReview::labels.description') }}</th>
                    <th width="350"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reviews as $review)
                    <tr>
                        <td>{{ $review->order->delevery->name }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->description }}</td>
                        <td align="right">
                            <a href="{{ route('admin.reviews.show', $review->id) }}" class="btn btn-sm btn-dark me-1">
                                <i class="fa-solid fa-bars"></i> {{ __('varenyky::labels.show') }}
                            </a>
                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('varenyky::labels.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
