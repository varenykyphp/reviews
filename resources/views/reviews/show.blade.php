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
                    <th>{{ __('varenykyReview::labels.slug') }}</th>
                    <th width="350"></th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->slug }}</td>
                        <td align="right">
                            <a href="{{ route('admin.reviews.update', $review->id) }}" class="btn btn-sm btn-dark me-1">
                                <i class="fa-solid fa-bars"></i> {{ __('varenyky::labels.accept') }}
                            </a>
                            <form action="{{ route( "admin.reviews.destroy", $review) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt me-2"></i>{{ __('varenyky::labels.delete') }}</button>
                        </form>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
@endsection
